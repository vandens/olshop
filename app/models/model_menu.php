<?php if(!defined('BASEPATH')) exit('No direct script access allowed!');

class Model_Menu extends CI_Model{

	public function get_submenu($key=''){
		$sql = $this->db->where('id_cat',$key)->get('t_merk');
		return $sql;
	}



} //end of Model Modul