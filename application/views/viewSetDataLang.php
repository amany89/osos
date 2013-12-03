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
   <!--start tab jquery-->         <?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
   <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>/css/easy-responsive-tabs.css" />
    <script src="<?php echo base_url()?>/js/easyResponsiveTabs.js" type="text/javascript"></script>
   <script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true,   // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);

                $name.text($tab.text());

                $info.show();
            }
        });
    });
    </script>
	<!--end tab jquery-->
 </head>
 <body>
    <?php include('viewHeaderAdmin.php');?>
    
     <div id="horizontalTab" style="direction:ltr">
	 <?php
	if($this->session->userdata('companyName')){
		?>
            <ul class="resp-tabs-list" style="direction:ltr">
                <li><?php echo $this->session->userdata('companyName');?> (english language)</li>
                <li><?php echo $this->session->userdata('companyName');?> (arabic language)</li>
            </ul>
       <?php } ?>
            <div class="resp-tabs-container" style="direction:ltr">
               
          