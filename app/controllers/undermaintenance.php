<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Undermaintenance extends CI_Controller {

	function index(){
		$this->load->view('undermaintenance');
	}
}