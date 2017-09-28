<?php 



Class Admin_controller extends CI_controller

{	

	function __construct(){

		parent:: __construct();



		$this->load->library('form_validation');

		$this->load->model('admin_model');

		$this->is_logged_in();

		

	}

	

	function index()

	{



		$data['main_content']='admin_view';

		$this->load->view('includes/template', $data);

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



	function logout()

	{

		$this->session->sess_destroy();

		redirect('login_controller');

	}	



	function css_user()

	{



		$data['main_content']='css_user';

		$this->load->view('includes/template', $data);

	}



	function edit_profile(){

		$data['main_content']='profile';

		$this->load->view('includes/template', $data);

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

	 function create_css_user()

	{	

		$name = $this->input->post('name');

		$address = $this->input->post('address');

		$contact_number = $this->input->post('contact_number');

		$username = $this->input->post('username');

		$password = $this->encryptRJ256($this->input->post('password'));

		$previledge = $this->input->post('previledge');

		$email_account = $this->input->post('email_account');

		$data = array(

			'name' => $name,

			'address' => $address,

			'contact_number' => $contact_number,

			'username' => $username,

			'password' => $password,

			'previledge' => $previledge,

			'email_account' => $email_account,

			'agency_id' => $this->session->userdata('agency_id'),

			'status' => "1"

			);

		$this->admin_model->create_appuser($data);



		$user_id = $this->session->userdata('user_id');

		$last_user = $this->getLastUser();

		$data = array(

			'office_name' 	=> $this->input->post('office_name'),

			'location'		=> $this->input->post('address'),

			'resp_center'	=> $this->input->post('resp_center'),

			'agency_id' 	=> $this->session->userdata('agency_id'),

			'user_id'		=> $last_user

			);

		$this->db->insert('tbloffice',$data);

		redirect("admin_controller/css_user?msg=success");

	}



	function saveOffice(){

		$data = array(

			'office_name' 	=> $this->input->post('office_name'),

			//'location'		=> $this->input->post('address'),

			'resp_center'	=> $this->input->post('resp_center'),

			'agency_id' 	=> $this->session->userdata('agency_id'),

			'program'		=> $this->input->post('program'),

			'budget'		=> $this->input->post('budget'),

			'office_password' => $this->input->post('password')

		);

		$this->db->insert('tbloffice',$data);

		redirect("admin_controller/css_user?msg=success");

	}



	function updateOffice(){

		$id = $this->input->post('id');

			$data = array(

			'office_name' 	=> $this->input->post('office_name'),

			//'location'		=> $this->input->post('address'),

			'resp_center'	=> $this->input->post('resp_center'),

			//'agency_id' 	=> $this->session->userdata('agency_id')

			'program'		=> $this->input->post('program'),

			'budget'		=> $this->input->post('budget')

			//'office_password' => $this->input->post('password')

		);

		$this->db->where('office_id',$id)->update('tbloffice',$data);

		redirect("admin_controller/printUsers?");

	}



	function add_office(){

		$data['main_content']='add_office';

		$this->load->view('includes/template', $data);

	}



	function printUsers(){

		$data['main_content']='printUsers';

		$this->load->view('includes/template', $data);

	}



	function getLastUser(){

		$qry = $this->db->order_by('user_id',"DESC")->get('tbluser');

		$row = $qry->row();

		return $row->user_id;

	}



 function add_css_user()

	{

		 		$this->form_validation->set_rules('name', 'name', 'trim|required|xss_clean');

                $this->form_validation->set_rules('address', 'address', 'required|xss_clean');

                $this->form_validation->set_rules('contact_number', 'contact_number', 'trim|required|xss_clean');

                $this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');

                $this->form_validation->set_rules('password', 'password', 'required|xss_clean');

                $this->form_validation->set_rules('repeat_password', 'repeat_password', 'required|xss_clean|matches[password]|md5');

                $this->form_validation->set_rules('priviledge', 'priviledge', 'required|xss_clean');

                $this->form_validation->set_rules('email_account', 'email_account', 'required|xss_clean');



                if ($this->form_validation->run() == FALSE)

                {

                        $data['main_content']='css_user';

						$this->load->view('includes/template', $data);

                }

                else

                {

                        $data['main_content']='admin_view';

						$this->load->view('includes/template', $data);

                }

	}



	function exportAcct(){

		$user_id = $this->input->get('user_id');

		$qry = $this->db->where('user_id',$user_id)->get('tbluser');

		$row = $qry->row();

		$uname = $row->username;



		$dataStr = "$row->user_id|$row->agency_id|$row->previledge|$row->office_id|$row->name|$row->username|$row->password|$row->email_account|$row->contact_number|$row->image|$row->address|$row->status;";



		$qry2 = $this->db->select("*")->from('tbloffice')->where('tbloffice.user_id',$user_id)->join('tblagency',"tbloffice.agency_id = tblagency.agency_id")->get();

		foreach ($qry2->result() as $r) {

		$dataStr = $dataStr . "$r->office_id|$r->office_name|$r->location|$r->resp_center|$r->agency_id|$r->agency_code|$r->agency_name|$r->group_name|$user_id;";		

		}

		header("Content-Disposition: attachment; filename='".$user_id."-".$uname.".cssx'");

		header('Content-type: text/plain');

		echo $this->encryptRJ256($dataStr);

		//echo $dataStr;

		//redirect("admin_controller/css_user");

	

	}



	function update_agency_profile(){

		$data = array(

			'agency_name' => $this->input->post('agency_name'),

			'group_name' => $this->input->post('group_name'),

			'location' => $this->input->post('location'),

			'lat' => $this->input->post('lat'),

			'lng' => $this->input->post('lng'),

			'region' => $this->input->post('region'),

			'contact_person' => $this->input->post('contact_person'),

			'cp_position' => $this->input->post('cp_position'),

			'cp_email' => $this->input->post('cp_email'),

			'cp_number' => $this->input->post('cp_number'),

			'prep_by' => $this->input->post('prep_by'),

			'cert_by' => $this->input->post('cert_by'),

			'aprv_by' => $this->input->post('aprv_by')

			);

		$this->db->where('agency_id',$this->session->userdata('agency_id'))->update('tblagency',$data);

		redirect("admin_controller/edit_profile?msg=success");

	}



	function get_current()

	{

		$qry = $this->db->select_sum('approved')->where('approved','1')->where('is_ppmp','1')->get('tblppmp'); foreach ($qry->result() as $key) {

			if ($key->approved > 0) {

				

             echo $key->approved;

			}else{

				echo 0;

			}

      }

	}



	function cse()

	{



		$value=$this->admin_model->generate_cse();

		$data['record']=$value;

		$data['CSSadmin']=$this->admin_model->generate_cse();

		$data['main_content']='cse';

		$this->load->view('includes/template', $data);

	}



	function edit_cse()

	{

		$value=$this->admin_model->edit_cse();

		$data['record']=$value;

		$data['CSSadmin']=$this->admin_model->edit_cse();

		$data['main_content']='edit_cse';

		$this->load->view('includes/template', $data);

	}



	function update_cse()

	{

		$item_id = $this->input->post('item_id');

		$data = array(

				'price' => $this->input->post('price'),

				'status' => $this->input->post('status'),

			);

		$this->admin_model->update_cse($item_id, $data);

		redirect("admin_controller/cse?rem=1");

	}



	function agencies()

	{

		$data['record']=$this->db->where('agency_id',$this->session->userdata('agency_id'))->get('tbloffice');

		//$data['CSSadmin']=$this->admin_model->generate_agencies();

		$data['main_content']='agencies';

		$this->load->view('includes/template', $data);

	}



	function update_agency()

	{

		$agency_id = $this->input->post('agency_id');

		$data = array(

				'location' => $this->input->post('location')

			);

		$this->admin_model->update_agency($agency_id, $data);

		redirect("admin_controller/agencies?rem=1");

	}



	function app_report()

	{

		$value=$this->admin_model->generate_per_agencies();

		$data['record']=$value;

		$data['CSSadmin']=$this->admin_model->generate_per_agencies();

		$data['main_content']='app_report';

		$this->load->view('includes/template', $data);

	}



	function app_summary()

	{

		$value=$this->admin_model->generate_app_summary();

		$data['record']=$value;

		$data['CSSadmin']=$this->admin_model->generate_app_summary();

		$this->load->view('app_summary2', $data);

	}


	function app_summary_gen()

	{

		$value=$this->admin_model->generate_app_summary();

		$data['record']=$value;

		$data['CSSadmin']=$this->admin_model->generate_app_summary();

		$this->load->view('app_summary_gen', $data);

	}






	function app_report_per_agencies()

	{

		$this->load->view('per_agencies');

	}



	function getKey()

	{

		$ky = 'lkirwf897+22#bbtrm8814z5qq=498j5'; // 32 * 8 = 256 bit key

		return $ky;

	}



	function getIV()

	{

		$iv = '741952hheeyy66#cs!9hjv887mxx7@8y';

		return $iv;

	}



	function textblast()

	{

		$results=$this->admin_model->generate_user();

		$data['results']=$results;

		$data['CSSadmin']=$this->admin_model->generate_user();

		$data['main_content']='textblast';

		$this->load->view('includes/template', $data);

	}



	function submit_app(){

		$type = $this->input->get('type');

		$status = $this->input->get('status');

		$timezone = "Asia/Manila";

    	if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);

		$date_now_complete = date("l, M j, Y, g:i A");



		$agency_id = $this->session->userdata('agency_id');

		$a_id = str_pad($agency_id, 4, '0', STR_PAD_LEFT);



		$qry = $this->db->where('status',"current")->get('tblfiscal_year');

  		$row = $qry->row();



  		$fiscal_year = $row->fiscal_year;



  		$data = array(

  			'app_name' => "$a_id-$fiscal_year-$type-APP",

  			'app_year' => $fiscal_year,

  			'app_status' => $status,

  			'app_agency_id' => $agency_id,

  			'app_date_updated' => $date_now_complete,

  			'last_updated_by' => $this->session->userdata('user_id')



  			);

  		$qry = $this->db->where('app_year',$fiscal_year)->where('app_agency_id',$agency_id)->where('app_status',$status)->get('tblapp');

  		if ($qry->num_rows() > 0) {

  			$this->db->where('app_year',$fiscal_year)->where('app_agency_id',$agency_id)->where('app_status',$status)->update('tblapp',$data);

  		}

  		else{

  			$this->db->insert('tblapp',$data);

  		}

  		redirect("admin_controller");





	}



	function sendmessage()

	{

		$this->form_validation->set_rules('contact_number', 'contact_number', 'required');

		$this->form_validation->set_rules('message', 'message', 'required');

		if ($this->form_validation->run())

		{

			$contact_number = $this->input->post('contact_number');

			$message = $this->input->post('message');



			$data = $this->input->post();





			$authkey = "";

			unset($data['submit']);



			$mobilenumber = implode('', $data['contact_number']);

			print_r($data);

			exit();

			$arr = str_split($mobilenumber, "12");

			$number= implode("","",$arr);

			$senderid="Portal";

			$route=4;

			$postdata=array(



					'authkey' => $authkey,

					'contact_number' => $contact_number,

					'message' => $message,

					'sender' => $senderid,

					'route' => $route

				);

			$url="http://api.";



			$ch = curl_init();

			curl_setopt_array($ch, array(

				CURLOPT_URL => $url,

				CURLOPT_RETURNTRANSFER => true,

				CURLOPT_POST => true,

				CURLOPT_POSTFIELDS => $postdata

				));

		}

	}

}

