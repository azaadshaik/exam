<!-- Create School starts here -->

                     <h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Create Topic</h2>
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <form action="admin/create_topic" method="post" enctype="multipart/form-data" id="schoolForm">
						<div class="adm_inputs_wrap">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Class</label>
                           <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 drop_down">
                              <div class="form-group">
                                 <select class="dropdown form-control" id="class" name="class" onchange="loadSubjects(this.value);">
                                    <option value="">Select Class</option>
                                    <?php
                                     foreach($classes_list as $class){
                                        echo "<option value='".$class['class_id']."'>".$class['class_name']."</option>" ;
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
                                    <option value="">Select Subject</option>
                                    
                                    
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="adm_inputs_wrap">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Topic Name</label>
                           <input class="col-lg-6 col-md-6 col-sm-12 col-xs-12" type="text"  placeholder="Topic Name" id="topicName" name="topic_name" >
                        </div>
                        <div class="adm_inputs_wrap">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Topic Code</label>
                           <input class="col-lg-6 col-md-6 col-sm-12 col-xs-12" type="text"  placeholder="Topic Code" id="topicCode" name="topic_code" >
                        </div>

                                      
                        
                        
						<div class="adm_inputs_wrap adm_checkbox">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Status </label>
                           <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 drop_down">
                              
                                
                                <span><label class="checkbox-inline"><input type="checkbox" name="status"  value="1"></span>
                                
                                
                                </div>  
                                

                              
                           </div>
                                
                        <div class="col-md-12">
                           <button class="signin-btn" type="button" onclick="submitForm('schoolForm','admin/schools','topics_tab');">Submit</button>
                        </div>
                        </form>
                     </div>
                  