
<?php
// echo "<pre>";
// print_r($question_data);
// die;
?>
<!--Image Questions starts here -->
                  <div id="question_bank" class="tab-pane">
				  <form action="admin/edit_question" method="post" enctype="multipart/form-data" id="questionForm">
                  <input type="hidden" name="question_id" value="<?php echo $question_data[0]['question_id'];?>" >
                     <h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Create Question</h2>
                     <div class="adm_inputs_wrap">
                        <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Topic Code</label>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 drop_down">
                           <div class="form-group">
                              <select class="dropdown form-control" id="topic" name="topic">
                                 <option value="0"> Topic Code</option>
                                 <?php
                                 foreach($topics_list as $topic){
                                     if($question_data[0]['topic_id']== $topic['topic_id']){
                                        echo '<option selected="selected" value="'.$topic['topic_id'].'">'.$topic['topic_code'].'</option>';       
                                     }
                                     else{
                                        echo '<option value="'.$topic['topic_id'].'">'.$topic['topic_code'].'</option>'; 
                                     } 
                                 }
                                 ?>
                              </select>
                           </div>
                        </div>
                     </div>
					 
                     <div class="adm_inputs_wrap">
                        <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Question Text</label>
                        <textarea rows="2" name="question_text" id="question_text" cols="12" class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <?php echo $question_data[0]['question'];?>
                        </textarea>
                     </div>
                     <div class="custom-file-upload">
                        <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Question Image</label>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <img id="question_imageBox" class="image_holder" src="<?php echo ($question_data[0]['question_image'])?$this->config->item('asset_url').'/uploads/question_images/'.$question_data[0]['question_image'] :'#';?>"   />
                        <a href="#" data-toggle="dropdown" onclick="resetImageInput(this,'question_image','question_imageBox');" ><i class="fa fa-close" style="font-size:36px;"></i></a> 
                           <label for="question_image" class="custom-file-upload-label">
                           <i class="fa fa-cloud-upload"></i> Upload Image
                           </label>
                           <input id="question_image" name="question_image" type="file" onchange="renderOptionImage(this,'question_imageBox');" />
                        </div>
                     </div>
					 <div class="adm_inputs_wrap">
                        <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Difficulty Level</label>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 drop_down">
                           <div class="form-group">
                              <select class="dropdown form-control" id="difficulty_level" name="difficulty_level">
                                 <option value="0"> Select</option>
                                 <?php
                                 for($i=1; $i<=5; $i++){

                                    if($question_data[0]['difficulty_level']==$i){
                                         echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';   
                                    }
                                    else{
                                        echo '<option value="'.$i.'" >'.$i.'</option>';  
                                    }
                                 }
								 ?>
								 
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="adm_inputs_wrap">
                        <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Average Time</label>
                        <input class="col-lg-6 col-md-6 col-sm-12 col-xs-12" type="text" placeholder="Number in Seconds" id="AvgTime" name="AvgTime" value="<?php echo $question_data[0]['avg_time'];?> ">
                     </div>
					 <div class="adm_inputs_wrap">
                        <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">NUmber Of Options</label>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 drop_down">
                           <div class="form-group">
                              <select class="dropdown form-control" id="options_count" name="options_count" onchange="renderQuestionOptions(this.value);">
                                 <option value="0"> Select</option>
                                 <?php
                                 $number_of_options = count($question_data);
                                 for($i=1; $i<=10; $i++){

                                    if($number_of_options==$i){
                                         echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';   
                                    }
                                    else{
                                        echo '<option value="'.$i.'" >'.$i.'</option>';  
                                    }
                                 }
								 ?>
								 
								 
                              </select>
                           </div>
                        </div>
                     </div>
                     <div id="question_options">
                     <?php 

                        for($i=1;$i<=$number_of_options;$i++){
                        ?>
                        <div class="custom-file-upload options-wrap">
                                                <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Option-<?php echo $i;?></label>
                                                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 padding0">
                                                <?php
                                                    if($question_data[$i-1]['choice_image']){
                                                         ?>

                                                            <img id="option-<?php echo $i;?>-imageBox" class="image_holder" src="<?php echo $this->config->item('asset_url').'/uploads/question_images/'.$question_data[0]['choice_image'] ;?>"   />

                                                         <?php   

                                                    }
                                                    else{
                                                        ?>
                                                            <img id="option-<?php echo $i;?>-imageBox" src="#" class="hide image_holder"   />
                                                 <?php       
                                                    }
                                                ?>

                                                    
                                                <label for="option-<?php echo $i;?>-image" class="custom-file-upload-label">
                                                <i class="fa fa-cloud-upload"></i> Upload Image
                                                </label>
                                                <input type="file" onchange="renderOptionImage(this,'<?php echo 'option-'.$i.'-imageBox';?>');" id="option-<?php echo $i;?>-image" name="option-<?php echo $i;?>-image" >
                                                </div>
                                                <span class="seperator"></span>
                                                <textarea rows="1" placeholder="Option <?php echo $i;?>  Text" id="option-<?php echo $i;?>-text" name="option-<?php echo $i;?>-text" cols="12" class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><?php echo $question_data[$i-1]['choice_text']?>
                                                </textarea>
                                                
                                            </div>
                        <?php
                        }
                    ?>
                    <div class="adm_inputs_wrap">
                        <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Correct Option</label>
	                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 padding0">
	                    <?php
                        //get the offset of the option where answer value is not null. that should be the correct option
                        foreach($question_data as $key => $value){

                           if($value['answer_id']){
                                $correct_option_position = $key +1;
                                break;   
                           }
                           
                        }
                        
		                    for($i=1;$i<=$number_of_options;$i++){
                              if($correct_option_position==$i){
                                  ?>  

		                    Option <?php echo $i;?> <input type="radio" checked="checked" name="correct_option" id="correct_option" value="<?php echo $i;?>" />&nbsp;&nbsp;
                            <?php
                              }
                              else{
                                  ?>
                                <input type="radio"  name="correct_option" id="correct_option" value="<?php echo $i;?>" />Option <?php echo $i;?>&nbsp;&nbsp;
                                <?php
                              }
                              
                         } ?>	
                        </div>	
                    </div>
                     
                     </div>
                     
                     
                     <div class="col-md-12">
                        <button class="signin-btn" type="button" onclick="submitForm('questionForm','adm','questions_tab');">Submit</button>
                     </div>
					 </form>
                  </div>