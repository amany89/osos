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
     <?php
	if($this->session->userdata('companyName')){
		?>
            <ul class="resp-tabs-list" style="direction:ltr">
                <li><?php echo $this->session->userdata('companyName');?> slider</li>
            </ul>
       <?php } ?>
      <?php
      	if($slider){
			echo 'not exist';
			}else{
				?>
				
				<div>
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
			<th>Rendering engine</th>
			<th>Browser</th>
			<th>Platform(s)</th>
			<th>Engine version</th>
			<th>CSS grade</th>
		</tr>
	</thead>
	<tbody>
    <?php 
	foreach($about_eng as $rowAll){
				$ID          = $rowAll->ID;
				$captionAR   = $rowAll->captionAR;
				$captionEN   = $rowAll->captionEN;
				$urlImage    = $rowAll->urlImage;
				$imagePath   = $rowAll->imagePath;
	?>
		<tr class="gradeX">
			<td>Trident</td>
			<td>Internet
				 Explorer 4.0</td>
			<td>Win 95+</td>
			<td class="center">4</td>
			<td class="center">X</td>
		</tr>
     <?php }?>
	</tbody>
	<tfoot>
		<tr>
			<th>Rendering engine</th>
			<th>Browser</th>
			<th>Platform(s)</th>
			<th>Engine version</th>
			<th>CSS grade</th>
		</tr>
	</tfoot>
</table>
            </div>
				<?php
				}//end if slider
	  ?>

 </div>
<?php include('viewFooterAdmin.php');?>