<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Live_Chat extends CI_Controller {
	/*
	Created By 		: Vandens Mc Maddens
	Created Date 	: March 20, 2014
	Creator Sites 	: www.cld.biz 
	*/
	public function index()
	{
		if($this->session->userdata('is_login') == true){

		 	$running_text 	 		= $this->db->get('t_chat');
		 	switch ($this->input->post('submit')) {
		 		case 'detail':
		 			$key = $this->input->post('key');
		 			$sql = $this->db->where('auto',$key)->get('t_chat')->result();
		 			foreach ($sql as $val) {
		 				foreach ($val as $k => $v) {
		 					$x[$k] = $v;
		 				}
		 			}
		 			$x['sql'] 	= $this->db->where('id_chat',$x['auto'])->get('t_chatting')->result();
		 			$this->load->view('backend/live_chat_detail',$x);
		 			break;


		 		default:
						$y['panel_tengah']	= $this->load->view('backend/live_chat_index',array('sql'=>$running_text),true);
		 				$y['panel_atas'] 	= $this->load->view('backend/panel_atas');			
						$y['panel_kiri']	= $this->load->view('backend/panel_kiri',array('menu'=>'live_chat'),true);
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