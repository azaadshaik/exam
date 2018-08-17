<!-- Create School starts here -->

                     <h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Update School</h2>
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <form action="admin/edit_school" method="post" enctype="multipart/form-data" id="schoolForm">
					 <input type="hidden" name="school_id" value="<?php echo $school_data[0]['school_id']; ?>" >
                        <div class="adm_inputs_wrap">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">School Name</label>
                           <input class="col-lg-6 col-md-6 col-sm-12 col-xs-12" type="text"  placeholder="School Name" id="schoolName" name="school_name" value="<?php echo $school_data[0]['school_name']; ?>" >
                        </div>
                        <div class="adm_inputs_wrap">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">School Code</label>
                           <input class="col-lg-6 col-md-6 col-sm-12 col-xs-12" type="text"  placeholder="School Code" id="schoolCode" name="school_code" value="<?php echo $school_data[0]['school_code']; ?>">
                        </div>

                    <div class="adm_inputs_wrap adm_checkbox">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Classes Available</label>
                           <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 drop_down">
                              <?php
								
                              foreach($classes_list as $class){
                                ?>
                                <div>
                                
                                <span><label class="checkbox-inline">
								<?php
								if(array_key_exists($class['class_id'],$class_sections) ){ ?>
									
									<input type="checkbox" checked="checked" name="classes[]" value="<?php echo $class['class_id'];?>"><?php echo $class['class_name'];?>
								<?php
								}
								else{
									?>
									<input type="checkbox" name="classes[]" value="<?php echo $class['class_id'];?>"><?php echo $class['class_name'];?>
								<?php
								}
								?>
								</label></span>
                                <?php
                                foreach($sections_list as $section){
                                    
									?>
                                    <span><label class="">
									<?php
									if(array_key_exists($class['class_id'],$class_sections)) {
									if(in_array($section['section_id'],$class_sections[$class['class_id']])){ ?>
									<input type="checkbox" checked="checked" name="sections[][<?php echo $class['class_id'];?>]" value="<?php echo $section['section_id'];?>">
									<?php 
									}
									else{ ?>
											<input type="checkbox" name="sections[][<?php echo $class['class_id'];?>]" value="<?php echo $section['section_id'];?>">
									<?php		
									}
									}
									else { ?>
										<input type="checkbox" name="sections[][<?php echo $class['class_id'];?>]" value="<?php echo $section['section_id'];?>">
									<?php	
									}
									?>
									<?php echo $section['section_code'];?></label></span>
                                <?php
                                }
                                ?>
                                
                                </div>  
                                
                                <?php  
                              }
                              ?>
                              
                           </div>
                        </div>










                        <div class="adm_inputs_wrap">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">School Institution</label>
                           <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 drop_down">
                              <div class="form-group">
                                 <select class="dropdown form-control" id="institution" name="institution">
                                 <option value="">Select</option>
                                 <?php
								 
                                 foreach($institution_list as $institution){
									if($institution['institution_id']== $school_data[0]['institution_id']){
										echo "<option  selected='selected' value='".$institution['institution_id']."'>".$institution['institution_name']."</option>" ;
									}
									else{
										echo "<option  value='".$institution['institution_id']."'>".$institution['institution_name']."</option>" ;
									}
                                 }
                                    ?>
                                   
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="adm_inputs_wrap">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">School State</label>
                           <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 drop_down">
                              <div class="form-group">
                                 <select class="dropdown form-control" id="states" name="state" onchange="loadDistricts(this.value);">
                                    <option value="">Select </option>
                                    <?php
                                     foreach($state_list as $state){
										if($state['state_id']==$school_data[0]['state_id']){ 
											echo "<option selected='selected' value='".$state['state_id']."'>".$state['state_name']."</option>" ;
										}
										else{
											echo "<option value='".$state['state_id']."'>".$state['state_name']."</option>" ;
										}
                                     }
                                     ?>
                                    
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="adm_inputs_wrap">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">School District</label>
                           <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 drop_down">
                              <div class="form-group">
                                 <select class="dropdown form-control" id="districts" name="district">
                                    <option value="">Select</option>
									<?php
									foreach($state_districts as $district){
										if($school_data[0]['district_id']==$district['district_id']){
											echo "<option selected='selected' value='".$district['district_id']."'>".$district['district_name']."</option>" ;
										}
										else{
												echo "<option  value='".$district['district_id']."'>".$district['district_name']."</option>" ;
										}
									}
									?>
                                    
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="adm_inputs_wrap">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">School Address</label>
                           <textarea rows="3" cols="12" class="col-lg-6 col-md-6 col-sm-12 col-xs-12" name="address"><?php echo $school_data[0]['school_address']; ?></textarea>
                        </div>
                        <div class="adm_inputs_wrap">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Contact Number</label>
                           <input class="col-lg-6 col-md-6 col-sm-12 col-xs-12" type="text" placeholder="Contact Number" id="contact_number" name="contact_number" value="<?php echo $school_data[0]['school_phone']; ?>">
                        </div>
                        <div class="adm_inputs_wrap">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">School Principal</label>
                           <input class="col-lg-6 col-md-6 col-sm-12 col-xs-12" type="text" placeholder="Principal Name" id="principal_name" name="principal_name" value="<?php echo $school_data[0]['school_principal']; ?>">
                        </div>
                        
                        <div class="col-md-12">
                           <button class="signin-btn" type="button" onclick="submitForm('schoolForm','admin/schools','schools_tab');">Submit</button>
                        </div>
                        </form>
                     </div>
                  