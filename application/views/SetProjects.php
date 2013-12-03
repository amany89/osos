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
    <style type="text/css" title="currentStyle">
    @import "<?php echo base_url()?>/css/demo_table.css";
    </style>
    <script type="text/javascript" language="javascript" src="<?php echo base_url()?>/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
	var oTable = $('#example').dataTable( {
		"sPaginationType": "full_numbers",
		"bSortClasses": false
	} );
	
	$('td', oTable.fnGetNodes()).hover( function() {
		var iCol = $('td').index(this) % 5;
		var nTrs = oTable.fnGetNodes();
		$('td:nth-child('+(iCol+1)+')', nTrs).addClass( 'highlighted' );
	}, function() {
		$('td.highlighted', oTable.fnGetNodes()).removeClass('highlighted');
	} );
} );
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
        
			<div class="tab-pane active">
            	<a href="<?php echo site_url('projects/addEProj/'.$CompanyID)?>"  ><span class="ui-button-text">&nbsp;add</span></a>
				<?php if($proj_eng==0){
			echo'<div>not exist</div>';
			}else{?><table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
					<thead>
						<tr>
							<th>image</th>
							<th>year</th>
							<th>title</th>
							<th>country</th>
							<th>city</th>
							<th>edit</th>
							<th>delete</th>
						</tr>
					</thead>
					<tbody>
            	<?php
                	foreach($proj_eng as $row_eng){
						$Title           = $row_eng->ProjectTitle;
						$ID              = (int)$row_eng->ID;
						$ImageArray      = $row_eng->ImageArray;
						$Project_year    = $row_eng->Project_year;
						$country         = $row_eng->country;
						$city            = $row_eng->city;
						$ImageArray      = explode( ',',$ImageArray);
						$imagePath       = $ImageArray [0];
				?>		
				<tr>
					<td>
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
					</td>
					<td>
					<?php echo $Project_year;?>
					</td>
					<td>
					<?php echo $Title;?>
					</td>
					<td>
					<?php echo $country;?>
					</td>
					<td>
					<?php echo $city;?>
					</td>
					<td>
					<a href="<?php echo site_url('projects/editEProj/'.$ID)?>"  ><span class="ui-button-text">&nbsp;edit</span></a>
					</td>
					<td>
					<a href="<?php echo site_url('projects/deleteNews/'.$ID)?>"  ><span class="ui-button-text">&nbsp;delete</span></a>
					</td>
				</tr>		
				<?php }?>
			</tbody>
			<tfoot>
				<tr>
							<th>image</th>
							<th>year</th>
							<th>title</th>
							<th>country</th>
							<th>city</th>
							<th>edit</th>
							<th>delete</th>
						</tr>
			</tfoot>
		</table>
<?php }//end if ?>
            </div>
		<div class="tab-pane active">
            	<a href="<?php echo site_url('projects/addAProj/'.$CompanyID)?>"  ><span class="ui-button-text">&nbsp;add</span></a>
			
        <?php if($proj_ar==0){
			echo'<div>not exist</div>';
			}else{
			?>
				<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
					<thead>
						<tr>
							<th>الصورة</th>
							<th>سنة المشروع</th>
							<th>عنوان المشروع</th>
							<th>الدولة</th>
							<th>المدينة</th>
							<th>تعديل</th>
							<th>حذف</th>
						</tr>
					</thead>
					<tbody>
            	<?php
                	foreach($proj_ar as $row_ar){
						$Title           = $row_ar->ProjectTitle;
						$ID              = (int)$row_ar->prj_id;
						$ImageArray      = $row_ar->ImageArray;
						$Project_year    = $row_ar->Project_year;
						$country         = $row_ar->country;
						$city            = $row_ar->city;
						$ImageArray      = explode( ',',$ImageArray);
						$imagePath       = $ImageArray[0];
				?>		
				<tr>
					<td>
                    <?php 
							  	$filename = "assets/uploads/".$imagePath;
							  	if($imagePath!=""&&file_exists("$filename")){
									?>
                                    <div class="bs-example bs-example-images">
									<img src="<?php echo base_url().$filename?>" width="120px" class="img-thumbnail">
                                    </div>
									<?php
								}
							   ?>
					</td>
					<td>
					<?php echo $Project_year;?>
					</td>
					<td>
					<?php echo $Title;?>
					</td>
					<td>
					<?php echo $country;?>
					</td>
					<td>
					<?php echo $city;?>
					</td>
					<td>
					<a href="<?php echo site_url('projects/editAProj/'.$ID)?>"  ><span class="ui-button-text">&nbsp;edit</span></a>
					</td>
					<td>
					<a href="<?php echo site_url('projects/deleteNews/'.$ID)?>"  ><span class="ui-button-text">&nbsp;delete</span></a>
					</td>
				</tr>		
				<?php }?>
			</tbody>
			<tfoot>
					<tr>
							<th>الصورة</th>
							<th>سنة المشروع</th>
							<th>عنوان المشروع</th>
							<th>الدولة</th>
							<th>المدينة</th>
							<th>تعديل</th>
							<th>حذف</th>
						</tr>
			</tfoot>
		</table>
	

		<?php }//end if ?> 
            </div>   
         </div>

 </div>
<?php include('viewFooterAdmin.php');?>