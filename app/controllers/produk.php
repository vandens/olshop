<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Katalog extends CI_Controller {
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

		$x['sqlx']	= $this->db->order_by('RAND()')->get('t_runtext')->result_array();

	/*	 $x['sql'] 	 		= $this->db->select('count(b.auto) as jml, b.auto as id_merk, a.*')
							   				->from('t_kategori a')
							   				->join('t_merk b','a.auto = b.id_cat','left')
							   				->group_by('a.auto')
							   				->order_by('kategori ASC')
							   				->get()->result_array();
		$x['statistik']		= $this->statistik();
		$x['getStatik']		= $this->getStatik();
		$x['sqlx']	= $this->db->order_by('RAND()')->get('t_runtext')->result_array();
		$x['sqly']	= $this->db->order_by('add_date DESC')->limit(10)->order_by('RAND()')->get('t_produk')->result_array();
		$x['chat'] 	= $this->db->where('level',2)->get('t_user')->result_array();
	*/	return $x;
    }
	
	public function index()
	{
		$x = $this->__construct();
		$x['menu']			= 'katalog';

		switch ($this->input->post('submit')) {
		 	case 'cari':
					$sql 	 	 		= $this->db->DISTINCT()
								   		->select('a.*, a.auto as auto, b.nama_merk, c.kategori')
								   		->from('t_produk a')
								   		->join('t_merk b','a.id_merk=b.auto','left')
								   		->join('t_kategori c','b.id_cat=c.auto','left')
								   		->like('b.nama_merk',$this->input->post('key'))
								   		->or_like('c.kategori',$this->input->post('key'))
								   		->or_like('a.nama_produk',$this->input->post('key'))
								   		->or_like('a.harga',$this->input->post('key'))
								   		->get();			
		 		break;

			default:
					if($this->uri->segment(3)){
						$sql 	 	 		= $this->db->DISTINCT()
									   		->select('a.*, a.auto as auto, b.nama_merk, c.kategori')
									   		->from('t_produk a')
									   		->join('t_merk b','a.id_merk=b.auto','left')
									   		->join('t_kategori c','b.id_cat=c.auto','left')
									   		->where('c.kategori',$this->uri->segment(3))
									   		->or_where('a.id_merk',$this->uri->segment(3))
									   		->limit('36')
									   		->get();
					}else{
						$sql 	= $this->db->limit('36')->get('t_produk');
					}

				break;
		}

		$x['error']			= '';
		$x['panel_kiri'] 	= '';
		$x['panel_tengah']	= $this->load->view('katalog',array('sql'=>$sql),true);
		$x['panel_kanan']	= '';
		$this->load->view('mainpage',$x);
	}

	public function detail(){
		$x = $this->__construct();
		$x['menu']			= 'katalog';
		$x['error']			= '';
		$sql2				= $this->db->where('auto',$this->uri->segment(3))->get('t_produk');
		$sql3 				= $this->db->like('auto',substr($this->uri->segment(3),0,3))
									   ->limit('12')->order_by('RAND()')->get('t_produk');
		$x['panel_kiri'] 	= $this->load->view('panel_kiri',array('sql'=>$x['sql'],'sqly'=>$x['sqly'],'statistik'=>$x['statistik'],'getStatik'=>$x['getStatik']),true);
		$x['panel_tengah']	= $this->load->view('katalog_detail',array('sql2'=>$sql2,'sql3'=>$sql3),true);
		$x['panel_kanan']	= '';
		$this->load->view('mainpage',$x);
	}




}

/* End of file home.php */
/* Location: ./application/controllers/home.php */