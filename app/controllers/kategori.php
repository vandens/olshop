<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori extends CI_Controller {
	/*
	Created By 		: Vandens Mc Maddens
	Created Date 	: March 20, 2014
	Creator Sites 	: www.cld.biz 
	*/
	public function index()
	{
		if($this->session->userdata('is_login') == true){

		 	switch ($this->input->post('submit')) {
		 	/*	case 'tambah':
		 			
		 			$this->load->view('backend/kategori_add');
		 			break;
			*/
				
		 		case 'edit':
		 			$data = $this->db->where('auto',$this->input->post('key'))->get('t_kategori');
		 			foreach ($data->result() as $key) {
		 				foreach ($key as $k => $val) {
		 					$x[$k] = $val;
		 				}
		 			}
		 			$this->load->view('backend/kategori_edit',$x);
		 			break;


		 		case 'update':				
		 			$key 		= $this->input->post('param1');
		 			$param2		= $this->input->post('param2');
					if($param2 == '')
						$error = 'Nama Kategori tidak boleh kosong';
					else{

						if($_FILES['param3']['name'] !=''){
						$filename =$_FILES["param3"]["name"];
						$extension=explode(".", $filename);
						$newfilename = "kategori_".$extension[0].".".end($extension);
						move_uploaded_file($_FILES["param3"]["tmp_name"],"media/images/".$newfilename);
						unlink('media/images/'.$this->input->post('foto_b4'));
						}else{ $newfilename = $this->input->post('foto_b4');}
					
						$sql 		= $this->db->where('auto',$key)
											   ->update('t_kategori',
														array('kategori'	=>$param2,
															  'foto'		=>$newfilename,
															  'update_by'	=>$this->session->userdata('username'),
															  'update_date'	=>date('Y-m-d H:i:s')));
						if($sql){
								$error = 'Data berhasil diupdate';
						}else{ $error = 'Data gagal diupdate'; }
						
						$y['panel_tengah']	= $this->load->view('backend/kategori_add',array('error'=>$error),true);
						$y['panel_atas'] 	= $this->load->view('backend/panel_atas');			
						$y['panel_kiri']	= $this->load->view('backend/panel_kiri',array('menu'=>'kategori'),true);
						$this->load->view('backend/home',$y);
					}
		 			break;


		 		case 'simpan':
					
		 			$param1 	= strtoupper($this->input->post('param1'));
		 			$param2		= $this->input->post('param2');						
					$extension		= explode(".", $_FILES['param3']['name']);
					$ext 			= end($extension);
					$newfilename 	= "kategori_".$extension[0].".".$ext;
				
					$chek 		= $this->db->get_where('t_kategori',array('auto'=>$param1))->num_rows();
					if($param1 == '')
						$error = 'Kode Kategori tidak boleh kosong';
					elseif(strlen($param1) != 3)
						$error = 'Kode Kategori harus terdiri dari 3 karakter Alfabet';
					elseif($param2 == '')
						$error = 'Nama Kategori tidak boleh kosong';
					elseif($chek > 0)
						$error = 'Kode Kategori sudah ada';
					else{
					
						if($_FILES['param3']['name'] !=''){
							move_uploaded_file($_FILES["param3"]["tmp_name"],"media/images/".$newfilename);
						}else{ $newfilename = '';}
				
						$sql 		= $this->db->insert('t_kategori',
														array('auto'		=>$param1,
															  'kategori'	=>$param2,
															  'foto'		=>$newfilename,
															  'add_by'		=>$this->session->userdata('username'),
															  'add_date'	=>date('Y-m-d H:i:s')));
						if($sql){
								$error = 'Data berhasil disimpan';
						}else{ $error = 'Data gagal disimpan'; }
					}
					
						$y['panel_tengah']	= $this->load->view('backend/kategori_add',array('error'=>$error),true);
						$y['panel_atas'] 	= $this->load->view('backend/panel_atas');			
						$y['panel_kiri']	= $this->load->view('backend/panel_kiri',array('menu'=>'kategori'),true);
						$this->load->view('backend/home',$y);
		 			break;


		 		default:
				
						$qry = $this->db->query('SELECT perpage_bo from t_setting')->result_array();
						$limit 				= $qry[0]['perpage_bo'];
						$kategori 	 		= $this->db->select('a.*, count(b.auto) as jml')
														->from('t_kategori a')
														->join('t_merk b','a.auto = b.id_cat','left')
														->group_by('a.auto')
														->order_by('kategori ASC')
														->limit($limit)
														->get();
						$config['base_url'] 	= base_url('kategori/page');
						$config['total_rows'] 	= $this->db->get('t_kategori')->num_rows();
						$config['per_page'] 	= 10;
						$this->pagination->initialize($config);

						$y['panel_kiri']	= $this->load->view('backend/panel_kiri',array('menu'=>'kategori'),true);
						$y['panel_tengah']	= $this->load->view('backend/kategori_index',array('sql'=>$kategori),true);
		 				$y['panel_atas'] 	= $this->load->view('backend/panel_atas');			
						$this->load->view('backend/home',$y);
		 			break;
		 	}

		}else{ redirect('login'); }
	}

	function page(){
						$qry = $this->db->query('SELECT perpage_bo from t_setting')->result_array();
						$limit 				= $qry[0]['perpage_bo'];
						$offset 			= $this->uri->segment(3);
						$kategori 	 		= $this->db->select('a.*, count(b.auto) as jml')
														->from('t_kategori a')
														->join('t_merk b','a.auto = b.id_cat','left')
														->group_by('a.auto')
														->order_by('kategori ASC')
														->limit($limit,$offset)
														->get();
						$config['base_url'] 	= base_url('kategori/page');
						$config['total_rows'] 	= $this->db->get('t_kategori')->num_rows();
						$config['per_page'] 	= $limit;
						$this->pagination->initialize($config);
						$y['panel_tengah']	= $this->load->view('backend/kategori_index',array('sql'=>$kategori),true);
		 				$y['panel_atas'] 	= $this->load->view('backend/panel_atas');			
						$y['panel_kiri']	= $this->load->view('backend/panel_kiri',array('menu'=>'kategori'),true);
						$this->load->view('backend/home',$y);
	}
	
	function add(){
		$y['panel_tengah']	= $this->load->view('backend/kategori_add',array('error'=>''),true);
		$y['panel_atas'] 	= $this->load->view('backend/panel_atas');			
		$y['panel_kiri']	= $this->load->view('backend/panel_kiri',array('menu'=>'kategori'),true);
		$this->load->view('backend/home',$y);
	
	}
	
	function edit(){
		$data = $this->db->where('auto',$this->uri->segment(3))->get('t_kategori');
		 			foreach ($data->result() as $key) {
		 				foreach ($key as $k => $val) {
		 					$x[$k] = $val;
		 				}
		 			}
		$x['error'] 		= '';
		$y['panel_tengah']	= $this->load->view('backend/kategori_edit',$x);
		$y['panel_atas'] 	= $this->load->view('backend/panel_atas');			
		$y['panel_kiri']	= $this->load->view('backend/panel_kiri',array('menu'=>'kategori'),true);
		$this->load->view('backend/home',$y);
	}
	
	function hapus(){

		if($this->session->userdata('is_login') == true){

			$key = $this->uri->segment(3);
			$sql = $this->db->where('auto',$key)->get('t_kategori')->result();
			foreach ($sql as $val) {
				if(isset($val->foto)){
					unlink('media/images/'.$val->foto);
				}

				$this->db->insert('t_activity',array('modul'		=> 'Kategori',
													 'content'		=> $val->auto.';'.$val->kategori.';'.$val->foto.';'.$val->add_by.';'.$val->add_date.';'.$val->update_by.';'.$val->update_date,
													 'action'		=> 'Delete',
													 'action_date'	=> date('Y-m-d H:i:s'),
													 'action_by'	=> $this->session->userdata('nama')));
				}
				
			$this->db->where('auto',$key)->delete('t_kategori');

			$this->index();
			
		}else{ redirect('login'); }
	}

}

/* End of file kategori.php */
/* Location: ./application/controllers/kategori.php */