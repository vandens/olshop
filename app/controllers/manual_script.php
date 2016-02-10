<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manual_script extends CI_Controller {
	
	function index(){
		$SQL 	= $this->db->get('t_kategori')->result();
		$no = 0;
		foreach($SQL as $val){
			$prase 	= strtoupper(str_replace(' ','',$val->kategori));
			$prase2 = str_replace('/','',$prase);
			if(strlen($prase2) == 3)
				$kode = $prase2;
			else
				$kode = substr(str_shuffle($prase2),2,3);
				
			$this->db->where('auto',$val->auto)->update('t_kategori',array('auto'=>$kode));
			
			$this->db->where('id_cat',$val->auto)->update('t_merk',array('id_cat'=>$kode));
			
		}
		
		$produk =  $this->db->get('t_produk')->result();
		foreach($produk as $key){
			
			$take_cat = $this->db->where('auto',$key->id_merk)->get('t_merk')->result_array();
			foreach($take_cat as $d){
				$update = $this->db->where('auto',$key->auto)->update('t_produk',
																				array('auto'=>$d['id_cat'].$key->auto));
			}
			
		}
		
		$total_kat = $this->db->query('select count(auto) as auto from t_kategori')->result_array();
		$cek_duplikat = $this->db->group_by('auto')->get('t_kategori')->num_rows();
		echo '<pre>';
		echo 'Total kategori :'.$total_kat[0]['auto'];
		echo '<br><pre>';
		echo 'Total List kategori :'.$cek_duplikat;
		echo '<br><pre>';
		if($total_kat[0]['auto'] == $cek_duplikat)
			echo '<b>Tidak ada duplikat kode kategori!</b>';
		else
			echo '<b>WARNING!!!<br>ADA DUPLIKAT KODE</b>';
	}


}
