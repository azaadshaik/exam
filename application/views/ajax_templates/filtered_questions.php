 <?php
 if(empty($filtered_questions)){
	 
	 echo '<div style="color:red;text-align:center;">No questions found. Please change the filters</div>';
	 exit;
 }
 ?>
 <div class="header">
 <span class="col-sm-1">No</span>
      <span class="col-sm-3">Question</span>
      <span class="col-sm-2">Class</span>
      <span class="col-sm-2">Subject</span>
      <span class="col-sm-2">Topic</span>
      <span class="col-sm-1">Time</span>
      <span class="col-sm-1">Level</span>
     
   </div>
   

 <?php 
    $i=1;
foreach($filtered_questions as $question) { ?>

    
   <div class="draggable-row" draggable="true" ondragstart="drag(event)" id="<?php echo $question['question_id'].'-'.$question['avg_time'];?>" >
     <span class="col-sm-1"><?php echo $i; ?></span>
      <span class="col-sm-3"><?php echo $question['question'];?></span>
      <span class="col-sm-2"><?php echo $question['class_name'];?></span>
      <span class="col-sm-2"><?php echo $question['subject_name'];?></span>
      <span class="col-sm-2"><?php echo $question['topic_name'];?></span>
      <span class="col-sm-1"><?php echo $question['avg_time'];?></span>
      <span class="col-sm-1"><?php echo $question['difficulty_level'];?></span>
     
   </div>
 <?php $i++; } ?>