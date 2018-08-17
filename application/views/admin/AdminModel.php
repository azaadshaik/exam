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
        $this->db->order_by("institution_name", "asc");
        $result = $this->db->get()->result_array();
        return $result;
    }
    public function get_all_schools(){

        $this->db->select('schools.school_name,schools.school_id,schools.school_code,institution.institution_name');
        $this->db->from('schools');
        $this->db->join('institution','schools.school_institution = institution.institution_id');
        $this->db->order_by("school_name", "asc");
        $result = $this->db->get()->result_array();
        return $result;
    }
    public function get_school_by_id($school_id){

        $this->db->select('*');
        $this->db->from('schools');
        $this->db->join('institution','schools.school_institution = institution.institution_id');
        $this->db->join('school_classes','school_classes.school_classes_school_id = schools.school_id');
        $this->db->join('classes','classes.class_id = school_classes.school_classes_class_id');
        $this->db->join('class_sections','class_sections.class_sections_school_classes_id = school_classes.school_classes_id');
        $this->db->join('sections','sections.section_id = class_sections.class_sections_section_id');
        $this->db->where('schools.school_id='.$school_id);

        $result = $this->db->get()->result_array();
        echo $this->db->last_query();
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
    public function create_school($school_data){

        
        $result= $this->db->insert('schools', $school_data);
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
        $this->db->select('school_id','school_name');
        $this->db->from('schools');
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
   
}