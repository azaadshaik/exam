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
		
		
		if ($this->form_validation->run() === TRUE)
		{
			$upload_config = $this->config->item('file_upload');
			$this->load->library('upload', $upload_config);	
			$user_data['user_name'] = $this->input->post('username');
			$user_data['password'] = password_hash($this->input->post('username'), PASSWORD_DEFAULT);
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
			$result = $this->usermodel->add_user($user_data);
			$user_id = $this->db->insert_id();
			$role = $this->usermodel->get_role_by_id($user_data['user_role']);
			$role_code = $role->role_code;
			$this->map_users_to_classes($role_code,$user_id);

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
	
	public function edit_user()
	{
		
		
		
		
		$this->data['title'] = 'Registration';
		$this->form_validation->set_rules('username', 'Username is required', 'required');
		
		
		if ($this->form_validation->run() === TRUE)
		{
			$upload_config = $this->config->item('file_upload');
			$this->load->library('upload', $upload_config);	
			$user_data['user_name'] = $this->input->post('username');
			$user_data['password'] = password_hash($this->input->post('username'), PASSWORD_DEFAULT);
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
			$result = $this->usermodel->add_user($user_data);
			$user_id = $this->db->insert_id();
			$role = $this->usermodel->get_role_by_id($user_data['user_role']);
			$role_code = $role->role_code;
			$this->map_users_to_classes($role_code,$user_id);

		}
			
			$data['message'] = 'User created successfully';
			$this->load->view('user/profile', $data);

		}
		else{
			$user_id = $this->input->get('user_id');
			$result = $this->usermodel->get_user_by_id($user_id);
			echo "<pre>";
			print_r($result);
			die;
			$roles = $this->usermodel->get_roles();
			$data['roles'] = $roles;

			$this->load->view('user/edit', $data);
		}
		
		
	}

	function map_users_to_classes($role_code,$user_id){
		
				$data['user'] = $user_id;
				$data['institution'] = $this->input->post('institution');
				$data['school'] = $this->input->post('school');
				$data['class'] = $this->input->post('class');
		switch($role_code){
			case 'teacher':
				$this->usermodel->map_user_to_class($data);
			break;
			case 'student':
				$this->usermodel->map_user_to_class($data);
			break;
			case 'parent':
			break;
			case 'examiner':
			break;
			default:
			break;



		}
	}

	
	

	
}
