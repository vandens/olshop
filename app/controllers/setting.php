<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller {
	/*
	Created By 		: Vandens Mc Maddens
	Created Date 	: May 17, 2014
	Creator Sites 	: www.cld.biz 
	*/
	public function index()
	{
		if($this->session->userdata('is_login') == true){

		 	$sql 	 		= $this->db->get('t_setting');
		 	switch ($this->input->post('submit')) {
		 		case 'simpan':
					if($this->input->post('param1')=='')
						echo json_encode(array('error'=>1,'msg'=>'Nama Aplikasi tidak boleh kosong!'));
					elseif($this->input->post('param2')=='')
						echo json_encode(array('error'=>1,'msg'=>'Nama Toko tidak boleh kosong!'));
					elseif($this->input->post('param3')=='')
						echo json_encode(array('error'=>1,'msg'=>'Nama Pemilik tidak boleh kosong!'));
					elseif($this->input->post('param5')=='')
						echo json_encode(array('error'=>1,'msg'=>'No Telepon tidak boleh kosong!'));
					elseif($this->input->post('param6')=='')
						echo json_encode(array('error'=>1,'msg'=>'Alamat Email tidak boleh kosong!'));
					elseif($this->input->post('param8')=='')
						echo json_encode(array('error'=>1,'msg'=>'Tampil Data perPage BO tidak boleh kosong!'));
					elseif($this->input->post('param9')=='')
						echo json_encode(array('error'=>1,'msg'=>'Tampil Data perPage FO tidak boleh kosong!'));
					else{
						$sql  = $this->db->where('auto',1)
										 ->update('t_setting',
															array(  'nama_aplikasi'=>$this->input->post('param1'),
																	'nama_toko'		=> $this->input->post('param2'),
																	'pemilik_toko'	=> $this->input->post('param3'),
																	'alamat_toko'	=> $this->input->post('param4'),
																	'no_telepon'	=> $this->input->post('param5'),
																	'alamat_email'	=> $this->input->post('param6'),
																	'homepage'		=> $this->input->post('param7'),
																	'perpage_bo'	=> $this->input->post('param8'),
																	'perpage_fo'	=> $this->input->post('param9')
																	));
						if($sql){
							echo json_encode(array('error'=>0,'msg'=>'Data berhasil diupdate'));
						}else{ 
							echo json_encode(array('error'=>1,'msg'=>'Data gagal diupdate')); }
					}
		 			break;


		 		default:
						$y['panel_tengah']	= $this->load->view('backend/setting_index',array('sql'=>$sql),true);
		 				$y['panel_atas'] 	= $this->load->view('backend/panel_atas');			
						$y['panel_kiri']	= $this->load->view('backend/panel_kiri',array('menu'=>'setting'),true);
						$this->load->view('backend/home',$y);
		 			break;
		 	}
		}else{ redirect('login'); }
	}

}

/* End of file setting.php */
/* Location: ./application/controllers/setting.php */