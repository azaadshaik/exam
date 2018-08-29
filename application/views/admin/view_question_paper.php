<h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><?php echo $question_paper_data->question_paper_name;?></h2>
                     <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 userprof2">
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4"> Name</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $question_paper_data->question_paper_name;?></span>
                                    </div>
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4"> Code</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $question_paper_data->question_paper_code;?></span>
                                    </div>
                                    
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4"> Exam </label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $question_paper_data->exam_name;?></span>
                                    </div>
                                    <div class="adm_inputs_wrap">
                                       <label class="col-lg-4 col-md-4 col-sm-4 col-xs-4">Status</label>
                                       <span class="user-static col-lg-8 col-md-8 col-sm-8 col-xs-8"><?php echo $question_paper_data->question_paper_status?'Active':'Inactive';?></span>
                                    </div>
                                    
                    </div>


      <h2 data-toggle="collapse" data-target="#collapse1" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      
       Questions
      </h2>
    
    <div id="collapse1" class="panel-collapse collapse">
      <ul class="list-group">
      <?php
      
      if(!empty($questions_list)){
          foreach($questions_list as  $question){
        ?>
        <li class="list-group-item col-sm-12" style="text-align:left;"><?php echo $question['question'];?></li>
        <?php
      }
    }
      ?>
        
       
      </ul>
    </div>
      
    