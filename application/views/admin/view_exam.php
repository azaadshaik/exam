<h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><?php echo $exam_data->exam_name;?></h2>
                     <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 userprof2">
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4"> Name</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $exam_data->exam_name;?></span>
                                    </div>
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4"> Code</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $exam_data->exam_code;?></span>
                                    </div>
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4"> Date Time</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo date("d M Y    g:i A", strtotime($exam_data->exam_datetime));?></span>
                                    </div>
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4"> Duration</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $exam_data->exam_duration;?></span>
                                    </div>
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4"> Marks</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $exam_data->exam_marks;?></span>
                                    </div>
                                     <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Status</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $exam_data->exam_status?'Active':'Inactive';?></span>
                                    </div>
                                    
                    </div>
 