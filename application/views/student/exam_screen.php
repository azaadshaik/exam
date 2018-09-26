<div id="instructions">
Please read the instructions below

<p>-> Instruction 1</p>
<p>-> Instruction 2</p>
<p>-> Instruction 3</p>
<p>-> Instruction 4</p>
<button class="signin-btn"  onclick="hideInstructions(<?php echo $exam_data->question_paper_questions[0];?>,'question-1');" type="button">Start Exam</button>
<input type="hidden" id="current_question_id" value="<?php echo $exam_data->question_paper_questions[0];?>">
<input type="hidden" id="current_question_number" value="1">
<input type="hidden" id="exam_id" value="<?php echo $exam_data->exam_id;?>">
<input type="hidden" id="total_questions" value="<?php echo count($exam_data->question_paper_questions);?>">

</div>                 
				 
				 <!-- exams tab starts here -->
                  <div id="userSecondTab" style="display:none;">
                     <div class="stu-exam-tab col-lg12 col-md-12 col-sm-12 col-xs-12">
                        <div class="header">
                           <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                              <span class="header-name"><b>Name:</b> Wasim</span>
                              <span class="header-name"><b>Exam Centre:</b> JBDC</span>
                           </div>
                           <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                              <h2><?php echo $exam_data->exam_name;?></h2>
                           </div>
                           <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                              <span class="header-name"><b>Timer:</b> 02:00:00</span>
                           </div>
                        </div>
                        <div class="exam-body">
						<div id="loader" class="exam-body-left col-lg-8 col-md-8 col-sm-8 col-xs-8"></div>
                           <div class="exam-body-left col-lg-8 col-md-8 col-sm-8 col-xs-8 dynamicQuestion">
                              
							  
                           </div>
						   
                           <div id="exam-ques-num" class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                              <div  class="scrollbar exam-ques-num"  id="style-1">
							  <div class="ques-rows">
							  <?php
								$i=1;
								
								foreach($exam_data->question_paper_questions as $question){ ?>
									 <span class="btn"  id="question-<?php echo $i;?>" onclick="loadQuestion(<?php echo $exam_data->question_paper_questions[$i-1];?>,this.id);" style="margin-bottom:10px;"><?php echo $i;?></span>
									 <?php
									$i++;
								}
							  ?>
							  </div>
                                 
                                   <div class="force-overflow"></div>
                              </div>
                           </div>
						   <div class="exam-btn-wrap">
                                       <input type="buttom" class="btn btn-large btn-left" id="markncontinue" onclick="markAsReview();" value=" Mark For Review & Continue ">
                                       <input type="button" class="btn btn-large btn-left" id="skipncontinue" value=" Skip & Continue ">
									   <input type="button" class="btn btn-large btn-right" id="savencontinue" value=" Save & Continue ">
                                    </div>
                        </div>
                     </div>
                  </div>