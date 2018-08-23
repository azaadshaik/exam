<h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><?php echo $institution_data[0]['institution_name'];?></h2>
                     <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4"> Name</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $institution_data[0]['institution_name'];?></span>
                                    </div>
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4"> Code</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $institution_data[0]['institution_code'];?></span>
                                    </div>
                                     <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Status</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $institution_data[0]['institution_status']?'Active':'Inactive';?></span>
                                    </div>
                                    
                    </div>
                                    

<?php					 
if(count($institution_data) > 0 && $institution_data[0]['school_id']){ ?>
<h3 class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="color:#FFF;">Schools Associated With This Institution</h3>		 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        
                        <div class="user-table">
                           <table class="table table-bordered table-striped">
                           <tbody>
						   <tr>
							   <th>Name</th>
							   <th>Code</th>
							   <th>Address</th>
						   </tr>
						   <?php
						    foreach($institution_data as $institution){
								
							?>
                                 <tr>
                                 <td> <?php echo $institution['school_name'];?></td><td><?php echo $institution['school_code'];?></td><td><?php echo $institution['school_address'];?></td>
                                  </tr>
                               <?php                                                                                  
							}
							?>
                                                               
                              </tbody>
                           </table>
                        </div>
                     </div>			 
<?php	
}
else{
	echo '<h3 class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="color:#FFF;">So Far No Schools Associated With This Institution </h3>';
}					 

					 
                  