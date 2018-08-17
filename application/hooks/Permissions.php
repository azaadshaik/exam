<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pulse_Permissions {

    
    public function check_permissions(){

        $this->CI =& get_instance(); 
      //echo "<pre>";
      //print_r($this->CI->config->item('permissions'));
      
      $session_data = $this->CI->session->userdata();
      
      if(isset($session_data['logged_in'])){ //if the user logged in then check permissions
          
        
      } 
       
     //print_r($this->CI->session->userdata());       
     //echo "iam here in check_permissions"; 
     //echo $this->CI->uri->uri_string();
    // die;   
    
    }
}
