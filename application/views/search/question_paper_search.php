<?php
//print_r($search_results);
if(empty($search_results)){
	echo '<div>No Records Found</div>';
}
else{
	?>
	<ul>
	<?php
	foreach($search_results as $result){
	?>
	<li onclick="viewQuestionPaper(<?php echo $result->question_paper_id;?>,'question_papers_tab');"><span><?php echo $result->question_paper_name;?></span>&nbsp;&nbsp;<span><?php echo $result->question_paper_code;?></span></li>
	<?php
	}
	?>
	</ul>
<?php	
}
?>

