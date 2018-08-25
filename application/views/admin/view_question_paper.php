<!--Image Questions starts here -->
                  <div id="question_bank" class="tab-pane">
				  <form action="admin/create_question" method="post" enctype="multipart/form-data" id="questionForm">
                     <h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Create Question</h2>
                     <div class="adm_inputs_wrap">
                        <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Topic Code</label>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 drop_down">
                           <div class="form-group">
                              <select class="dropdown form-control" id="topic" name="topic">
                                 <option value="0"> Topic Code</option>
                                 <?php
                                 foreach($topics_list as $topic){
                                    echo '<option value="'.$topic['topic_id'].'">'.$topic['topic_code'].'</option>';  
                                 }
                                 ?>
                              </select>
                           </div>
                        </div>
                     </div>
					 
                     <div class="adm_inputs_wrap">
                        <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Question Text</label>
                        <textarea rows="2" name="question_text" id="question_text" cols="12" class="col-lg-6 col-md-6 col-sm-12 col-xs-12"></textarea>
                     </div>
                     <div class="custom-file-upload">
                        <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Question Image</label>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <img id="question_imageBox" src="#" class="hide"  />
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
								 <option value="1"> 1</option>
								 <option value="2"> 2</option>
								 <option value="3"> 3</option>
								 <option value="4"> 4</option>
								 <option value="5"> 5</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="adm_inputs_wrap">
                        <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Average Time</label>
                        <input class="col-lg-6 col-md-6 col-sm-12 col-xs-12" type="text" placeholder="Number in Seconds" id="AvgTime" name="AvgTime">
                     </div>
					 <div class="adm_inputs_wrap">
                        <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">NUmber Of Options</label>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 drop_down">
                           <div class="form-group">
                              <select class="dropdown form-control" id="options_count" name="options_count" onchange="renderQuestionOptions(this.value);">
                                 <option value="0"> Select</option>
								 <option value="1"> 1</option>
								 <option value="2"> 2</option>
								 <option value="3"> 3</option>
								 <option value="4"> 4</option>
								 <option value="5"> 5</option>
								 <option value="1"> 6</option>
								 <option value="2"> 7</option>
								 <option value="3"> 8</option>
								 <option value="4"> 9</option>
								 <option value="5"> 10</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div id="question_options"></div>
                     
                     
                     <div class="col-md-12">
                        <button class="signin-btn" type="button" onclick="submitForm('questionForm','adm','questions_tab');">Submit</button>
                     </div>
					 </form>
                  </div>