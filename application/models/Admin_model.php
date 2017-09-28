<?php 



class Admin_Model extends CI_Model

{

	

	function create_appuser($data)

	{

		$this->db->insert('tbluser', $data);

	}



	//join 3 table

	public function funcname($id)

        {

            $this->db->select('*');

            $this->db->from('Album a'); 

            $this->db->join('Category b', 'b.cat_id=a.cat_id', 'left');

            $this->db->join('Soundtrack c', 'c.album_id=a.album_id', 'left');

            $this->db->where('c.album_id',$id);

            $this->db->order_by('c.track_title','asc');         

            $query = $this->db->get(); 

            if($query->num_rows() != 0)

            {

                return $query->result_array();

            }

            else

            {

                return false;

            }

        }



      function generate_cse()

      {

      	$query = $this->db->get('tblitems');

		return $query;

      }



       function generate_user()

      {

        $query = $this->db->get('tbluser');

        if($query->num_rows() > 0){

          return $query->result();

        }        

      }



   	function edit_cse()

   	{

   		$this->db->where('item_id', $this->uri->segment(3 ));

		$query = $this->db->get('tblitems');

		return $query->result();

   	}



   	function update_cse($item_id, $data){



   		$this->db->where('item_id',$item_id)->update('tblitems', $data);

   	}



    function generate_agencies()

      {

        $query = $this->db->get('tblagency');

        return $query;

      }

    function generate_app_summary()

    {

           $qry = $this->db->select("*")

            ->from('tbltransaction As a')

            ->join('tblitems As b', "b.item_id=a.item_id", "LEFT")

            ->join('tblppmp As c', "c.ppmp_id=a.ppmp_id", "LEFT")

            ->order_by('b.vacs',"ASC")

            ->get();

            return $qry;

   } 


    function generate_per_agencies()

    {

      $query = $this->db->get('tblagency');

      return $query;

    }



    function update_agency($agency_id, $data){



      $this->db->where('agency_id',$agency_id)->update('tblagency', $data);

    }

}