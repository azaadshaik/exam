
               
                  <!-- User Registration starts here -->
                  
                  <h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Update User</h2>
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					 <form action="user/edit_user" method="post" enctype="multipart/form-data" id="regForm">
                     <input type="hidden" name="user_id" value="<?php echo $user_data->user_id;?>" >
                        <div class="adm_inputs_wrap">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">User Name <span class="mandatory">*</span></label>
                           <input class="col-lg-6 col-md-6 col-sm-12 col-xs-12" value="<?php echo $user_data->user_name;?>" type="text" class="input-fields form-control" placeholder="User Name" id="Username" name="username" required="">
                        </div>
                         
                        <div class="adm_inputs_wrap">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Role</label>
                           <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 drop_down">
                              <div class="form-group">
                                 <select class="dropdown form-control" id="role" name="role" onchange="renderRolebasedFields(this.value);">
                                    <option value="0">Select Role</option>
                                    <?php
                                        foreach($roles as $role){
                                            if($role['role_id']==$user_data->user_role){
                                            echo "<option selected='selected' value=".$role['role_id'].">".$role['role_code']."</option>";
                                            }
                                            else{
                                                echo "<option value=".$role['role_id'].">".$role['role_code']."</option>";
                                            }
                                        }
                                    ?>
                                    
                                 </select>
                              </div>
                           </div>
                        </div>
                         <div id="user_class_map">
                         <?php if(!in_array($user_data->role_code,$this->config->item('hide_class_fields_for'))) {  ?>
                         <div class="adm_inputs_wrap">
            <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Institution</label>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 drop_down">
                <div class="form-group">
                    <select class="dropdown form-control" id="institution" name="institution" onchange="loadSchools(this.value);">
                    <option value="0">Select Institution</option>
                    <?php
                        foreach($institutions as $institution){
                            
                            if($institution['institution_id']==$user_data->institution){
                            echo "<option selected='selected' value=".$institution['institution_id'].">".$institution['institution_name']."</option>";
                            }
                            else{
                                echo "<option value=".$institution['institution_id'].">".$institution['institution_name']."</option>";
                            }
                        }
                    ?>
                    
                    </select>
                </div>
            </div>
        </div>
        <div class="adm_inputs_wrap">
            <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">School</label>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 drop_down">
                <div class="form-group">
                    <select class="dropdown form-control"  id="school" name="school" onchange="loadClasses(this.value);">
                    <option value="0">Select School</option>
                    <?php
                        foreach($schools as $school){
                            if($school['school_id']==$user_data->school){
                            echo "<option selected='selected' value=".$school['school_id'].">".$school['school_name']."</option>";
                            }
                            else{
                                echo "<option value=".$school['school_id'].">".$school['school_name']."</option>";
                            }
                        }
                    ?>
                    </select>
                </div>
            </div>
        </div>
		 <div class="adm_inputs_wrap">
            <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Class</label>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 drop_down">
                <div class="form-group">
                    <select class="dropdown form-control"  id="class" name="class" onchange="loadSections(this.value);">
                    <option value="0">Select Class</option>
                    <?php
                        foreach($classes as $class){
                            if($class['class_id']==$user_data->class){
                            echo "<option selected='selected' value=".$class['class_id'].">".$class['class_name']."</option>";
                            }
                            else{
                                echo "<option value=".$class['class_id'].">".$class['class_name']."</option>";
                            }
                        }
                    ?>                
                    </select>
                </div>
            </div>
        </div>    
			<?php 
				if($user_data->role_code=='student'){
				?>
						 <div class="adm_inputs_wrap">
            <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Section</label>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 drop_down">
                <div class="form-group">
                    <select class="dropdown form-control"  id="section" name="section" >
                    <option value="0">Select Section</option>
                    <?php
                        foreach($sections as $section){
                            if($section['section_id']==$user_data->section){
                            echo "<option selected='selected' value=".$section['section_id'].">".$section['section_name']."</option>";
                            }
                            else{
                                echo "<option value=".$section['section_id'].">".$section['section_name']."</option>";
                            }
                        }
                    ?>                
                    </select>
                </div>
            </div>
        </div>    
				
				<?php
                }
                
            }
			?>

                        </div>
                       
                        <div class="adm_inputs_wrap">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">First Name</label>
                           <input class="col-lg-6 col-md-6 col-sm-12 col-xs-12" value="<?php echo $user_data->user_firstname;?>" type="text" class="input-fields form-control" placeholder="First Name" id="FirstName" name="firstname" >
                        </div>
                        <div class="adm_inputs_wrap">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Last Name</label>
                           <input class="col-lg-6 col-md-6 col-sm-12 col-xs-12" value="<?php echo $user_data->user_lastname;?>" type="text" class="input-fields form-control" placeholder="Last Name" id="LastName" name="lastname" >
                        </div>
                       
                        
                        <div class="adm_inputs_wrap">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Address</label>
                           <textarea rows="3" cols="12" name="user_address" class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><?php echo $user_data->user_address;?></textarea>
                        </div>
                       
                        <div class="custom-file-upload">
                        <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">User Image</label>
                        
                           <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                           <img id="profilePic" width="50" height="50" src="<?php echo $this->config->item('asset_url').'/uploads/profile_pics/'.$user_data->user_image;?>"   />
                        <label for="file-upload" class="custom-file-upload-label">
                        <i class="fa fa-cloud-upload"></i> Upload New Image
                        
                        </label>
                        
                        <input id="file-upload" type="file" onchange="readURL(this);" name="userimage">
                        
                        </div>
                     </div>
                        <div class="col-md-12">
                           <button  class="signin-btn" type="button" onclick="submitForm('regForm','admin/users','users_tab');">Submit</button>
                        </div>
						</form>
                     </div>
                  
               
            




