<?php
if(empty($topics_list)){
 
 ?>
<div><h2>Topics</h2></div>
<div class="alert alert-warning">No topics found.</div>
<div class="col-md-12 col-lg-12 col-sm-12  pull-right">
                             
                             <span class="input-group-btn">
                             <button class="btn btn-info btn-lg" type="button" onclick="createNew('admin/create_topic','topics_tab');">
                             <i class="fa fa-search-plus">Create New</i>
                             </button>
                             </span>
                          </div>
<?php  
exit;                        
}

?>             

<h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Topics</h2>
                     
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div id="table-search-input">
                           <div class="input-group col-md-6">
                              <input type="text" class="form-control input-lg" placeholder="Search by name" />
                              <span class="input-group-btn">
                              <button class="btn btn-info btn-lg" type="button">
                              <i class="fa fa-search-plus"></i>
                              </button>
                              </span>
                           </div>
						   <div class="col-md-3 pull-right">
                              
                              <span class="input-group-btn">
                              <button class="btn btn-info btn-lg" type="button" onclick="createNew('admin/create_topic','topics_tab');">
                              <i class="fa fa-search-plus">Create New</i>
                              </button>
                              </span>
                           </div>
                        </div>
                        <div class="user-table">
                           <table class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    <th scope="col">S.No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                 </tr>
                              </thead>
                              <tbody>
                              <?php 
                                $i=1;
                              foreach($topics_list as $topic) { ?>

                              
                                 <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $topic['topic_name'];?></td>
                                    <td><?php echo $topic['topic_code'];?></td>
                                    <td><?php echo $topic['class_name'];?></td>
                                    <td><?php echo $topic['subject_name'];?></td>
                                    <td><?php echo ($topic['topic_status'])?'Active':'Inactive';?></td>
                                    <td class="sub-table">
                                       <table class="table table-bordered table-striped">
                                          <tbody>
                                             <tr>
                                                <td><a href="#" data-toggle="dropdown" title="View" onclick="viewTopic(<?php echo $topic['topic_id'];?>,'topics_tab');"><i class="fa fa-eye"></i></a></td>
                                                <td><a href="#" data-toggle="dropdown" title="Edit" onclick="editTopic(<?php echo $topic['topic_id'];?>,'topics_tab');"><i class="fa fa-pencil-square-o"></i></a></td>
                                                <td><a href="#" data-toggle="dropdown" title="Delete" onclick="deleteTopic(<?php echo $topic['topic_id'];?>,'topics_tab');"><i class="fa fa-trash"></i></a></td>
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
                  