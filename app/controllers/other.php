<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Other extends CI_Controller {
	/*
	Created By 		: Vandens Mc Maddens
	Created Date 	: March 20, 2014
	Creator Sites 	: www.cld.biz 
	*/
	public function index()
	{
		if($this->session->userdata('is_login') == true){

			if($this->input->post('submit') == 'simpan'){
				$key 	= $this->input->post('key');
				$par1 	= $this->input->post('param1');
				$sql 	= $this->db->where('auto',$key)
								   ->update('t_other',array(
								   			'isi'			=> $par1,
								   			'update_by'		=> $this->session->userdata('nama'),
								   			'update_date'	=> date('Y-m-d H:i:s')));
				$this->show($key);
			}else{
				$this->show('1');
			}

		}else{ redirect('login'); }
	}

	function show($k=''){

		if($this->session->userdata('is_login') == true){

			$key = ($k == '') ? $this->uri->segment(3) : $k;

			if($key != ''){		
				$sql 			= $this->db->where('auto',$key)->get('t_other')->result();
				$y['panel_tengah']	= $this->load->view('backend/other',array('sql'=>$sql),true);
				
				$y['panel_atas'] 	= $this->load->view('backend/panel_atas');			
				$y['panel_kiri']	= $this->load->view('backend/panel_kiri',array('menu'=>'other'),true);
				$this->load->view('backend/home',$y);
			}		

		}else{ redirect('login'); }
	}
	

}

/* End of file other.php */
/* Location: ./application/controllers/other.php */