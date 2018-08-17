<!-- Create School starts here -->

                     <h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Create School</h2>
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <form action="admin/create_school" method="post" enctype="multipart/form-data" id="schoolForm">
                        <div class="adm_inputs_wrap">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">School Name</label>
                           <input class="col-lg-6 col-md-6 col-sm-12 col-xs-12" type="text"  placeholder="School Name" id="schoolName" name="school_name" >
                        </div>
                        <div class="adm_inputs_wrap">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">School Code</label>
                           <input class="col-lg-6 col-md-6 col-sm-12 col-xs-12" type="text"  placeholder="School Code" id="schoolCode" name="school_code" >
                        </div>

                    <div class="adm_inputs_wrap adm_checkbox">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Classes Available</label>
                           <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 drop_down">
                              <?php

                              foreach($classes_list as $class){
                                ?>
                                <div>
                                
                                <span><label class="checkbox-inline"><input type="checkbox" name="classes[]" value="<?php echo $class['class_id'];?>"><?php echo $class['class_name'];?></label></span>
                                <?php
                                foreach($sections_list as $section){
                                    ?>
                                    <span><label class=""><input type="checkbox" name="sections[]" value="<?php echo $class['class_id'].'-'.$section['section_id'];?>"><?php echo $section['section_code'];?></label></span>
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

                                    echo "<option value='".$institution['institution_id']."'>".$institution['institution_name']."</option>" ;
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
                                        echo "<option value='".$state['state_id']."'>".$state['state_name']."</option>" ;
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
                                    
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="adm_inputs_wrap">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">School Address</label>
                           <textarea rows="3" cols="12" class="col-lg-6 col-md-6 col-sm-12 col-xs-12" name="address"></textarea>
                        </div>
                        <div class="adm_inputs_wrap">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">Contact Number</label>
                           <input class="col-lg-6 col-md-6 col-sm-12 col-xs-12" type="text" placeholder="Contact Number" id="contact_number" name="contact_number">
                        </div>
                        <div class="adm_inputs_wrap">
                           <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12">School Principal</label>
                           <input class="col-lg-6 col-md-6 col-sm-12 col-xs-12" type="text" placeholder="Principal Name" id="principal_name" name="principal_name">
                        </div>
                        
                        <div class="col-md-12">
                           <button class="signin-btn" type="button" onclick="submitForm('schoolForm','admin/schools','schools_tab');">Submit</button>
                        </div>
                        </form>
                     </div>
                  