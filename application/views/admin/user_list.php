<!--User List starts here -->
                  
<h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12">User List</h2>
                     
                     <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div id="table-search-input">
                           <div class="input-group col-md-6">
                              <input type="text" class="form-control input-lg" placeholder="Search by username" />
                              <span class="input-group-btn">
                              <button class="btn btn-info btn-lg" type="button">
                              <i class="fa fa-search-plus"></i>
                              </button>
                              </span>
                           </div>
						   <div class="col-md-3 pull-right">
                              
                              <span class="input-group-btn">
                              <button class="btn btn-info btn-lg" type="button" onclick="createNew('user/register','users_tab');">
                              <i class="fa fa-search-plus">Add User</i>
                              </button>
                              </span>
                           </div>
                        </div>
                        <div class="user-table">
                           <table class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">School</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Actions</th>
                                 </tr>
                              </thead>
                              <tbody>
                              <?php 

                              foreach($user_list as $user) { ?>

                              
                                 <tr>
                                    <td><?php echo $user['user_name'];?></td>
                                    <td><?php echo $user['role_name'];?></td>
                                    <td>VBHS</td>
                                    <td>9</td>
                                    <td class="sub-table">
                                       <table class="table table-bordered table-striped">
                                          <tbody>
                                             <tr>
                                                <td><a href="#" data-toggle="dropdown" title="View"><i class="fa fa-eye"></i></a></td>
                                                <td><a href="#" data-toggle="dropdown" title="Edit" onclick="editUser(<?php echo $user['user_id'];?>,'users_tab');"><i class="fa fa-pencil-square-o"></i></a></td>
                                                <td><a href="#" data-toggle="dropdown" title="Delete"><i class="fa fa-trash"></i></a></td>
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
                  