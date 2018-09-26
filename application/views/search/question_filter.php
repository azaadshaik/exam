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