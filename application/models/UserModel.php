<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class UserModel extends CI_Model
{
	

	
    
    public function add_user($user_data){

        
        if($this->db->insert('users', $user_data)){
            return true;
        }
        else{
            return false;
        }

       
    }

   
    public function get_roles(){

        $this->db->select('*');
        $this->db->from('roles');
        $result = $this->db->get()->result_array();
        return $result; 
    }

    public function get_role_by_id($role_id){

		$sql = "SELECT * FROM roles WHERE role_id = ?  ";
        $record = $this->db->query($sql, array($role_id))->row();
		return $record;
    }
    
    public function get_all_users(){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('roles', 'users.user_role = roles.role_id');
        $this->db->order_by("user_reg_date", "desc");
        
        $result = $this->db->get()->result_array();
        return $result;


    }
   
}