<?php
if(empty($question_list)){
 
 ?>
<div><h2>Questions</h2></div>
<div class="alert alert-warning">No questions found.</div>
<div class="col-md-12 col-lg-12 col-sm-12  pull-right">
                             
                             
                             <button class="addnew-btn pull-left" type="button" onclick="createNew('admin/create_question','questions_tab');">
                             Add New
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
                           <input type="text" class="form-control input-lg" placeholder="Search By Question" />
                           <span class="input-group-btn">
                           <button class="btn btn-info btn-lg" type="button">
                           <i class="fa fa-search-plus"></i>
                           </button>
                           </span>
                        </div>
                     </div>
                     <div class="user-list-header">
                        <div class="adm_inputs_wrap">
                           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 drop_down">
                              <label>Class</label>
                              <div class="form-group">
                                 <select class="dropdown form-control" id="sel1">
                                    <option>Nalanda</option>
                                    <option>Google</option>
                                    <option>Bhashyam</option>
                                    <option>RSR</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 drop_down">
                              <label>Subject</label>
                              <div class="form-group">
                                 <select class="dropdown form-control" id="sel1">
                                    <option>Nalanda</option>
                                    <option>Google</option>
                                    <option>Bhashyam</option>
                                    <option>RSR</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 drop_down">
                              <label>Topic</label>
                              <div class="form-group">
                                 <select class="dropdown form-control" id="sel1">
                                    <option>6<sup>th</sup></option>
                                    <option>7<sup>th</sup></option>
                                    <option>8<sup>th</sup></option>
                                    <option>9<sup>th</sup></option>
                                    <option>10<sup>th</sup></option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 drop_down">
                              <label>Difficulty Level</label>
                              <select class="dropdown form-control" id="">
                                 <option>Admin</option>
                                 <option>Manager</option>
                                 <option>Question Preparation</option>
                                 <option >Student</option>
                                 <option>Parent</option>
                              </select>
                           </div>
                           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 drop_down">
                              <label>Average Time</label>
                              <select class="dropdown form-control" id="">
                                 <option>Admin</option>
                                 <option>Manager</option>
                                 <option>Question Preparation</option>
                                 <option >Student</option>
                                 <option>Parent</option>
                              </select>
                           </div>
                           
                           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 drop_down">
                              <button class="apply-btn">Apply</button>
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
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>