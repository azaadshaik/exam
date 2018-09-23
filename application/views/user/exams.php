<div id="userThirdTab" class="tab-pane">
                     <div class="my-exams col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ul class="nav nav-tabs">
                           <li class="active"><a data-toggle="tab" href="#ongoing">On Going</a></li>
                           <li><a data-toggle="tab" href="#upcoming">Upcoming</a></li>
                           <li><a data-toggle="tab" href="#attended">Attended</a></li>
                        </ul>
                        <div class="tab-content">
                           <div id="ongoing" class="tab-pane fade in active">
                              
							  <?php
							  if(isset($ongoing)){ ?>
								<p>There is one ongoing exam :<?php echo $ongoing[0]['exam_name'];?></p>
								<button type="button" onclick="launchExam(<?php echo $ongoing[0]['exam_id'];?>,<?php echo $this->session->userdata('user_id');?>);" class="btn complte-exam">Click here to attend</button>
							<?php	
							  }
							  else{
								echo '<p>There is no ongoing exam </p>';
							  }
							  ?>
                              
                              
                           </div>
                           <div id="upcoming" class="tab-pane fade">
                              
							  <?php
							  if(isset($upcoming)){ ?>
							  
								<div class="user-table">
                                 <table class="table table-bordered table-striped">
                                    <thead>
                                       <tr>
                                          <th scope="col">Exam Name</th>
                                          <th scope="col">Exam Date</th>
                                          <th scope="col">Exam Time</th>
                                          <th scope="col">Exam Centre</th>
                                          <th scope="col">Actions</th>
                                       </tr>
                                    </thead>
                                    <tbody>
								<?php	
								 foreach($upcoming as $upcoming_exam){ ?>
								 
								 <tr>
                                          <td>Sccial</td>
                                          <td>03/05/2019</td>
                                          <td>10AM</td>
                                          <td>ZPHS</td>
                                          <td class="sub-table">
                                            <button data-toggle="modal" data-target="#up-detail-one">Details</button>
                                          </td>
                                       </tr>
								<?php	   
								 
								 }
								 ?>
								     </tbody>
                                 </table>
                              </div>
								 <?php
							  }
							  else{
								echo '<p>There are no upcoming exams </p>';
							  }
							  ?>


                           </div>
                           <div id="attended" class="tab-pane fade">
                              
							  <?php
							  if(isset($completed)){ ?>
								<div class="user-table">
                                 <table class="table table-bordered table-striped">
                                    <thead>
                                       <tr>
                                          <th scope="col">Exam Name</th>
                                          <th scope="col">Exam Date</th>
                                          <th scope="col">Exam Time</th>
                                          <th scope="col">Exam Centre</th>
                                          <th scope="col">Actions</th>
                                       </tr>
                                    </thead>
                                    <tbody>
								<?php
								foreach($completed as $completed_exam){ ?>
									<tr>
                                          <td>Sccial</td>
                                          <td>03/05/2018</td>
                                          <td>10AM</td>
                                          <td>ZPHS</td>
                                           <td class="sub-table">
                                            <button data-toggle="modal" data-target="#up-detail-one">Details</button>
                                          </td>
                                       </tr>
								<?php
								}
								?>
								</tbody>
                                 </table>
                              </div>
								<?php
							  }
							  else{
								echo '<p>There are no completed exams   </p>';
							  }
							  ?>
                              
                                       
                                       
                                    
                           </div>

                           <!-- model for popup data -->

                            <!-- Modal -->
                                <div class="modal fade" id="up-detail-one" role="dialog">
                                  <div class="modal-dialog">
                                  
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h2 class="modal-title">Details</h2>
                                      </div>
                                      <div class="modal-body">
                                        <div class="exam-data">
                                           <label>Exam Id:</label> <span>MA1258</span>
                                        </div>
                                         <div class="exam-data">
                                           <label>Exam Name:</label> <span>Maths</span>
                                        </div>
                                        <div class="exam-data">
                                           <label>Exam Code:</label> <span>25848</span>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                    
                                  </div>
                                </div>

                           <!-- model for popup data ends-->
                        </div>
                     </div>
                  </div>

