<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Merk extends CI_Controller {
	/*
	Created By 		: Vandens Mc Maddens
	Created Date 	: March 20, 2014
	Creator Sites 	: www.cld.biz 
	*/
	public function index()
	{
		if($this->session->userdata('is_login') == true){

		 	$kategori 	 		= $this->db->get('t_kategori');
		 	switch ($this->input->post('submit')) {
		 		case 'tambah':
		 			
		 			$this->load->view('backend/kategori_add');
		 			break;

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
		 			$key 		= $this->input->post('key');
		 			$param2		= $this->input->post('param2');
		 			$sql 		= $this->db->where('auto',$key)
		 								   ->update('t_kategori',
		 											array('kategori'	=>$param2,
		 												  'update_by'	=>$this->session->userdata('username'),
		 												  'update_date'	=>date('Y-m-d H:i:s')));
		 			if($sql){
		 					echo json_encode(array('error'=>0,'msg'=>'Data berhasil diupdate'));
		 			}else{ echo json_encode(array('error'=>1,'msg'=>'Data gagal diupdate')); }
		 			break;


		 		case 'simpan':
		 			$param1 	= $this->input->post('param1');
		 			$param2		= $this->input->post('param2');
		 			$sql 		= $this->db->insert('t_kategori',
		 											array('kategori'	=>$param2,
		 												  'add_by'		=>$this->session->userdata('username'),
		 												  'add_date'	=>date('Y-m-d H:i:s')));
		 			if($sql){
		 					echo json_encode(array('error'=>0,'msg'=>'Data berhasil disimpan'));
		 			}else{ echo json_encode(array('error'=>1,'msg'=>'Data gagal disimpan')); }
		 			break;


		 		default:
						$y['panel_tengah']	= $this->load->view('backend/kategori_index',array('sql'=>$kategori),true);
		 				$y['panel_atas'] 	= $this->load->view('backend/panel_atas');			
						$y['panel_kiri']	= $this->load->view('backend/panel_kiri',array('menu'=>'kategori'),true);
						$this->load->view('backend/home',$y);
		 			break;
		 	}

		}else{ redirect('login'); }
	}



}

/* End of file merk.php */
/* Location: ./application/controllers/merk.php */