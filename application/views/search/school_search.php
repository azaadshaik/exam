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
	<li onclick="viewSchool(<?php echo $result->school_id;?>,'schools_tab');"><span><?php echo $result->school_name;?></span><span><?php echo $result->school_code;?></span></li>
	<?php
	}
	?>
	</ul>
<?php	
}
?>

