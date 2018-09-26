
                        <table class="table table-bordered table-striped">
                           <thead>
                              <tr>
                                 <th scope="col">User Name</th>
                                 <th scope="col">Role</th>
                                 <th scope="col">Firstname</th>
                                 <th scope="col">Lastname</th>
                                 <th scope="col">Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php 

                              foreach($user_list as $user) { ?>

                              
                                 <tr>
                                    <td><?php echo $user['user_name'];?></td>
                                    <td><?php echo $user['role_name'];?></td>
                                    <td><?php echo $user['user_firstname'];?></td>
                                    <td><?php echo $user['user_lastname'];?></td>
                                    <td class="sub-table">
                                       <table class="table table-bordered table-striped">
                                          <tbody>
                                             <tr>
                                                <td><a href="#" data-toggle="dropdown" title="View" onclick="viewUser(<?php echo $user['user_id'];?>,'users_tab');"><i class="fa fa-eye"></i></a></td>
                                                <td><a href="#" data-toggle="dropdown" title="Edit" onclick="editUser(<?php echo $user['user_id'];?>,'users_tab');"><i class="fa fa-pencil-square-o"></i></a></td>
                                                <td><a href="#" data-toggle="dropdown" title="Delete" onclick="deleteUser(<?php echo $user['user_id'];?>,'users_tab');"><i class="fa fa-trash"></i></a></td>
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
                     