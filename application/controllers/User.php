<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	
	public function __construct()
	{
		
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->model(array('UserModel','AdminModel'));
		
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
			if (!empty($_FILES['userimage']['name'])) {

				$upload_config = $this->config->item('file_upload');
				$this->load->library('upload', $upload_config);	
				if ( ! $this->upload->do_upload('userimage'))
         		{
				 
				   	$error = array('error' => $this->upload->display_errors());
				}
				else{
					$image_data = $this->upload->data();
					$user_data['user_image'] = $image_data['orig_name'];
				}
			}
			
			$user_data['user_name'] = $this->input->post('username');
			$user_data['password'] = password_hash($this->input->post('username'), PASSWORD_DEFAULT);
			$user_data['user_firstname'] = $this->input->post('firstname');
			$user_data['user_lastname'] = $this->input->post('lastname');
			$user_data['user_address'] = $this->input->post('user_address');
			$user_data['user_reg_date'] = date('Y-m-d');
			$user_data['user_status'] = 1;
			$user_data['user_role'] = $this->input->post('role');
			
			
			
			$result = $this->UserModel->add_user($user_data);
			$user_id = $this->db->insert_id();
			$role = $this->UserModel->get_role_by_id($user_data['user_role']);
			$role_code = $role->role_code;
			$this->map_users_to_classes($role_code,$user_id);
			$data['message'] = 'User created successfully';
			
			redirect('admin/users');
		}
		else{
			$roles = $this->UserModel->get_roles();
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
			
			if (!empty($_FILES['userimage']['name'])) {

				$upload_config = $this->config->item('file_upload');
				$this->load->library('upload', $upload_config);	
				if ( ! $this->upload->do_upload('userimage'))
         		{
				 
				   	$error = array('error' => $this->upload->display_errors());
				}
				else{
					$image_data = $this->upload->data();
					$user_data['user_image'] = $image_data['orig_name'];
				}
			}
			$user_id = $this->input->post('user_id');
				
			
			
			$user_data['user_firstname'] = $this->input->post('firstname');
			$user_data['user_lastname'] = $this->input->post('lastname');
			$user_data['user_address'] = $this->input->post('user_address');
			$user_data['user_reg_date'] = date('Y-m-d');
			$user_data['user_status'] = 1;
			$user_data['user_role'] = $this->input->post('role');
			$result = $this->UserModel->update_user($user_data,$user_id);
			$role = $this->UserModel->get_role_by_id($user_data['user_role']);
			$role_code = $role->role_code;
			$this->update_users_to_classes($role_code,$user_id);

		
			
			$data['message'] = 'User created successfully';
			redirect('admin/users');

		}
		else{
			$user_id = $this->input->get('user_id');
			$result = $this->UserModel->get_user_by_id($user_id);
			
			
			$institutions = $this->AdminModel->get_all_institutions();
			$data['institutions'] = $institutions;
			
			
			if(isset($result->institution)){
				$schools = $this->AdminModel->get_schools_by_institution_id($result->institution);
				$data['schools'] = $schools;
			}
			
			if(isset($result->school)){
			$classes = $this->AdminModel->get_classes_by_school_id($result->school);
			$data['classes'] = $classes;
			}
			if(isset($result->class)){
			$sections = $this->AdminModel->get_sections_by_class_id($result->class);
			$data['sections'] = $sections;
			}
			$roles = $this->UserModel->get_roles();
			$data['roles'] = $roles;
			$data['user_data'] = $result;
			$this->load->view('user/edit', $data);
		}
		
		
	}

	public function view_user(){

		$user_id= $this->input->get('user_id');
		$user_data = $this->UserModel->load_user_profile($user_id);
		$data['user_data'] = $user_data;
		$this->load->view('user/profile', $data);
	}

	
	

	function map_users_to_classes($role_code,$user_id){
		
				$data['user'] = $user_id;
				$data['institution'] = $this->input->post('institution');
				$data['school'] = $this->input->post('school');
				$data['class'] = $this->input->post('class');
				$data['section'] = $this->input->post('section');

		switch($role_code){
			case 'teacher':
				$this->UserModel->map_user_to_class($data);
			break;
			case 'student':
				$this->UserModel->map_user_to_class($data);
			break;
			case 'parent':
			break;
			case 'examiner':
			break;
			default:
			break;



		}
	}

	function update_users_to_classes($role_code,$user_id){
		
		
		$data['institution'] = $this->input->post('institution');
		$data['school'] = $this->input->post('school');
		$data['class'] = $this->input->post('class');
		$data['section'] = $this->input->post('section');

switch($role_code){
	case 'teacher':
		$this->UserModel->update_user_to_class($data,$user_id);
	break;
	case 'student':
		$this->UserModel->update_user_to_class($data,$user_id);
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
