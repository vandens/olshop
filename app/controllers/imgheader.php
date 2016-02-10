<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Imgheader extends CI_Controller {
	/*
	Created By 		: Vandens Mc Maddens
	Created Date 	: May 17, 2014
	Creator Sites 	: www.cld.biz 
	*/
	public function index()
	{
		if($this->session->userdata('is_login') == true){

		 	$sql 	 		= $this->db->order_by('add_date DESC')->get('t_header');
		 	switch ($this->input->post('submit')) {
		 		case 'simpan':
					$allowed 	= array('jpg','png','gif','bmp');
					$f 			= explode(".",$_FILES['filename']['name']);
					$ext 		= end($f);
					if(!in_array($ext,$allowed)){
						echo '<script>alert("Format file tidak diijinkan")</script>';
					}else{
						$sql 	= $this->db->insert('t_header',
																array('filename'=>$_FILES['filename']['name'],
																	  'add_by'	=>$this->session->userdata('username'),
																	  'add_date'=>date('Y-m-d H:i:s')));
						if($sql){
							move_uploaded_file($_FILES["filename"]["tmp_name"],"media/images/" . $_FILES["filename"]["name"]);
						}else
							echo '<script>alert("Input data gagal")</script>';
					}
					
					echo '<script>window.location.href ="imgheader"</script>';
		 			break;


		 		default:
						$y['panel_tengah']	= $this->load->view('backend/imgheader_index',array('sql'=>$sql),true);
		 				$y['panel_atas'] 	= $this->load->view('backend/panel_atas');			
						$y['panel_kiri']	= $this->load->view('backend/panel_kiri',array('menu'=>'imgheader'),true);
						$this->load->view('backend/home',$y);
		 			break;
		 	}
		}else{ redirect('login'); }
	}
	
	function delete(){
		$id 		= $this->uri->segment(3);
		$sql 		= $this->db->get_where('t_header',array('auto'=>$id));
		
		$delete 	= $this->db->where('auto',$id)->delete('t_header');
		foreach($sql->result() as $key);
		unlink('media/images/'.$key->filename);
		header( 'Location: '.base_url().'imgheader.html' ) ;
	}

}

/* End of file imgheader.php */
/* Location: ./application/controllers/imgheader.php */