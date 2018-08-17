<?php
// echo "<pre>";
// print_r($institution_data);
// die;
?>
                  
<h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><?php echo $institution_data[0]['institution_name'];?></h2>
                     
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        
                        <div class="user-table">
                           <table class="table table-bordered table-striped">
                           <tbody>
                                 <tr>
                                    <td>Institution Name</td><td><?php echo $institution_data[0]['institution_name'];?></td>
                                  </tr>
                                  <tr>  
                                    <td>Institution Code</td><td><?php echo $institution_data[0]['institution_code'];?></td>
                                   </tr> 
                                  <tr>
                                    <td>Number Of Schools</td><td><?php echo count($institution_data);?></td>
                                   </tr>
                                  <tr>
                                                                                
                              
                                                               
                              </tbody>
                           </table>
                        </div>
                     </div>
<?php					 
if(count($institution_data) > 1 && $institution_data[0]['school_id']){ ?>
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
	echo '<h3 class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="color:#FFF;">No Schools Associated With This Institution</h3>';
}					 

					 
                  