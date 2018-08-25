<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Admin extends CI_Controller
{
	public function __construct()
	{
       
       
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->model(array('usermodel','adminmodel'));
		if (!$this->session->userdata('logged_in')){
            redirect('pulseauth/login','refresh');
        }
        elseif($this->session->userdata('user_rolecode')!='admin'){
            $this->data['title']='Unauthorized Access';
            $this->data['message']='You are not authorized to view this page';
            $this->template->load('default', 'errors/unauthorized', $this->data);

        }
        
               
		

	}

	/**
	 * Redirect if needed, otherwise display the user list
	 */
	public function index()
	{
                
        $this->data['title'] = 'Admin Dashboard';
        $this->template->load('default', 'admin/dashboard', $this->data);
        
	}

	public function users(){

		$user_list = $this->usermodel->get_all_users();
		$data['user_list'] = $user_list;
		$this->load->view('admin/user_list', $data);
		
		
	}
	public function schools(){

		$school_list = $this->adminmodel->get_all_schools();
		$data['school_list'] = $school_list;
		$this->load->view('admin/school_list', $data);
	}
	public function institutions(){

		$institution_list = $this->adminmodel->get_all_institutions();
		$data['institution_list'] = $institution_list;
		$this->load->view('admin/institution_list', $data);
	}
	public function subjects(){

		$subjects_list = $this->adminmodel->get_all_subjects();
		$data['subjects_list'] = $subjects_list;
		$this->load->view('admin/subjects_list', $data);
	}
	public function topics(){

		$topics_list = $this->adminmodel->get_all_topics();
		$data['topics_list'] = $topics_list;
		$this->load->view('admin/topics_list', $data);
	}
	public function questions(){

		$questions_list = $this->adminmodel->get_all_questions();
		$data['question_list'] = $questions_list;
		$this->load->view('admin/questions_list', $data);
	}
	
	public function create_institute(){

		$data['title'] = 'New Institution';
		$this->form_validation->set_rules('institution_name', 'Institutution name ', 'required');
		$this->form_validation->set_rules('institution_code', 'Institutution code ', 'required');
		
		if ($this->form_validation->run() === TRUE)
		{
			$institution_data['institution_code'] = $this->input->post('institution_code');
			$institution_data['institution_name'] = $this->input->post('institution_name');
			$institution_data['institution_status'] = 1;
			
						
			$this->adminmodel->create_institution($institution_data);
			$this->institutions();
			


		}
		else{
			
			$this->load->view('admin/create_institute', $data);
			
		}
		
	}
	public function create_subject(){

		$data['title'] = 'New Subject';
		$this->form_validation->set_rules('subject_name', 'Subject name ', 'required');
		$this->form_validation->set_rules('subject_code', 'Subject code ', 'required');
		
		if ($this->form_validation->run() === TRUE)
		{
			
			$subject_data['subject_code'] = $this->input->post('subject_code');
			$subject_data['subject_name'] = $this->input->post('subject_name');
			$subject_data['subject_class_id'] = $this->input->post('class');
			$status = $this->input->post('status');
			$subject_data['subject_status'] = ($status) ? 1:0;
			
						

			$this->adminmodel->create_subject($subject_data);
			$this->subjects();
			


		}
		else{
			$data['classes_list'] = $this->adminmodel->get_all_classes();
			$this->load->view('admin/create_subject', $data);
			
		}
		
	}

	public function create_topic(){

		$data['title'] = 'New Topic';
		$this->form_validation->set_rules('topic_name', 'Topic name ', 'required');
		$this->form_validation->set_rules('topic_code', 'Topic code ', 'required');
		
		if ($this->form_validation->run() === TRUE)
		{
			
			
			$topic_data['topic_code'] = $this->input->post('topic_code');
			$topic_data['topic_name'] = $this->input->post('topic_name');
			$topic_data['topic_class_id'] = $this->input->post('class');
			$topic_data['topic_subject_id'] = $this->input->post('subject');
			$status = $this->input->post('status');
			$topic_data['topic_status'] = ($status) ? 1:0;
			
						

			$this->adminmodel->create_topic($topic_data);
			$this->topics();
			


		}
		else{
			$data['classes_list'] = $this->adminmodel->get_all_classes();
			$this->load->view('admin/create_topic', $data);
			
		}
		
	}

	public function edit_topic(){

		$data['title'] = 'Update Topic';
		$this->form_validation->set_rules('topic_name', 'Topic name ', 'required');
		$this->form_validation->set_rules('topic_code', 'Topic code ', 'required');
		
		if ($this->form_validation->run() === TRUE)
		{
			
			$topic_id=$this->input->post('topic_id');
			$topic_data['topic_code'] = $this->input->post('topic_code');
			$topic_data['topic_name'] = $this->input->post('topic_name');
			$topic_data['topic_class_id'] = $this->input->post('class');
			$topic_data['topic_subject_id'] = $this->input->post('subject');
			$status = $this->input->post('status');
			$topic_data['topic_status'] = ($status) ? 1:0;
			
						

			$this->adminmodel->update_topic($topic_data,$topic_id);
			$this->topics();
			


		}
		else{
			$topic_id = $this->input->get('topic_id');
			$topic_data = $this->adminmodel->get_topic_by_id($topic_id);
			$topic_subjects = $this->adminmodel->get_subjects_by_class_id($topic_data->topic_class_id);			
			$data['topic_data'] = $topic_data;
			$data['topic_subjects'] = $topic_subjects;
			$data['classes_list'] = $this->adminmodel->get_all_classes();
			$this->load->view('admin/edit_topic', $data);
			
		}
		
	}

	public function edit_subject(){

		

		$data['title'] = 'Update Subject';
		$this->form_validation->set_rules('subject_name', 'Subject name ', 'required');
		$this->form_validation->set_rules('subject_code', 'Subject code ', 'required');
		
		if ($this->form_validation->run() === TRUE)
		{
			$subject_id = $this->input->post('subject_id');
			$subject_data['subject_code'] = $this->input->post('subject_code');
			$subject_data['subject_name'] = $this->input->post('subject_name');
			$subject_data['subject_class_id'] = $this->input->post('class');
			$status = $this->input->post('status');
			$subject_data['subject_status'] = ($status) ? 1:0;
			
						

			$this->adminmodel->update_subject($subject_data,$subject_id);
			$this->subjects();
			


		}
		else{
			$subject_id = $this->input->get('subject_id');
			$data['classes_list'] = $this->adminmodel->get_all_classes();
			$data['subject_data'] = $this->adminmodel->get_subject_by_id($subject_id);
			$this->load->view('admin/edit_subject', $data);
			
		}
		
	}
	public function edit_institution(){

		
		$data['title'] = 'Update Institution';
		$this->form_validation->set_rules('institution_name', 'Institution name ', 'required');
		$this->form_validation->set_rules('institution_code', 'Institution code ', 'required');
		
		if ($this->form_validation->run() === TRUE)
		{
			$institution_id = $this->input->post('institution_id');
			$institution_data['institution_code'] = $this->input->post('institution_code');
			$institution_data['institution_name'] = $this->input->post('institution_name');
			$status = $this->input->post('status');
			$institution_data['institution_status'] = ($status) ? 1:0;
			
						
			$this->adminmodel->update_institution($institution_data,$institution_id);
			$this->institutions();


		}
		else{
			
			$institution_id = $this->input->get('institution_id');
			$result = $this->adminmodel->get_institution_by_id($institution_id);
			$data['institution_data'] = $result; 
			$this->load->view('admin/edit_institute', $data);
			
		}
		
	}

	public function create_school(){

		
			
		$data['title'] = 'New School';
		$this->form_validation->set_rules('school_name', 'School name is required', 'required');
		$this->form_validation->set_rules('school_code', 'School code is required', 'required');
		
		if ($this->form_validation->run() === TRUE)
		{
			
			
			$school_data['school_code'] = $this->input->post('school_code');
			$school_data['school_name'] = $this->input->post('school_name');
			$school_data['school_state'] = $this->input->post('state');
			$school_data['school_institution'] = $this->input->post('institution');
			$school_data['school_district'] = $this->input->post('district');
			$school_data['school_address'] = $this->input->post('address');
			$school_data['school_phone'] = $this->input->post('contact_number');
			$school_data['school_principal'] = $this->input->post('principal_name');
			$school_data['school_status'] = 1;
			$classes = $this->input->post('classes');
			$sections = $this->input->post('sections');
					
			$this->adminmodel->create_school($school_data);
			
			$new_school_id = $this->db->insert_id();
			if($new_school_id){
				$this->mapClassesToSchool($new_school_id,$classes,$sections);
			}
			$this->schools();


		}
		else{
			$institution_list = $this->adminmodel->get_all_institutions();
			$state_list = $this->adminmodel->get_all_states();	
			$classes_list = $this->adminmodel->get_all_classes();
			$sections_list = $this->adminmodel->get_all_sections();		

			$data['institution_list'] = $institution_list;
			$data['state_list'] = $state_list;
			$data['classes_list'] = $classes_list;
			$data['sections_list'] = $sections_list;
			$this->load->view('admin/create_school', $data);
		}
        
	}
	public function create_question(){
		$data['title'] = 'New School';
		$this->form_validation->set_rules('topic', 'Topic code', 'required');
		//$this->form_validation->set_rules('school_code', 'School code is required', 'required');
		
			
		if ($this->form_validation->run() === TRUE)
		{
			
				
			$question_data['question'] = $this->input->post('question_text');
			$question_data['topic_id'] = $this->input->post('topic');
			$question_data['avg_time'] = $this->input->post('AvgTime');
			$question_data['difficulty_level'] = $this->input->post('difficulty_level');
			$question_data['question_status'] = 1;
			if (!empty($_FILES['question_image']['name'])) {

				$upload_config = $this->config->item('question_upload');
				$this->load->library('upload', $upload_config);	
				if ( ! $this->upload->do_upload('question_image'))
         		{
				 
					   $error = array('error' => $this->upload->display_errors());
					   
				}
				else{
					$question_image_data = $this->upload->data();
					$question_data['question_image'] = $question_image_data['orig_name'];
				}
			}
			$this->adminmodel->create_question($question_data);
			$new_question_id = $this->db->insert_id();
			if($new_question_id){
				$this->create_question_options($new_question_id);
			}
						
			$this->questions();


		}
		else{
			
			
			$topics_list = $this->adminmodel->get_all_topics();
			

			$data['topics_list'] = $topics_list;
			
			$this->load->view('admin/create_question', $data);
		}
		
	}
	public function edit_question(){
		$data['title'] = 'Update School';
		$this->form_validation->set_rules('topic', 'Topic code', 'required');
		//$this->form_validation->set_rules('school_code', 'School code is required', 'required');
		
			
		if ($this->form_validation->run() === TRUE)
		{
			
			$question_image = $this->input->post('hidden-question_image'); 
			$question_id = 	$this->input->post('question_id');
			$question_data['question'] = $this->input->post('question_text');
			$question_data['topic_id'] = $this->input->post('topic');
			$question_data['avg_time'] = $this->input->post('AvgTime');
			$question_data['difficulty_level'] = $this->input->post('difficulty_level');
			$question_data['question_status'] = 1;
			$question_data['question_image'] = $question_image;
			if(empty($question_image)){
			if (!empty($_FILES['question_image']['name'])) {
					
				$upload_config = $this->config->item('question_upload');
				$this->load->library('upload', $upload_config);	
				if ( ! $this->upload->do_upload('question_image'))
         		{
				 
					   $error = array('error' => $this->upload->display_errors());
					   
				}
				else{
					$question_image_data = $this->upload->data();
					$question_data['question_image'] = $question_image_data['orig_name'];
				}
			}

		 }
		 
			$result = $this->adminmodel->update_question($question_data,$question_id);
		
			if($result){
				$this->update_question_options($question_id);
			}
						
			$this->questions();


		}
		else{
			
			$question_id = $this->input->get('question_id');
			$data['topics_list'] = $this->adminmodel->get_all_topics();
			$data['question_data'] = $this->adminmodel->get_question_by_id($question_id);
			
			$this->load->view('admin/edit_question', $data);
		}
		
	}

	public function create_question_options($question_id){

			$options_count = $this->input->post('options_count');
			$choice_data['question_id'] = $question_id;
			for($i=1; $i<=$options_count; $i++){
				$current_text_option = 'option-'.$i.'-text';
				$current_image_option = 'option-'.$i.'-image';	
				$choice_data['choice_text'] = $this->input->post($current_text_option);
				$hidden_option_image = $this->input->post('hidden-'.$current_text_option);
				if(empty($hidden_option_image)){
				if (!empty($_FILES[$current_image_option]['name'])) {

					$upload_config = $this->config->item('question_upload');
					$this->load->library('upload', $upload_config);	
					if ( ! $this->upload->do_upload($current_image_option))
         			{
				 
				   		$error = array('error' => $this->upload->display_errors());
					}
					else{
						$option_image_data = $this->upload->data();
						$choice_data['choice_image'] = $option_image_data['orig_name'];
					}
				}
				}
				else{
					$choice_data['choice_image'] = $hidden_option_image;
				}

				$this->adminmodel->create_question_option($choice_data);
			    $created_choices[] = $this->db->insert_id(); 
			
			}
			$correct_option = $this->input->post('correct_option');
			$question_answer['question_id'] = $question_id;
			$question_answer['choice_id'] = $created_choices[$correct_option-1];
			$this->adminmodel->create_question_answer($question_answer);
	}
	public function map_question_options($choices_array){
		
		for($i=1; $i<=count($choices_array); $i++){
				$choice_id = $choices_array[$i-1]['choice_id'];				
				$current_text_option = 'option-'.$i.'-text';
				$current_image_option = 'option-'.$i.'-image';	
				$choice_data['choice_text'] = $this->input->post($current_text_option);
				$choice_data['choice_image']='';
				$hidden_option_image = $this->input->post('hidden-'.$current_text_option);
				if(empty($hidden_option_image)){
				if (!empty($_FILES[$current_image_option]['name'])) {

					$upload_config = $this->config->item('question_upload');
					$this->load->library('upload', $upload_config);	
					if ( ! $this->upload->do_upload($current_image_option))
         			{
				 
				   		$error = array('error' => $this->upload->display_errors());
					}
					else{
						$option_image_data = $this->upload->data();
						$choice_data['choice_image'] = $option_image_data['orig_name'];
					}
				}
				}
				else{
					$choice_data['choice_image'] = $hidden_option_image;
				}

				$this->adminmodel->update_question_option($choice_data,$choice_id);
			    $choices[] = $choice_id;
				
			
			}
			return $choices;	
	}
	public function update_question_options($question_id){
		
			$answer_id = $this->input->post('answer_id');
			$options_count = $this->input->post('options_count');
			$existing_choices = $this->adminmodel->get_question_choices_by_id($question_id);
			if($options_count == count($existing_choices)){ 
			
				$choice_id_array = $this->map_question_options($existing_choices);
				
			}
			else if($options_count > count($existing_choices)){ 
			
				$additional_options = $options_count - count($existing_choices);
			// A new choice is added.update the old choices and add the new choice
				$choice_id_array = $this->map_question_options($existing_choices);
			
			for($i=1; $i<=$additional_options; $i++){
						
				$current_text_option = 'option-'.(count($existing_choices)+1).'-text';
				$current_image_option = 'option-'.(count($existing_choices)+1).'-image';	
				$choice_data['choice_text'] = $this->input->post($current_text_option);
				if (!empty($_FILES[$current_image_option]['name'])) {

					$upload_config = $this->config->item('question_upload');
					$this->load->library('upload', $upload_config);	
					if ( ! $this->upload->do_upload($current_image_option))
         			{
				 
				   		$error = array('error' => $this->upload->display_errors());
					}
					else{
						$option_image_data = $this->upload->data();
						$choice_data['choice_image'] = $option_image_data['orig_name'];
					}
				}
				$choice_data['question_id'] = $question_id;
				$this->adminmodel->create_question_option($choice_data);
			    $choice_id_array[] =$this->db->insert_id(); 
			}
			
			}
			else if($options_count < count($existing_choices)){ 
			
				$reduced_options =   count($existing_choices) - $options_count;
		
				$choice_id_array = $this->map_question_options($existing_choices);
				
			for($i=count($existing_choices); $i>$options_count; $i--){
						
				$choice_id = $existing_choices[$i-1]['choice_id'];		
				$this->adminmodel->delete_question_option($choice_id);
			 
			}
			
			}
			
			$correct_option = $this->input->post('correct_option');
			$this->adminmodel->get_question_choices_by_id($question_id);
			$question_answer['question_id'] = $question_id;
			$question_answer['choice_id'] = $choice_id_array[$correct_option-1];
			$this->adminmodel->update_question_answer($question_answer,$answer_id);
	}
	
	public function view_institution(){
		
		
			$institution_id = $this->input->get('institution_id');
			$result = $this->adminmodel->get_institution_schools_by_id($institution_id);
			
			$data['institution_data'] = $result;
			$this->load->view('admin/view_institution', $data);
		
		
	}

	public function delete_institution(){
		$institution_id = $this->input->get('institution_id');
		$status = 0;
		$this->adminmodel->update_institution_status($institution_id,$status);
		$this->institutions();
		
	}
	public function delete_subject(){
		$subject_id = $this->input->get('subject_id');
		$status = 0;
		$this->adminmodel->update_subject_status($subject_id,$status);
		$this->subjects();
		
	}
	public function view_school(){
		
		
			$school_id = $this->input->get('school_id');
			$result = $this->adminmodel->get_school_by_id($school_id);
			$data['school_data'] = $result;
			$class_sections = array();
			foreach($result as $item){
				$class_sections[$item['class_name']] = array();
			}
			foreach($result as $class){

				if(array_key_exists($class['class_name'],$class_sections)){
					array_push($class_sections[$class['class_name']],$class['section_code']) ;	
				}
			}
				
			
			$data['class_sections'] = $class_sections;
			
			$this->load->view('admin/view_school', $data);
		
		
	}
	public function view_question(){
		
		
			$question_id = $this->input->get('question_id');
			$result = $this->adminmodel->get_question_by_id($question_id);
			$data['question_data'] = $result;
			
			
			$this->load->view('admin/view_question', $data);
		
		
	}
	public function view_subject(){
		
		
		$subject_id = $this->input->get('subject_id');
		$result = $this->adminmodel->get_subject_by_id($subject_id);
		$data['subject_data'] = $result;
		
		$this->load->view('admin/view_subject', $data);
	
	
}
public function view_topic(){
		
		
	$topic_id = $this->input->get('topic_id');
	$result = $this->adminmodel->get_topic_by_id($topic_id);
	$data['topic_data'] = $result;
	
	$this->load->view('admin/view_topic', $data);


}
	public function edit_school(){
		$this->form_validation->set_rules('school_name', 'School name is required', 'required');
		$this->form_validation->set_rules('school_code', 'School code is required', 'required');
		
		if ($this->form_validation->run() === TRUE)
		{
			
			$school_data['school_code'] = $this->input->post('school_code');
			$school_data['school_name'] = $this->input->post('school_name');
			$school_data['school_state'] = $this->input->post('state');
			$school_data['school_institution'] = $this->input->post('institution');
			$school_data['school_district'] = $this->input->post('district');
			$school_data['school_address'] = $this->input->post('address');
			$school_data['school_phone'] = $this->input->post('contact_number');
			$school_data['school_principal'] = $this->input->post('principal_name');
			$school_data['school_status'] = 1;
			$classes = $this->input->post('classes');
			$sections = $this->input->post('sections');
			$school_id = $this->input->post('school_id');		
			$this->adminmodel->update_school($school_data,$school_id);
			$this->update_classes_and_sections($school_id,$classes,$sections);
			
			$this->schools();


		}
		else{
		$school_id = $this->input->get('school_id');
		$result = $this->adminmodel->get_school_by_id($school_id);
		
		
		$school_state = $result[0]['state_id'];
		$state_districts = $this->adminmodel->get_districts_by_state_id($school_state);
			
		$data['school_data'] = $result;
		
		// echo "<pre>";
		// print_r($result);
		// die;
		$class_sections = array();
		foreach($result as $item){
			if($item['status']){
				$class_sections[$item['school_classes_class_id']] = array();
			}
		}
		foreach($result as $class){

			if(array_key_exists($class['class_id'],$class_sections)){
				array_push($class_sections[$class['class_id']],$class['section_id']) ;	
			}
		}
			$data['class_sections'] = $class_sections;
			$institution_list = $this->adminmodel->get_all_institutions();
			$state_list = $this->adminmodel->get_all_states();	
			$classes_list = $this->adminmodel->get_all_classes();
			$sections_list = $this->adminmodel->get_all_sections();		

			$data['institution_list'] = $institution_list;
			$data['state_list'] = $state_list;
			$data['classes_list'] = $classes_list;
			$data['sections_list'] = $sections_list;
			$data['state_districts'] = $state_districts;
			// echo "<pre>";
			// print_r($data['state_districts']);
			// die;
		
		$this->load->view('admin/edit_school', $data);
	}
		
	}
	
	public function delete_school(){
		$school_id = $this->input->get('school_id');
		$status = 0;
		$this->adminmodel->update_school_status($school_id,$status);
		$this->schools();
		
	}
	public function delete_topic(){
		$topic_id = $this->input->get('topic_id');
		$status = 0;
		$this->adminmodel->update_topic_status($topic_id,$status);
		$this->topics();
		
	}
	public function update_classes_and_sections($school_id,$classes_selected,$sections_selected){
		
		
			
			if(!empty($classes_selected)){
				//first deactivate all class sections of this school
				$this->adminmodel->deactivate_school_classes($school_id);
				
				
				
				foreach($sections_selected as  $section){
					
					foreach($section as $class => $sec){
						echo $class .'=>'.$sec;
					//check if the class is already  exist
					$result = $this->adminmodel->check_class_exist($school_id,$class,$sec);
					if(!empty($result)){
						
						$this->adminmodel->activate_school_classes($school_id,$class,$sec);
					}
					else{
						
						$data['school_classes_school_id']=$school_id;
						$data['school_classes_class_id']=$class;
						$data['school_classes_section_id']=$sec;
						$data['status']=1;
						$this->adminmodel->add_school_classes($data);
					}
					
					}
					
					
					
				}
			}
	}
	public function create_roles()
	{
		$this->data['title'] = 'Role Creation';
		$this->form_validation->set_rules('rolecode', 'Role code is required', 'required');
		$this->form_validation->set_rules('rolename', 'Role name is required', 'required');
		
		if ($this->form_validation->run() === TRUE)
		{
			$role_data['role_code'] = $this->input->post('rolecode');
			$role_data['role_name'] = $this->input->post('rolename');
						
			$this->adminmodel->create_role($role_data);
			


		}
		else{
			$this->load->view('roles/create', $this->data);
		}
		
		
	}
	
	public function renderRoleBasedFields(){

		$role_id = $this->input->get('role_id');
		if(!empty($role_id)){

			$role = $this->usermodel->get_role_by_id($role_id);
			$data['role_code'] = $role->role_code;
			if(in_array($role->role_code,array('teacher','student','parent'))){

				$institution_list = $this->adminmodel->get_all_institutions();
				$data['institutions'] = $institution_list;
			}
			$this->load->view('ajax_templates/role_based_fields', $data);
		}
	}

	public function getSchoolsByInsId(){
		
		$ins_id = $this->input->get('ins_id');
		if(!empty($ins_id)){

			$schools = $this->adminmodel->get_schools_by_institution_id($ins_id);
			echo json_encode($schools);
			exit;
			
		}
	
}
public function getSubjectsByClassId(){
		
	$class_id = $this->input->get('class_id');
	if(!empty($class_id)){

		$subjects = $this->adminmodel->get_subjects_by_class_id($class_id);
		echo json_encode($subjects);
		exit;
		
	}

}

public function getClassesBySchoolId(){
		
		$school_id = $this->input->get('school_id');
		if(!empty($school_id)){

			$classes = $this->adminmodel->get_classes_by_school_id($school_id);
			echo json_encode($classes);
			exit;
			
		}
	
}
public function getSectionsByClassId(){
		
		$class_id = $this->input->get('class_id');
		if(!empty($class_id)){

			$sections = $this->adminmodel->get_sections_by_class_id($class_id);
			echo json_encode($sections);
			exit;
			
		}
	
}




public function getDistrictsBystateId(){

	$state_id = $this->input->get('state_id');
	if(!empty($state_id)){

		$districts = $this->adminmodel->get_districts_by_state_id($state_id);
		echo json_encode($districts);
		exit;

	}
	
}

private function mapClassesToSchool($school_id,$classes,$sections){

		
			
		if(!empty($classes)){
			foreach($classes as $key => $class){
				$school_classes_data['school_classes_school_id'] = $school_id;
				$school_classes_data['school_classes_class_id'] = $class; 
				
				foreach($sections as $key => $section){

						echo $key.'=>'.$section;
						$class_section_array = explode('-',$section);
						if($class_section_array[0]==$class){

							$school_classes_data['school_classes_section_id']=!empty($class_section_array[1]) ? $class_section_array[1] : 1;
							$school_classes_data['status']=1;
							$this->adminmodel->map_school_classes($school_classes_data);
						}
						
					}
					
				

			}
		}
}

public function delete_user(){

	$user_id= $this->input->get('user_id');
	$user_data = $this->usermodel->delete_user($user_id);
	$this->users();
	
}

public function renderQuestionOptions(){

	$options_count = $this->input->get('options_count');
	if(!empty($options_count)){

		
		$data['options_count'] = $options_count;
		
		$this->load->view('ajax_templates/choice_options', $data);
	}
}

public function create_question_paper(){
		$data['title'] = 'New Question Paper';
		$this->form_validation->set_rules('question_paper_name', 'Question Paper Title', 'required');
		$this->form_validation->set_rules('question_paper_code', 'Question Paper Code', 'required');
		
			
		if ($this->form_validation->run() === TRUE)
		{
			
				
			$question_paper_data['question_paper_name'] = $this->input->post('question_paper_name');
			$question_paper_data['question_paper_code'] = $this->input->post('question_paper_code');
			$question_paper_data['question_paper_status'] = $this->input->post('question_paper_status');
			$question_data['difficulty_level'] = $this->input->post('difficulty_level');
			$question_data['question_status'] = 1;
			if (!empty($_FILES['question_image']['name'])) {

				$upload_config = $this->config->item('question_upload');
				$this->load->library('upload', $upload_config);	
				if ( ! $this->upload->do_upload('question_image'))
         		{
				 
					   $error = array('error' => $this->upload->display_errors());
					   
				}
				else{
					$question_image_data = $this->upload->data();
					$question_data['question_image'] = $question_image_data['orig_name'];
				}
			}
			$this->adminmodel->create_question($question_data);
			$new_question_id = $this->db->insert_id();
			if($new_question_id){
				$this->create_question_options($new_question_id);
			}
						
			$this->questions();


		}
		else{
			
			
			$topics_list = $this->adminmodel->get_all_topics();
			

			$data['topics_list'] = $topics_list;
			
			$this->load->view('admin/create_question', $data);
		}
		
	}


}
