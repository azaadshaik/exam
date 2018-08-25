<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class SearchModel extends CI_Model
{
	

	
    
   public function search_by_single_field($search,$table,$fields,$join_table,$join_on){
	    $this->db->like($fields[0], $search);
		if(count($fields) > 1){
		 for($i=1;$i<count($fields);$i++){
			$this->db->or_like($fields[$i], $search);
         }	
		}
		if($join_table){
			$this->db->join($join_table,$join_on);
		}
        $query = $this->db->get($table);
		//echo $this->db->last_query();
        return $query->result();
   }
	
    
    
    
   
}