<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata'); 
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
		$enrollment_data = $this->AdminModel->get_all_enrolled_exams_by_class($this->session->userdata('user_class'));
		$user_enrollment_data = array();
		foreach($enrollment_data as $enrollment){
			$students = unserialize($enrollment['students']);
			foreach($students as $student){
				if($student==$user_id){
					
					$exam_start_date_time = strtotime($enrollment['exam_datetime']); 
					$exam_duration_in_sec = ($enrollment['exam_duration'] * 60);
					$exam_end_date_time = $exam_start_date_time + $exam_duration_in_sec;
					

					$current_date_time = time();
					
					
					if( ($current_date_time > $exam_start_date_time) && ($current_date_time < $exam_end_date_time)){
						//it is an ongoing exam
						$user_enrollment_data['ongoing'][] = $enrollment; 
					}
					elseif(($current_date_time > $exam_end_date_time)){
						$user_enrollment_data['completed'][] = $enrollment;
					}
					elseif(($current_date_time < $exam_end_date_time)){
						$user_enrollment_data['upcoming'][] = $enrollment;
					}
				}
			}
		
		}
		// echo "<pre>";
		// print_r($user_enrollment_data);
		$this->load->view('user/exams', $user_enrollment_data);
}
	

	
	

	
}
