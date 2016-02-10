<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cara_pesan extends CI_Controller {
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


		 $x['sql'] 	 		= $this->db->select('count(b.auto) as jml, b.auto as id_merk, a.*')
							   				->from('t_kategori a')
							   				->join('t_merk b','a.auto = b.id_cat','left')
							   				->group_by('a.auto')
							   				->order_by('kategori ASC')
							   				->get()->result_array();
		$x['statistik']		= '';//$this->statistik();
		$x['getStatik']		= $this->getStatik();
		$x['sqlx']	= $this->db->order_by('RAND()')->get('t_runtext')->result_array();
		$x['sqly']	= $this->db->order_by('add_date DESC')->limit(10)->order_by('RAND()')->get('t_produk')->result_array();
		$x['chat'] 	= '';//$this->db->where('level',2)->get('t_user')->result_array();
		return $x;
    }

	function statistik(){

		if ($this->agent->is_browser()){   $agent = $this->agent->browser().' '.$this->agent->version(); }
		elseif ($this->agent->is_robot())	{   $agent = $this->agent->robot();	}
		elseif ($this->agent->is_mobile())	{   $agent = $this->agent->mobile(); }
		else{ $agent = 'User Agent tidak dikenal'; }

		$ip 	= $this->input->ip_address();
		
		$tgl 	= date('Y-m-d');

		if ( ! $this->input->valid_ip($ip))
		{
		     log_message('error', 'IP : '.$ip.' is INVALID IP Address'.$tgl);
		}
		else
		{
			$qry = $this->db->query("SELECT * FROM t_statistik WHERE ip='$ip' AND tgl ='$tgl'");
			if($qry->num_rows() == 0){
				$this->db->insert("t_statistik",array('ip' =>$ip, 'user_agent'=>$agent, 'tgl'=>$tgl, 'hits'=>'1'));
			}	     

		}
	}

	function getStatik(){
		$tgl 			= date('Y-m-d');
		$sql1			= $this->db->query("SELECT SUM(hits) as tot_hits FROM t_statistik")->result(); //total hits
		$sql2		 	= $this->db->query("SELECT * FROM t_statistik WHERE tgl='$tgl' GROUP BY ip"); //pengunjung  hari ini
		$hits 			= $this->db->query("SELECT SUM(hits) as hitstoday FROM t_statistik WHERE tgl='$tgl' GROUP BY tgl")->result(); //hits hari ini
		$sql3			= $this->db->query("SELECT COUNT(hits) as tot_visit FROM t_statistik")->result(); // total pengunjung

		return array($sql1,$sql2->num_rows(),$hits,$sql3);
	}
	
	function index()
	{		
		if(!IS_ENABLED)	echo '<script>window.location.href="'.base_url().'undermaintenance.html"</script>';
		$x = $this->__construct();
		$this->statistik();
		
		$this->db->query("UPDATE t_statistik set hits=hits+1 where ip = '".$this->input->ip_address()."' AND tgl = '".date('Y-m-d')."'");
		
		$x['menu']			= 'order';
		$x['error']			= '';
		$x['panel_kiri'] 	= $this->load->view('panel_kiri',array('sql'=>$x['sql'],'statistik'=>$x['statistik'],'getStatik'=>$x['getStatik']),true);
		$sql = $this->db->where('auto','3')->get('t_other')->result();
		$x['panel_tengah']	= $this->load->view('other',array('sql'=>$sql),true);
		$x['panel_kanan'] 	= '';
		$this->load->view('mainpage',$x);
	}
}