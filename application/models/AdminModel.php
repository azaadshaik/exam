<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class AdminModel extends CI_Model
{
	

	
    
    public function create_role($role_data){

        
        $result= $this->db->insert('roles', $role_data);
        return $result;
           

       
    }

    public function get_all_institutions(){

        $this->db->select('*');
        $this->db->from('institution');
		$this->db->where('institution_status=1');
        $this->db->order_by("institution_name", "asc");
		$result = $this->db->get()->result_array();
        return $result;
    }
    public function get_all_schools(){

        $this->db->select('schools.school_name,schools.school_id,schools.school_code,schools.school_status,institution.institution_name');
        $this->db->from('schools');
        $this->db->join('institution','schools.school_institution = institution.institution_id');
		$this->db->where('school_status=1');
        $this->db->order_by("school_name", "asc");
		
        $result = $this->db->get()->result_array();
        return $result;
    }
    public function get_all_subjects(){
        $this->db->select('subjects.subject_name,subjects.subject_id,subjects.subject_code,subjects.subject_status,classes.class_name,classes.class_id');
        $this->db->from('subjects');
        $this->db->join('classes','subjects.subject_class_id = classes.class_id');
		$this->db->where('subject_status=1');
        $this->db->order_by("subject_id", "desc");
        
        $result = $this->db->get()->result_array();
        
        return $result;
    }
    public function get_all_topics(){
        $this->db->select('topics.topic_name,topics.topic_id,topics.topic_code,topics.topic_status,classes.class_name,classes.class_id,subjects.subject_name,subjects.subject_id');
        $this->db->from('topics');
        $this->db->join('classes','classes.class_id = topics.topic_class_id');
        $this->db->join('subjects','subjects.subject_id = topics.topic_subject_id');
		$this->db->where('topic_status=1');
        $this->db->order_by("topic_id", "desc");
        $result = $this->db->get()->result_array();
        
        return $result;
    }
    public function get_subject_by_id($subject_id){
        $this->db->select('subjects.subject_name,subjects.subject_id,subjects.subject_code,subjects.subject_status,subjects.subject_class_id,classes.class_name,classes.class_id');
        $this->db->from('subjects');
        $this->db->join('classes','subjects.subject_class_id = classes.class_id');
        $this->db->where('subjects.subject_id ='.$subject_id);
        $result = $this->db->get()->row();
        return $result;
		}
    public function get_school_by_id($school_id){

        $this->db->select('*');
        $this->db->from('schools');
        $this->db->join('institution','schools.school_institution = institution.institution_id');
        $this->db->join('states','schools.school_state = states.state_id');
        $this->db->join('districts','schools.school_district = districts.district_id');
        $this->db->join('school_classes','school_classes.school_classes_school_id = schools.school_id','left');
        $this->db->join('classes','classes.class_id = school_classes.school_classes_class_id','left');
        $this->db->join('sections','sections.section_id = school_classes.school_classes_section_id','left');
        $this->db->where('schools.school_id='.$school_id.' and school_classes.status=1');

        $result = $this->db->get()->result_array();
        //echo $this->db->last_query();
        return $result;
    }

    public function get_all_states(){

        $this->db->select('*');
        $this->db->from('states');
        $this->db->order_by("state_name", "asc");
        $result = $this->db->get()->result_array();
        return $result;
    }
    public function get_all_classes(){

        $this->db->select('*');
        $this->db->from('classes');
        $result = $this->db->get()->result_array();
        return $result;
    }
    public function get_all_sections(){

        $this->db->select('*');
        $this->db->from('sections');
        $result = $this->db->get()->result_array();
        return $result;
    }
    


    public function create_institution($institution_data){

        
        $result= $this->db->insert('institution', $institution_data);
        return $result;
           

       
    }
    public function create_subject($subject_data){

        
        $result= $this->db->insert('subjects', $subject_data);
        return $result;
           

       
    }
	public function get_institution_by_id($institution_id){
		$where ='institution_id='.$institution_id;
        $this->db->select('*');
        $this->db->from('institution');
		$this->db->where($where);
        $result = $this->db->get()->row();
        return $result;
    }
    public function get_topic_by_id($topic_id){
		$where ='topic_id='.$topic_id;
        $this->db->select('*');
        $this->db->from('topics');
        $this->db->join('classes','classes.class_id=topics.topic_class_id');
        $this->db->join('subjects','subjects.subject_id=topics.topic_subject_id');
		$this->db->where($where);
        $result = $this->db->get()->row();
        return $result;
    }
    
	public function get_institution_schools_by_id($institution_id){
		$where ='institution_id='.$institution_id;
        $this->db->select('*');
        $this->db->from('institution');
		$this->db->join('schools','institution.institution_id=schools.school_institution','left');
		$this->db->where($where);
        $result = $this->db->get()->result_array();
        return $result;
    }
    
    public function get_subjects_by_class_id($class_id){
		$where ='subjects.subject_class_id='.$class_id.' and subjects.subject_status=1';
        $this->db->select('subjects.subject_id,subjects.subject_name');
        $this->db->from('subjects');
		$this->db->join('classes','subjects.subject_class_id=classes.class_id');
		$this->db->where($where);
        $result = $this->db->get()->result_array();
        return $result;
	}
    public function create_school($school_data){

        
        $result= $this->db->insert('schools', $school_data);
        return $result;
           

       
    }
    public function create_topic($topic_data){

        
        $result= $this->db->insert('topics', $topic_data);
        return $result;
           

       
    }
	 public function update_school($school_data,$school_id){
       
        $result= $this->db->update('schools', $school_data, "school_id = $school_id");
        return $result;
  
    }
    public function update_topic($topic_data,$topic_id){
       
        $result= $this->db->update('topics', $topic_data, "topic_id = $topic_id");
        return $result;
  
    }
    public function update_subject($subject_data,$subject_id){
       
        $result= $this->db->update('subjects', $subject_data, "subject_id = $subject_id");
        return $result;
  
    }
	 public function update_institution($institution_data,$institution_id){
       
        $result= $this->db->update('institution', $institution_data, "institution_id = $institution_id");
        return $result;
  
    }
	public function update_institution_status($institution_id,$status){
		 $result= $this->db->update('institution', array('institution_status'=>$status), "institution_id = $institution_id");
        return $result;
    }
    public function update_subject_status($subject_id,$status){
        $result= $this->db->update('subjects', array('subject_status'=>$status), "subject_id = $subject_id");
       return $result;
   }
   public function update_topic_status($topic_id,$status){
    $result= $this->db->update('topics', array('topic_status'=>$status), "topic_id = $topic_id");
   return $result;
}
	public function update_school_status($school_id,$status){
		
		 $result= $this->db->update('schools', array('school_status'=>$status), "school_id = $school_id");
        return $result;
	}
	
    // public function get_role_by_role_id($role_id){

    //     $this->db->select('*');
    //     $this->db->from('roles');
    //     $this->db->where()
    //     $result = $this->db->get()->result_array();
    //     return $result;
    // }

    public function get_schools_by_institution_id($ins_id){
        $where ='school_institution='.$ins_id.' and school_status=1';
        $this->db->select('school_id,school_name');
        $this->db->from('schools');
        $this->db->where($where);
        $result = $this->db->get()->result_array();
        return $result;
    }
	 public function get_classes_by_school_id($school_id){
        $where ='school_classes_school_id='.$school_id.' and status=1';
		$this->db->distinct('school_classes.school_classes_class_id');
        $this->db->select('class_name,class_id');
		$this->db->from('school_classes');
		$this->db->join('classes','school_classes.school_classes_class_id=classes.class_id');
        $this->db->where($where);
        $result = $this->db->get()->result_array();
        return $result;
    }
	 public function get_sections_by_class_id($class_id){
        $where ='school_classes_class_id='.$class_id.' and status=1';
		$this->db->distinct('school_classes.school_classes_section_id');
        $this->db->select('section_name,section_id');
		$this->db->from('school_classes');
		$this->db->join('sections','school_classes.school_classes_section_id=sections.section_id');
        $this->db->where($where);
        $result = $this->db->get()->result_array();
        return $result;
    }
	
	
    public function get_districts_by_state_id($state_id){
        $where ='district_state_id='.$state_id.' and district_status=1';
        $this->db->select('*');
        $this->db->from('districts');
        $this->db->where($where);
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function map_school_classes($data){
        $result= $this->db->insert('school_classes', $data);
        return $result;
    }
    public function map_school_classes_sections($data){
        $result= $this->db->insert('class_sections', $data);
        return $result;
    }
	
	public function get_all_clasess_by_school_id($school_id){
		
		$where = 'school_classes_school_id='.$school_id;
		$this->db->select('*');
		$this->db->from('school_classes');
		$this->db->where($where);
		$result = $this->db->get()->result_array();
        return $result;
		
		
	}
	public function check_class_exist($school_id,$class_id,$section_id=''){
		
		$where = "school_classes_school_id=$school_id and school_classes_class_id=$class_id";
		if($section_id){
			$where.=" and school_classes_section_id=$section_id";
		}
		$this->db->select('*');
		$this->db->from('school_classes');
		$this->db->where($where);
		$result = $this->db->get()->result_array();
        return $result;
		
	}
	
	public function deactivate_school_classes($school_id){
		 $result= $this->db->update('school_classes', array('status'=>0), "school_classes_school_id = $school_id");
        return $result;
	}
	
	public function add_school_classes($data){
		 $result= $this->db->insert('school_classes', $data);
         return $result;
	}
	public function activate_school_classes($school_id,$class_id,$section_id){
		$sql = "update school_classes set status=1 WHERE school_classes_school_id = ? AND school_classes_class_id = ? AND school_classes_section_id = ?";
		$result = $this->db->query($sql, array($school_id, $class_id, $section_id));
		return $result;
    }
    
    
   
}