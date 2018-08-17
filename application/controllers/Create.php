<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create extends CI_Controller {

	
	public function __construct()
	{
		
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->model('createmodel');

	}
	public function index()
	{
		
	}
	public function roles()
	{
		$this->data['title'] = 'Role Creation';
		$this->form_validation->set_rules('rolecode', 'Role code is required', 'required');
		$this->form_validation->set_rules('rolename', 'Role name is required', 'required');
		
		if ($this->form_validation->run() === TRUE)
		{
			$role_data['role_code'] = $this->input->post('rolecode');
			$role_data['role_name'] = $this->input->post('rolename');
						
			$this->createmodel->add_role($role_data);
			


		}
		else{
			$this->template->load('default', 'roles/create', $this->data);
		}
		
		
    }
    
    

	
}
