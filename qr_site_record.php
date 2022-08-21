<?php
include "connection/connection.php";
include "functions/functions.php";
if(isset($_GET['REC']))
{
	$site_id = $_GET['REC'];
	$sql = "select * from site_details_master where site_id = '$site_id'";
	$fres2 = qf($sql);
}
else
{
	echo "<script>
		alert('Please select Site!');
		location.replace('dashboard.php');
	</script>";
}
?>
<!DOCTYPE html>
<html>
<head>


<!-- advance loading alert start-->


<script type="text/javascript"> 
<!-- 
function showHide(){ 
//create an object reference to the div containing images 
var oimageDiv=document.getElementById('searchingimageDiv') 
//set display to inline if currently none, otherwise to none 
oimageDiv.style.display=(oimageDiv.style.display=='none')?'inline':'none' 
} 
//--> </script>













<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
$(window).load(function() {
	$(".loader").fadeOut("slow");
})
</script>


<style>.loader {    
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url('images/loading.gif') 100% 100% no-repeat rgb(249,249,249,0.8);    background-position: center; 

}
.loader1 {
  position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url('images/loader.gif') 100% 100% no-repeat rgb(249,249,249,0.8);    background-position: center; 
  
}

</style>


<!-- advance loading alert end-->




  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title_head ; ?> | Site Record</title>
  <link rel="stylesheet" href="dist\css\AdminLTE.min.css">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<!-- our customised style sheet - text editor -->
	 <link rel="stylesheet" href="style/style.css">
	 
  <!-- Pace style -->
  <link rel="stylesheet" href="plugins/pace/pace.min.css">
	 
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue  sidebar-collapse">


<div class=""></div>



<div id="searchingimageDiv" style="display:none;position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url('images/loader.gif') 100% 100% no-repeat rgb(249,249,249, 0.8);    background-position: center; " > </div>







<div class="wrapper">

  <header class="main-header">
    
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	

<style type="text/css">
<!--
.style2 {font-size: 16px}
-->
</style>
<section class="content-header">
	  <h1>
        Site Record
        <small>&nbsp;</small>
      </h1>
      
</section>
<br />


          <table width="90%" border="0" align="center" cellpadding="1" cellspacing="1" class="main_bod" >
            <tr class="head_font" background="images\1by25.jpg">
              <td height="40" colspan="9" align="center">Landlord Details</td>
            </tr>
            <tr class="fnt">
              <td height="21" colspan="9" align="right">&nbsp;</td>
            </tr>
            <tr class="fnt">
              <td width="13%" height="39" align="right">Name</td>
              <td width="2%" height="39" align="center">:</td>
              <td width="18%" height="39" align="left"><?php echo @$fres2['site_landlord'];?></td>
              <td width="13%" height="38" align="right">Father's Name </td>
              <td width="2%" height="38" align="center">:</td>
              <td width="18%" height="38" align="left"><?php echo @$fres2['landlord_fname'];?></td>
              <td width="14%" height="39" align="right">Mobile No. </td>
              <td width="2%" height="39" align="center">:</td>
              <td width="18%" height="39" align="left"><?php echo @$fres2['landlord_mobile'];?></td>
            </tr>
            <tr class="fnt">
              <td height="21" colspan="9" align="right">&nbsp;</td>
            </tr>
            <tr class="head_font" background="images\1by25.jpg">
              <td height="36" colspan="9" align="center" >Site Details </td>
            </tr>
            <tr class="fnt">
              <td height="21" colspan="9" align="right">&nbsp;</td>
            </tr>
            <tr class="fnt">
              <td height="39" align="right">Company</td>
              <td height="39" align="center">:</td>
              <td height="39" align="left"><?php echo com_name($fres2['com_id']);?></td>
              <td height="39" align="right">&nbsp;</td>
              <td height="39" align="center">&nbsp;</td>
              <td height="39" align="left">&nbsp;</td>
              <td height="39" align="right">Category</td>
              <td height="39" align="center">:</td>
              <td height="39" align="left"><?php echo cat_name($fres2['cat_id']);?></td>
            </tr>
            <tr class="fnt">
              <td height="38" align="right">Item Length </td>
              <td height="38" align="center">:</td>
              <td height="38" align="left"><?php echo @$fres2['item_length'];?></td>
              <td height="39" align="right">&nbsp;</td>
              <td height="39" align="center">&nbsp;</td>
              <td height="39" align="left">&nbsp;</td>
              <td height="39" align="right">Item Width </td>
              <td height="39" align="center">:</td>
              <td height="39" align="left"><?php echo @$fres2['item_width'];?></td>
            </tr>
            <tr class="fnt">
              <td height="38" align="right">Site Type</td>
              <td height="38" align="center">:</td>
              <td height="38" align="left"><?php echo @$fres2['site_type'];?></td>
              <td height="39" align="right">&nbsp;</td>
              <td height="39" align="center">&nbsp;</td>
              <td height="39" align="left">&nbsp;</td>
              <td height="39" align="right">Item Total Size</td>
              <td height="39" align="center">:</td>
              <td height="39" align="left"><?php echo @$fres2['item_total_size']." ".size_type($fres2['cat_id']);?></td>
            </tr>
            <tr class="fnt">
              <td height="38" align="right">Contract Date</td>
              <td height="38" align="center">:</td>
              <td height="38" align="left"><?php echo date_reverse(@$fres2['contract_date']);?></td>
              <td height="39" align="right">Installation Date</td>
              <td height="39" align="center">:</td>
              <td height="39" align="left"><?php echo date_reverse(@$fres2['installation_date']);?></td>
              <td height="39" align="right">Work Permit Date</td>
              <td height="39" align="center">:</td>
              <td height="39" align="left"><?php echo date_reverse(@$fres2['permission_date']);?></td>
            </tr>
            <tr class="fnt">
              <td height="21" colspan="9" align="right">&nbsp;</td>
            </tr>
            <tr class="head_font" background="images\1by25.jpg">
              <td height="36" colspan="9" align="center" >Site Adderess </td>
            </tr>
            <tr class="fnt">
              <td height="21" colspan="9" align="right">&nbsp;</td>
            </tr>
            <tr class="fnt">
              <td height="39" align="right">Ward No </td>
              <td height="39" align="center">:</td>
              <td height="39" align="left"><?php echo @$fres2['site_ward_no'];?></td>
              <td height="39" align="right">Location</td>
              <td height="39" align="center">:</td>
              <td height="39" align="left"><?php echo @$fres2['site_location'];?></td>
              <td height="38" align="right"> PIN </td>
              <td height="38" align="center">:</td>
              <td height="38" align="left"><?php echo @$fres2['site_pin'];?></td>
            </tr>
            <tr class="fnt">
              <td height="38" align="right">Area</td>
              <td height="38" align="center">:</td>
              <td height="39" colspan="7" align="left"><?php echo @$fres2['site_area'];?></td>
            </tr>
            
            <tr class="fnt">
              <td height="21" colspan="9" align="right">&nbsp;</td>
            </tr>
            <tr background="images\1by25.jpg">
              <td colspan="9" align="center" height="21">&nbsp;</td>
            </tr>
  </table>

   
  
  
<br /><br />

<?php include "includes/footer.php";?>