<!-- Create School starts here -->

                     <h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Update Subject</h2>
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <form action="admin/edit_subject" method="post" enctype="multipart/form-data" id="schoolForm">
                     <input type="hidden" name="subject_id" value="<?php echo $subject_data->subject_id;?>" >
                        <div class="adm_inputs_wrap">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Subject Name</label>
                           <input class="col-lg-6 col-md-6 col-sm-12 col-xs-12" type="text" value="<?php echo $subject_data->subject_name;?>" placeholder="Subject Name" id="subjectName" name="subject_name" >
                        </div>
                        <div class="adm_inputs_wrap">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Subject Code</label>
                           <input class="col-lg-6 col-md-6 col-sm-12 col-xs-12" type="text" value="<?php echo $subject_data->subject_code;?>"  placeholder="Subject Code" id="subjectCode" name="subject_code" >
                        </div>

                                      
                        <div class="adm_inputs_wrap">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Class</label>
                           <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 drop_down">
                              <div class="form-group">
                                 <select class="dropdown form-control" id="class" name="class" >
                                    <option value="">Select Class</option>
                                    <?php
                                     foreach($classes_list as $class){
                                         if($class['class_id']==$subject_data->subject_class_id){
                                            echo "<option selected='selected' value='".$class['class_id']."'>".$class['class_name']."</option>" ;     
                                         }
                                         else{
                                        echo "<option value='".$class['class_id']."'>".$class['class_name']."</option>" ;
                                         }
                                     }
                                     ?>
                                    
                                 </select>
                              </div>
                           </div>
                        </div>
                        
						<div class="adm_inputs_wrap adm_checkbox">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Status </label>
                           <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 drop_down">
                              
                                
                                <span><label class="checkbox-inline"><input type="checkbox" name="status" <?php echo $subject_data->subject_status ? 'checked="checked"' : '';?>  value="<?php echo $subject_data->subject_status ? 1 : 0;?> "></span>
                                
                                
                                </div>  
                                

                              
                           </div>
                                
                        <div class="col-md-12">
                           <button class="signin-btn" type="button" onclick="submitForm('schoolForm','admin/schools','subjects_tab');">Submit</button>
                        </div>
                        </form>
                     </div>
                  