<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Search extends CI_Controller
{
	public function __construct()
	{
       	parent::__construct();
		$this->load->model(array('SearchModel'));
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
		   $fields = array('user_name','user_firstname','user_lastname');
		   $join_table = 'roles';
		   $join_on = 'users.user_role = roles.role_id';
		   $result = $this->SearchModel->search_by_single_field($search,$module,$fields,$join_table,$join_on);
		   $view = 'search/user_search';
		   break;
		   case 'exams':
		   $fields = array('exam_name','exam_code');
		   $result = $this->SearchModel->search_by_single_field($search,$module,$fields);
		   $view = 'search/exam_search';
		   break;
		   case 'institution':
		   $fields = array('institution_name','institution_code');
		   $result = $this->SearchModel->search_by_single_field($search,$module,$fields);
		   $view = 'search/institution_search';
		   break;
		   case 'schools':
		   $fields = array('school_name','school_code');
		   $result = $this->SearchModel->search_by_single_field($search,$module,$fields);
		   $view = 'search/school_search';
		   break;
		   case 'subjects':
		   $fields = array('subject_name','subject_code');
		   $result = $this->SearchModel->search_by_single_field($search,$module,$fields);
		   $view = 'search/subject_search';
		   break;
		   case 'topics':
		   $fields = array('topic_name','topic_code');
		   $result = $this->SearchModel->search_by_single_field($search,$module,$fields);
		   $view = 'search/topic_search';
		   break;
		   case 'question_bank':
		   $fields = array('question');
		   $result = $this->SearchModel->search_by_single_field($search,$module,$fields);
		   $view = 'search/question_search';
		   break;
		   case 'question_paper':
		   $fields = array('question_paper_name','question_paper_code');
		   $result = $this->SearchModel->search_by_single_field($search,$module,$fields);
		   $view = 'search/question_paper_search';
		   break;
		   case 'exam_enrollment':
		   $fields = array('exam_name','exam_enrollment_id');
		   $join_table = 'exams';
		   $join_on = 'exam_enrollment.exam_id = exams.exam_id';
		   $result = $this->SearchModel->search_by_single_field($search,$module,$fields,$join_table,$join_on);
		   $view = 'search/exam_enrollment_search';
		   break;
		   
	   }
	   $data['search_results'] = $result;
	   $this->load->view($view, $data);
        
	}
	
	public function filterUsers(){
	
		$institution = $this->input->post('institutionId');
		$school = $this->input->post('schoolId');
		$class = $this->input->post('classId');
		$role = $this->input->post('roleId');
		$filterData = array();
		$filterData['institution'] = $institution;
		$filterData['school'] = $school;
		$filterData['class'] = $class;
		$filterData['role'] = $role;
		$result = $this->SearchModel->filter_users($filterData);
		$data['user_list'] = $result;
		$this->load->view('search/user_filter', $data);
	}

	public function filterQuestions(){
	
		$classId = $this->input->post('classId');
		$subjectId = $this->input->post('subjectId');
		$topicId = $this->input->post('topicId');
		$diffLevel = $this->input->post('diffLevel');
		$avgTime = $this->input->post('avgTime');
		$filterData = array();
		$filterData['classId'] = $classId;
		$filterData['subjectId'] = $subjectId;
		$filterData['topicId'] = $topicId;
		$filterData['diffLevel'] = $diffLevel;
		$filterData['avgTime'] = $avgTime;
		$result = $this->SearchModel->filter_questions($filterData);
		$data['question_list'] = $result;
		$this->load->view('search/question_filter', $data);
	}
	
}
