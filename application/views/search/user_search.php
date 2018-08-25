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
	<li onclick="viewUser(<?php echo $result->user_id;?>,'users_tab');"><span><?php echo $result->user_name;?></span><span><?php echo $result->user_firstname. " ".$result->user_lastname;?></span><span><?php echo $result->role_name;?></span></li>
	<?php
	}
	?>
	</ul>
<?php	
}
?>

