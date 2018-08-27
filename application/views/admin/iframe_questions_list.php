<?php $asset_url = $this->config->item('asset_url'); ?>
<!DOCTYPE html>
<html>
<head>
<title>PULSE - <?php echo $title; ?></title>
<meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=Edge">
      <meta name="description" content="">
      <meta name="keywords" content="">
      <meta name="author" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <link rel="stylesheet" href="<?php echo $asset_url; ?>/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo $asset_url; ?>/css/magnific-popup.css">
      <link rel="stylesheet" href="<?php echo $asset_url; ?>/css/font-awesome.min.css">
      <link rel="stylesheet" href="<?php echo $asset_url; ?>/js/datetimepicker/jquery.datetimepicker.css">
      <link href="https://fonts.googleapis.com/css?family=Oswald:200,400,700" rel="stylesheet">
      <!-- MAIN CSS -->
      <link rel="stylesheet" href="<?php echo $asset_url; ?>/css/templatemo-style.css">
      <link rel="stylesheet" href="<?php echo $asset_url; ?>/css/custom.css">
      
 
</head>
<body>
<?php
if(empty($question_list)){
 
 ?>
<div><h2>Questions</h2></div>
<div class="alert alert-warning">No questions found.</div>

<?php  
exit;                        
}

?>    

<div class="tab-pane ">
                     <h2 class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pull-left">Question Bank</h2>
                     
                     
                     <div class="user-table">
                        <table class="table table-bordered table-striped">
                           <thead>
                              <tr>
                                 <th scope="col">Question</th>
                                 <th scope="col">Class</th>
                                 <th scope="col">Subject</th>
                                 <th scope="col">Topic</th>
                                 <th scope="col">Avg Time</th>
                                 <th scope="col">Diff Level</th>
                                 
                              </tr>
                           </thead>
                           <tbody>
                              <?php 

                              foreach($question_list as $question) { ?>

                              
                                 <tr  class="draggable" id="<?php echo $question['question_id'];?>">
                                    <td><?php echo $question['question'];?></td>
                                    <td><?php echo $question['class_name'];?></td>
                                    <td><?php echo $question['subject_name'];?></td>
                                    <td><?php echo $question['topic_name'];?></td>
                                    <td><?php echo $question['avg_time'];?></td>
                                    <td><?php echo $question['difficulty_level'];?></td>
                                   
                                 </tr>
                               <?php } ?>
                                       </tbody>
                                    </table>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>

                  <script src="<?php echo $asset_url; ?>/js/jquery.js"></script>
	  <script src="<?php echo $asset_url; ?>/js/jquery-ui-1.12.1/jquery-ui.min.js"></script>
      <script src="<?php echo $asset_url; ?>/js/datetimepicker/jquery.datetimepicker.full.js"></script>
      <script src="<?php echo $asset_url; ?>/js/bootstrap.min.js"></script>
      <script src="<?php echo $asset_url; ?>/js/jquery.stellar.min.js"></script>
      <script src="<?php echo $asset_url; ?>/js/jquery.magnific-popup.min.js"></script>
	   <script src="<?php echo $asset_url; ?>/js/jquery.confirm.min.js"></script>
	  
      <script src="<?php echo $asset_url; ?>/js/smoothscroll.js"></script>
      <script src="<?php echo $asset_url; ?>/js/custom.js"></script>
      <script src="<?php echo $asset_url; ?>/js/ajaxcalls.js"></script>

      <script>
  
  $( function() {
            $( ".draggable" ).draggable();
            $( ".droppable" ).droppable({
              drop: function( event, ui ) {
                $( this )
                  .addClass( "ui-state-highlight" )
                  .find( "p" )
                    .html( "Dropped!" );
              }
            });
          } );
  </script>
     </body>
</html>        