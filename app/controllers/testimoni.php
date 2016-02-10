<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testimoni extends CI_Controller {
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
		 			
		 			$this->load->view('backend/testimoni_add');
		 			break;

		 		case 'edit':
		 			$data = $this->db->where('auto',$this->input->post('key'))->get('t_testimoni');
		 			foreach ($data->result() as $key) {
		 				foreach ($key as $k => $val) {
		 					$x[$k] = $val;
		 				}
		 			}
		 			$this->load->view('backend/testimoni_edit',$x);
		 			break;


		 		case 'update':
		 			$key 		= $this->input->post('key');
		 			$param1		= $this->input->post('param1');
		 			$param2		= $this->input->post('param2');
		 			$sql 		= $this->db->where('auto',$key)
		 								   ->update('t_testimoni',
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
		 			$sql 		= $this->db->insert('t_testimoni',
		 											array('deskripsi'	=>$param1,
		 												  'status'		=>$param2,
		 												  'add_by'		=>$this->session->userdata('username'),
		 												  'add_date'	=>date('Y-m-d H:i:s')));
		 			if($sql){
		 					echo json_encode(array('error'=>0,'msg'=>'Data berhasil disimpan'));
		 			}else{ echo json_encode(array('error'=>1,'msg'=>'Data gagal disimpan')); }
		 			break;


		 		default:
						$qry = $this->db->query('SELECT perpage_bo from t_setting')->result_array();
						$limit 					= $qry[0]['perpage_bo'];
						$config['base_url'] 	= base_url('testimoni/page');
						$config['total_rows'] 	= $this->db->get('t_testimoni')->num_rows();
						$config['per_page'] 	= $limit;
						$this->pagination->initialize($config);
						
						$testimoni 	 		= $this->db->limit($limit)->order_by('add_date DESC')->get('t_testimoni');
						$y['panel_tengah']	= $this->load->view('backend/testimoni_index',array('sql'=>$testimoni),true);
		 				$y['panel_atas'] 	= $this->load->view('backend/panel_atas');			
						$y['panel_kiri']	= $this->load->view('backend/panel_kiri',array('menu'=>'testimoni'),true);
						$this->load->view('backend/home',$y);
		 			break;
		 	}

		}else{ redirect('login'); }
	}

	function page(){
						$qry = $this->db->query('SELECT perpage_bo from t_setting')->result_array();
						$limit 					= $qry[0]['perpage_bo'];
						$offset 				= $this->uri->segment(3);
						$config['base_url'] 	= base_url('testimoni/page');
						$config['total_rows'] 	= $this->db->get('t_testimoni')->num_rows();
						$config['per_page'] 	= $limit;
						$this->pagination->initialize($config);
						
						$testimoni 	 		= $this->db->limit($limit,$offset)->order_by('add_date DESC')->get('t_testimoni');
						$y['panel_tengah']	= $this->load->view('backend/testimoni_index',array('sql'=>$testimoni),true);
		 				$y['panel_atas'] 	= $this->load->view('backend/panel_atas');			
						$y['panel_kiri']	= $this->load->view('backend/panel_kiri',array('menu'=>'testimoni'),true);
						$this->load->view('backend/home',$y);	
	}
	
	function reject(){
		if($this->session->userdata('is_login') == true){
			$key = $this->uri->segment(3);
			//$this->db->where('auto',$key)->update('t_testimoni',array('status'=>3));
			$this->db->where('auto',$key)->delete('t_testimoni');

			$this->index();
			
		}else{ redirect('login'); }
	}

	function approve(){
		if($this->session->userdata('is_login') == true){
			$key = $this->uri->segment(3);
			$this->db->where('auto',$key)->update('t_testimoni',array('status'=>2));
			$this->index();			
		}else{ redirect('login'); }
	}


}

/* End of file testimoni.php */
/* Location: ./application/controllers/testimoni.php */