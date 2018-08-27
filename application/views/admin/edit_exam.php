<!-- Create Institute starts here -->

<h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Create Exam</h2>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<form action="admin/edit_exam" method="post"  id="examForm">
<input type="hidden" name="exam_id" value="<?php echo set_value('exam_id',@$exam_data->exam_id);?>"  >

<div class="adm_inputs_wrap">
    <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Exam Name</label>
    <input class="col-lg-6 col-md-6 col-sm-12 col-xs-12 <?php echo form_error('exam_name') ? 'error':'';?> " value="<?php echo set_value('exam_name',@$exam_data->exam_name);?>" type="text"  placeholder="Exam Name" id="examName" name="exam_name">
    
</div>
<div class="validationError"><?php echo form_error('exam_name'); ?></div>

<div class="adm_inputs_wrap">
    <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Exam Code</label>
    
    <input class="col-lg-6 col-md-6 col-sm-12 col-xs-12  <?php echo form_error('exam_code') ? 'error':'';?>" value="<?php echo set_value('exam_code',@$exam_data->exam_code);?>" type="text"  placeholder="Exam Code" id="examCode" name="exam_code" >
    
</div>
<div class="validationError"><?php echo form_error('exam_code'); ?></div>

<div class="adm_inputs_wrap">
    <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Exam Date Time</label>
    
    <input class="col-lg-6 col-md-6 col-sm-12 col-xs-12  <?php echo form_error('exam_datetime') ? 'error':'';?>"  value="<?php echo set_value('exam_datetime',@$exam_data->exam_datetime);?>" type="text"  placeholder="Date Time" id="examDatetime" name="exam_datetime" >
    
</div>
<div class="validationError"><?php echo form_error('exam_datetime'); ?></div>

<div class="adm_inputs_wrap">
    <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Exam Duration</label>
    
    <input class="col-lg-6 col-md-6 col-sm-12 col-xs-12  <?php echo form_error('exam_duration') ? 'error':'';?>" value="<?php echo set_value('exam_duration',@$exam_data->exam_duration);?>" type="text"  placeholder="Exam Duration in Min" id="examDuration" name="exam_duration" >
    
</div>
<div class="validationError"><?php echo form_error('exam_duration'); ?></div>

<div class="adm_inputs_wrap">
    <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Exam Marks</label>
    
    <input class="col-lg-6 col-md-6 col-sm-12 col-xs-12  <?php echo form_error('exam_marks') ? 'error':'';?>" value="<?php echo set_value('exam_marks',@$exam_data->exam_marks);?>" type="text"  placeholder="Exam Marks" id="examMarks" name="exam_marks" >
    
</div>
<div class="validationError"><?php echo form_error('exam_marks'); ?></div>
<div class="adm_inputs_wrap adm_checkbox">
    <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Status </label>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 drop_down">
            <span><label class="checkbox-inline"><input type="checkbox" name="status" <?php echo set_value('status',@$exam_data->exam_status) ? 'checked="checked"' : '';?>   ></span>
        </div>  
                                
 </div>

<div class="col-md-12">
    <button class="signin-btn" onclick="submitForm('examForm','bla','exams_tab');" type="button">Submit</button>
</div>
</form>
</div>
                  