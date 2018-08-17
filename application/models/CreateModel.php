<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CreateModel extends CI_Model
{
	

	
    
    public function add_role($role_data){

        
        $result= $this->db->insert('roles', $role_data);
        return result;
           

       
    }
   
}