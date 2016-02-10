<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Katalog extends CI_Controller {
	/*
	Created By 		: Vandens Mc Maddens
	Created Date 	: March 20, 2014
	Creator Sites 	: www.cld.biz 
	*/
	public function index()
	{
		if($this->session->userdata('is_login') == true){
		 	switch ($this->input->post('submit')) {
		 		case 'tambah':
						redirect('katalog/tambah');		 			
		 			break;

		 		case 'update_harga':
		 			$cat 				= $this->db->get('t_kategori');
		 			$this->load->view('backend/katalog_harga',array('cat'=>$cat));

		 			break;

		 		case 'take_harga':
		 			$key 				= $this->input->post('key');
		 			$sql 				= $this->db->where('id_merk',$key)->get('t_produk');

					if($sql->num_rows() > 0){
						$no = 1;
						$jml = $sql->num_rows();
						foreach ($sql->result() as $key){
								echo "<tr><td>".$no."</td>
								<input type='hidden' name='key".$no."' value=".$key->auto.">
								<td>".$key->nama_produk."</td>
								<td>
								<select name='promo".$no."' class='form-control'>";
								for ($i=0; $i <= 1; $i++) { 
									$s = ($key->is_promo == $i) ? "selected='selected'" : '';
									$p = ($i == 0) ? 'No' : 'Yes';
									echo "<option value='".$i."' ".$s.">".$p."</option>";
								}
								echo "</select>
								</td>								
								<td>
								<select name='terlaris".$no."' class='form-control'>";
								for ($j=0; $j <= 1; $j++) { 
									$rs = ($key->is_terlaris == $j) ? "selected='selected'" : '';
									$ps = ($j == 0) ? 'No' : 'Yes';
									echo "<option value='".$j."' ".$rs.">".$ps."</option>";
								}
								echo "</select>
								</td>
								<td><input type='text' name='harga".$no."' value='".$key->harga."' class='form-control'></td></tr>";
							$no++;
							}
						}else{
								echo "<tr align='center'><td colspan='5'>.: Tidak ada barang :.</td></tr>";
						}
						echo "<input type='hidden' name='submit' value='proses_update_harga'>";
						echo "<input type='hidden' name='jml' value='".$jml."'>";

		 			break;

		 		case 'proses_update_harga':
		 			$jml  = $this->input->post('jml');
		 			for ($i=1; $i <= $jml ; $i++) { 
		 				$this->db->where('auto',$_POST['key'.$i])->update('t_produk',array('harga'=>$_POST['harga'.$i],'is_promo'=>$_POST['promo'.$i],'is_terlaris'=>$_POST['terlaris'.$i]));
		 			}
		 			echo json_encode(array('error'=>0,'msg'=>'Harga berhasil diupdate'));

		 		break;

		 		case 'cari':
		 				$this->db->DISTINCT()
								   ->select('a.*, b.nama_merk, c.kategori')
								   ->from('t_produk a')
								   ->join('t_merk b','a.id_merk=b.auto','left')
								   ->join('t_kategori c','b.id_cat=c.auto','left')
								   ->like('a.auto',$this->input->post('item'))
								   ->or_like('b.nama_merk',$this->input->post('item'))
								   ->or_like('a.nama_produk',$this->input->post('item'))
								   ->or_like('c.kategori',$this->input->post('item'))
								   ->order_by('add_date ASC')
								   ->limit('100');

						$katalog 			= $this->db->get();
						$y['panel_tengah']	= $this->load->view('backend/katalog_index',array('sql'=>$katalog),true);
			
		 				$y['panel_atas'] 	= $this->load->view('backend/panel_atas');			
						$y['panel_kiri']	= $this->load->view('backend/panel_kiri',array('menu'=>'katalog'),true);
						$this->load->view('backend/home',$y);

		 			break;

		 		default:
						$qry = $this->db->query('SELECT perpage_bo from t_setting')->result_array();
						$limit 					= $qry[0]['perpage_bo'];
						$config['base_url'] 	= base_url('katalog/page');
						$config['total_rows'] 	= $this->db->get('t_produk')->num_rows();
						$config['per_page'] 	= $limit;
						$this->pagination->initialize($config);
						
						
		 				$this->db->DISTINCT()
								   ->select('a.*, b.nama_merk, c.kategori')
								   ->from('t_produk a')
								   ->join('t_merk b','a.id_merk=b.auto','left')
								   ->join('t_kategori c','b.id_cat=c.auto','left')
								   ->order_by('add_date DESC')
								   ->limit($limit);
						
						$katalog 			= $this->db->get();
						$y['panel_tengah']	= $this->load->view('backend/katalog_index',array('sql'=>$katalog),true);
			
		 				$y['panel_atas'] 	= $this->load->view('backend/panel_atas');			
						$y['panel_kiri']	= $this->load->view('backend/panel_kiri',array('menu'=>'katalog'),true);
						$this->load->view('backend/home',$y);
		 			break;
		 	}


		}else{ redirect('login'); }
	}

	
	function page(){
						$qry = $this->db->query('SELECT perpage_bo from t_setting')->result_array();
						$limit 				= $qry[0]['perpage_bo'];						
						$offset 			= $this->uri->segment(3);
						$config['base_url'] 	= base_url('katalog/page');
						$config['total_rows'] 	= $this->db->get('t_produk')->num_rows();
						$config['per_page'] 	= $limit;
						$this->pagination->initialize($config);
						
						
		 				$this->db->DISTINCT()
								   ->select('a.*, b.nama_merk, c.kategori')
								   ->from('t_produk a')
								   ->join('t_merk b','a.id_merk=b.auto','left')
								   ->join('t_kategori c','b.id_cat=c.auto','left')
								   ->order_by('add_date DESC')
								   ->limit($limit,$offset);
						
						$katalog 			= $this->db->get();
						$y['panel_tengah']	= $this->load->view('backend/katalog_index',array('sql'=>$katalog),true);
			
		 				$y['panel_atas'] 	= $this->load->view('backend/panel_atas');			
						$y['panel_kiri']	= $this->load->view('backend/panel_kiri',array('menu'=>'katalog'),true);
						$this->load->view('backend/home',$y);
	}

	function tambah(){
			$cat 				= $this->db->get('t_kategori');
		 	$y['panel_tengah']	= $this->load->view('backend/katalog_add',array('cat'=>$cat),true);
			$y['panel_atas'] 	= $this->load->view('backend/panel_atas');			
			$y['panel_kiri']	= $this->load->view('backend/panel_kiri',array('menu'=>'katalog'),true);
			$this->load->view('backend/home',$y);
	}
	function simpan(){
		if($this->session->userdata('is_login') == true){

				//$filename 		= isset($_FILES["file"]["name"]);
				$extension		= explode(".", $_FILES['file']['name']);
				$ext 			= end($extension);
				$newfilename 	= date('Y-m-d H_i_s')."_".$extension[0].".".$ext;
				$allowed 		= array('jpg','jpeg','png','gif','bmp');
				$base 			= base_url('katalog/tambah.html');
				
				$qry = $this->db->query('SELECT auto from t_produk order by add_date DESC limit 1')->result_array();
				$newid	= substr($qry[0]['auto'],3)+1;
				if($this->input->post('param2') == '')
		    	echo '<script>alert("MERK GA BOLEH KOSONG BOOSS!!"); window.location.href = "'.$base.'";</script>'; 
		    	elseif($this->input->post('param3') == '')
				echo '<script>alert("NAMA PRODUK GA BOLEH KOSONG BOOSS!!"); window.location.href = "'.$base.'"; </script>';
		    	elseif(!in_array(strtolower($ext),$allowed) AND $_FILES['file']['name'] != '')
				echo '<script>alert("Format file gambar tidak diijinkan"); window.location.href = "'.$base.'"; </script>';
		    	elseif($this->db->where('auto',$this->input->post('param1').$newid)->get('t_produk')->num_rows() > 0)
				echo '<script>alert("Kode Produk sudah ada"); window.location.href = "'.$base.'"; </script>';
		    	else{

		    	if($_FILES['file']['name'] !=''){
  			        move_uploaded_file($_FILES["file"]["tmp_name"],"media/images/".$newfilename);
		    	}else{ $newfilename = '';}
		    		$sql = $this->db->insert('t_produk',
								array('auto'			=> $this->input->post('param1').$newid,
									  'id_merk'			=> $this->input->post('param2'),
									  'nama_produk'		=> $this->input->post('param3'),
									  'harga'			=> $this->input->post('param4'),
									  'foto'			=> $newfilename,
									  'deskripsi'		=> $this->input->post('param6'),
									  'add_by'			=> $this->session->userdata('nama'),
									  'add_date'		=> date('Y-m-d H:i:s')));
		    		if($sql){
							$subjek = 'Nuskom Activity Add Product';
							$from 	= 'admin@nusaelektronik.com';
							$to 	= 'topan.pandenis@gmail.com';
							$content= 'Dear Vandens mc Maddens,
									   <p>Terdapat aktifitas Penyimpanan Data Produk dengan detail sbb :<br>
									   User 	: '.$this->session->userdata('username').'<br>
									   IP Address : '.$_SERVER['REMOTE_ADDR'].'<br>
									   Waktu 	: '.date('Y-m-d H:i:s').'<br></p>
									   <p>
									   Nama Produk : '.$this->input->post('param3').'<br>
									   Id Merk 	   : '.$this->input->post('param2').'<br>
									   Harga 	   : '.$this->input->post('param4').'<br>
									   Image 	   : '.$newfilename.'<br>
									   Deskripsi   : '.$this->input->post('param6').'<br>
									   </p>
									   Regards,<br>
									   Administrator';

				            $headers = "From: " . strip_tags($from) . "\r\n";
				            $headers .= "MIME-Version: 1.0\r\n";
				            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				            $message = '<html><body>';
				            $message .= $content;
				            $message .= "</body></html>";
							mail($to, $subjek, $message, $headers);
							echo '<script>alert("BERHASIL DISIMPEN BOOSS!!"); window.location.href = "'.$base.'"; </script>';
		    		}
		    	}


				$cat 				= $this->db->get('t_kategori');
		 		$y['panel_tengah']	= $this->load->view('backend/katalog_add',array('cat'=>$cat),true);	
		      	$y['panel_atas'] 	= $this->load->view('backend/panel_atas');			
				$y['panel_kiri']	= $this->load->view('backend/panel_kiri',array('menu'=>'katalog'),true);
				$this->load->view('backend/home',$y);
		    

		}else{ redirect('login'); }

	}

	function update(){
		if($this->session->userdata('is_login') == true){

		    	if($this->input->post('param2') == ''){
		    	?><script>alert('MERK GA BOLEH KOSONG BOOSS!!'); window.location.href = "http://www.nusaelektronik.com/katalog";</script><?
		    	}elseif($this->input->post('param3') == ''){
				?><script>alert('NAMA PRODUK GA BOLEH KOSONG BOOSS!!'); window.location.href = "http://www.nusaelektronik.com/katalog";</script><?
		    	}else{

		    	if($_FILES['file']['name'] !=''){
				    $filename =$_FILES["file"]["name"];
					$extension=explode(".", $filename);
					$newfilename = date('Ymd')."_".$extension[0].".".end($extension);
  			        move_uploaded_file($_FILES["file"]["tmp_name"],"media/images/".$newfilename);
  			        unlink('media/images/'.$this->input->post('foto_b4'));
		    	}else{ $newfilename = $this->input->post('foto_b4');}
				
		      		$sql = $this->db->where('auto',$this->input->post('key'))
		      						->update('t_produk',
											array('id_merk'			=> $this->input->post('param2'),
									  			  'nama_produk'		=> $this->input->post('param3'),
									  			  'harga'			=> $this->input->post('param4'),
									  			  'foto'			=> $newfilename,
									  			  'deskripsi'		=> $this->input->post('param6'),
									  			  'update_by'		=> $this->session->userdata('nama'),
									  			  'update_date'		=> date('Y-m-d H:i:s'))
												  );
		      		if($sql){

						$subjek = 'Nuskom Activity Update Product';
						$from 	= 'admin@nusaelektronik.com';
						$to 	= 'topan.pandenis@gmail.com';
						$content= 'Dear Vandens mc Maddens,
								   <p>Terdapat aktifitas Update Data Produk dengan detail sbb :<br>
								   User 	: '.$this->session->userdata('username').'<br>
								   IP Address : '.$_SERVER['REMOTE_ADDR'].'<br>
								   Waktu 	: '.date('Y-m-d H:i:s').'<br></p>
								   <p>
								   ID Produk   : '.$this->input->post('key').'<br>
								   Nama Produk : '.$this->input->post('param3').'<br>
								   Id Merk 	   : '.$this->input->post('param2').'<br>
								   Harga 	   : '.$this->input->post('param4').'<br>
								   Image 	   : '.$newfilename.'<br>
								   Deskripsi   : '.$this->input->post('param6').'<br>
								   </p>
								   Regards,<br>
								   Administrator';

			            $headers = "From: " . strip_tags($from) . "\r\n";
			            $headers .= "MIME-Version: 1.0\r\n";
			            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			            $message = '<html><body>';
			            $message .= $content;
			            $message .= "</body></html>";
						mail($to, $subjek, $message, $headers);
					}
			}

				redirect('katalog');

		}else{ redirect('login'); }
	}

	function edit(){

		if($this->session->userdata('is_login') == true){

			$key = $this->uri->segment(3);
			$sql 	 		= $this->db->DISTINCT()
										   ->select('a.*, b.nama_merk,c.auto as id_cat, c.kategori')
										   ->from('t_produk a')
										   ->join('t_merk b','a.id_merk=b.auto','left')
										   ->join('t_kategori c','b.id_cat=c.auto','left')
										   ->where('a.auto',$key)
										   ->get();
			
			$cat  				= $this->db->get('t_kategori');
		 	$y['panel_tengah']	= $this->load->view('backend/katalog_edit',array('cat'=>$cat,'sql'=>$sql),true);	
		    $y['panel_atas'] 	= $this->load->view('backend/panel_atas');			
			$y['panel_kiri']	= $this->load->view('backend/panel_kiri',array('menu'=>'katalog'),true);
			$this->load->view('backend/home',$y);

		}else{ redirect('login'); }
	}


	function hapus(){

		if($this->session->userdata('is_login') == true){

			$key = $this->uri->segment(3);
			$sql = $this->db->where('auto',$key)->get('t_produk')->result();
			foreach ($sql as $val) {
				if(isset($val->foto)){
					unlink('media/images/'.$val->foto);
				}

				$this->db->insert('t_activity',array('modul'		=> 'Katalog',
													 'content'		=> $val->auto.';'.$val->id_merk.';'.$val->nama_produk.';'.$val->harga.';'.$val->deskripsi,
													 'action'		=> 'Delete',
													 'action_date'	=> date('Y-m-d H:i:s'),
													 'action_by'	=> $this->session->userdata('nama')));
				}

				$sql = $this->db->where('auto',$key)->delete('t_produk');
				if($sql){
					$subjek = 'Nuskom Activity Delete Product';
					$from 	= 'admin@nusaelektronik.com';
					$to 	= 'topan.pandenis@gmail.com';
					$content= 'Dear Vandens mc Maddens,
							   <p>Terdapat aktifitas Delete Data Produk dengan detail sbb :<br>
							   User 	: '.$this->session->userdata('username').'<br>
							   IP Address : '.$_SERVER['REMOTE_ADDR'].'<br>
							   Waktu 	: '.date('Y-m-d H:i:s').'<br></p>
							   <p>
							   ID Produk   : '.$key.'<br>
							   Nama Produk : '.$val->nama_produk.'<br>
							   Id Merk 	   : '.$val->id_merk.'<br>
							   Harga 	   : '.$val->harga.'<br>
							   Image 	   : '.$val->foto.'<br>
							   Deskripsi   : '.$val->deskripsi.'<br>
							   </p>
							   Regards,<br>
							   Administrator';

		            $headers = "From: " . strip_tags($from) . "\r\n";
		            $headers .= "MIME-Version: 1.0\r\n";
		            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		            $message = '<html><body>';
		            $message .= $content;
		            $message .= "</body></html>";
					mail($to, $subjek, $message, $headers);
				}


			redirect('katalog');
			
		}else{ redirect('login'); }
	}


	function cat_to_merk(){
		if($this->session->userdata('is_login') == true){

		$sql = $this->db->get_where('t_merk',array('id_cat'=>$this->input->post('key')));
		if($sql->num_rows() > 0){
			echo "<option value='0'>Pilih salah satu</option>";
			foreach ($sql->result() as $key) {
				echo "<option value='".$key->auto."'>".$key->nama_merk."</option>";
			}
		}else{
			echo "<option value='0'>N/A</option>";
		}

		}else{ redirect('login'); }
	}


	function add(){
		if($this->session->userdata('is_login') == true){

		$x['cat']				= $this->db->get('t_kategori');
		$this->load->view($this->input->post('view'),$x);

		}else{ redirect('login'); }
	}

	function takelist($key=''){
		if($this->session->userdata('is_login') == true){

		if($key == '')
			$k = $this->input->post('key');
		else
			$k = $key;

		$sql = $this->db->where('id_cat',$k)->get('t_merk');
        $i = 1;
            foreach ($sql->result() as $key) {
            	echo '<tr><td>'.$i.'</td><td>'.$key->nama_merk.'</td><td>
    			<button type="button" class="btn btn-default btn-xs btn-danger" onclick=\'Simpan("hapusMerk","key='.$key->auto.'&key2='.$key->id_cat.'")\'><span class="glyphicon glyphicon-remove"></span> Hapus</button>
            	</td></tr>';
            	$i++;
            }

		}else{ redirect('login'); }
	}

	function simpanMerk(){
		if($this->session->userdata('is_login') == true){

		$sql = $this->db->insert('t_merk',array('id_cat'=>$this->input->post('param1'),
												'nama_merk' => $this->input->post('param2')));
		$this->takelist($this->input->post('param1'));

		}else{ redirect('login'); }
	}

	function hapusMerk(){
		if($this->session->userdata('is_login') == true){

		$sql = $this->db->where('id_merk',$this->input->post('key'))->get('t_produk');
		if($sql->num_rows() < 1){
			$this->db->delete('t_merk',array('auto'=>$this->input->post('key')));
			$this->takelist($this->input->post('key2'));
		}else{
			echo "Data sedang digunakan";
		}	

		}else{ redirect('login'); }
	}

}

/* End of file katalog.php */
/* Location: ./application/controllers/katalog.php */