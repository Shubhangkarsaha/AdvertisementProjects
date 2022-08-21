<?php include "includes/header.php";
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
         All <?php if(isset($_GET['active'])){echo "Active ";}?>Site List
        <small>&nbsp;</small>
      </h1>
      
</section>
<br>
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tbody>
    <tr align="center" class="head_font" background="images\1by25.jpg">
      <td width="3%"><b>Sl. No.</b></td>
      <td width="7%">Unique Add ID </td>
      <td width="18%" height="40"><strong>Landlord Details </strong></td>
      <td width="12%"><strong>Address</strong></td>
      <td width="15%"><strong>Site Details </strong></td>
      <td width="11%"><strong>Item Details </strong></td>
      <td width="13%"><strong>Dates</strong></td>
      <td width="6%">Status</td>
      <td width="15%" height="40"><strong>Options</strong></td>
    </tr>
    <tr align="center" >
      <td height="25" colspan="14">&nbsp;</td>
    </tr>
    <?php
	if(isset($_GET['active']))
	{
		  $fsql = "select * from site_details_master where site_status = '0' order by site_id desc";
	}
	else if(isset($_GET['emptylocation']))
	    {
		   $fsql = "select * from site_details_master where site_latitude = '' and site_longitude = '' order by site_id desc";
		 } 
	else
	{	
		  $fsql = "select * from site_details_master order by site_id desc";
	}
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
      <td align="center"><?php echo @$fres['site_id']+1000;?></td>
      <td align="center"><table width="100%" border="0" cellspacing="1" cellpadding="1">
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
      <td align="center"><table width="100%" border="0" cellspacing="1" cellpadding="1">
        <tr align="center" >
          <td width="45%" align="right"><strong> Size Type </strong></td>
          <td width="8%"><strong>:</strong></td>
          <td width="47%" align="left"><?php echo @$fres['item_size_type'];?></td>
        </tr>
        <tr align="center">
          <td align="right"><strong>Size </strong></td>
          <td><strong>:</strong></td>
          <td align="left"><?php echo @$fres['item_size'];?></td>
        </tr>
        <tr align="center">
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
      <td><strong><a href="change_status.php?SID=<?php echo @$fres['site_id'];?>" style="color:<?php echo $clr;?>"><?php echo $status;?></a></strong></td>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="19%" align="center"><a href="site_master.php?Edit=<?php echo @$fres['site_id'];?>">
            <input type="image" name="imageField" src="allicons/68.gif" title="Edit Record" height="30" width="35"/>
          </a></td>
         
          <td width="20%" align="center"><a href="whatsapp://send?text=<?php echo "http://maps.google.com/?q=".$fres['site_latitude'].",".$fres['site_longitude'];?>" data-action="share/whatsapp/share" onClick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on whatsapp">
             <input type="image" name="imageField3" src="allicons/64.png" title="Whatsapp" height="30" width="35"/>
          </a></td>
          <td width="22%" align="center"><a href="geolocation.php?SID=<?php echo $fres['site_id'];?>">
            <input type="image" name="imageField2" src="allicons/66.png" width="35" height="35" title="Geolocation"/>
          </a></td>
          <td width="21%" align="center"><a href="map.php?MAP=<?php echo @$fres['site_id'];?>" target="_blank">
            <input type="image" name="imageField23" src="allicons/65.png" width="35" height="35" title="Map"/>
          </a></td>
          <td width="18%" align="center"><a href="site_master.php?Del=<?php echo @$fres['site_id'];?>" >
            <input type="image" name="imageField22" src="allicons/70.gif" title="Delete Record" />
          </a></td>
        </tr>
      </table></td>
    </tr>
	
	  <?php $i++; }?>
    <tr align="center" >
      <td height="36" colspan="14">
        <table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td align="center" width="50%"><a href="export_site_list.php?<?php if(isset($_GET['active'])) {echo 'active';}?>"><img src="images/excel.png" width="263" height="43" border="0"/></a></th>
          <td align="center" width="50%"><a href="print_site_list.php?<?php if(isset($_GET['active'])) {echo 'active';}?>" target="_blank"><img src="images/print.png" width="300" height="43" border="0"/></a></th>          </tr>
        </table></td>
    </tr>
   
    <!--<tr align="center" class="fnt" >
        <td height="58" colspan="28" valign="top" class="fnt" style="font-size:11px;"><strong><span class="fnt" style="font-size:11px;"><strong><a href="export_bank_list.php?"><img src="images/excel.png" height="40" border="0" /></a></strong></span>&nbsp;&nbsp;&nbsp;&nbsp;<a href="export_work_list.php"><img src="images/print.png" height="38" /></a></strong></td>
    </tr>-->
  </tbody>
  <tr align="center" background="images\1by25.jpg" >
    <td height="22" colspan="14">&nbsp;</td>
  </tr>
</table>
<br />
  
  
  
  
  <?php include "includes/footer.php";?>


   