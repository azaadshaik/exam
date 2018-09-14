<!--Image Questions starts here -->
                  <div id="question_bank" class="tab-pane">
				  <form action="admin/create_question" method="post" enctype="multipart/form-data" id="questionForm">
                     <h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Upload Topics</h2>
                     <div class="adm_inputs_wrap">
                        <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Class</label>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 drop_down">
                           <div class="form-group">
                              <select class="dropdown form-control" id="class" name="class" onchange="loadSubjects(this.value);">
                                 <option value="0"> Class</option>
                                 <?php
                                 foreach($classes as $class){
                                    echo '<option value="'.$class['class_id'].'">'.$class['class_name'].'</option>';  
                                 }
                                 ?>
                              </select>
                           </div>
                        </div>
                     </div>
					 <div class="adm_inputs_wrap">
                        <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Subject</label>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 drop_down">
                           <div class="form-group">
                              <select class="dropdown form-control" id="subject" name="subject" >
                                 <option value="0"> Subject</option>
                                 
                              </select>
                           </div>
                        </div>
                     </div>
					 
                     
                     <div class="custom-file-upload">
                        <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Upload File (<a href="<?php echo $this->config->item('asset_url');?>/sample_files/sample_topics.xlsx" ><small>sample file</small></a>)</label>
						
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <img id="question_imageBox" src="#" class="hide"  />
                           <label for="question_image" class="custom-file-upload-label">
                           <i class="fa fa-cloud-upload"></i> Upload
                           </label>
                           <input id="question_image" name="question_image" type="file" onchange="renderOptionImage(this,'question_imageBox');" />
                        </div>
                     </div>
					 
                    
					
                     
                     
                     
                     <div class="col-md-12">
                        <button class="signin-btn" type="button" onclick="submitForm('questionForm','adm','questions_tab');">Submit</button>
                     </div>
					 </form>
                  </div>