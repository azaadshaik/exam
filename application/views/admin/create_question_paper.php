
<h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Create Question paper</h2>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<form action="admin/create_question_paper" method="post"  id="questionPaperForm">
<div id="hidden_elements">

</div>
<div class="adm_inputs_wrap">
    <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Question Paper Name</label>
    <input class="col-lg-6 col-md-6 col-sm-12 col-xs-12 <?php echo form_error('question_paper_name') ? 'error':'';?> " value="<?php echo set_value('question_paper_name');?>" type="text"  placeholder="Question Paper Name" id="questionPaperName" name="question_paper_name">
    
</div>
<div class="validationError"><?php echo form_error('question_paper_name'); ?></div>

<div class="adm_inputs_wrap">
    <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Question Paper Code</label>
    
    <input class="col-lg-6 col-md-6 col-sm-12 col-xs-12  <?php echo form_error('question_paper_code') ? 'error':'';?>" value="<?php echo set_value('question_paper_code');?>" type="text"  placeholder="Question Paper Code" id="questionPaperCode" name="question_paper_code" >
    
</div>
<div class="validationError"><?php echo form_error('question_paper_code'); ?></div>

<div class="adm_inputs_wrap">
	<label class="col-lg-3 col-md-3 col-sm-12 col-xs-12 drop_down">Exam</label>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
	<div class="form-group">
	<select class="dropdown form-control" id="exam_id" name="exam_id" >
	<option value="">Select </option>
	<?php
	foreach($exam_list as $exam){

	echo "<option value='".$exam['exam_id']."'>".$exam['exam_name']."</option>" ;
	}
	?>

	</select>
	</div>
	<div class="validationError"><?php echo form_error('exam_id'); ?></div>

	</div>
</div>

<div class="row" >
<div  class="col-sm-6" id="drag-drop-filters" >
<!--FIlters comes here -->
			<div class="user-list-header">
                        <div class="adm_inputs_wrap">
						
                           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 drop_down">
                             
                              <div class="form-group">
                                 <select class="dropdown form-control" onchange="loadSubjects(this.value);" id="class">
                                    <option value="0">Class</option>
									<?php
                                  foreach($classes_list as $class){
									  ?>
									  <option value="<?php echo $class['class_id'];?>"><?php echo $class['class_name'];?></option>
									  <?php
								  }
								  ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 drop_down">
                             
                              <div class="form-group">
                                 <select class="dropdown form-control" id="subject" onchange="loadTopics(this.value);">
                                    <option value="0">Subject</option>
                                   
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 drop_down">
                            
                              <div class="form-group">
                                 <select class="dropdown form-control" id="topic">
                                    <option value="0">Topic</option>
                                  </select>
                              </div>
                           </div>
                           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 drop_down">
                       
                              <select class="dropdown form-control" id="level">
							  
							   <option value="0">Level</option>
                                 <option value="1">1</option>
                                 <option value="2">2</option>
								  <option value="3">3</option>
								   <option value="4">4</option>
								    <option value="5">5</option>
                              </select>
                           </div>
                           
                           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 drop_down">
                              <button class="apply-btn" type="button" onclick="updateQuestions();">Apply</button>
                           </div>
						  
                        </div>
                     </div>
					 <!-- filters ends here -->

</div>  
<div  class="col-sm-6"  ><span>Questions:</span> <span id="qcount">0</span> Duration:</span><span id="qtime">0</span><span>&nbsp;Min</span></div>
</div>
 <div class="row" >

 
 <div id="div1" class="col-sm-6" ondrop="drop(event)" ondragover="allowDrop(event)">
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
foreach($question_list as $question) { ?>

    
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
  
</div>

<div id="div2" class="col-sm-6" ondrop="drop(event,this)" ondragover="allowDrop(event)"></div>



            <!--Rendering div -->

</div






<div class="col-md-12">
    <button class="signin-btn" onclick="validateQuestionPaperForm();" type="button">Submit</button>
</div>
</form>
</div>
                  
<script>
 function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
    var numItems = $('#div2 > div').length;
    
    $('#qcount').html(numItems);
}

function drop(ev) {
    
 
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
}
document.addEventListener("dragend", function( event ) {
      // reset the transparency
   
	 var time =0;
     var numItems = $('#div2 > div').length;
	 $("#hidden_elements").empty();
    $('#div2 > div').each(function(){
	var idArray = (this.id).split('-');
    time = Number(time)+Number(idArray[1]) ;
	
	
	  var element = document.createElement("Input");
        element.setAttribute("type", "hidden");
        element.setAttribute("value", idArray[0]);
        element.setAttribute("name", "questions_added[]");
	var divElement = document.getElementById('hidden_elements');
	divElement.appendChild(element);
	});
	var timeInMin = time /60;
    $('#qcount').html(numItems);
	$('#qtime').html(timeInMin);
      
  }, false);
  </script>                