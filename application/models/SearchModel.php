<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class SearchModel extends CI_Model
{
	

	
    
   public function search_by_single_field($search,$table,$fields,$join_table='',$join_on=''){
	    $this->db->like($fields[0], $search);
		if(count($fields) > 1){
		 for($i=1;$i<count($fields);$i++){
			$this->db->or_like($fields[$i], $search);
         }	
		}
		if($join_table){
			$this->db->join($join_table,$join_on);
		}
        $query = $this->db->get($table);
		//echo $this->db->last_query();
        return $query->result();
   }

	public function filter_users($filterData){
	    $where='user_status in (0,1)';
		$this->db->select('*');
        $this->db->from('users'); 
		
		$this->db->join('roles','roles.role_id = users.user_role');
		
		if(!empty($filterData['role'])){
			
			$where.=" and users.user_role=".$filterData['role'];
					
		}
		else{
		$this->db->join('user_class','users.user_id = user_class.user');	
			if(!empty($filterData['institution'])){
			
			$where.=" and user_class.institution=".$filterData['institution'];	
		}
		if(!empty($filterData['school'])){
			
			$where.=" and user_class.school=".$filterData['school'];	
		}
		if(!empty($filterData['class'])){
			
			$where.=" and user_class.class=".$filterData['class'];	
		}
		}
		$this->db->where($where); 
		$result = $this->db->get()->result_array();
		return $result;
        
   }
   
   public function filter_questions($filterData){
   
   $where='question_status in (0,1)';
		$this->db->select('question_bank.*,topics.topic_id,topics.topic_code,topics.topic_name,classes.class_name,classes.class_id,subjects.subject_name,subjects.subject_id');
        $this->db->from('question_bank'); 
		$this->db->join('topics','topics.topic_id = question_bank.topic_id');
        $this->db->join('subjects','subjects.subject_id = topics.topic_subject_id');
        $this->db->join('classes','classes.class_id = topics.topic_class_id');
			
		if(!empty($filterData['subjectId'])){
			
			$where.=" and subjects.subject_id=".$filterData['subjectId'];	
		}
		if(!empty($filterData['classId'])){
			
			$where.=" and classes.class_id=".$filterData['classId'];	
		}
		if(!empty($filterData['topicId'])){
			
			$where.=" and topics.topic_id=".$filterData['topicId'];	
		}
		if(!empty($filterData['diffLevel'])){
			
			$where.=" and question_bank.difficulty_level=".$filterData['diffLevel'];	
		}
		if(!empty($filterData['avgTime'])){
			
			$where.=" and question_bank.avg_time=".$filterData['avgTime'];	
		}
		
		$this->db->where($where); 
		$result = $this->db->get()->result_array();
		return $result;
   
   }
    
    
    
   
}