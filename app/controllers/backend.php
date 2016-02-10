<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend extends CI_Controller {
	/*
	Created By 		: Vandens Mc Maddens
	Created Date 	: March 20, 2014
	Creator Sites 	: www.cld.biz 
	*/
	public function index()
	{
		if($this->session->userdata('is_login') == true){
			
			
			$y['panel_atas'] 	= $this->load->view('backend/panel_atas');			
			$y['panel_tengah']	= $this->load->view('backend/panel_tengah');
			$y['panel_kiri']	= $this->load->view('backend/panel_kiri',array('menu'=>'home'),true);
			$this->load->view('backend/home',$y);
		}else{ redirect('login'); }
	}

}

/* End of file backend.php */
/* Location: ./application/controllers/backend.php */