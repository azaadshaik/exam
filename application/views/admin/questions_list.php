<?php
if(empty($question_list)){
 
 ?>
<div><h2>Questions</h2></div>
<div class="alert alert-warning">No questions found.</div>
<div class="col-md-12 col-lg-12 col-sm-12  pull-right">
                             
                             
                             <button class="addnew-btn pull-left" type="button" onclick="createNew('admin/create_question','questions_tab');">
                             Add New
                             </button>
							 
							  <button class="addnew-btn pull-right" type="button" onclick="createNew('uploads/question_upload','questions_tab');">
                             Upload Questions
                             </button>
                             
                          </div>
<?php  
exit;                        
}

?>    

<div class="tab-pane ">
                     <h2 class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pull-left">Question Bank</h2>
                     <div id="table-search-input">
                        <div class="input-group col-md-4 pull-right">
                           <input type="text" class="form-control input-lg" placeholder="Search By Question" id="user_search"  data-table="question_bank" data-search="search/index" />
                           <span class="input-group-btn">
                           <button class="btn btn-info btn-lg" type="button">
                           <i class="fa fa-search-plus"></i>
                           </button>
                           </span>
                        </div>
						<div class="search-result">
					
							</div>
                     </div>
                     <div class="user-list-header">
                        <div class="adm_inputs_wrap">
                           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 drop_down">
                              <label>Class</label>
                              <div class="form-group">
                                 <select class="dropdown form-control" id="class" onchange="loadSubjects(this.value);">
                                    <option value="0">Select</option>
                                    <?php
									foreach($classes as $class){ ?>
										<option value="<?php echo $class['class_id'];?>"><?php echo $class['class_name'];?></option>
									<?php
									}
									?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 drop_down">
                              <label>Subject</label>
                              <div class="form-group">
                                 <select class="dropdown form-control" id="subject" onchange="loadTopics(this.value);">
                                    <option value="0">Select</option>
                                    
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 drop_down">
                              <label>Topic</label>
                              <div class="form-group">
                                 <select class="dropdown form-control" id="topic">
                                    <option value="0">Select</option>
                                    
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 drop_down">
                              <label>Difficulty Level</label>
                              <select class="dropdown form-control" id="diffLevel">
                                 <option value="0">Select</option>
								 <option value="1">1</option>
								 <option value="2">2</option>
								 <option value="3">3</option>
								 <option value="4">4</option>
								 <option value="5">5</option>
                                 
                              </select>
                           </div>
                           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 drop_down">
                              <label>Average Time<small>(in sec)</small></label>
                              <select class="dropdown form-control" id="avgTime">
                                 <option value="0">Select</option>
								 <option value="30">30</option>
								 <option value="60">60</option>
								 <option value="90">90</option>
								 <option value="120">120</option>
								 <option value="150">150</option>
								 <option value="150">180</option>
                              </select>
                           </div>
                           
                           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 drop_down">
                              <button class="apply-btn" type="button" onclick="filterQuestions();" >Apply</button>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                           <button class="addnew-btn pull-left" onclick="createNew('admin/create_question','questions_tab');">Add new</button>
                        </div>
                     </div>
                     <div class="user-table">
                        <table class="table table-bordered table-striped">
                           <thead>
                              <tr>
                                 <th scope="col">Question</th>
                                 <th scope="col">Class</th>
                                 <th scope="col">Subject</th>
                                 <th scope="col">Topic</th>
                                 <th scope="col">Avg Time</th>
                                 <th scope="col">Diff Level</th>
                                 <th scope="col">Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php 

                              foreach($question_list as $question) { ?>

                              
                                 <tr>
                                    <td><?php echo $question['question'];?></td>
                                    <td><?php echo $question['class_name'];?></td>
                                    <td><?php echo $question['subject_name'];?></td>
                                    <td><?php echo $question['topic_name'];?></td>
                                    <td><?php echo $question['avg_time'];?></td>
                                    <td><?php echo $question['difficulty_level'];?></td>
                                    <td class="sub-table">
                                       <table class="table table-bordered table-striped">
                                          <tbody>
                                             <tr>
                                                <td><a href="#" data-toggle="dropdown" title="View" onclick="viewQuestion(<?php echo $question['question_id'];?>,'questions_tab');"><i class="fa fa-eye"></i></a></td>
                                                <td><a href="#" data-toggle="dropdown" title="Edit" onclick="editQuestion(<?php echo $question['question_id'];?>,'questions_tab');"><i class="fa fa-pencil-square-o"></i></a></td>
                                                <td><a href="#" data-toggle="dropdown" title="Delete" onclick="deleteQuestion(<?php echo $question['question_id'];?>,'questions_tab');"><i class="fa fa-trash"></i></a></td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
                                 </tr>
                               <?php } ?>
                                       </tbody>
                                    </table>
                                 
                     </div>
                  </div>