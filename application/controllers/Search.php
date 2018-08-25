<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Search extends CI_Controller
{
	public function __construct()
	{
       	parent::__construct();
		$this->load->model(array('usermodel','adminmodel'));
	}

	/**
	 * Redirect if needed, otherwise display the user list
	 */
	public function index()
	{
	  $module = $this->input->get('module');
	  $search = $this->input->get('term');
       switch($module){
		   case 'users':
		   break;
	   }
        
	}

	
}
