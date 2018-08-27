<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Search extends CI_Controller
{
	public function __construct()
	{
       	parent::__construct();
		$this->load->model(array('searchmodel'));
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
		   $result = $this->searchmodel->search_by_single_field($search,$module,$fields,$join_table,$join_on);
		   $view = 'search/user_search';
		   break;
		   case 'exams':
		   $fields = array('exam_name','exam_code');
		   $result = $this->searchmodel->search_by_single_field($search,$module,$fields);
		   $view = 'search/exam_search';
		   break;
	   }
	   $data['search_results'] = $result;
	   $this->load->view($view, $data);
        
	}

	
}
