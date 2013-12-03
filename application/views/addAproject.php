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
    $(document).ready(function () {
		/*$( "#addimages" ).click(function() {
			var count_images = parseInt($("#count_images").val())+1;;
			document.getElementById("add_images_div").innerHTML=document.getElementById("add_images_div").innerHTML+'<div class="control-group"><label class="control-label" for="message">صورة '+count_images+' : *</label><div class="controls"><input type="file" name="userfile_'+count_images+'"  id="userfile_'+count_images+'" ></div><label class="control-label" for="message"> '+count_images+'نص الصورة : *</label><div class="controls"><input type="text" class="input-xlarge" name="txt_image_ar_'+count_images+'"  id="txt_image_ar_'+count_images+'" ></div><label class="control-label" for="message"> '+count_images+'Caption english : *</label><div class="controls"><input type="text" class="input-xlarge" name="txt_image_en_'+count_images+'"  id="txt_image_en_'+count_images+'" ></div> </div>';
			$("#count_images" ).val(count_images);
		});*/
	});
	function validate_engaa(){
		if($('#txt_title_prj').val().length<5){$('#txt_title_prj').css('border-color','red');
		return false;
		}else{$('#txt_title_prj').css('border-color','green');
			}
		///	
		if($('#userfile').val().length<5){
			$('#userfile').css('border-color','red');
		    return false;
		 }else{$('#userfile').css('border-color','green');
			}
		////	
		if($('#txt_image_main').val().length<5){
			$('#txt_image_main').css('border-color','red');
		    return false;
		 }else{$('#txt_image_main').css('border-color','green');
			}
		////	
		if($('#txt_year_pj').val().length<5){
			$('#txt_year_pj').css('border-color','red');
		    return false;
		 }else{$('#txt_year_pj').css('border-color','green');
			}
			////	
		if($('#txt_country_pj').val()==0){
			$('#txt_country_pj').css('border-color','red');
		    return false;
		 }else{$('#txt_country_pj').css('border-color','green');
			}
			////	
		if($('#txt_city_pj').val()==0){
			$('#txt_city_pj').css('border-color','red');
		    return false;
		 }else{$('#txt_city_pj').css('border-color','green');
			}
			////	
		if($('#txt_region_pj').val()==0){
			$('#txt_region_pj').css('border-color','red');
		    return false;
		 }else{$('#txt_region_pj').css('border-color','green');
			}
		////	
		if($('#txt_desc_pj').val().length<5){
			$('#txt_desc_pj').css('border-color','red');
		    return false;
		 }else{$('#txt_desc_pj').css('border-color','green');
			}
		}
    </script>
    <script type="text/javascript" src="<?php echo base_url()?>/js/jquery.form.js"></script>

<script type="text/javascript" >
 $(document).ready(function() { 
		
            $('#userfile_1').live('change', function()			{ 
			var preview = document.getElementById("previewall").innerHTML+document.getElementById("preview").innerHTML; 
			$("#previewall").html(preview);
			    $("#preview").html('<img src="loader.gif" alt="Uploading...."/>');
			$("#imageform").ajaxForm({
						target: '#preview'
		}).submit();
		
			});
        }); 
</script>
<style>

body
{
font-family:arial;
}
.preview
{
width:200px;
border:solid 1px #dedede;
padding:10px;
}
#preview
{
color:#cc0000;
font-size:12px
}

</style>
 </head>
 <body>
    <?php include('viewHeaderAdmin.php');?>

        <?php if($comp_ID==0){
			echo'<div>not exist</div>';
			}else{
				if($comp_ID<6&&$comp_ID>0);?>
  <?php if($this->session->flashdata('msg')){?><div id="divMessage" class="<?php echo $this->session->flashdata('msg_class');?>" ><?php echo $this->session->flashdata('msg');?></div><?php }  ?>
               
            	<?php echo form_open_multipart('projects/insert_project_ar');?>
						  <fieldset>
                          <legend>
                          </legend>
						    <div class="control-group">
						      <label class="control-label" for="title">عنوان المشروع : *</label>
						      <div class="controls">
						        <input type="text" class="input-xlarge" name="txt_title_prj"  id="txt_title_prj" value="" >
                                <input type="hidden" name="comp_ID" value="<?php echo $comp_ID; ?>" >
						      </div>
                              </div>
						    <div class="control-group">
						      <label class="control-label">الصورة الرئيسية للمشروع :*</label>
						      <div class="controls">
						       <input type="file" name="userfile"  id="userfile" >
						      </div>
						    </div> <div class="control-group">
						      <label class="control-label">النص الخاص بالصورة الرئبسية :</label>
						      <div class="controls">
						      <input type="text" class="input-xlarge" name="txt_image_main"  id="txt_image_main" value="" >
                             
						      </div>
						    </div>
                              <h4>الصور الخاصه بالمشروع</h4>
                              <?php $count_images=1;?>
                             <!------------------------------------------>
						    <div class="control-group">
						      <label class="control-label" for="message">صورة : *</label>
						      <div class="controls">
                              
						       <input type="file" name="userfile_1"  id="userfile_1" >
                             
                              
						      </div><div id='preview'>
</div>
<div id='previewall'>
</div>

                              <label class="control-label" for="message"> نص الصورة : *</label>
						      <div class="controls">
						     <input type="text" class="input-xlarge" name="txt_image_ar_1"  id="txt_image_ar_1" value="" >
						      </div>
                              <label class="control-label" for="message"> Caption english : *</label>
						      <div class="controls">
						     <input type="text" class="input-xlarge" name="txt_image_en_1"  id="txt_image_en_1" value="" >
						      </div>
                              </div>
                              <div id="add_images_div" ></div>
                              <input type="hidden" name="count_images" id="count_images" value="1" >
                              <a href="#" id="addimages" >+ اضافة صور</a>
                              <!------------------------------------------>
						    
                             <div class="control-group">
						      <label class="control-label" >بلد المشروع :</label>
						      <div class="controls">
                               <select name="txt_country_pj"  id="txt_country_pj"  >
                               		<option value="0">اختر البلد</option>
                                    <?php
                                    	if($country!=0){
											foreach($country as $row){
												$ID_country   = $row->ID;
												$Name_country = $row->Name;
											?>
											<option value="<?php echo $ID_country;?>"><?php echo $Name_country;?></option>
											<?php	
											}
										}
									?>
                               </select>
						      </div>
                            </div>
                             <div class="control-group">
						      <label class="control-label" >مدينه المشروع :</label>
						      <div class="controls">
                                <select name="txt_city_pj"  id="txt_city_pj" >
                               		<option value="0">اختر المدينة</option>
                                    <?php
                                    	if($city!=0){
											foreach($city as $row){
												$ID_city   = $row->ID;
												$Name_city = $row->Name;
											?>
											<option value="<?php echo $ID_city;?>"><?php echo $Name_city;?></option>
											<?php	
											}
										}
									?>
                               </select>
						      </div>
                            </div>
                             <div class="control-group">
						      <label class="control-label" >منطقه المشروع :*</label>
						      <div class="controls">
                               <select name="txt_region_pj"  id="txt_region_pj"  >
                               		<option value="0">اختر المنطقة</option>
                                    <?php
                                    	if($region!=0){
											foreach($region as $row){
												$ID_region   = $row->ID;
												$Name_region = $row->Name;
											?>
											<option value="<?php echo $ID_region;?>"><?php echo $Name_region;?></option>
											<?php	
											}
										}
									?>
                               </select>
						      </div>
                            </div>
                             <div class="control-group">
						      <label class="control-label" >وصف المشروع :*</label>
						      <div class="controls">
                                <textarea class="input-xlarge" name="txt_desc_pj"  id="txt_desc_pj" rows="3"></textarea>
						      </div>
                            </div>
                             <div class="control-group">
						      <label class="control-label" >حالة المشروع :*</label>
						      <div class="controls">
                               <select name="slct_is_active"  id="slct_is_active"  >
                               		<option value="0">مفعل</option>
                               		<option value="0">غير مفعل</option>
                               </select>
						      </div>
                            </div>
                            
	                    <div class="form-actions">
			            <button type="submit" onClick="return validate_eng();" class="btn btn-primary btn-large">Submit</button>
	    			      <button type="reset" class="btn">Cancel</button>
	        			</div>
						  </fieldset>
				  <?php  echo form_close();?>
		<?php }//enf if?>
<?php include('viewFooterAdmin.php');?>