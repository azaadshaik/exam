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
	<li onclick="viewEnrollment(<?php echo $result->exam_enrollment_id;?>,'exam_enrollment_tab');"><span><?php echo $result->exam_name;?></span></li>
	<?php
	}
	?>
	</ul>
<?php	
}
?>

