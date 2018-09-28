<?php date_default_timezone_set('Asia/Kolkata'); ?>
<div id="instructions" class="row" >
<div id="instructions-headline">Please read the instructions below</div>



<p>1. Sample instruction the student may not use his or her textbook, course notes, or receive help from a proctor or any other outside source.</p>
<p>2. Students must not stop the session and then return to it. This is especially important in the online environment where the system will "time-out" and not allow the student or you to reenter the exam site</p>
<p>3. Students must complete the 50-question multiple-choice exam within the 75 minute time frame allotted for the exam.</p>
<p>4. Sample instruction students must complete the 50-question multiple-choice exam within the 75 minute time frame allotted for the exam.</p>
<button class="signin-btn"  onclick="hideInstructions(<?php echo $exam_data->question_paper_questions[0];?>,'question-1');" type="button">Start Exam</button>

<input type="hidden" id="current_question_number" value="1">
<input type="hidden" id="exam_id" value="<?php echo $exam_data->exam_id;?>">
<input type="hidden" id="total_questions" value="<?php echo count($exam_data->question_paper_questions);?>">

</div>                 
				 <?php
					// echo "<pre>";
					// print_r($exam_data);
					
					//echo $exam_data->exam_datetime;
					//echo  date('Y-m-d h:i:s a',strtotime($exam_data->exam_datetime));
					$exam_start_date_time = strtotime(date('Y-m-d h:i:s a',strtotime($exam_data->exam_datetime))); 
					$exam_duration_in_sec = ($exam_data->exam_duration * 60);
					$exam_end_date_time = $exam_start_date_time + $exam_duration_in_sec;
					//echo date('Y-m-d h:i:s',$exam_start_date_time);
					$current_date_time = time();
					$difference =round($exam_end_date_time - $current_date_time) ;
										
					$hours =($difference > 3600)? gmdate('h',$difference):0 ;
					$min =($difference > 60)? gmdate('i',$difference):0 ;
					$sec = ($difference > 0)?gmdate('s',$difference):0 ;
					
				 //$exam_end_time = strtotime($exam_data->exam_datetime)
				 //$today = time () ;

    // $difference =($target-$today) ;

    // $month =date('m',$difference) ;
    // $days =date('d',$difference) ;
    // $hours =date('h',$difference) ;

    // print $month." month".$days." days".$hours."hours left";
				 ?>
				 <!-- exams tab starts here -->
                  <div id="userSecondTab" style="display:none;">
                     <div class="stu-exam-tab col-lg12 col-md-12 col-sm-12 col-xs-12">
                        <div class="header">
                           <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                              
                              <span class="header-name"><b>Exam :</b> <?php echo $exam_data->exam_name;?></span>
							  <span class="header-name"><b>Duration:</b> <?php echo $exam_data->exam_duration.' Min';?></span>
							  <span class="header-name"><b>Questions:</b> <?php echo count($exam_data->question_paper_questions);?></span>
                           </div>
                           <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                              
                           </div>
                           <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                              <div id="countdowntimer"><span id="timer"><span></div>
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
									 <span class="btn"  id="question-<?php echo $i;?>" onclick="loadQuestion(<?php echo $exam_data->question_paper_questions[$i-1];?>,this.id,<?php echo $i;?>);" style="margin-bottom:10px;"><?php echo $i;?></span>
									 <?php
									$i++;
								}
							  ?>
							  </div>
                                 
                                   <div class="force-overflow"></div>
                              </div>
                           </div>
						   <div class="exam-btn-wrap">
                                       <input type="buttom" class="btn btn-large btn-left" id="markncontinue"  value=" Mark For Review & Continue ">
                                       <input type="button" class="btn btn-large btn-left" id="skipncontinue" value=" Skip & Continue ">
									   <input type="button" class="btn btn-large btn-right" id="savencontinue" value=" Save & Continue ">
                                    </div>
                        </div>
                     </div>
                  </div>
<script>
$(function(){
var hours = <?php echo $hours;?>;
var min = <?php echo $min;?>;
var sec = <?php echo $sec;?>;
	$("#timer").countdowntimer({
                hours : hours,
				minutes : min,
				seconds : sec,
                size : "lg"
	});
});
</script>				  