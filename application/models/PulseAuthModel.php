<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class PulseAuthModel extends CI_Model
{
	

	public function __construct()
	{
		
		$this->load->helper('cookie');
		$this->load->helper('date');
		

    }
    
    public function login($username,$password){

        
        $sql = "SELECT users.*,user_class.* FROM users left join user_class on users.user_id = user_class.user WHERE user_name = ?  AND user_status = ? ";
		
        $record = $this->db->query($sql, array($username, 1))->row();
        if(isset($record->user_id)){
        if (password_verify($password, $record->password)) {

            return $record;
           
        } else {
            return false;
        }
    }
    else{
        return false;
    }
    
       
    }
   
}