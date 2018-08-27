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
	<li onclick="viewExam(<?php echo $result->exam_id;?>,'exams_tab');"><span><?php echo $result->exam_name;?></span><span><?php echo $result->exam_code;?></span></li>
	<?php
	}
	?>
	</ul>
<?php	
}
?>

