<?php
if(empty($question_papers_list)){
 
 ?>
<div><h2>Question Papers</h2></div>
<div class="alert alert-warning">No Question papers found.</div>
<div class="col-md-12 col-lg-12 col-sm-12  pull-right">
                             
                             
                             <button class="addnew-btn pull-left" type="button" onclick="createNew('admin/create_question_paper','question_papers_tab');">
                             Add New
                             </button>
                             
                          </div>
<?php  
exit;                        
}

?>            
<h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Question Papers</h2>
                     
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div id="table-search-input">
                           <div class="input-group col-md-6">
                              <input type="text" id="question_papers_search" data-table="question_papers" data-search="search/index" class="form-control input-lg" placeholder="Search by name" />
                              <span class="input-group-btn">
                              <button class="btn btn-info btn-lg" type="button">
                              <i class="fa fa-search-plus"></i>
                              </button>
                              </span>
                           </div>
                           <div class="search-result">
					
					        </div>
						   <div class="col-md-3 pull-right">
                              
                              
                              <button class="addnew-btn pull-left" type="button" onclick="createNew('admin/create_question_paper','question_papers_tab');">
                              Add New
                              </button>
                              
                           </div>
                        </div>
                        <div class="user-table">
                           <table class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    <th scope="col">S.No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Exam</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                 </tr>
                              </thead>
                              <tbody>
                              <?php 
                                $i=1;
                              foreach($question_papers_list as $paper) { ?>

                              
                                 <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $paper['question_paper_name'];?></td>
                                    <td><?php echo $paper['question_paper_code'];?></td>
                                    <td><?php echo $paper['exam_name'];?></td>
                                    <td><?php echo ($paper['question_paper_status'])?'Active':'Inactive';?></td>

                                    <td class="sub-table">
                                       <table class="table table-bordered table-striped">
                                          <tbody>
                                             <tr>
                                                <td><a href="#" data-toggle="dropdown" title="View" onclick="viewQuestionPaper(<?php echo $paper['question_paper_id'];?>,'question_papers_tab');"><i class="fa fa-eye"></i></a></td>
                                                <td><a href="#" data-toggle="dropdown" title="Edit" onclick="editQuestionPaper(<?php echo $paper['question_paper_id'];?>,'question_papers_tab');"><i class="fa fa-pencil-square-o"></i></a></td>
                                                <td><a href="#" data-toggle="dropdown" title="Delete" onclick="deleteQuestionPaper(<?php echo $paper['question_paper_id'];?>,'question_papers_tab');"><i class="fa fa-trash"></i></a></td>
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
                  