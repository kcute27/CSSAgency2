<?php 

	Class Uploader Extends CI_Controller{

		function __construct(){

		parent:: __construct();

		$this->is_logged_in();

	}

		function index(){

			$data['main_content']='uploader';
			$this->load->view('includes/template', $data);

		}

		function archives(){
			$data['main_content']='archives';
			$this->load->view('includes/template', $data);
		}


		function do_upload(){



				$config['upload_path']          = realpath(APPPATH . '../files/ppmp');

                $config['allowed_types']        = 'cssx';



                $this->load->library('upload', $config);



                if ( ! $this->upload->do_upload('userfile'))

                {

                        $err = $this->upload->display_errors();

                        redirect("Uploader?msg=error&data=$err");

                       

                }

                else

                {

                        //echo json_encode($this->upload->data());



                        $filename = $this->upload->data('file_name');

                        $this->save_data($filename);

                        redirect("Uploader?msg=success&file=$filename");



                        

                }



		}



		function save_data($filename){



			$file = base_url('files/ppmp/'.$filename);

			$ctext = $this->decryptRJ256(file_get_contents($file));



	

			//$from_vb = "QBlgcQ2+v3wd8RLjhtu07ZBd8aQWjPMfTc/73TPzlyA=";   // enter value from vb.net app here to test



			/*============================================IMPORTER==========================================*/



			$vtext = rtrim(trim($ctext), ';'); /*-----$ctext is the decrypted data-----*/

			$myArray = explode(';', $vtext);

			$length = count($myArray);

			for ($i = 0; $i < $length; $i++) {

					if ($i == 0) {

						$titleArr = explode('|', $myArray[$i]);



						//print $titleArr[0].", ".$titleArr[1].", ".$titleArr[2].", ".$titleArr[3].", ".$titleArr[4]."<br/>";



						$data = array(



							'office_id' 	=> $titleArr[1],

							'fiscal_year' 	=> $titleArr[2],

							'approved'		=> $titleArr[3],

							'is_ppmp'		=> $titleArr[4],

							'supplemental_name' => $titleArr[5],

							'temp_id'		=> $titleArr[6],

							'prep_name'		=> $titleArr[7],

							'prep_des'		=> $titleArr[8],

							'rev_name'		=> $titleArr[9],

							'rev_des'		=> $titleArr[10],

							'aprov_name'	=> $titleArr[11],

							'aprov_des'		=> $titleArr[12],

							'user_id'		=> $titleArr[13],

							'dt_c'			=> $titleArr[14]

							);

						$this->db->insert('tblppmp',$data);

					}

					else{

						$contentArr = explode('|', $myArray[$i]);



						//print $contentArr[0].", ".$contentArr[1].", ".$contentArr[2].", ".$contentArr[3].", ".$contentArr[4].", ".$contentArr[5].", ".$contentArr[6].", ".$contentArr[7].", ".$contentArr[8].", ".$contentArr[9].", ".$contentArr[10].", ".$contentArr[11].", ".$contentArr[12].", ".$contentArr[13].", ".$contentArr[14].", ".$contentArr[15].", ".$contentArr[16].", ".$contentArr[17]."<br/>";



						$data = array(

							'ppmp_id' => $this->getLastPpmpID(),

							'item_id' => $contentArr[2],

							'price' => str_replace(',', '', $contentArr[3]),

							'qty_jan' => $contentArr[4],

							'qty_feb' => $contentArr[5],

							'qty_mar' => $contentArr[6],

							'qty_apr' => $contentArr[7],

							'qty_may' => $contentArr[8],

							'qty_jun' => $contentArr[9],

							'qty_jul' => $contentArr[10],

							'qty_aug' => $contentArr[11],

							'qty_sep' => $contentArr[12],

							'qty_oct' => $contentArr[13],

							'qty_nov' => $contentArr[14],

							'qty_dec' => $contentArr[15],

							'total_qty' => str_replace(',', '', $contentArr[16]),

							'total_price' => str_replace(',', '', $contentArr[17])

							//'q1_amt' => ($contentArr[4] + $contentArr[5] + $contentArr[6]) * str_replace(',', '', $contentArr[3])

							);

						$this->db->insert('tbltransaction',$data);

					}

			}



		}



		function delete_ppmp(){

			$id = $this->input->get('ppmp_id');

			$qry = $this->db->where('ppmp_id',$id)->delete('tblppmp');

			$qry2 = $this->db->where('ppmp_id',$id)->delete('tbltransaction');

			redirect("uploader?msg=deleted");

		}



		function approve_ppmp(){

			$id = $this->input->get('ppmp_id');

			$data = array('approved'=>"1");

			$this->db->where('ppmp_id',$id)->update('tblppmp',$data);

			redirect("uploader/preview_ppmp?ppmp_id=$id");

		}

		function preview_ppmp(){

			$this->load->view('ppmp');

		}



		function decryptRJ256($string_to_decrypt)

		{

			$string_to_decrypt = base64_decode($string_to_decrypt);

			$rtn = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->getKey(), $string_to_decrypt, MCRYPT_MODE_CBC, $this->getIV());

			$rtn = rtrim($rtn, "\4");

			return($rtn);

		}



		function encryptRJ256($string_to_encrypt)

		{

			$rtn = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->getKey(), $string_to_encrypt, MCRYPT_MODE_CBC, $this->getIV());

			$rtn = base64_encode($rtn);

			return($rtn);

		}



		function getKey(){

			$ky = 'lkirwf897+22#bbtrm8814z5qq=498j5';

			return $ky;

		}



		function getIV(){

			$iv = '741952hheeyy66#cs!9hjv887mxx7@8y';

			return $iv;

		}



		function getLastPpmpID(){

			$qry = $this->db->order_by('ppmp_id',"DESC")->get('tblppmp');

			if ($qry->num_rows() == 0) {

				$lastID = 1;

			}

			else{

				$row = $qry->row();

				$lastID = $row->ppmp_id;

			}

			return $lastID;

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
	

	}

 ?>