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
	<li onclick="viewSubject(<?php echo $result->subject_id;?>,'schools_tab');"><span><?php echo $result->subject_name;?></span>&nbsp;&nbsp;<span><?php echo $result->subject_code;?></span></li>
	<?php
	}
	?>
	</ul>
<?php	
}
?>

