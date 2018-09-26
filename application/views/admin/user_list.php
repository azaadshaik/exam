<div id="User_List" class="tab-pane ">
                     <h2 class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pull-left">User List</h2>
                     <div id="table-search-input" class="col-lg-4 col-md-4 col-sm-6 col-sx-12 pull-right">
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
                                 <select class="dropdown form-control" id="institution" onchange="loadSchools(this.value);">
                                    <option value="0">Select</option>
                                    <?php
                                    if(!empty($institutions)){
                                      foreach($institutions as $institute){
                                        ?>
                                        <option value="<?php echo $institute['institution_id'];?>"><?php echo $institute['institution_name'];?></option>
                                        <?php

                                      }
                                    }
                                    
                                    ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 drop_down">
                              <label>School</label>
                              <div class="form-group">
                                 <select class="dropdown form-control" id="school" onchange="loadClasses(this.value);">
                                    
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 drop_down">
                              <label>Class</label>
                              <div class="form-group">
                                 <select class="dropdown form-control" id="class">
                                    
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 drop_down">
                              <label>Role</label>
                              <select class="dropdown form-control" id="role" onchange="resetUserFilters(this.value);">
                                 <option value="0">Select</option>
                                 <?php
                                    if(!empty($roles)){
                                      foreach($roles as $role){
                                        ?>
                                        <option value="<?php echo $role['role_id'];?>"><?php echo $role['role_name'];?></option>
                                        <?php

                                      }
                                    }
                                    
                                    ?>
                              </select>
                           </div>
                           
                           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 drop_down">
                              <button class="apply-btn" type="button" onclick="filterUsers();">Apply</button>
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

				  
