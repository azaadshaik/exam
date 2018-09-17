<?php $asset_url = $this->config->item('asset_url'); ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>PULSE - User Dashbaord</title>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=Edge">
      <meta name="description" content="">
      <meta name="keywords" content="">
      <meta name="author" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="<?php echo $asset_url; ?>/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo $asset_url; ?>/css/magnific-popup.css">
      <link rel="stylesheet" href="<?php echo $asset_url; ?>/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/css?family=Oswald:200,400,700" rel="stylesheet">
      <!-- MAIN CSS -->
      <link rel="stylesheet" href="<?php echo $asset_url; ?>/css/templatemo-style.css">
      <link rel="stylesheet" href="<?php echo $asset_url; ?>/css/custom.css">
	  <link rel="stylesheet" href="<?php echo $asset_url; ?>/css/student.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      
   </head>
   <body>
      <img class="bg_img" src="<?php echo $asset_url; ?>/images/dashbaord_bg2.png">
      <!-- Header -->
      <div class="container user_container">
         <div class="user_header">
            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 padding0">
               <div class="user_logo_head"><img class="logo" src="<?php echo $asset_url; ?>/images/logo.png"></div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 padding0">
               <div class="user_inp_section">
                  <div class="user_inner_search pull-left">
                     <input class="user_inp_search" type="text" placeholder="Search" />
                  </div>
                  <div class="user_inner_usericon pull-right">
                     <img src="<?php echo $asset_url; ?>/images/profile-pic.png" class="img-circle pull-left" alt="Cinque Terre" width="40">
                     <div class="input-group pull-left">
                        <div class="input-group-append">
                           <span class="stuhead_wel_txt"><?php echo $this->session->userdata('user_name');?></span> 
                           <a href="#" data-toggle="dropdown"><i class="fa fa-caret-down"></i></a>
                           <div class="dropdown-menu">
                              <a class="dropdown-item" href="#">Profile</a>
                              <a class="dropdown-item" href="PulseAuth/logout">Logout</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 padding0">
               <div class="user_mail_setting">
                  <button class="user_notif_icon"><span class="user_notif_number">2</span></button> 
                  <button class="user_emai_icon"></button> 
                  <button class="user_setting_icon"></button> 
               </div>
            </div>
         </div>
         <div class="user_body">
            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 user_body_left padding0">
               <ul class="nav nav-tabs">
                  <li class="one active"><a data-toggle="tab" href="#users_tab"  data-url="admin/users" onclick="viewUser(<?php echo $this->session->userdata('user_id');?>,'users_tab');" > Home</a></li>
                  <li class="two"><a  data-toggle="tab" href="#userSecondTab">Exams</a></li>
                  <li class="three"><a  data-toggle="tab" href="#my_exams"  data-url="user/studentExams" onclick="viewExams(<?php echo $this->session->userdata('user_id');?>,'my_exams');">My Exams</a></li>
                  
               </ul>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-9 col-xs-9 padding0 Pos_abs_tab">
               <div class="tab-content" style="padding-top:30px;">
                  
                 <div id="users_tab" >
				</div> 
				<div id="exam">
                     
                 </div>
				 <div id="my_exams">
                     
                 </div>


                  
               </div>
            </div>
         </div>
      </div>
      <!-- Header ends -->
      <!-- Center Container -->
      <!-- Center Container ends-->

      <!-- SCRIPTS -->
      
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
	  $("document").ready(function() {
		setTimeout(function() {
        $("ul.nav li:first-child a").trigger('click');
    },10);
});
	  </script>
   </body>
</html>