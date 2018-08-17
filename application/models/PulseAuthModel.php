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

        
        $sql = "SELECT * FROM users WHERE user_name = ?  AND user_status = ?";
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