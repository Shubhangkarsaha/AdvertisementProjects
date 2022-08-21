<?php
include "connection/connection.php";
include "functions/functions.php";
if(isset($_GET['REC']))
{
	$com_id = $_GET['REC'];
	$sql = "select * from company_master where com_id = '$com_id'";
	$res = qf($sql);
	if($res['com_status'] == '0')
		{
			$status = "Active";
			
		}
		else
		{
			$status = "Inactive";
			
		}
		$fsql = "select * from site_details_master where com_id = '$com_id' and site_status = '0' order by site_id desc";
		$count = row_count($fsql);
}
else
{
	echo "<script>
		alert('Please select Company!');
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
  <title><?php echo $title_head ; ?> | Company Record</title>
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
        Company Record
        <small>Of <?php echo com_name($com_id);?></small>
      </h1>
      
</section>
<br />


          <table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" class="main_bod" >
            <tr class="head_font" background="images\1by25.jpg">
              <td width="100%" height="34" align="center"><span class="style2">Company Details</span></td>
            </tr>
            <tr class="fnt">
              <td height="25" align="right">&nbsp;</td>
            </tr>
            <tr class="">
              <td height="21"><table width="100%" border="0" cellspacing="1" cellpadding="1">
                <tr>
                  <td width="14%" height="27" align="right" ><strong>Name</strong></td>
                  <td width="2%" align="center" ><strong>:</strong></td>
                  <td width="16%" align="left" ><?php echo $res['com_name'];?></td>
                  <td width="17%" align="right" ><strong>CEO</strong></td>
                  <td width="2%" align="center" ><strong>:</strong></td>
                  <td width="17%" align="left" ><?php echo $res['com_ceo'];?></td>
                  <td width="12%" align="right" ><strong>Status</strong></td>
                  <td width="2%" align="center" ><strong>:</strong></td>
                  <td width="18%" align="left" ><?php echo $status;?></td>
                </tr>
                <tr>
                  <td align="right">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="right"><strong>Local Address </strong></td>
                  <td align="center"><strong>:</strong></td>
                  <td colspan="7" align="left"><?php echo $res['com_local_address'].", Ward-".$res['com_local_ward'].", ".district_name($res['com_local_district']).", ".state_name($res['com_local_state']).", ".$res['com_local_pin'];?></td>
                </tr>
                <tr>
                  <td align="right">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="right"><strong>Permanent Address </strong></td>
                  <td align="center"><strong>:</strong></td>
                  <td colspan="7" align="left"><?php echo $res['com_per_address'].", Ward-".$res['com_per_ward'].", ".district_name($res['com_per_district']).", ".state_name($res['com_per_state']).", ".$res['com_per_pin'];?></td>
                </tr>
                <tr>
                  <td align="right">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="right"><strong>Email 1 </strong></td>
                  <td align="center"><strong>:</strong></td>
                  <td align="left"><?php echo $res['com_email1'];?></td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="right"><strong>Email 2 </strong></td>
                  <td align="center"><strong>:</strong></td>
                  <td align="left"><?php echo $res['com_email2'];?></td>
                </tr>
                <tr>
                  <td align="right">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="right"><strong>Mobile 1 </strong></td>
                  <td align="center"><strong>:</strong></td>
                  <td align="left"><?php echo $res['com_mobile1'];?></td>
                  <td align="right"><strong>Mobile 2 </strong></td>
                  <td align="center"><strong>:</strong></td>
                  <td align="left"><?php echo $res['com_mobile2'];?></td>
                  <td align="right"><strong>Telephone</strong></td>
                  <td align="center"><strong>:</strong></td>
                  <td align="left"><?php echo $res['com_telephone'];?></td>
                </tr>
              </table></td>
            </tr>
            <tr class="fnt">
              <td height="21" align="right">&nbsp;</td>
            </tr>
            <!--<tr>
              <td height="35" align="center"><input class="head_font" type="submit" name="check" value="Check"/>
                <input type="hidden" name="site_id" value="<?php echo $site_id;?>"/>			  </td>
            </tr>-->
            <tr class="head_font" background="images\1by25.jpg">
              <td height="29" align="center"><span class="style2">Advertisementes</span></td>
            </tr>
            <tr>
              <td align="center">&nbsp;</td>
            </tr>
            <tr class="">
              <td align="center">
			  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tbody>
				<?php if($count >0){?>
                  <tr align="center" class="">
                    <td width="3%"><b>Sl. No.</b></td>
                    <td height="40" colspan="3"><strong>Landlord Details </strong></td>
                    <td width="12%"><strong>Address</strong></td>
                    <td width="17%"><strong>Site Details </strong></td>
                    <td colspan="3"><strong>Item Details </strong></td>
                    <td width="15%"><strong>Dates</strong></td>
                    <td width="6%"><strong>Status</strong></td>
                  </tr>
                  <tr align="center" >
                    <td height="25" colspan="16">&nbsp;</td>
                  </tr>
                  <?php
				  
					  
					  
				  $frec = q($fsql);
				  $i = 1;
				  while($fres = f($frec))
				  {
					if($i % 2 == 0)
					$col = "bgcolor='#E5E5E5'";
					else
					$col = "bgcolor='#D5D5D5'";
					
					if($fres['site_status'] == '0')
					{
						$status = "Active";
					}
					else
					{
						$status = "Inactive";
					}
				  ?>
                  <tr align="center">
                    <td height="93"><?php echo $i;?></td>
                    <td colspan="3" align="center"><table width="100%" border="0" cellspacing="1" cellpadding="1">
                        <tr align="center">
                          <td width="44%" align="right"><strong>Site Landlord </strong></td>
                          <td width="8%"><strong>:</strong></td>
                          <td width="48%" align="left"><?php echo @$fres['site_landlord'];?></td>
                        </tr>
                        <tr align="center">
                          <td align="right"><strong>Landlord Fname</strong></td>
                          <td><strong>:</strong></td>
                          <td align="left"><?php echo @$fres['landlord_fname'];?></td>
                        </tr>
                        <tr align="center">
                          <td align="right"><strong>Mobile No </strong></td>
                          <td><strong>:</strong></td>
                          <td align="left"><?php echo @$fres['landlord_mobile'];?></td>
                        </tr>
                    </table></td>
                    <td align="center"><table width="100%" border="0" cellspacing="1" cellpadding="1">
                        <tr align="center">
                          <td width="44%" align="right"><strong>Ward No </strong></td>
                          <td width="13%"><strong>:</strong></td>
                          <td width="43%" align="left"><?php echo @$fres['site_ward_no'];?></td>
                        </tr>
                        <tr align="center">
                          <td align="right"><strong> Area </strong></td>
                          <td><strong>:</strong></td>
                          <td align="left"><?php echo @$fres['site_area'];?></td>
                        </tr>
                        <tr align="center">
                          <td align="right"><strong> PIN </strong></td>
                          <td><strong>:</strong></td>
                          <td align="left"><?php echo @$fres['site_pin'];?></td>
                        </tr>
                    </table></td>
                    <td align="center"><table width="100%" border="0" cellspacing="1" cellpadding="1">
                        <tr align="center">
                          <td width="44%" align="right"><strong> Location</strong></td>
                          <td width="8%"><strong>:</strong></td>
                          <td width="48%" align="left"><?php echo @$fres['site_location'];?></td>
                        </tr>
                        <tr align="center">
                          <td align="right"><strong> Type</strong></td>
                          <td><strong>:</strong></td>
                          <td align="left"><?php echo @$fres['site_type'];?></td>
                        </tr>
                        <tr align="center">
                          <td align="right"><strong>Company</strong></td>
                          <td align="center"><strong>:</strong></td>
                          <td align="left"><?php echo com_name(@$fres['com_id']);?></td>
                        </tr>
                        <tr align="center">
                          <td align="right"><strong>Category</strong></td>
                          <td align="center"><strong>:</strong></td>
                          <td align="left"><?php echo cat_name(@$fres['cat_id']);?></td>
                        </tr>
                    </table></td>
                    <td colspan="3" align="center"><table width="100%" border="0" cellspacing="1" cellpadding="1">
                        <tr align="center">
                          <td width="45%" align="right"><strong>Size </strong></td>
                          <td width="8%"><strong>:</strong></td>
                          <td width="47%" align="left"><?php echo @$fres['item_length']." X ".$fres['item_width'];?></td>
                        </tr>
                        <tr align="center">
                          <td align="right"><strong>Total Size </strong></td>
                          <td><strong>:</strong></td>
                          <td align="left"><?php echo @$fres['item_total_size']." ".size_type($fres['cat_id']);?></td>
                        </tr>
                    </table></td>
                    <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
                        <tr>
                          <td width="46%" height="21" align="right"><strong>Contract</strong></td>
                          <td width="7%" align="center"><strong>:</strong></td>
                          <td width="47%"><?php echo date_reverse(@$fres['contract_date']);?></td>
                        </tr>
                        <tr>
                          <td height="21" align="right"><strong>Installation</strong></td>
                          <td align="center"><strong>:</strong></td>
                          <td><?php echo date_reverse(@$fres['installation_date']);?></td>
                        </tr>
                    </table></td>
                    <td><?php echo $status;?></td>
                  </tr>
                  <?php $i++; }}else{?>
				  <tr>
				  	<td align="center" colspan="16"><strong>No Record Found </strong></td>
				  </tr>
				  <?php }?>
                </tbody>
              </table>
			  </td>
            </tr>
            <tr class="fnt">
              <td align="center">&nbsp;</td>
            </tr>
            <tr background="images\1by25.jpg">
              <td align="center" height="21">&nbsp;</td>
            </tr>
  </table>


   
  
  


<?php include "includes/footer.php";?>
<script>
/*var p = $("#amount").val();
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = "<strong>Latitude : </strong> <input type='text' name='latitude' id='latitude' value='"+ position.coords.latitude +"'/>" +
  "&nbsp;&nbsp;&nbsp;<strong>Longitude : </strong> <input type='text' name='longitude' id='longitude' value='" + position.coords.longitude +"'/>";
}*/
</script>
      