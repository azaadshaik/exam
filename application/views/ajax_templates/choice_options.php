<?php 

for($i=1;$i<=$options_count;$i++){
?>
<div class="custom-file-upload options-wrap">
                        <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Option-<?php echo $i;?></label>
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 padding0">
							<img id="option-<?php echo $i;?>-imageBox" src="#" class="hide"  />
                           <label for="option-<?php echo $i;?>-image" class="custom-file-upload-label">
                           <i class="fa fa-cloud-upload"></i> Upload Image
                           </label>
                           <input type="file" onchange="renderOptionImage(this,'<?php echo 'option-'.$i.'-imageBox';?>');" id="option-<?php echo $i;?>-image" name="option-<?php echo $i;?>-image" >
                        </div>
                        <span class="seperator"></span>
						<textarea rows="1" placeholder="Option <?php echo $i;?>  Text" id="option-<?php echo $i;?>-text" name="option-<?php echo $i;?>-text" cols="12" class="col-lg-6 col-md-6 col-sm-12 col-xs-12"></textarea>
                        
                     </div>
<?php
}
?>
<div class="adm_inputs_wrap">
    <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Correct Option</label>
	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 padding0">
	<?php
		for($i=1;$i<=$options_count;$i++){
?>
		 <input type="radio" name="correct_option" id="correct_option" value="<?php echo $i;?>" />Option <?php echo $i;?>&nbsp;&nbsp;
<?php } ?>	
</div>	
</div>

<?php						
exit;
?>
					 