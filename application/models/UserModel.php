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
    public function update_user($user_data,$user_id){
       
        $result= $this->db->update('users', $user_data, "user_id = $user_id");
        return $result;
  
    }
    public function update_user_to_class($user_data,$user_id){
       
        $result= $this->db->update('user_class', $user_data, "user = $user_id");
        return $result;
  
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
        $this->db->where('users.user_status = 1');
        $this->db->order_by("user_reg_date", "desc");
        
        $result = $this->db->get()->result_array();
        return $result;


    }
	public function map_user_to_class($data){
		 $result = $this->db->insert('user_class', $data);
		
	}
	
	public function get_user_by_id($user_id){
		$this->db->select('*');
        $this->db->from('users');
        $this->db->join('user_class', 'users.user_id = user_class.user','left');
        $this->db->join('roles', 'roles.role_id = users.user_role');
        $this->db->where("users.user_id=$user_id");
        $result = $this->db->get()->row();
        
		return $result;
		
    }
    public function load_user_profile($user_id){
		$this->db->select('*');
        $this->db->from('users');
        $this->db->join('user_class', 'users.user_id = user_class.user','left');
        $this->db->join('roles', 'roles.role_id = users.user_role');
        $this->db->join('institution', 'institution.institution_id = user_class.institution','left');
        $this->db->join('schools', 'schools.school_id = user_class.school','left');
        $this->db->join('classes', 'classes.class_id = user_class.class','left');
        $this->db->join('sections', 'sections.section_id = user_class.section','left');
        $this->db->where("users.user_id=$user_id");
        $result = $this->db->get()->row();
    	return $result;
		
    }

     public function delete_user($user_id){
        $result= $this->db->update('users', array('user_status'=>0), "user_id = $user_id");
       return $result;
   }
    
	
   
}