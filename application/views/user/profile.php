<!--User Profile starts here -->
<div id="User_Profile1" class="tab-pane">
                     
                     <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <ul class="nav nav-tabs">
                           <li class="active"><a data-toggle="tab" href="#user-detail">User Details</a></li>
                           <?php 
                           
                              if($user_data->role_code=='student'){
                                    echo '<li><a data-toggle="tab" href="#parent-detail">Parent Details</a></li>';
                              }
                              
                              
                           if($user_data->role_code!='admin'){
                                    echo '<li><a data-toggle="tab" href="#user-prof">Class Details</a></li>';
                           }
                           ?>
                        </ul>
                        <div class="tab-content">
                           <div id="user-detail" class="tab-pane fade in active">
                              <div class="user-profile_container userprof2">
                              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-right">
                                    <div class="user-pro-pic">
                                       <img src="<?php echo ($user_data->user_image)?$this->config->item('asset_url').'/uploads/profile_pics/'.$user_data->user_image :$this->config->item('default_profile_pic');?>" class="img-thumbnail" alt="Cinque Terre" width="200" height="236"> 
                                       
                                    </div>
                                 </div>
                                 <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">User Name</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $user_data->user_name;?></span>
                                    </div>
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">First Name</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $user_data->user_firstname;?></span>
                                    </div>
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Last Name</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $user_data->user_lastname;?></span>
                                    </div>
                                    
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Date Of Birth</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $user_data->user_dob;?></span>
                                    </div>
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Role</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $user_data->role_name;?></span>
                                    </div>                      
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Address</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $user_data->user_address;?></span>
                                    </div>
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Registration Date</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $user_data->user_reg_date;?></span>
                                    </div>
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Last Login</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $user_data->user_last_login;?></span>
                                    </div>
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Status</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo ($user_data->user_status)?'Active':'Inactive';?></span>
                                    </div>
                                    
                                    
                                 </div>
                                
                              </div>
                           </div>
                           <div id="parent-detail" class="tab-pane fade">
                              <div class="user-profile_container userprof2">
                                 <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Parent Name</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $user_data->institution_name;?></span>
                                    </div>
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Location</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $user_data->institution_name;?></span>
                                    </div>
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Mobile Number</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $user_data->school_phone;?></span>
                                    </div>
                                   
                                    
                                   
                                 </div>
                                 
                              </div>
                           </div>
                           <div id="user-prof" class="tab-pane fade">
                               <div class="user-profile_container userprof2">
                                 
                                 <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-left">
                                 <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Institute</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $user_data->institution_name;?></span>
                                    </div>
                                 <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">School</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $user_data->school_name;?></span>
                                    </div>
                                    
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Class</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $user_data->class_name;?></span>
                                    </div>
                                    <?php 
                                    if($user_data->role_code=='student'){  ?>
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Section</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $user_data->section_code;?></span>
                                    </div>
                                      <?php 
                                    }
                                      ?>                
                                   
                                   
                                    
                                    
                                    
                                 </div>
                                 
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>