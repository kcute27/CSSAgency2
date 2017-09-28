<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_controller extends CI_Controller {

	
	public function index()
	{
		$this->load->view('login_view');
	}

		function validate_user(){
		$rules = array(
				array('field' => 'username','label'=>'Username', 'rules'=>'required|callback_uname_check'),
				array('field' => 'password','label'=>'Password', 'rules'=>'required')
				);
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() == FALSE){
			$this->login();
			return FALSE;
		}
		else
		{
			$qry = $this->db->select('*')->from('tbluser')->where('tbluser.username',$this->input->post('username'))->get();
			foreach ($qry->result() as $row) {
				$username = $row->username;
				$previledge = $row->previledge;
				$user_id = $row->user_id;
				$agency_id = $row->agency_id;
			}
			$data = array('username' => $this->input->post('username'), 
						'is_logged_in' => TRUE,
						'username'=> $username,
						'previledge' => $previledge,
						'user_id' => $user_id,
						'agency_id' => $agency_id);
				$this->session->set_userdata($data);
				if ($previledge == 2) {
					redirect('admin_controller?Username='.$this->session->userdata('username').'');
				}
				else{
					redirect('login_controller?Username='.$this->session->userdata('username').'');
					
				}
				
		}
	}


	function uname_check($str){

	$try=$this->encryptRJ256($this->input->post('password'));

	$qry = $this->db->where('username',$this->input->post('username'))->where('password',$try)->get('tbluser');
			if($qry->num_rows() == 1)
			{
				return TRUE;
			}
			else
			{
				$this->form_validation->set_message('uname_check',"Invalid username or password.");
				return FALSE;
			}

	}
	public function login()
	{
		$this->load->view('login_view');
	}
	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if (!isset($is_logged_in) || $is_logged_in !=TRUE) {

			redirect('login_controller/index');
			return FALSE;
		}
		else {
			return TRUE;
		}
	}

	function decryptRJ256($string_to_decrypt)
	{
		
		$ky = $this->getKey(); // 32 * 8 = 256 bit key
		$iv = $this->getIV(); // 32 * 8 = 256 bit iv
		$string_to_decrypt = base64_decode($string_to_decrypt);
		$rtn = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $ky, $string_to_decrypt, MCRYPT_MODE_CBC, $iv);
		$rtn = rtrim($rtn, "\4");
		return($rtn);
	}

	 function encryptRJ256($string_to_encrypt)
	{
		$ky = $this->getKey(); // 32 * 8 = 256 bit key
		$iv = $this->getIV(); // 32 * 8 = 256 bit iv 
		$rtn = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $ky, $string_to_encrypt, MCRYPT_MODE_CBC, $iv);
		$rtn = base64_encode($rtn);
		return($rtn);
	}

	function getKey(){
		$ky = 'lkirwf897+22#bbtrm8814z5qq=498j5'; // 32 * 8 = 256 bit key
		return $ky;
	}

	function getIV(){
		$iv = '741952hheeyy66#cs!9hjv887mxx7@8y';
		return $iv;
	}
}