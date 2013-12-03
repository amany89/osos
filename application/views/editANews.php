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
   <script type="text/javascript">
   
	function validate_eng(){
		if($('#name_eng').val().length<5){$('#name_eng').css('border-color','red');$('#name_eng_div').show();
		return false;
		}else{$('#name_eng').css('border-color','green');$('#name_eng_div').hide();
			}
		if($('#content').val().length<5){
			$('#content').css('border-color','red');$('#content_eng_div').show();
		    return false;
		 }else{$('#content').css('border-color','green');$('#content_eng_div').hide();
			}
		}
    </script>
    
 </head>
 <body>
    <?php include('viewHeaderAdmin.php');?>

        <?php if($news==0){
			echo'<div>not exist</div>';
			}else{
				extract($news);?>

            	<?php echo form_open_multipart('setData/update_news_ar');?>
						  <fieldset>
                           <?php if($this->session->flashdata('msg')){?><div id="divMessage" class="<?php echo $this->session->flashdata('msg_class');?>" ><?php echo $this->session->flashdata('msg');?></div><?php }  ?>
                          <legend></legend>
						    <div class="control-group">
						      <label class="control-label" for="title">العنوان : *</label>
						      <div class="controls">
						        <input type="text" class="input-xlarge" name="name_eng"  id="name_eng" value="<?php echo $Title; ?>" >
                                <code id="name_eng_div" class="hidden" >error content</code>
                                
                                <input type="hidden" name="txt_ID" value="<?php echo $ID; ?>" >
						      </div>
                              </div>
						    <div class="control-group">
						      <label class="control-label" for="message">المحتوى : *</label>
						      <div class="controls">
						        <textarea class="input-xlarge" name="content" id="content" rows="3"><?php echo $Content; ?></textarea>
                              <code id="content_eng_div" class="hidden">error content</code>
                              
						      </div>
                              </div>
						    <div class="control-group">
						      <label class="control-label" >رابط الصورة :</label>
						      <div class="controls">
						       <input type="text" class="input-xlarge" name="urlImage"  id="urlImage" value="<?php echo $urlImage; ?>" >
                              <code id="image_url_div" class="hidden" >error content</code>
                              
						      </div>
                              </div>
						    <div class="control-group">
						      <label class="control-label">الصورة :</label>
						      <div class="controls">
						       <input type="file" name="userfile"  id="userfile" >
                              <code id="image_div" class="hidden" >error content</code>
                              <?php 
							  	$filename = "assets/uploads/".$imagePath;
							  	if($imagePath!=""&&file_exists("$filename")){
							  		
									?>
                                    <div class="bs-example bs-example-images">
									<img src="<?php echo base_url().$filename?>" width="150px" class="img-thumbnail">
                                    </div>
									<?php
								}
							   ?>
                              
						      </div>
						    </div>
	                    <div class="form-actions">
			            <button type="submit" onClick="return validate_eng();" class="btn btn-primary btn-large">Submit</button>
	    			      <button type="reset" class="btn">Cancel</button>
	        			</div>
						  </fieldset>
				  <?php echo form_close();?>
		<?php }//enf if?>
<?php include('viewFooterAdmin.php');?>