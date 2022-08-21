<?php include "includes/header.php";

if(isset($_GET['Submit'])){

		$_SESSION['filter_site'] = $_SERVER['REQUEST_URI'];
		
		$site_ward_no = $_GET['site_ward_no'];
		$site_area = $_GET['site_area'];
		$site_pin = $_GET['site_pin'];
		$unique_add_id = $_GET['unique_add_id'];
		
		$company = $_GET['company'];
		$category = $_GET['category'];
		$site_location = $_GET['site_location'];
		
		$contract_date = $_GET['contract_date'];
		$installation_date = $_GET['installation_date'];
		
		$sql = "select * from site_details_master where site_status in ('0','1')";
		$res = qf($sql);
		if($site_ward_no != ""){
			$sql = $sql." and site_ward_no = '$site_ward_no'";
		}
		if($site_area != ""){
			$sql = $sql." and site_area = '$site_area'";
		}
		if($site_pin != ""){
			$sql = $sql." and site_pin = '$site_pin'";
		}
		if($company != ""){
			$sql = $sql." and com_id = '$company'";
		}
		if($category != ""){
			$sql = $sql." and cat_id = '$category'";
		}
		if($site_location != ""){
			$sql = $sql." and site_location = '$site_location'";
		}
		if($contract_date != ""){
			$sql = $sql." and contract_date = '$contract_date'";
		}
		if($installation_date != ""){
			$sql = $sql." and installation_date = '$installation_date'";
		}
		if($unique_add_id != ""){
		    $sql = $sql."and unique_add_id = '$unique_add_id'";
		}	

}


/*if(isset($_GET['Del']))
{
	$D = $_GET['Del'];
	$gsql= "update bank_master set bank_status = '1' where bank_id='$D'";
	$grec= q($gsql);
	
	
	if($grec)
	{ 
		echo "<script>
				alert('Bank Details Deleted Successfully');
				location.replace('bank_list.php?')
				</script>";
	}
}*/



?>
<section class="content-header">
      <h1>
         Filter Site List
        <small></small>
      </h1>
      
</section>
<br>
<table width="98%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tbody>
    <tr align="center" class="head_font" background="images\1by25.jpg">
      <td width="3%"><b>Sl. No.</b></td>
      <td width="7%">Unique Add ID </td>
      <td height="40" colspan="3"><strong>Landlord Details </strong></td>
      <td width="11%"><strong>Address</strong></td>
      <td width="14%"><strong>Site Details </strong></td>
      <td colspan="3"><strong>Item Details </strong></td>
      <td width="14%"><strong>Dates</strong></td>
      <td width="6%">Status</td>
      <td width="15%" height="40"><strong>Options</strong></td>
    </tr>
    <tr align="center" >
      <td height="25" colspan="18">&nbsp;</td>
    </tr>
    <?php
	  
	  $frec = q($sql);
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
			$clr = "#00FF00";
		}
		else
		{
			$status = "Inactive";
			$clr = "#FF0000";
		}
	  ?>
    <tr align="center" <?php echo $col;?>>
      <td height="93"><?php echo $i;?></td>
      <td><?php echo @$fres['site_id']+1000;?></td>
      <td colspan="3"><table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr align="center" <?php echo $col;?>>
            <td width="47%" align="right"><strong>Site Landlord </strong></td>
            <td width="10%"><strong>:</strong></td>
            <td width="43%" align="left"><?php echo @$fres['site_landlord'];?></td>
          </tr>
          <tr align="center" <?php echo $col;?>>
            <td align="right"><strong>Landlord Fname</strong></td>
            <td><strong>:</strong></td>
            <td align="left"><?php echo @$fres['landlord_fname'];?></td>
          </tr>
          <tr align="center" <?php echo $col;?>>
            <td align="right"><strong>Mobile No </strong></td>
            <td><strong>:</strong></td>
            <td align="left"><?php echo @$fres['landlord_mobile'];?></td>
          </tr>
      </table></td>
      <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr align="center" <?php echo $col;?>>
            <td width="44%" align="right"><strong>Ward No </strong></td>
            <td width="13%"><strong>:</strong></td>
            <td width="43%" align="left"><?php echo @$fres['site_ward_no'];?></td>
          </tr>
          <tr align="center" <?php echo $col;?>>
            <td align="right"><strong> Area </strong></td>
            <td><strong>:</strong></td>
            <td align="left"><?php echo @$fres['site_area'];?></td>
          </tr>
          <tr align="center" <?php echo $col;?>>
            <td align="right"><strong> PIN </strong></td>
            <td><strong>:</strong></td>
            <td align="left"><?php echo @$fres['site_pin'];?></td>
          </tr>
      </table></td>
      <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr align="center" <?php echo $col;?>>
            <td width="44%" align="right"><strong> Location</strong></td>
            <td width="8%"><strong>:</strong></td>
            <td width="48%" align="left"><?php echo @$fres['site_location'];?></td>
          </tr>
          <tr align="center" <?php echo $col;?>>
            <td align="right"><strong> Type</strong></td>
            <td><strong>:</strong></td>
            <td align="left"><?php echo @$fres['site_type'];?></td>
          </tr>
          <tr align="center" <?php echo $col;?>>
            <td align="right"><strong>Company</strong></td>
            <td align="center"><strong>:</strong></td>
            <td align="left"><?php echo com_name(@$fres['com_id']);?></td>
          </tr>
          <tr align="center" <?php echo $col;?>>
            <td align="right"><strong>Category</strong></td>
            <td align="center"><strong>:</strong></td>
            <td align="left"><?php echo cat_name(@$fres['cat_id']);?></td>
          </tr>
      </table></td>
      <td colspan="3"><table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr align="center" <?php echo $col;?>>
            <td width="45%" align="right"><strong> Size Type </strong></td>
            <td width="8%"><strong>:</strong></td>
            <td width="47%" align="left"><?php echo @$fres['item_size_type'];?></td>
          </tr>
          <tr align="center" <?php echo $col;?>>
            <td align="right"><strong>Size </strong></td>
            <td><strong>:</strong></td>
            <td align="left"><?php echo @$fres['item_size'];?></td>
          </tr>
          <tr align="center" <?php echo $col;?>>
            <td align="right"><strong>Total Size </strong></td>
            <td><strong>:</strong></td>
            <td align="left"><?php echo @$fres['item_total_size'];?></td>
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
      <td><strong><a href="change_status.php?F&SID=<?php echo @$fres['site_id'];?>" style="color:<?php echo $clr;?>"><?php echo $status;?></a></strong></td>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center"><a href="site_master.php?Edit=<?php echo @$fres['site_id'];?>">
              <input type="image" name="imageField" src="allicons/68.gif" title="Edit Record" height="30" width="35"/>
            </a></td>
            <td align="center"><a href="geolocation.php?SID=<?php echo $fres['site_id'];?>">
              <input type="image" name="imageField2" src="allicons/66.png" width="35" height="35" title="Geolocation"/>
            </a></td>
            <td align="center"><a href="map.php?F&MAP=<?php echo @$fres['site_id'];?>" target="_blank">
              <input type="image" name="imageField2" src="allicons/65.png" width="35" height="35" title="Map"/>
            </a></td>
            <td align="center"><a href="site_master.php?Del=<?php echo @$fres['site_id'];?>" >
              <input type="image" name="imageField22" src="allicons/70.gif" title="Delete Record" />
            </a></td>
          </tr>
      </table></td>
    </tr>
    
    <tr align="center" >
      <td height="36" colspan="18">&nbsp;</td>
    </tr>
    <?php $i++; }?>
    <!--<tr align="center" class="fnt" >
        <td height="58" colspan="28" valign="top" class="fnt" style="font-size:11px;"><strong><span class="fnt" style="font-size:11px;"><strong><a href="export_bank_list.php?"><img src="images/excel.png" height="40" border="0" /></a></strong></span>&nbsp;&nbsp;&nbsp;&nbsp;<a href="export_work_list.php"><img src="images/print.png" height="38" /></a></strong></td>
    </tr>-->
  </tbody>
  <tr align="center" background="images\1by25.jpg" >
    <td height="22" colspan="18">&nbsp;</td>
  </tr>
</table>
<br />
  
  
  
  
  <?php include "includes/footer.php";?>


<script>

/*var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = "<form action='site_data.php?' name='geo' id='geol' method='post' enctype='multipart/form-data'><input type='hidden' name='geoloc' id='geoloc' readonly='' value='"+ position.coords.latitude +"/" + position.coords.longitude +"'/></form>";
}



function geoloc(form){
	document.getElementById(form).submit();
}*/
</script>