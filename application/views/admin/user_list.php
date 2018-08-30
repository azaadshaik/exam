<div id="User_List" class="tab-pane ">
                     <h2 class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pull-left">User List</h2>
                     <div id="table-search-input" class="col-md-4 pull-right">
                        <div class="input-group">
                           <input type="text" id="user_search" data-table="users" data-search="search/index" class="form-control input-lg " placeholder="Search By Username" />
                           <span class="input-group-btn search-button">
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
                              <label>Institution</label>
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
                              <label>School</label>
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
                              <label>Class</label>
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
                              <label>Role</label>
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
                           <button class="addnew-btn pull-left" onclick="createNew('user/register','users_tab');">Add new</button>
                        </div>
                     </div>
                     <div class="user-table">
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
                     </div>
                  </div>

				  