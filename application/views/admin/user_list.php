<!--User List starts here -->
                  
<h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12">User List</h2>
                     <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="user_table_accord">
                           <h3>Filter By</h3>
                           <div class="panel-group">
                              <div class="panel panel-default">
                                 <div class="panel-heading">
                                    <h4 class="panel-title">
                                       <a data-toggle="collapse" href="#collapse1">Institute</a>
                                    </h4>
                                 </div>
                                 <div id="collapse1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                       <label class="checkbox-inline"><input type="checkbox" value="">Nalanda</label>
                                       <label class="checkbox-inline"><input type="checkbox" value="">RSR</label>
                                       <label class="checkbox-inline"><input type="checkbox" value="">KIDZEE</label>
                                       <label class="checkbox-inline"><input type="checkbox" value="">Masters</label>
                                       <label class="checkbox-inline"><input type="checkbox" value="">ZPHS</label>
                                       <label class="checkbox-inline"><input type="checkbox" value="">Vits</label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="panel-group">
                              <div class="panel panel-default">
                                 <div class="panel-heading">
                                    <h4 class="panel-title">
                                       <a data-toggle="collapse" href="#collapse2">School</a>
                                    </h4>
                                 </div>
                                 <div id="collapse2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                       <label class="checkbox-inline"><input type="checkbox" value="">Nalanda</label>
                                       <label class="checkbox-inline"><input type="checkbox" value="">RSR</label>
                                       <label class="checkbox-inline"><input type="checkbox" value="">KIDZEE</label>
                                       <label class="checkbox-inline"><input type="checkbox" value="">Masters</label>
                                       <label class="checkbox-inline"><input type="checkbox" value="">ZPHS</label>
                                       <label class="checkbox-inline"><input type="checkbox" value="">Vits</label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="panel-group">
                              <div class="panel panel-default">
                                 <div class="panel-heading">
                                    <h4 class="panel-title">
                                       <a data-toggle="collapse" href="#collapse3">Class</a>
                                    </h4>
                                 </div>
                                 <div id="collapse3" class="panel-collapse collapse">
                                    <div class="panel-body">
                                       <label class="checkbox-inline"><input type="checkbox" checked="" value="">7 <sup>th</sup> Class</label>
                                       <label class="checkbox-inline"><input type="checkbox" checked="" value="">8 <sup>th</sup> Class</label>
                                       <label class="checkbox-inline"><input type="checkbox" checked="" value="">9 <sup>th</sup> Class</label>
                                       <label class="checkbox-inline"><input type="checkbox" checked="" value="">10 <sup>th</sup> Class</label>
                                       <label class="checkbox-inline"><input type="checkbox" checked="" value="">11 <sup>th</sup> Class</label>
                                       <label class="checkbox-inline"><input type="checkbox" checked="" value="">12 <sup>th</sup> Class</label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="panel-group">
                              <div class="panel panel-default">
                                 <div class="panel-heading">
                                    <h4 class="panel-title">
                                       <a data-toggle="collapse" href="#collapse4">Role</a>
                                    </h4>
                                 </div>
                                 <div id="collapse4" class="panel-collapse collapse">
                                    <div class="panel-body">
                                       <label class="checkbox-inline"><input type="checkbox" value="">Admin</label>
                                       <label class="checkbox-inline"><input type="checkbox" value="">Student</label>
                                       <label class="checkbox-inline"><input type="checkbox" value="">Parent</label>
                                       <label class="checkbox-inline"><input type="checkbox" value="">Principal</label>
                                       <label class="checkbox-inline"><input type="checkbox" value="">Teacher</label>
                                       <label class="checkbox-inline"><input type="checkbox" value="">Admin2</label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="panel-group">
                              <div class="panel panel-default">
                                 <div class="panel-heading">
                                    <h4 class="panel-title">
                                       <a data-toggle="collapse" href="#collapse5">Status</a>
                                    </h4>
                                 </div>
                                 <div id="collapse5" class="panel-collapse collapse">
                                    <div class="panel-body">
                                       <label class="checkbox-inline"><input type="checkbox" value="">Active</label>
                                       <label class="checkbox-inline"><input type="checkbox" value="">In Active</label>
                                       <label class="checkbox-inline"><input type="checkbox" value="">Absent</label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
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
                                                <td><a href="#" data-toggle="dropdown" title="Edit"><i class="fa fa-pencil-square-o"></i></a></td>
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
                  