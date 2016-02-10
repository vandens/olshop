<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	/*
	Created By 		: Vandens Mc Maddens
	Created Date 	: March 20, 2014
	Creator Sites 	: www.cld.biz 
	*/
	public function index()
	{
		if($this->session->userdata('is_login') == true){
			
			$this->load->view('backend/home');



		}else{ $this->load->view('backend/login'); }
	}


	function in(){
		$this->load->library('email');

		$user = $this->input->post('username');
		$pass = $this->input->post('password');

		$sql = $this->db->where('username',$user)
						->where('password',md5($pass))
						->get('t_user');

		if($sql->num_rows() == 0){
			$x['error']	= 'Username / Password salah';
			$this->load->view('backend/login',$x);
		}else{
			foreach ($sql->result() as $val) {
				
			}
			$this->session->set_userdata('is_login',true);
			$this->session->set_userdata('username',$user);
			$this->session->set_userdata('nama',$val->nama_lengkap);
			$this->db->where('username',$user)->update('t_user',array('is_login'=>'1'));

			$subjek = 'Nuskom Activity Sign In';
			$from 	= 'admin@nusaelektronik.com';
			$to 	= 'topan.pandenis@gmail.com';
			$content= 'Dear Vandens mc Maddens,
					   <p>Terdapat aktifitas Sign In di Situs http://nusaelektronik.com dengan Detail akun sbb :<br>
					   Username : '.$user.'<br>
					   Nama 	: '.$val->nama_lengkap.'<br>
					   IP Address : '.$_SERVER['REMOTE_ADDR'].'<br>
					   Waktu 	: '.date('Y-m-d H:i:s').'<br></p>
					   Regards,<br>
					   Administrator';

            $headers = "From: " . strip_tags($from) . "\r\n";
            //$headers .= "Reply-To: ". strip_tags($from) . "\r\n";
            //$headers .= "CC: ". strip_tags($) . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $message = '<html><body>';
            $message .= $content;
            $message .= "</body></html>";
			mail($to, $subjek, $message, $headers);

			redirect(base_url('backend'));
		}
	}

	function out(){

		$this->load->library('email');

		$this->db->where('username',$this->session->userdata('username'))->update('t_user',array('is_login'=>'0'));
		
			$subjek = 'Nuskom Activity Sign Out';
			$from 	= 'admin@nusaelektronik.com';
			$to 	= 'topan.pandenis@gmail.com';
			$content= 'Dear Vandens mc Maddens,
					   <p>Terdapat aktifitas Sign Out di Situs http://nusaelektronik.com dengan Detail akun sbb :<br>
					   Username : '.$this->session->userdata('username').'<br>
					   Nama 	: '.$this->session->userdata('nama').'<br>
					   IP Address : '.$_SERVER['REMOTE_ADDR'].'<br>
					   Waktu 	: '.date('Y-m-d H:i:s').'<br></p>
					   Regards,<br>
					   Administrator';

            $headers = "From: " . strip_tags($from) . "\r\n";
            //$headers .= "Reply-To: ". strip_tags($from) . "\r\n";
            //$headers .= "CC: ". strip_tags($) . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $message = '<html><body>';
            $message .= $content;
            $message .= "</body></html>";
			mail($to, $subjek, $message, $headers);

		$this->session->unset_userdata('is_login');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('nama');

		redirect(base_url('login'));
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */