<!-- Create Institute starts here -->

<h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Create Institute</h2>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<form action="admin/create_institute" method="post"  id="insForm">
<div class="adm_inputs_wrap">
    <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Institution Name</label>
    <input class="col-lg-6 col-md-6 col-sm-12 col-xs-12 <?php echo form_error('institution_name') ? 'error':'';?> " type="text"  placeholder="Institution Name" id="institutionName" name="institution_name">
    
</div>
<div class="validationError"><?php echo form_error('institution_name'); ?></div>
<div class="adm_inputs_wrap">
    <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Institution Code</label>
    
    <input class="col-lg-6 col-md-6 col-sm-12 col-xs-12  <?php echo form_error('institution_code') ? 'error':'';?>" type="text"  placeholder="Institution Code" id="InstitutionCode" name="institution_code" >
    
</div>
<div class="validationError"><?php echo form_error('institution_code'); ?></div>

<div class="col-md-12">
    <button class="signin-btn" onclick="submitForm('insForm','admin/institutions','institutions_tab');" type="button">Submit</button>
</div>
</form>
</div>
                  