<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Running_Text extends CI_Controller {
	/*
	Created By 		: Vandens Mc Maddens
	Created Date 	: March 20, 2014
	Creator Sites 	: www.cld.biz 
	*/
	public function index()
	{
		if($this->session->userdata('is_login') == true){

		 	$running_text 	 		= $this->db->get('t_runtext');
		 	switch ($this->input->post('submit')) {
		 		case 'tambah':
		 			
		 			$this->load->view('backend/runteks_add');
		 			break;

		 		case 'edit':
		 			$data = $this->db->where('auto',$this->input->post('key'))->get('t_runtext');
		 			foreach ($data->result() as $key) {
		 				foreach ($key as $k => $val) {
		 					$x[$k] = $val;
		 				}
		 			}
		 			$this->load->view('backend/runteks_edit',$x);
		 			break;


		 		case 'update':
		 			$key 		= $this->input->post('key');
		 			$param1		= $this->input->post('param1');
		 			$param2		= $this->input->post('param2');
		 			$sql 		= $this->db->where('auto',$key)
		 								   ->update('t_runtext',
		 											array('deskripsi'	=>$param1,
		 												  'status'		=>$param2,
		 												  'update_by'	=>$this->session->userdata('username'),
		 												  'update_date'	=>date('Y-m-d H:i:s')));
		 			if($sql){
		 					echo json_encode(array('error'=>0,'msg'=>'Data berhasil diupdate'));
		 			}else{ echo json_encode(array('error'=>1,'msg'=>'Data gagal diupdate')); }
		 			break;


		 		case 'simpan':
		 			$param1 	= $this->input->post('param1');
		 			$param2		= $this->input->post('param2');
					
					if(empty($param1))
						echo json_encode(array('error'=>1,'msg'=>'Informasi tidak boleh kosong!'));
					else{
						$sql 		= $this->db->insert('t_runtext',
														array('deskripsi'	=>$param1,
															  'status'		=>$param2,
															  'add_by'		=>$this->session->userdata('username'),
															  'add_date'	=>date('Y-m-d H:i:s')));
						if($sql){
								echo json_encode(array('error'=>0,'msg'=>'Data berhasil disimpan'));
						}else{ echo json_encode(array('error'=>1,'msg'=>'Data gagal disimpan')); }
					}
		 			break;


		 		default:
						$y['panel_tengah']	= $this->load->view('backend/runteks_index',array('sql'=>$running_text),true);
		 				$y['panel_atas'] 	= $this->load->view('backend/panel_atas');			
						$y['panel_kiri']	= $this->load->view('backend/panel_kiri',array('menu'=>'running_text'),true);
						$this->load->view('backend/home',$y);
		 			break;
		 	}

		}else{ redirect('login'); }
	}

	function hapus(){

		if($this->session->userdata('is_login') == true){

			$key = $this->uri->segment(3);
			$this->db->where('auto',$key)->delete('t_runtext');

			$this->index();
			
		}else{ redirect('login'); }
	}

}

/* End of file running_text.php */
/* Location: ./application/controllers/running_text.php */