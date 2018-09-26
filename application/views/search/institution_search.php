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
	<li onclick="viewInstitution(<?php echo $result->institution_id;?>,'institutions_tab');"><span><?php echo $result->institution_name;?></span><span><?php echo $result->institution_code;?></span></li>
	<?php
	}
	?>
	</ul>
<?php	
}
?>

