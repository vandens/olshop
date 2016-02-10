<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kontak extends CI_Controller {
	/*
	Created By 		: Vandens Mc Maddens
	Created Date 	: March 20, 2014
	Creator Sites 	: www.cld.biz 
	*/
    public function __construct()
    {
        parent::__construct();
		$d = $this->db->get('t_setting')->result_array();
		foreach ($d as $key) {
			foreach ($key as $k => $v) {
				$x[$k] = $v;
			}
		}
		$x['sql'] = $this->db->get('t_kategori')->result_array();
		return $x;
    }

	public function index()
	{
		
		$x = $this->__construct();
		$x['panel_kiri'] 	= $this->load->view('panel_kiri',array('sql'=>$x['sql']),true);
		$x['panel_tengah']	= $this->load->view('kontak',array(),true);
		$x['panel_kanan'] 	= $this->load->view('panel_kanan',array(),true);



		$this->load->view('mainpage',$x);
	}


}

/* End of file home.php */
/* Location: ./application/controllers/home.php */