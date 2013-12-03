<!DOCTYPE html>
<html lang="en">
 <head>
   <title>OSOS</title>
   <meta http-equiv="content-type" content="text/html; charset=UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="<?php echo base_url()?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>/css/offcanvas.css" rel="stylesheet">
   <script src="<?php echo base_url()?>assets/js/jquery-1.7.1.min.js"></script>
   <script src="<?php echo base_url()?>/js/bootstrap.min.js"></script>
   <script src="<?php echo base_url()?>/js/offcanvas.js"></script> 
   <?php 
    foreach($css_files as $file): ?>
   <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
   <?php endforeach; ?>
   <?php foreach($js_files as $file): ?>
   <script src="<?php echo $file; ?>"></script>
   <?php endforeach; ?> 
 </head>
 <body>
    <?php include('viewHeaderAdmin.php');?>
           <?php
	if($this->session->userdata('companyName')){?><strong><?php echo $this->session->userdata('companyName');?> : </strong><?php } 

?>
          
                <?php echo $output; ?>
<?php include('viewFooterAdmin.php');?>