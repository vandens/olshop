<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Com_Order extends CI_Controller {
	/*
	Created By 		: Vandens Mc Maddens
	Created Date 	: March 20, 2014
	Creator Sites 	: www.cld.biz 
	*/
	public function index()
	{
		if($this->session->userdata('is_login') == true){
		 	switch ($this->input->post('submit')) {
			
		 		default:
						$qry = $this->db->query('SELECT perpage_bo from t_setting')->result_array();
						$limit 					= $qry[0]['perpage_bo'];
						$config['base_url'] 	= base_url('com_order/page');
						$config['total_rows'] 	= $this->db->get('t_com_payment')->num_rows();
						$config['per_page'] 	= $limit;
						$this->pagination->initialize($config);
						
						
						$com_payment		= $this->db->order_by('add_date DESC')->limit($limit)->get('t_com_payment')->result_array();
						$y['panel_tengah']	= $this->load->view('backend/com_order_index',array('sql'=>$com_payment),true);
			
		 				$y['panel_atas'] 	= $this->load->view('backend/panel_atas');			
						$y['panel_kiri']	= $this->load->view('backend/panel_kiri',array('menu'=>'com_order'),true);
						$this->load->view('backend/home',$y);
		 			break;
		 	}


		}else{ redirect('login'); }
	}

	
	function page(){
						$qry = $this->db->query('SELECT perpage_bo from t_setting')->result_array();
						$limit 				= $qry[0]['perpage_bo'];						
						$offset 			= $this->uri->segment(3);
						
						$com_payment 			= $this->db->order_by('add_date DESC')->get('t_com_payment')->result_array();
						
						$config['total_rows'] 	= count($com_payment);
						$config['base_url'] 	= base_url('com_order/page');
						$config['per_page'] 	= $limit;
						$this->pagination->initialize($config);
												
						$y['panel_tengah']	= $this->load->view('backend/com_order_index',array('sql'=>array_slice($com_payment,$offset,$limit),true));
			
		 				$y['panel_atas'] 	= $this->load->view('backend/panel_atas');			
						$y['panel_kiri']	= $this->load->view('backend/panel_kiri',array('menu'=>'com_order'),true);
						$this->load->view('backend/home',$y);
	}
	
	function hapus(){
		if($this->session->userdata('is_login') == true){
			$key = $this->uri->segment(3);
			$this->db->where('auto',$key)->delete('t_com_payment');
			redirect('com_order');
			
		}else{ redirect('login'); }
	}

	function approve(){
		if($this->session->userdata('is_login') == true){
			$key = $this->uri->segment(3);
			$this->db->where('auto',$key)->update('t_com_payment',array('status'=>1,
																		'update_by'=>$this->session->userdata('username'),
																		'update_date'=>date('Y-m-d H:i:s')));
			redirect('com_order');			
		}else{ redirect('login'); }
	}
	
	function detail(){
		$key 	= $this->input->post('key');
		$sql	= $this->db->get_where('t_com_payment',array('auto'=>$key))->result();
		echo $this->load->view('backend/com_order_detail',array('sql'=>$sql),true);
	}
}

/* End of file com_order.php */
/* Location: ./application/controllers/com_order.php */