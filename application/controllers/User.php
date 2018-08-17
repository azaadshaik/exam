<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	
	public function __construct()
	{
		
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->model('usermodel');
		
	}
	public function index()
	{
		
	}
	public function get_users(){

		$offset = 0;
		$limit=50;
		$this->userModel->get_all_users();

	}
	public function register()
	{
		
		
		
		
		$this->data['title'] = 'Registration';
		$this->form_validation->set_rules('username', 'Username is required', 'required');
		$this->form_validation->set_rules('password', 'Password is required', 'required');
		
		if ($this->form_validation->run() === TRUE)
		{
			$upload_config = $this->config->item('file_upload');
			$this->load->library('upload', $upload_config);	
			$user_data['user_name'] = $this->input->post('username');
			$user_data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			$user_data['user_firstname'] = $this->input->post('firstname');
			$user_data['user_lastname'] = $this->input->post('lastname');
			$user_data['user_reg_date'] = date('Y-m-d');
			$user_data['user_status'] = 1;
			$user_data['user_role'] = $this->input->post('role');
			if ( ! $this->upload->do_upload('userimage'))
         	{
                $error = array('error' => $this->upload->display_errors());
		                  
		
			}
		else{
			$image_data = $this->upload->data();
			$user_data['user_image'] = $image_data['orig_name'];
			$this->usermodel->add_user($user_data);	
		}
			
			$data['message'] = 'User created successfully';
			$this->load->view('user/profile', $data);

		}
		else{
			$roles = $this->usermodel->get_roles();
			$data['roles'] = $roles;

			$this->load->view('user/registration', $data);
		}
		
		
	}

	
	

	
}
