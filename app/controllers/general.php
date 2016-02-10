<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General extends CI_Controller {
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

	public function filter_harga(){

		$katalog 	 		= $this->db->DISTINCT()
								   ->select('a.*, b.nama_merk, c.kategori')
								   ->from('t_produk a')
								   ->join('t_merk b','a.id_merk=b.auto','left')
								   ->join('t_kategori c','b.id_cat=c.auto','left')
								   ->like('b.nama_merk',$this->input->post('key'))
								   ->or_like('c.kategori',$this->input->post('key'))
								   ->or_like('a.nama_produk',$this->input->post('key'))
								   ->limit('100')
								   ->get();
		$i = 1;
		foreach ($katalog->result() as $val) {
			echo '<tr>
	                  <td>'.$i.'</td>
	                  <td>'.$val->kategori.'</td>
	                  <td>'.$val->nama_merk.'</td>
	                  <td>'.$val->nama_produk.'</td>
	                  <td>Rp</td>
	                  <td style="text-align:right;">'.number_format($val->harga).'</td>
	                </tr>
	                ';
	         $i++;
		}
	}

	public function beli(){
		$x = $this->__construct();

		$x['menu']			= 'katalog';
		$x['sql'] 	 		= $this->db->DISTINCT()
								   ->select('a.*, b.*, c.kategori')
								   ->from('t_produk a')
								   ->join('t_merk b','a.id_merk=b.auto','left')
								   ->join('t_kategori c','b.id_cat=c.auto','left')
								   ->where('a.auto',$this->input->post('key'))
								   ->get();
		$this->load->view('katalog_beli',$x);
	}

}
/* End of file home.php */
/* Location: ./application/controllers/home.php */