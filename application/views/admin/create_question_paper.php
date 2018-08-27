<!-- Create Institute starts here -->
<style>
#div1, #div2 {
    
    min-height:500px ;
    
    border: 1px solid black;
    overflow-y:scroll;
}
</style>
<h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Create Question paper</h2>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<form action="admin/create_question_paper" method="post"  id="questionPaperForm">
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
	<label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Exam</label>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 drop_down">
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
	</div>
</div>
<div class="validationError"><?php echo form_error('exam_id'); ?></div>

<div class="row" >
<div  class="col-sm-6"  ></div>  
<div  class="col-sm-6"  ><span>Added:</span> <span id="qcount">0</span>Question paper Duration:</span><span id="qtime">0</span><span>&nbsp;Min</span></div>
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
    <button class="signin-btn" onclick="submitForm('questionPaperForm','bla','question_papers_tab');" type="button">Submit</button>
</div>
</form>
</div>
                  
  <script>
  
 /* $( function() {
            $( ".draggable" ).draggable();
            $( ".droppable" ).droppable({
              drop: function( event, ui ) {
                $( this )
                  .addClass( "ui-state-highlight" )
                  .find( "p" )
                    .html( "Dropped!" );
              }
            });
          } );*/

          function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
    var numItems = $('#div2 > div').length;
    
    $('#qcount').html(numItems);
}

function drop(ev) {
    
  //  console.log(elem);
    ev.preventDefault();
    
    var data = ev.dataTransfer.getData("text");
    var current_time = $('#qtime').html();
    var idArray = data.split('-');
    var id = idArray[0];
    var time = (idArray[1]) /60;
    var newTime = Number(current_time) + Number(time);


    $('#qtime').html(newTime);
    
    ev.target.appendChild(document.getElementById(data));
}
document.addEventListener("dragend", function( event ) {
      // reset the transparency
      
     var numItems = $('#div2 > div').length;
     


    
    $('#qcount').html(numItems);
      
  }, false);
  </script>                