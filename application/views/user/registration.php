
               
                  <!-- User Registration starts here -->
                  
                     <h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12">User Registration</h2>
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					 <form action="user/register" method="post" enctype="multipart/form-data" id="regForm">
                        <div class="adm_inputs_wrap">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">User Name <span class="mandatory">*</span></label>
                           <input class="col-lg-6 col-md-6 col-sm-12 col-xs-12" type="text" class="input-fields form-control" placeholder="User Name" id="Username" name="username" required="">
                        </div>
                         <div class="adm_inputs_wrap">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Password</label>
                           <input class="col-lg-6 col-md-6 col-sm-12 col-xs-12" type="text" class="input-fields form-control" placeholder="Password" id="Password" name="password" required="">
                        </div>
                        <div class="adm_inputs_wrap">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Conform Password</label>
                           <input class="col-lg-6 col-md-6 col-sm-12 col-xs-12" type="text" class="input-fields form-control" placeholder="Your Password" id="Con_Pwd" name="confirm_password" required="">
                        </div>
                        <div class="adm_inputs_wrap">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Role</label>
                           <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 drop_down">
                              <div class="form-group">
                                 <select class="dropdown form-control" id="role" name="role" onchange="renderRolebasedFields(this.value);">
                                    <option value="0">Select Role</option>
                                    <?php
                                        foreach($roles as $role){
                                            echo "<option value=".$role['role_id'].">".$role['role_code']."</option>";
                                        }
                                    ?>
                                    
                                 </select>
                              </div>
                           </div>
                        </div>
                         <div id="user_class_map">
                                                

                        </div>
                       
                        <div class="adm_inputs_wrap">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">First Name</label>
                           <input class="col-lg-6 col-md-6 col-sm-12 col-xs-12" type="text" class="input-fields form-control" placeholder="First Name" id="FirstName" name="firstname" >
                        </div>
                        <div class="adm_inputs_wrap">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Last Name</label>
                           <input class="col-lg-6 col-md-6 col-sm-12 col-xs-12" type="text" class="input-fields form-control" placeholder="Last Name" id="LastName" name="lastname" >
                        </div>
                       
                        
                        <div class="adm_inputs_wrap">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Address</label>
                           <textarea rows="3" cols="12" class="col-lg-6 col-md-6 col-sm-12 col-xs-12"></textarea>
                        </div>
                       
                        <div class="custom-file-upload">
                        <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">User Image</label>
                        
                           <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                           <img id="profilePic" src="#" class="hide"  />
                        <label for="file-upload" class="custom-file-upload-label">
                        <i class="fa fa-cloud-upload"></i> Upload Image
                        
                        </label>
                        
                        <input id="file-upload" type="file" onchange="readURL(this);" name="userimage">
                        
                        </div>
                     </div>
                        <div class="col-md-12">
                           <button  class="signin-btn" type="button" onclick="submitForm('regForm','admin/users','users_tab');">Submit</button>
                        </div>
						</form>
                     </div>
                  
               
            




