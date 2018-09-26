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
<img class="bg_img" src="<?php echo $asset_url; ?>/images/dashbaord_bg2.png">

      <!-- Header -->
      <header class="stu_header">
         <div class="container">
		 <?php
		 if($this->session->userdata('user_name')){ ?>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
               <button class="slide-toggle navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
               <span class="icon icon-bar"></span>
               <span class="icon icon-bar"></span>
               <span class="icon icon-bar"></span>
               </button>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">   
               <img src="<?php echo $asset_url; ?>/images/logo.png">
            </div>
			
			
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-right">
               <span class="stuhead_wel_txt col-lg-5 col-md-5 col-sm-5 col-xs-5">Welcome</span> 
               <div class="stu_acct-wrap col-lg-4 col-md-4 col-sm-4 col-xs-4">
                  <div class="input-group">
                     <div class="input-group-append">
                        <span class="stuhead_wel_txt"><?php echo $this->session->userdata('user_name');?></span> 
                        <a href="#" data-toggle="dropdown"><i class="fa fa-caret-down"></i></a>
                        <div class="dropdown-menu">
                            <a style="padding-bottom:10px;" class="dropdown-item" data-toggle="tab" href="#users_tab" onclick="viewUser(<?php echo $this->session->userdata('user_id');?>,'users_tab');" >Profile</a>
                           <a class="dropdown-item" href="PulseAuth/logout">Logout</a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                  <img src="<?php echo $asset_url; ?>/images/profile-pic.png" class="profile-pic img-circle" alt="Cinque Terre" width="80" > 
               </div>
            </div>
			
			<?php } ?>
			
         </div>
      </header>

      <?php echo $body; ?>
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