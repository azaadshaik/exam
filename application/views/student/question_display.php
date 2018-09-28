							
							<div id="submit-message" class="alert alert-danger hide" ></div>
							<input type="hidden" id="question_start_time" value="<?php echo time();?>" >
							<input type="hidden" id="current_question_id" value="<?php echo $question_data[0]['question_id'];?>">
                              <span class="header-text">
							  
							  <b><?php echo $question_num.'.';?> </b>
							  <?php echo !empty($question_data[0]['question'])? $question_data[0]['question'] :'';?>
							  <?php echo !empty($question_data[0]['question_image'])? '<img src="'.$this->config->item('asset_url').'/uploads/question_images/'.$question_data[0]['question_image'].'">' :'';?>
							  
							  </span>
                              
                              <div class="exam-answer-selction">
                                 <form class="exam-ans-form" role="form" name="quizform" action="" method="post">
								 <?php 
								 $i=1;
								 foreach($question_data as $option){ ?>
								 
								  <div class="radio"><span class="option-no"><?php echo $i;?>)</span><span><label><input type="radio" name="choice" id="user_choice" value="<?php echo $option['choice_id'];?>"> <?php echo !empty($option['choice_text'])?$option['choice_text']:'';?>
								 <?php echo !empty($option['choice_image'])?'<img src="'.$this->config->item('asset_url').'/uploads/question_images/'.$option['choice_image'].'">' :'';?>
								 
								 </label></span></div>
								 <?php
								 $i++;
								 }
                                  ?>  
                                    
                                    
                                 </form>
                              </div>
				<?php

exit; ?>				
							  