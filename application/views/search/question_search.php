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
	<li onclick="viewQuestion(<?php echo $result->question_id;?>,'questions_tab');"><span><?php echo $result->question;?></span></li>
	<?php
	}
	?>
	</ul>
<?php	
}
?>

