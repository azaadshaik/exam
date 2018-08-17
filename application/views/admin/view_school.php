<!--User List starts here -->
                  
<h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><?php echo $school_data[0]['school_name'];?></h2>
                     
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        
                        <div class="user-table">
                           <table class="table table-bordered table-striped">
                           <tbody>
                                 <tr>
                                    <td>Institution</td><td><?php echo $school_data[0]['institution_name'];?></td>
                                  </tr>
                                  <tr>  
                                    <td>Institution Code</td><td><?php echo $school_data[0]['institution_code'];?></td>
                                   </tr> 
                                  <tr>
                                    <td>School Code</td><td><?php echo $school_data[0]['school_code'];?></td>
                                   </tr>
                                  <tr>
                                  <tr>
                                    <td>School State</td><td><?php echo $school_data[0]['state_name'];?></td>
                                   </tr>
                                  <tr>
                                  <tr>
                                    <td>School District</td><td><?php echo $school_data[0]['district_name'];?></td>
                                   </tr>
                                  <tr>
                                    <td>School Address</td><td><?php echo $school_data[0]['school_address'];?></td>
                                  </tr>  
                                   <tr>
                                    <td>School Principal</td><td><?php echo $school_data[0]['school_principal'];?></td>
                                   </tr> 
                                  <tr>
                                    <td>School Phone</td><td><?php echo $school_data[0]['school_phone'];?></td>
                                  </tr> 
                                  <tr>
                                    <td>Classes Available</td>
                                    
                                    <td>
                                    
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
                                    
                                    </td>
                                   
                                 </tr>
                              
                              
                                                               
                              </tbody>
                           </table>
                        </div>
                     </div>
                  