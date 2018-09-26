<?php
if(empty($exam_enrollment_list)){
 
 ?>
<div><h2>Enrollments</h2></div>
<div class="alert alert-warning">No Enrollments found.</div>
<div class="col-md-12 col-lg-12 col-sm-12  pull-right">
                             
                             
                             <button class="addnew-btn pull-left" type="button" onclick="createNew('admin/create_exam_enrollment','exam_enrollment_tab');">
                              New Enrollment
                             </button>
                             
                          </div>
<?php  
exit;                        
}

?>            
<h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Enrollments</h2>
                     
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div id="table-search-input">
                          <div class="col-md-6">
                           <div class="input-group">
                              <input type="text" id="exams_search" data-table="exam_enrollment" data-search="search/index" class="form-control input-lg" placeholder="Search by name" />
                              <span class="input-group-btn">
                              <button class="btn btn-info btn-lg" type="button">
                              <i class="fa fa-search-plus"></i>
                              </button>
                              </span>
                           </div>
                           <div class="search-result">
					
					        </div>
                    </div>
						   <div class="col-md-3 pull-right">
                              
                              
                              <button class="addnew-btn pull-left" type="button" onclick="createNew('admin/create_exam_enrollment','exam_enrollment_tab');">
                              New Enrollment
                              </button>
                              
                           </div>
                        </div>
                        <div class="user-table">
                           <table class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    <th scope="col">S.No</th>
                                    <th scope="col">Exam</th>
									<th scope="col">Date Time</th>
                                    <th scope="col">No., of Students</th>
                                                                   
                                    <th scope="col">Actions</th>
                                 </tr>
                              </thead>
                              <tbody>
                              <?php 
                                $i=1;
                              foreach($exam_enrollment_list as $enrollment) { ?>

                              
                                 <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $enrollment['exam_name'];?></td>
                                    
                                     <td><?php echo date("d M Y    g:i A", strtotime($enrollment['exam_datetime']));?></td>
									 <td><?php echo count(unserialize($enrollment['students']));?></td>
                                    
                                    

                                    <td class="sub-table">
                                       <table class="table table-bordered table-striped">
                                          <tbody>
                                             <tr>
                                                <td><a href="#" data-toggle="dropdown" title="View" onclick="viewEnrollment(<?php echo $enrollment['exam_enrollment_id'];?>,'exam_enrollment_tab');"><i class="fa fa-eye"></i></a></td>
                                                <td><a href="#" data-toggle="dropdown" title="Edit" onclick="editEnrollment(<?php echo $enrollment['exam_enrollment_id'];?>,'exam_enrollment_tab');"><i class="fa fa-pencil-square-o"></i></a></td>
                                                <td><a href="#" data-toggle="dropdown" title="Delete" onclick="deleteEnrollment(<?php echo $enrollment['exam_enrollment_id'];?>,'exam_enrollment_tab');"><i class="fa fa-trash"></i></a></td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
                                 </tr>
                               <?php 
                            
                                $i++;

                                } 
                            
                            ?>  
                                 
                              </tbody>
                           </table>
                        </div>
                     </div>
                  