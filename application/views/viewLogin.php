<!DOCTYPE html>
<html lang="en">
 <head>
   <title>OSOS</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="<?php echo base_url()?>/css/bootstrap.min.css" rel="stylesheet">
   <link href="<?php echo base_url()?>/css/signin.css" rel="stylesheet">
   <script src="<?php echo base_url()?>assets/js/jquery-1.7.1.min.js"></script>
   <script src="<?php echo base_url()?>/js/bootstrap.min.js"></script>
   <script src="<?php echo base_url()?>/js/application.js"></script>
 </head>
 <body>
    <div class="container">
    <?php
	if($this->session->flashdata('msg')){?><div id="divMessage" class="<?php echo 'alert '.$this->session->flashdata('msg_class');?>" ><strong>error! </strong><?php echo $this->session->flashdata('msg');?></div><?php } 

?>
      <form class="form-signin" action="<?php echo site_url('login/check_login') ?>"  method="post"  >
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="form-control" placeholder="User Name" name="User_Name" id="User_Name" required autofocus>
        <input type="password" class="form-control" placeholder="Password" name="User_Pass" id="User_Pass" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
    </div>
 </body>
 </html>