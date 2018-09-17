<h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Enrollment Details</h2>
                     <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4"> Exam Name</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $enrollment_data->exam_name;?></span>
                                    </div>
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4"> Exam Code</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $enrollment_data->exam_code;?></span>
                                    </div>
									<div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4"> Exam Date</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo date("d M Y    g:i A", strtotime($enrollment_data->exam_datetime));?></span>
                                    </div>
                                     <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Number Of Students Enrolled</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $student_count;?></span>
                                    </div>
									
									
                                    
                    </div>
                                    

				 

<h3 class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="color:#FFF;">Students Enrolled</h3>		 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        
                        <div class="user-table">
                           <table class="table table-bordered table-striped">
                           <tbody>
						   <tr>
						      <th>S.NO</th>
							   <th>Student Name</th>
							   <th>Institution</th>
							   <th>School</th>
							   <th>Class</th>
							   <th>Section</th>
						   </tr>
						   <?php
						   $i=1;
						    foreach($students_data as $student){
								
							?>
                                 <tr>
								 <td> <?php echo $i; ?></td>
                                 <td> <?php echo $student['user_firstname'].' ' .$student['user_lastname'];?></td>
								 <td><?php echo $student['institution_name'];?></td>
								 <td><?php echo $student['school_name'];?></td>
								 <td><?php echo $student['class_name'];?></td>
								 <td><?php echo $student['section_name'];?></td>
                                  </tr>
                               <?php  
								$i++;
							}
							?>
                                                               
                              </tbody>
                           </table>
                        </div>
                     </div>			 
					 

					 
                  
