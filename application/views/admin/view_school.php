<!--User List starts here -->
<h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><?php echo $school_data[0]['school_name'];?></h2>
                     <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4"> Institution</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $school_data[0]['institution_name'];?></span>
                                    </div>
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4"> Institution Code</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $school_data[0]['institution_code'];?></span>
                                    </div>
                                     <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">School Code</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $school_data[0]['school_code'];?></span>
                                    </div>
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">State</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $school_data[0]['state_name'];?></span>
                                    </div>
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">District</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $school_data[0]['district_name'];?></span>
                                    </div>
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Address</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $school_data[0]['school_address'];?></span>
                                    </div>
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Principal</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $school_data[0]['school_principal'];?></span>
                                    </div>
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Contact Number</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $school_data[0]['school_phone'];?></span>
                                    </div>
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Address</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $school_data[0]['school_address'];?></span>
                                    </div>
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Classes Available</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                       <?php
                                       foreach($class_sections as $class => $sections ){
                                        ?>  
                                        <div>
                                        <span><?php echo $class .'&nbsp;&nbsp;Sections: ';?></span>
                                        <span>
                                        <?php
                                        foreach($sections as $section){
                                          echo $section.'&nbsp;';
                                        }
                                        ?></span>
                                        
                                        
                                        </div>
                                        
                                        <?php
                                      }

                                      ?>
                                       
                                       </span>
                                    </div>
                                    
                    </div>







                                      
                                    
                  