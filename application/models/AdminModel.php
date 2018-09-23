<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class AdminModel extends CI_Model
{
	

	
    
    public function create_role($role_data){

        
        $result= $this->db->insert('roles', $role_data);
        return $result;
           

       
    }
    public function get_all_roles(){

        $this->db->select('*');
        $this->db->from('roles');
		$result = $this->db->get()->result_array();
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
    public function get_all_questions(){
        $this->db->select('question_bank.*,topics.topic_id,topics.topic_code,topics.topic_name,classes.class_name,classes.class_id,subjects.subject_name,subjects.subject_id');
        $this->db->from('question_bank');
        $this->db->join('topics','topics.topic_id = question_bank.topic_id');
        $this->db->join('subjects','subjects.subject_id = topics.topic_subject_id');
        $this->db->join('classes','classes.class_id = topics.topic_class_id');
		$this->db->where('question_status=1');
        $this->db->order_by("question_id", "desc");
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
    public function get_all_question_papers(){
        $this->db->select('question_paper.*,exams.exam_name');
        $this->db->from('question_paper');
        $this->db->join('exams','question_paper.exam_id = exams.exam_id');
        $this->db->order_by("question_paper_id", "desc");
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
	public function get_topics_by_subject_id($subject_id){
		$where ='topics.topic_subject_id='.$subject_id.' and topics.topic_status=1';
        $this->db->select('topics.topic_id,topics.topic_name');
        $this->db->from('topics');
		$this->db->join('subjects','topics.topic_subject_id=subjects.subject_id');
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
    public function create_exam($exam_data){

        
        $result= $this->db->insert('exams', $exam_data);
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
	 public function update_question_option($options_data,$choice_id){
       
        $result= $this->db->update('question_choices', $options_data, "choice_id = $choice_id");
        return $result;
  
    }
	public function update_question_answer($answer_data,$answer_id){
       
        $result= $this->db->update('question_answers', $answer_data, "answer_id = $answer_id");
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
   public function delete_question_option($choice_id){
	   $result = $this->db->delete('question_choices', array('choice_id' => $choice_id));
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

    public function create_question($question_data){
        
        $result= $this->db->insert('question_bank', $question_data);
        return $result;
    }
	 public function update_question($question_data,$question_id){
       
        $result= $this->db->update('question_bank', $question_data, "question_id = $question_id");
        return $result;
  
    }
    public function create_question_option($option_data){

        $result= $this->db->insert('question_choices', $option_data);
        return $result;
       
    }
    public function create_question_answer($question_answer){
        
        $result= $this->db->insert('question_answers', $question_answer);
        return $result;
       
    }
    public function get_question_by_id($question_id){

        
            $where ='question_bank.question_id='.$question_id.' and question_bank.question_status=1';
            $this->db->select('question_bank.*,question_choices.choice_id,choice_text,choice_image,question_answers.answer_id,question_answers.answer_id as selected_choice,topics.topic_name,topics.topic_code');
            $this->db->from('question_bank');
			$this->db->join('topics','question_bank.topic_id=topics.topic_id');
            $this->db->join('question_choices','question_choices.question_id=question_bank.question_id');
            $this->db->join('question_answers','question_answers.choice_id=question_choices.choice_id','left');
            $this->db->where($where);
            $this->db->order_by('question_choices.choice_id','asc');
            $result = $this->db->get()->result_array();
            return $result;
        

    }
	public function get_question_choices_by_id($question_id){

        
            $where ='question_choices.question_id='.$question_id ;
            $this->db->select('question_choices.*','question_answers.*');
            $this->db->from('question_choices');
            $this->db->join('question_answers','question_answers.choice_id=question_choices.choice_id','left');
            $this->db->where($where);
            $this->db->order_by('question_choices.choice_id','asc');
            $result = $this->db->get()->result_array();
            echo $this->db->last_query();
            return $result;
        

    }

    public function get_all_exams(){

        $this->db->select('*');
        $this->db->from('exams');
		$this->db->order_by("exam_id", "desc");
		$result = $this->db->get()->result_array();
        return $result;
    }
    public function get_exam_by_id($exam_id){
		$where ='exam_id='.$exam_id;
        $this->db->select('*');
        $this->db->from('exams');
		$this->db->where($where);
        $result = $this->db->get()->row();
        return $result;
    }

    public function update_exam($exam_data,$exam_id){
       
        $result= $this->db->update('exams', $exam_data, "exam_id = $exam_id");
        return $result;
  
    }
    public function update_exam_status($exam_id,$status){
        $result= $this->db->update('exams', array('exam_status'=>$status), "exam_id = $exam_id");
       return $result;
    }
    
	public function create_question_paper($question_paper_data){
        
        $result= $this->db->insert('question_paper', $question_paper_data);
        return $result;
    }
	
	public function getFilteredQuestions(array $filters){
        
          $where ='question_bank.question_status=1';
		  if(isset($filters['class_id']) && !empty($filters['class_id'] )){
			  $where.=" and classes.class_id=".$filters['class_id'];
		  }
		   if(isset($filters['subject_id'])  && !empty($filters['subject_id'])){
			  $where.=" and subjects.subject_id=".$filters['subject_id'];
		  }
		   if(isset($filters['topic_id'])  && !empty($filters['topic_id'])){
			  $where.=" and topics.topic_id=".$filters['topic_id'];
		  }
		   if(isset($filters['level'])  && !empty($filters['level'])){
			  $where.=" and question_bank.difficulty_level=".$filters['level'];
		  }
            $this->db->select('question_bank.*,topics.topic_name,topics.topic_code,classes.class_name,subjects.subject_name');
            $this->db->from('question_bank');
			$this->db->join('topics','question_bank.topic_id=topics.topic_id');
            $this->db->join('subjects','subjects.subject_id=topics.topic_subject_id');
            $this->db->join('classes','classes.class_id=subjects.subject_class_id');
            $this->db->where($where);
            $this->db->order_by('question_bank.question_id','desc');
            $result = $this->db->get()->result_array();
		    return $result;
    }

    public function get_question_paper_by_id($question_paper_id){
		$where ='question_paper_id='.$question_paper_id;
        $this->db->select('question_paper.*,exams.exam_name,exams.exam_code');
        $this->db->join('exams','question_paper.exam_id=exams.exam_id');
        $this->db->from('question_paper');
		$this->db->where($where);
        $result = $this->db->get()->row();
        return $result;
    }
    
	public function get_questions_by_question_ids($question_id_array){
        $this->db->select('question_bank.*,topics.topic_id,topics.topic_code,topics.topic_name,classes.class_name,classes.class_id,subjects.subject_name,subjects.subject_id');
        $this->db->from('question_bank');
        $this->db->join('topics','topics.topic_id = question_bank.topic_id');
        $this->db->join('subjects','subjects.subject_id = topics.topic_subject_id');
        $this->db->join('classes','classes.class_id = topics.topic_class_id');
        $this->db->where_in('question_id', $question_id_array);
        $this->db->where('question_status=1');
        $result = $this->db->get()->result_array();
               
        return $result;
    }
    
	public function update_question_paper($question_paper_data,$question_paper_id){
       
        $result= $this->db->update('question_paper', $question_paper_data, "question_paper_id = $question_paper_id");
        return $result;
  
    }

    public function delete_question_paper($question_paper_id){
        $result = $this->db->delete('question_paper', array('question_paper_id' => $question_paper_id));
        return $result;
    }

    public function update_question_paper_status($question_paper_id,$status){
        
        $result= $this->db->update('question_paper', array('question_paper_status'=>$status), "question_paper_id = $question_paper_id");
       return $result;
   }
   public function get_active_exams(){

        $this->db->select('*');
        $this->db->from('exams');
		$this->db->where('exam_status=1');
        $result = $this->db->get()->result_array();
        return $result;
    }
	
	
    public function get_all_students_by_class_id($class_id){

        $this->db->select('user');
        $this->db->from('user_class');
		$this->db->where("class=$class_id");
        $result = $this->db->get()->result_array();
        return $result;
    }
	
	public function create_enrollment($enrollment_data){
	
		$result= $this->db->insert('exam_enrollment', $enrollment_data);
        return $result;
	}
    
	
	public function get_all_enrollments(){
	
		$this->db->select('exams.exam_name,exams.exam_id,exams.exam_datetime,exam_enrollment.exam_enrollment_id,exam_enrollment.students');
        $this->db->from('exam_enrollment');
        $this->db->join('exams','exams.exam_id = exam_enrollment.exam_id');
		$this->db->order_by("exam_enrollment.exam_enrollment_id", "desc");
		$result = $this->db->get()->result_array();
        return $result;
	}

	public function get_enrollment_by_id($enrollment_id){
		$where ='exam_enrollment_id='.$enrollment_id;
        $this->db->select('exam_enrollment.*,exams.exam_name,exams.exam_code,exams.exam_datetime');
		$this->db->from('exam_enrollment');
        $this->db->join('exams','exams.exam_id = exam_enrollment.exam_id');
		$this->db->where($where);
        $result = $this->db->get()->row();
        return $result;
    }
	
	public function get_student_data_by_student_ids($student_id_array){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('user_class', 'users.user_id = user_class.user','left');
        $this->db->join('institution', 'institution.institution_id = user_class.institution','left');
        $this->db->join('schools', 'schools.school_id = user_class.school','left');
        $this->db->join('classes', 'classes.class_id = user_class.class','left');
        $this->db->join('sections', 'sections.section_id = user_class.section','left');
        $this->db->where_in('users.user_id', $student_id_array);
        
        $result = $this->db->get()->result_array();
               
        return $result;
    }
	public function get_all_enrolled_exams_by_class($class_id){
		$where ='class_id='.$class_id;
		$this->db->select('exams.exam_name,exams.exam_id,exams.exam_datetime,exams.exam_duration,exam_enrollment.exam_enrollment_id,exam_enrollment.students');
        $this->db->from('exam_enrollment');
        $this->db->join('exams','exams.exam_id = exam_enrollment.exam_id');
		$this->db->order_by("exam_enrollment.exam_enrollment_id", "desc");
		$result = $this->db->get()->result_array();
        return $result;
	
	}
	
		
    
   
}
