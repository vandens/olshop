<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	/*
	Created By 		: Vandens Mc Maddens
	Created Date 	: March 20, 2014
	Creator Sites 	: www.cld.biz 
	*/

    public function __construct()
    {
        parent::__construct();
		$d = $this->db->get('t_setting')->result_array();
		foreach ($d as $key) {
			foreach ($key as $k => $v) {
				$x[$k] = $v;
			}
		}


		 $x['sql'] 	 		= $this->db->select('count(b.auto) as jml, b.auto as id_merk, a.*')
							   				->from('t_kategori a')
							   				->join('t_merk b','a.auto = b.id_cat','left')
							   				->group_by('a.auto')
							   				->order_by('kategori ASC')
							   				->get()->result_array();
		$x['statistik']		= '';//$this->statistik();
		$x['getStatik']		= $this->getStatik();
		$x['sqlx']	= $this->db->order_by('RAND()')->get('t_runtext')->result_array();
		$x['sqly']	= $this->db->order_by('add_date DESC')->limit(10)->order_by('RAND()')->get('t_produk')->result_array();
		$x['chat'] 	= '';//$this->db->where('level',2)->get('t_user')->result_array();
		return $x;
    }

	function statistik(){

		if ($this->agent->is_browser()){   $agent = $this->agent->browser().' '.$this->agent->version(); }
		elseif ($this->agent->is_robot())	{   $agent = $this->agent->robot();	}
		elseif ($this->agent->is_mobile())	{   $agent = $this->agent->mobile(); }
		else{ $agent = 'User Agent tidak dikenal'; }

		$ip 	= $this->input->ip_address();
		
		$tgl 	= date('Y-m-d');

		if ( ! $this->input->valid_ip($ip))
		{
		     log_message('error', 'IP : '.$ip.' is INVALID IP Address'.$tgl);
		}
		else
		{
			$qry = $this->db->query("SELECT * FROM t_statistik WHERE ip='$ip' AND tgl ='$tgl'");
			if($qry->num_rows() == 0){
				$this->db->insert("t_statistik",array('ip' =>$ip, 'user_agent'=>$agent, 'tgl'=>$tgl, 'hits'=>'1'));
			}else{
				$this->db->query("UPDATE t_statistik set hits=hits+1 where ip = '$ip' AND tgl = '$tgl'");
			}	     

		}
	}

	function getStatik(){
		$tgl 			= date('Y-m-d');
		$sql1			= $this->db->query("SELECT SUM(hits) as tot_hits FROM t_statistik")->result(); //total hits
		$sql2		 	= $this->db->query("SELECT * FROM t_statistik WHERE tgl='$tgl' GROUP BY ip"); //pengunjung  hari ini
		$hits 			= $this->db->query("SELECT SUM(hits) as hitstoday FROM t_statistik WHERE tgl='$tgl' GROUP BY tgl")->result(); //hits hari ini
		$sql3			= $this->db->query("SELECT COUNT(hits) as tot_visit FROM t_statistik")->result(); // total pengunjung

		return array($sql1,$sql2->num_rows(),$hits,$sql3);
	}
	
	function index()
	{
		if(!IS_ENABLED)	echo '<script>window.location.href="'.base_url().'undermaintenance.html"</script>';

		$x = $this->__construct();
		$x['menu']			= 'home';
		$x['error']			= '';
		$sql2 				= $this->db->query("SELECT auto,foto FROM t_produk where is_promo = '1' order by RAND() limit 5");
		$x['panel_kiri'] 	= $this->load->view('panel_kiri',array('sql'=>$x['sql'],'getStatik'=>$x['getStatik']),true);
		$sql 				= $this->db->limit('9')->where('is_terlaris',1)->get('t_produk');
		$x['panel_tengah']	= $this->load->view('panel_tengah',array('sql'=>$sql,'sql2'=>$sql2),true);
		$x['panel_kanan'] 	= $this->load->view('panel_kanan',array('sqly'=>$x['sqly'],'chat'=>$x['chat']),true);
		$this->load->view('mainpage',$x);
	}

	function tentang()
	{		
		if(!IS_ENABLED)	echo '<script>window.location.href="'.base_url().'undermaintenance.html"</script>';
		$x = $this->__construct();
		$this->statistik();
		$x['menu']			= 'tentang';
		$x['error']			= '';
		$x['panel_kiri'] 	= $this->load->view('panel_kiri',array('sql'=>$x['sql'],'statistik'=>$x['statistik'],'getStatik'=>$x['getStatik']),true);
		$sql = $this->db->where('auto','1')->get('t_other')->result();
		$x['panel_tengah']	= $this->load->view('other',array('sql'=>$sql),true);
		$x['panel_kanan'] 	= '';
		$this->load->view('mainpage',$x);
	}

	function order()
	{		
		if(!IS_ENABLED)	echo '<script>window.location.href="'.base_url().'undermaintenance.html"</script>';
		$x = $this->__construct();
		$this->statistik();
		
		$x['menu']			= 'order';
		$x['error']			= '';
		$x['panel_kiri'] 	= $this->load->view('panel_kiri',array('sql'=>$x['sql'],'statistik'=>$x['statistik'],'getStatik'=>$x['getStatik']),true);
		$sql = $this->db->where('auto','3')->get('t_other')->result();
		$x['panel_tengah']	= $this->load->view('other',array('sql'=>$sql),true);
		$x['panel_kanan'] 	= '';
		$this->load->view('mainpage',$x);
	}


	function katalog()
	{
		if(!IS_ENABLED)	echo '<script>window.location.href="'.base_url().'undermaintenance.html"</script>';
		
		$x = $this->__construct();
		$this->statistik();
		$x['menu']			= 'katalog';
			
					$qry = $this->db->query('SELECT perpage_fo from t_setting')->result_array();
					$limit 					= $qry[0]['perpage_fo'];
					$config['base_url'] 	= base_url('home/katalog');
					$config['per_page'] 	= $limit;
					$this->pagination->initialize($config);
						
					if($this->uri->segment(3)){
						
						$config['total_rows'] 	= $this->db->get('t_produk')->num_rows();
						$offset 				= $this->uri->segment(3);
						$this->pagination->initialize($config);
					
						$sql 	 	 		= $this->db->DISTINCT()
									   		->select('a.*, a.auto as auto, b.nama_merk, c.kategori')
									   		->from('t_produk a')
									   		->join('t_merk b','a.id_merk=b.auto','left')
									   		->join('t_kategori c','b.id_cat=c.auto','left')
									   	//	->where('c.kategori',$this->uri->segment(3))
									   	//	->or_where('a.id_merk',$this->uri->segment(3))
									   		->limit($limit,$offset)
									   		->get();
					}else{
					
						$config['total_rows'] 	= $this->db->get('t_produk')->num_rows();
						$this->pagination->initialize($config);
						$sql 	= $this->db->limit($limit)->get('t_produk');
					}

					$x['panel_tengah']	= $this->load->view('katalog',array('sql'=>$sql),true);


		$x['error']			= '';
		$x['panel_kiri'] 	= '';
		$x['panel_kanan']	= '';
		$this->load->view('mainpage',$x);
	}

	
	function search(){
		if(!IS_ENABLED)	echo '<script>window.location.href="'.base_url().'undermaintenance.html"</script>';
		
		$x = $this->__construct();
		$this->statistik();
		$x['menu']			= 'katalog';
		
		//if($this->input->post('key')=='')
		//redirect('home/katalog');
			
		$qry = $this->db->query('SELECT perpage_fo from t_setting')->result_array();
		$limit 					= $qry[0]['perpage_fo'];
		$config['per_page'] 	= $limit;
		
		if($this->uri->segment(3)){
			$keyword 	 = $this->uri->segment(3);
			$offset	 	 = $this->uri->segment(4);
		}else{
			$keyword 	 = $this->input->post('key');
			$offset 	 = 0;
		}		
		
		$config['base_url'] 	= base_url('home/search/'.$keyword);
		$config['uri_segment']	= 4;
		
		$sql 	 = $this->db->DISTINCT()
					   		->select('a.*, a.auto as auto, b.nama_merk, c.kategori')
					   		->from('t_produk a')
					   		->join('t_merk b','a.id_merk=b.auto','left')
					   		->join('t_kategori c','b.id_cat=c.auto','left')
					   		->like('b.nama_merk',$keyword)
					   		->or_like('c.kategori',$keyword)
					   		->or_like('a.nama_produk',$keyword)
					   		->or_like('a.harga',$keyword)
							->get()
							->result();
							
		$config['total_rows'] 	= count($sql);
		$this->pagination->initialize($config);
		
		$x['panel_tengah']	= $this->load->view('katalog_search',array('sql'=>array_slice($sql,$offset,$limit),'key'=>$keyword),true);
		$x['error']			= '';
		$x['panel_kiri'] 	= '';
		$x['panel_kanan']	= '';
		$this->load->view('mainpage',$x);
	}
	function detail(){
		if(!IS_ENABLED)	echo '<script>window.location.href="'.base_url().'undermaintenance.html"</script>';
	
		$x = $this->__construct();
		$this->statistik();
		$x['menu']			= 'katalog';
		$x['error']			= '';
		$sql2				= $this->db->where('auto',$this->uri->segment(3))->get('t_produk');
		$sql3 				= $this->db->like('auto',substr($this->uri->segment(3),0,3))
									   ->limit('12')->order_by('RAND()')->get('t_produk');
		$x['panel_kiri'] 	= $this->load->view('panel_kiri',array('sql'=>$x['sql'],'sqly'=>$x['sqly'],'statistik'=>$x['statistik'],'getStatik'=>$x['getStatik']),true);
		$x['panel_tengah']	= $this->load->view('katalog_detail',array('sql2'=>$sql2,'sql3'=>$sql3),true);
		$x['panel_kanan']	= '';
		$this->load->view('mainpage',$x);
	}


	function kontak()
	{
		if(!IS_ENABLED)	echo '<script>window.location.href="'.base_url().'undermaintenance.html"</script>';
		
		$x = $this->__construct();
		$x['menu']			= 'kontak';
		$x['error']			= '';
		$x['panel_kiri'] 	= $this->load->view('panel_kiri',array('sql'=>$x['sql'],'statistik'=>$x['statistik'],'getStatik'=>$x['getStatik']),true);
		$sql = $this->db->where('auto','2')->get('t_other')->result();
		$x['panel_tengah']	= $this->load->view('other',array('sql'=>$sql),true);
		$x['panel_kanan'] 	= '';
		$this->load->view('mainpage',$x);
	}

	function testimoni()
	{
		if(!IS_ENABLED)	echo '<script>window.location.href="'.base_url().'undermaintenance.html"</script>';
		
		$x = $this->__construct();
		$this->statistik();
		$x['menu']			= 'testimoni';
		$x['error']			= '';
		$sql2 = $this->db->where('status',2)->limit('6')->get('t_testimoni');
		switch ($this->input->post('submit')) {
			case 'simpan':
				$a = $this->input->post('param1');
				$b = $this->input->post('param2');
				$c = $this->input->post('param3');
				if($a == ''){
					$error = 'Nama tidak boleh kosong';
					$x['panel_tengah']	= $this->load->view('testimoni',array('error'=>$error,'sql2'=>$sql2),true);
				}elseif($b == ''){
					$error = 'Alamat email tidak boleh kosong';
					$x['panel_tengah']	= $this->load->view('testimoni',array('error'=>$error,'sql2'=>$sql2),true);
				}else{
					$sql = $this->db->insert('t_testimoni',
											array('nama'=>$a, 'email'=>$b,'pesan'=>$c,'add_date'=>date('Y-m-d H:i:s'), 'status'=>1));
					$x['panel_tengah']	= $this->load->view('testimoni',array('error'=>'Pesan berhasil disampaikan, terima kasih','sql2'=>$sql2),true);
				}

				break;
			
			default:
					
				$x['panel_tengah']	= $this->load->view('testimoni',array('error'=>'','sql2'=>$sql2),true);
				break;
		}

		$x['panel_kiri'] 	= $this->load->view('panel_kiri',array('sql'=>$x['sql'],'statistik'=>$x['statistik'],'getStatik'=>$x['getStatik']),true);
		$x['panel_kanan'] 	= $this->load->view('panel_kanan',array('sqly'=>$x['sqly'],'chat'=>$x['chat']),true);
		$this->load->view('mainpage',$x);
	}

	

	
	function harga()
	{
		if(!IS_ENABLED)	echo '<script>window.location.href="'.base_url().'undermaintenance.html"</script>';
		
		$x = $this->__construct();
		$this->statistik();

		$x['menu']			= 'harga';
		$x['error']			= '';

		$qry = $this->db->query('SELECT perpage_fo from t_setting')->result_array();
		$limit 					= $qry[0]['perpage_fo'];
		$config['base_url'] 	= base_url('home/harga');
		$config['per_page'] 	= $limit;
		$this->pagination->initialize($config);
				
		$this->db->DISTINCT()
												->select('a.*, b.nama_merk, c.kategori')
												->from('t_produk a')
												->join('t_merk b','a.id_merk=b.auto','left')
												->join('t_kategori c','b.id_cat=c.auto','left');
												
		if($this->uri->segment(3)){
			$offset 				= $this->uri->segment(3);
			$sql 					= $this->db->limit($limit,$offset)->get();			
			$config['total_rows'] 	= $this->db->get('t_produk')->num_rows();
			$this->pagination->initialize($config);
						
		}else{
			$sql 					= $this->db->limit($limit)->get('t_produk');
			$config['total_rows'] 	= $this->db->get('t_produk')->num_rows();
			$this->pagination->initialize($config);
		}
		
		$x['panel_kiri'] 	= $this->load->view('panel_kiri',array('sql'=>$x['sql'],'statistik'=>$x['statistik'],'getStatik'=>$x['getStatik']),true);
		$x['panel_tengah']	= $this->load->view('daftar_harga',array('sql'=>$sql),true);
		$x['panel_kanan'] 	= $this->load->view('panel_kanan',array('sqly'=>$x['sqly'],'chat'=>$x['chat']),true);
		$this->load->view('mainpage',$x);
	}

	function cariharga()
	{
		if(!IS_ENABLED)	echo '<script>window.location.href="'.base_url().'undermaintenance.html"</script>';
		
		$x = $this->__construct();
		$this->statistik();

		$x['menu']			= 'harga';
		$x['error']			= '';

		$qry = $this->db->query('SELECT perpage_fo from t_setting')->result_array();
		$limit 					= $qry[0]['perpage_fo'];
		$config['base_url'] 	= base_url('home/cariharga');
		$config['per_page'] 	= $limit;
		$this->pagination->initialize($config);
				
		$this->db->DISTINCT()
												->select('a.*, b.nama_merk, c.kategori')
												->from('t_produk a')
												->join('t_merk b','a.id_merk=b.auto','left')
												->join('t_kategori c','b.id_cat=c.auto','left');
												
		if($this->uri->segment(3)){
			$offset 				= $this->uri->segment(3);
						
		}else{

			$offset 				= 0;
			($this->input->post('param1') !='') ? $this->db->where('c.kategori',$this->input->post('param1')) : '';
			($this->input->post('param2') !='') ? $this->db->where('b.nama_merk',$this->input->post('param2')) : '';
			($this->input->post('param3') !='') ? $this->db->where('a.nama_produk',$this->input->post('param3')) : '';
			($this->input->post('param4') !='') ? $this->db->where('a.harga',$this->input->post('param4')) : '';
		}
			$sql 					= $this->db->get()->result();
			$config['total_rows'] 	= count($sql);
			$this->pagination->initialize($config);
			
		$x['panel_kiri'] 	= $this->load->view('panel_kiri',array('sql'=>$x['sql'],'statistik'=>$x['statistik'],'getStatik'=>$x['getStatik']),true);
		$x['panel_tengah']	= $this->load->view('daftar_cari_harga',array('sql'=>array_slice($sql,$offset,$limit)),true);
		$x['panel_kanan'] 	= $this->load->view('panel_kanan',array('sqly'=>$x['sqly'],'chat'=>$x['chat']),true);
		$this->load->view('mainpage',$x);
	}	
	

	function com_order()
	{
		$this->load->library('email');
		
		if(!IS_ENABLED)	echo '<script>window.location.href="'.base_url().'undermaintenance.html"</script>';
		$x = $this->__construct();
		$this->statistik();
		$x['menu']			= 'com_order';
		$x['error']			= '';
		switch ($this->input->post('submit')) {
			case 'Simpan':				
				$a = $this->input->post('param1');
				$b = ($this->input->post('param2')) ? '/'.$this->input->post('param2'): '';
				$c = $this->input->post('param3');
				$d = $this->input->post('param4');
				$e = $this->input->post('param5');
				$f = $this->input->post('param6');
				$g = $this->input->post('param7');
				$h = $this->input->post('param8');
				$i = $this->input->post('param9');
				$j = $this->input->post('param10');
				$k = $this->input->post('param11');
				$tgl = $this->input->post('thn')."-".$this->input->post('bln')."-".$this->input->post('tgl');
				
				if($c == ''){
					$error = 'No Rekening tidak boleh kosong';
					$x['panel_tengah']	= $this->load->view('com_order',array('error'=>$error),true);
				}elseif($d == ''){
					$error = 'Atas Nama tidak boleh kosong';
					$x['panel_tengah']	= $this->load->view('com_order',array('error'=>$error),true);
				}elseif($g == ''){
					$error = 'Total bayar tidak boleh kosong';
					$x['panel_tengah']	= $this->load->view('com_order',array('error'=>$error),true);
				}elseif($j == ''){
					$error = 'Alamat tujuan tidak boleh kosong';
					$x['panel_tengah']	= $this->load->view('com_order',array('error'=>$error),true);
				}elseif($k == ''){
					$error = 'Atas nama penerima tidak boleh kosong';
					$x['panel_tengah']	= $this->load->view('com_order',array('error'=>$error),true);
				}else{
					
					$sql = $this->db->insert('t_com_payment',
											array('auto'			=>date('Ymd').rand(),
												  'pengirim'		=>$d,
												  'rekening'		=>$c,
												  'nama_bank'		=>$a.$b,
												  'email'			=>$e,
												  'notelp'			=>$i,
												  'tgl_transfer'	=>$tgl,
												  'amount'			=>$g,
												  'keterangan'		=>$h,
												  'alamat'			=>$j,
												  'atas_nama'		=>$k,
												  'add_by'			=>$d,
												  'add_date'		=>date('Y-m-d H:i:s')));
					if($sql){
							
							$subjek = 'Konfirmasi Pembayaran';
							$from 	= 'no-reply@nusaelektronik.com';
							$to 	= $x['alamat_email'];
							
							$content= 'Dear '.$x['alamat_email'].',
									   <p>Ada proses konfirmasi pembayaran yang perlu di verifikasi dengan Detail Data sbb :<br><br>
									   Nama Bank : '.$a.$b.'<br>
									   No Rekening 	: '.$c.'<br>
									   Atas Nama : '.$d.'<br>
									   Tanggal Transfer 	: '.$tgl.'<br>
									   Jumlah Transfer 	: '.$g.'<br>
									   Keterangan 	: '.$h.'<br>
									   Waktu 	: '.date('d-m-Y H:i:s').'<br></p>
									   Regards,<br>'.$x['homepage'];

							$headers = "From: " . strip_tags($from) . "\r\n";
							//$headers .= "Reply-To: ". strip_tags($from) . "\r\n";
							//$headers .= "CC: ". strip_tags($) . "\r\n";
							$headers .= "MIME-Version: 1.0\r\n";
							$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
							$message = '<html><body>';
							$message .= $content;
							$message .= "</body></html>";
							mail($to, $subjek, $message, $headers);
							
							$subjek2 = 'Konfirmasi Pembayaran';
							$from2 	= 'no-reply@nusaelektronik.com';
							$to2 	= $e;
							$content2= 'Dear '.$d.',
									   <p>Data konfirmasi pembayaran Anda sudah diterima melalui situs http://nusaelektronik.com dengan Detail Data sbb :<br><br>
									   Nama Bank : '.$a.$b.'<br>
									   No Rekening 	: '.$c.'<br>
									   Atas Nama : '.$d.'<br>
									   Tanggal Transfer 	: '.$tgl.'<br>
									   Jumlah Transfer 	: '.$g.'<br>
									   Keterangan 	: '.$h.'<br>
									   Waktu 	: '.date('d-m-Y H:i:s').'<br></p>
									   Selanjutnya Customer Service kami akan menghubungi Anda.<br>
									   Terima kasih atas kepercayaan Anda<p>
									   Regards,<br>'.$x['homepage'];

							$headers2 = "From: admin@nusaelektronik.com \r\n";
							//$headers .= "Reply-To: ". strip_tags($from) . "\r\n";
							//$headers2 .= "CC: cs1@nusaelektronik.com \r\n";
							$headers2 .= "MIME-Version: 1.0\r\n";
							$headers2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
							$message2 = '<html><body>';
							$message2 .= $content2;
							$message2 .= "</body></html>";
							mail($to2, $subjek2, $message2, $headers2);
					}
					$x['panel_tengah']	= $this->load->view('com_order_notif',array('error'=>'Pesan berhasil disampaikan, terima kasih'),true);
				}
				
				break;
			
			default:
					
				$x['panel_tengah']	= $this->load->view('com_order',array('error'=>'','sql2'=>null),true);
				break;
		}

		$x['panel_kiri'] 	= '';//$this->load->view('panel_kiri',array('sql'=>$x['sql'],'statistik'=>$x['statistik'],'getStatik'=>$x['getStatik']),true);
		$x['panel_kanan'] 	= '';//$this->load->view('panel_kanan',array('sqly'=>$x['sqly'],'chat'=>$x['chat']),true);
		$this->load->view('mainpage',$x);
	}
	
/*
	function live_chat(){
		switch ($this->input->post('submit')) {
			case 'register':
				$x['to'] 	= $this->input->post('to');
				$this->load->view('live_chat_register',$x);
				break;
			
			case 'start':
					$param1 = $this->input->post('param1');
					$param2 = $this->input->post('param2');
					$param3 = $this->input->post('param3');
					$param4 = $this->input->post('param4');


					$id 	= substr(md5($param1.date('Y-m-d H:i:s')), 0,10);

					$sql = $this->db->insert('t_chat',
											 array('auto'		=> $id,
											 	   'dari'		=> $param1,
											 	   'email'		=> $param2,
											 	   'kepada'		=> $param4,
											 	   'pertanyaan'	=> $param3,
											 	   'date_start'	=> date('Y-m-d H:i:s'),
											 	   'status'		=> 1));
					if($sql){
						// $jdl['topik'] 	= $param3;
						// $jdl['key']		= $id;
						// $jdl['sender']	= $param1;
						// $this->load->view('live_chatting',$jdl);
						redirect(base_url('home/chatting/'.$id));
					}

				break;

			default:
					$x['chat'] 	= $this->db->where('level',2)->get('t_user')->result_array();
					$this->load->view('live_chat',$x);
				break;
		}
			
	}

	function chatting(){

		if($this->uri->segment(3) && !$this->input->post('submit')){
			$key = $this->uri->segment(3);
			$sql = $this->db->where('auto',$key)->get('t_chat');
			foreach ($sql->result() as $v) {
				foreach ($v as $k => $val) {
					$x[$k] = $val;
				}
			}
			
			$this->load->view('live_chatting',$x);

		}elseif($this->input->post('submit') == 'sendmsg'){
					$key 	= $this->input->post('key');
					$msg 	= $this->input->post('msg');
					$sender	= ($this->session->userdata('is_login') == TRUE) ? $this->session->userdata('nama') : $this->input->post('sender');
					$sql 	= $this->db->insert('t_chatting',
														array('id_chat'		=> $key,
															  'message'		=> $msg,
															  'sender'		=> $sender,
															  'send_date'	=> date('Y-m-d H:i:s')));
					$sql2 	= $this->db->where('id_chat',$key)->order_by('send_date ASC')->get('t_chatting');
					foreach ($sql2->result() as $val) {
						$class = ($val->sender == $sender) ? 'pull-left' : 'pull-right';
						echo '<blockquote class="'.$class.'">
							  <p>'.$val->sender.'</p>
							  <small style="color:white;">'.$val->message.'<cite title="Source Title"> | Pada : '.$val->send_date.'</cite></small>
							  </blockquote>';	
					}
		}else{
				$key 	= $this->input->post('key');
				$sender	= $this->input->post('sender');
				$sql2 	= $this->db->where('id_chat',$key)->order_by('send_date ASC')->get('t_chatting');
					foreach ($sql2->result() as $val)
					{
						$class = 'pull-left'; //($val->sender == $sender) ? 'pull-left' : 'pull-right';
						echo '<blockquote class="'.$class.'">
							  <p>'.$val->sender.'</p>
							  <small style="color:white;">'.$val->message.'<cite title="Source Title"> | Pada : '.$val->send_date.'</cite></small>
							  </blockquote>';	
					}
		}


	}

	*/
	
	


}

/* End of file home.php */
/* Location: ./application/controllers/home.php */