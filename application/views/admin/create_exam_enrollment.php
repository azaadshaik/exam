<!-- Create School starts here -->

                     <h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Exam Enrollment</h2>
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <form action="admin/create_exam_enrollment" method="post" enctype="multipart/form-data" id="enrollmentForm">
						<div class="adm_inputs_wrap">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Exam</label>
                           <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 drop_down">
                              <div class="form-group">
                                 <select class="dropdown form-control" id="exam" name="exam" >
                                    <option value="">Select Exam</option>
                                    <?php
                                     foreach($exams_list as $exam){
                                        echo "<option value='".$exam['exam_id']."'>".$exam['exam_name']."</option>" ;
                                     }
                                     ?>
                                    
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="adm_inputs_wrap">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Class</label>
                           <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 drop_down">
                              <div class="form-group">
                                 <select class="dropdown form-control" id="class" name="class" >
                                    <option value="">Select Class</option>
                                    <?php
                                     foreach($classes_list as $class){
                                        echo "<option value='".$class['class_id']."'>All ".$class['class_name']." Students</option>" ;
                                     }
                                     ?>
                                    
                                 </select>
                              </div>
                           </div>
                        </div>
                                
                        <div class="col-md-12">
                           <button class="signin-btn" type="button" onclick="submitForm('enrollmentForm','bla bla','exam_enrollment_tab');">Submit</button>
                        </div>
                        </form>
                     </div>
                  