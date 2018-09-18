<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	
	public function __construct()
	{
		
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->model(array('UserModel','AdminModel'));
		
	}
	public function index()
	{
		 $this->data['title'] = 'Student Dashboard';
        $this->template->load('student', 'student/dashboard', $this->data);
	}
	public function student_exams(){
		$user_id= $this->input->get('user_id');
		$user_data = $this->UserModel->load_user_profile($user_id);
		$data['user_data'] = $user_data;
		$this->load->view('user/exams', $data);
}
	

	
	

	
}
