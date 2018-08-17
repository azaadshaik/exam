<?php $base_url = $this->config->item('base_url'); ?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <title>PULSE - <?php echo $title; ?></title>
      
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=Edge">
      <meta name="description" content="">
      <meta name="keywords" content="">
      <meta name="author" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <link rel="stylesheet" href="<?php echo $base_url; ?>/css/bootstrap.min.css">
      <link rel="stylesheet" href=".<?php echo $base_url; ?>/css/magnific-popup.css">
      <link rel="stylesheet" href="<?php echo $base_url; ?>/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/css?family=Oswald:200,400,700" rel="stylesheet">
      <!-- MAIN CSS -->
      <link rel="stylesheet" href="<?php echo $base_url; ?>/css/templatemo-style.css">
      <link rel="stylesheet" href="<?php echo $base_url; ?>/css/custom.css">
   </head>
   <body class="bg-cls">
   
   <?php echo $body; ?>

      <!-- SCRIPTS -->
      <script src="<?php echo $base_url; ?>/js/jquery.js"></script>
      <script src="<?php echo $base_url; ?>/js/bootstrap.min.js"></script>
      <script src="<?php echo $base_url; ?>/js/jquery.stellar.min.js"></script>
      <script src="<?php echo $base_url; ?>/js/jquery.magnific-popup.min.js"></script>
      <script src="<?php echo $base_url; ?>/js/smoothscroll.js"></script>
      <script src="<?php echo $base_url; ?>/js/custom.js"></script>
   </body>
</html>