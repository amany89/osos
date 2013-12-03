<!DOCTYPE html>
<html lang="en">
 <head>
   <title>OSOS</title>
   <meta http-equiv="content-type" content="text/html; charset=UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="<?php echo base_url()?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>/css/offcanvas.css" rel="stylesheet">
  	<script src="<?php echo base_url()?>js/modernizr-2.5.3.min.js"></script>
   <script src="<?php echo base_url()?>assets/js/jquery-1.7.1.min.js"></script>
   <script src="<?php echo base_url()?>/js/bootstrap.min.js"></script>
   <script src="<?php echo base_url()?>/js/offcanvas.js"></script> 
   <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>/css/easy-responsive-tabs.css" />
    <script src="<?php echo base_url()?>/js/easyResponsiveTabs.js" type="text/javascript"></script>
   <script type="text/javascript">
    $(document).ready(function () {
		$('#name_eng_div').hide();$('#content_eng_div').hide();	
		$('#name_ar_div').hide();$('#content_ar_div').hide();
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
	function validate_eng(){
		if($('#name_eng').val().length<5){$('#name_eng').css('border-color','red');$('#name_eng_div').show();
		return false;
		}else{$('#name_eng').css('border-color','green');$('#name_eng_div').hide();
			}
		if($('#content_eng').val().length<5){
			$('#content_eng').css('border-color','red');$('#content_eng_div').show();
		    return false;
		 }else{$('#content_eng').css('border-color','green');$('#content_eng_div').hide();
			}
		}
	function validate_ar(){
		if($('#name_ar').val().length<5){$('#name_ar').css('border-color','red');$('#name_ar_div').show();
		return false;
		}else{$('#name_ar').css('border-color','green');$('#name_ar_div').hide();
			}
		if($('#content_ar').val().length<5){
			$('#content_ar').css('border-color','red');$('#content_ar_div').show();
		    return false;
		 }else{$('#content_ar').css('border-color','green');$('#content_ar_div').hide();
			}
		}
    </script>
    
 </head>
 <body>
    <?php include('viewHeaderAdmin.php');?>
    <?php if($this->session->flashdata('msg')){?><div id="divMessage" class="<?php echo $this->session->flashdata('msg_class');?>" ><?php echo $this->session->flashdata('msg');?></div><?php }  ?>
     <?php
	if($this->session->userdata('companyName')){
		?>
        <div id="horizontalTab" class="tab-content" style="direction:ltr">
            <ul class="resp-tabs-list" style="direction:ltr">
                <li><?php echo $this->session->userdata('companyName');?> (english language)</li>
                <li><?php echo $this->session->userdata('companyName');?> (arabic language)</li>
            </ul>
       <?php } ?>
           <div class="resp-tabs-container" style="direction:ltr">
        <?php if($about_eng==0){
			echo'<div>not exist</div>';
			}else{
				foreach($about_eng as $row_eng){
						$Title        = $row_eng->Title;
						$ID           = (int)$row_eng->ID;
						$CompanyID    = (int)$row_eng->CompanyID;
						$Content      = $row_eng->Content;}?>
			<div class="tab-pane active">
            	<?php echo form_open('setData/update_about_eng');?>
						  <fieldset>
                          <legend></legend>
						    <div class="control-group">
						      <label class="control-label" for="title">Title :</label>
						      <div class="controls">
						        <input type="text" class="input-xlarge" name="name_eng"  id="name_eng" value="<?php echo $Title; ?>" >
                                <code id="name_eng_div" >error content</code>
                                
                                <input type="hidden" name="txt_ID_eng" value="<?php echo $ID; ?>" >
                                 <input type="hidden" name="com_id_eng" value="<?php echo $CompanyID; ?>">
						      </div>
                              </div>
						    <div class="control-group">
						      <label class="control-label" for="message">Content</label>
						      <div class="controls">
						        <textarea class="input-xlarge" name="content_eng" id="content_eng" rows="3"><?php echo $Content; ?></textarea>
                              <code id="content_eng_div" >error content</code>
                              
						      </div>
						    </div>
	                    <div class="form-actions">
			            <button type="submit" onClick="return validate_eng();" class="btn btn-primary btn-large">Submit</button>
	    			      <button type="reset" class="btn">Cancel</button>
	        			</div>
						  </fieldset>
				  <?php echo form_close();?>

            </div>
		<?php }//end if about?>
        <?php if($about_ar==0){
			echo'<div>not exist</div>';
			}else{
			foreach($about_ar as $row_ar){
						$Title        = $row_ar->Title;
						$ID           = (int)$row_ar->ID;
						$CompanyID    = (int)$row_ar->CompanyID;
						$Content      = $row_ar->Content;}
				?>
			<div class="tab-pane active">
            	<?php echo form_open_multipart('setData/update_about_ar');?>
						  <fieldset>
                          <legend></legend>
						    <div class="control-group">
						      <label class="control-label" for="title">Title :</label>
						      <div class="controls">
						        <input type="text" class="input-xlarge" name="name_ar"  id="name_ar" value="<?php echo $Title; ?>" >
                                <code id="name_ar_div" >error content</code>
                              <code><?php echo form_error('name_ar'); ?></code>
                                <input type="hidden" name="txt_ID_ar" value="<?php echo $ID; ?>" >
                                 <input type="hidden" name="com_id_ar" value="<?php echo $CompanyID; ?>">
						      </div>
                              </div>
						    <div class="control-group">
						      <label class="control-label" for="message">Content</label>
						      <div class="controls">
						        <textarea class="input-xlarge" name="content_ar" id="content_ar" rows="3"><?php echo $Content; ?></textarea>
                              <code id="content_ar_div" >error content</code>
                              <code><?php echo form_error('content_ar'); ?></code>
						      </div>
						    </div>
	                    <div class="form-actions">
			            <button type="submit" onClick="return validate_ar();" class="btn btn-primary btn-large">Submit</button>
	    			      <button type="reset" class="btn">Cancel</button>
	        			</div>
						  </fieldset>
			  <?php echo form_close();?>

            </div>
		<?php }//end if about?>    
         </div>

 </div>
<?php include('viewFooterAdmin.php');?>