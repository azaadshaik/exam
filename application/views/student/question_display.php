
                              <span class="header-text">
							  
							  <?php echo !empty($question_data[0]['question'])? $question_data[0]['question'] :'';?>
							  <?php echo !empty($question_data[0]['question_image'])? '<img src="'.$this->config->item('asset_url').'/uploads/question_images/'.$question_data[0]['question_image'].'">' :'';?>
							  
							  </span>
                              
                              <div class="exam-answer-selction">
                                 <form class="exam-ans-form" role="form" name="quizform" action="" method="post">
								 <?php 
								 foreach($question_data as $option){ ?>
								 
								 <div class="radio"><label><input type="radio" name="choice" id="user_choice" value="<?php echo $option['choice_id'];?>"> <?php echo !empty($option['choice_text'])?$option['choice_text']:'';?>
								 <?php echo !empty($option['choice_image'])?'<img src="'.$this->config->item('asset_url').'/uploads/question_images/'.$option['choice_image'].'">' :'';?>
								 
								 </label></div>
								 <?php
								 }
                                  ?>  
                                    
                                    
                                 </form>
                              </div>
				<?php

exit; ?>				
							  