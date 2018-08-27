
                     <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
						<div class="userprof2">			
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4"> Topic Name</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $question_data[0]['topic_name'];?></span>
                                    </div>
									 <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4"> Topic Code</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $question_data[0]['topic_code'];?></span>
                                    </div>
									<div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Question</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo trim($question_data[0]['question']);?></span>
                                    </div>
									<?php
									if(!empty($question_data[0]['question_image'])){
									
									?>
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4"> Question Image</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8">
									   <img class="image_holder" src="<?php echo $this->config->item('asset_url').'/uploads/question_images/'.$question_data[0]['question_image'] ;?>" />
									   </span>
                                    </div>
									<?php
									}
									?>
                                     <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Question Options</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8">
									   <ol>
										<?php 
										
										foreach($question_data as $item){ 
											
										?>
											
											<li>
												<span>
													<?php echo $item['choice_text'];?>
												</span>
												<?php if(!empty($item['choice_image'])){ ?>
												<span>
												
												<img class="image_holder" src="<?php echo $this->config->item('asset_url').'/uploads/question_images/'.$item['choice_image'] ;?>" />
												
												</span>
												<?php } ?>
												<span>
												<?php if(!empty($item['selected_choice'])) { ?>
												 <i class="fa fa-check"  ></i>

												</span>
												<?php }else{
													?>
													<i class="fa fa-close" ></i>
													<?php
												} ?>
											</li>
									   
										<?php } ?>
									   </ol>
									   </span>
                                    </div>
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Difficulty Level</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $question_data[0]['difficulty_level'];?></span>
                                    </div>
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Average Time</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $question_data[0]['avg_time'];?></span>
                                    </div>
									
									<div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Status</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo ($question_data[0]['question_status']==1)?'Active':'Inactive';?></span>
                                    </div>
                                    
                                   
                                   
                        </div>            
                                    
                    </div>







                                      
                                    
                  