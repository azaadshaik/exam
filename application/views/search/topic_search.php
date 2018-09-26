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
	<li onclick="viewTopic(<?php echo $result->topic_id;?>,'topics_tab');"><span><?php echo $result->topic_name;?></span>&nbsp;&nbsp;<span><?php echo $result->topic_code;?></span></li>
	<?php
	}
	?>
	</ul>
<?php	
}
?>

