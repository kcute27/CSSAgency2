<?php 
	Class OfficePassword Extends CI_Controller{
		function index(){
			$qry = $this->db->get('tbloffice');
			foreach ($qry->result() as $row) {
				$data = array('office_password' => $this->getPass(6));
				$this->db->where('office_id',$row->office_id)->update('tbloffice',$data);
			}
		}

		function getPass($length)
		{   
		    $characters = 'ABCDEFGHIJKLMNPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		    $string = '';
		    $max = strlen($characters) - 1;
		    for ($i = 0; $i < $length; $i++) {
		      $string .= $characters[mt_rand(0, $max)];
		    }
		    return $string;
		}
	}
 ?>