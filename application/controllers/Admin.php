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
	
	public function create_institute(){

		$data['title'] = 'New Institution';
		$this->form_validation->set_rules('institution_name', 'Institutution name ', 'required');
		$this->form_validation->set_rules('institution_code', 'Institutution code ', 'required');
		
		if ($this->form_validation->run() === TRUE)
		{
			$institution_data['institution_code'] = $this->input->post('institution_code');
			$institution_data['institution_name'] = $this->input->post('institution_name');
			
						
			$this->adminmodel->create_institution($institution_data);
			


		}
		else{
			
			$this->load->view('admin/create_institute', $data);
			
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
public function getClassesBySchoolId(){
		
		$school_id = $this->input->get('school_id');
		if(!empty($school_id)){

			$classes = $this->adminmodel->get_classes_by_school_id($school_id);
			echo json_encode($classes);
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

}
