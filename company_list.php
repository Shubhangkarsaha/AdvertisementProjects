<?php include "includes/header.php";
if(isset($_GET['Generate']))
{
	$company_id = $_GET['Generate'];
	

	$path = "company_qr/company-".$company_id.".png";
	
	//$file = $company_id.".png";
	//$url = "classicsoftwares.com/Projects/smc_adv/company_record.php?REC=$company_id";
	$url = $qr_url."qr_company_record.php?REC=$company_id";
	QRcode::png($url, $path,'H',8,14);
	//exit;
	echo alert_replace('QR Code generated Successfully','company_list.php');
	/*echo "<script>
		alert('QR Code generated Successfully');
		location.replace('company_list.php');
	</script>";*/
}
?>
<section class="content-header">
      <h1>
         All <?php if(isset($_GET['active'])) {echo 'Active';}?> Company List
        <small>&nbsp;</small>
      </h1>
      
</section>
<br>

<table width="98%" border="0" align="center" cellpadding="2" cellspacing="2">
  
  <tbody>
    <tr align="center" class="head_font" background="images\1by25.jpg">
      <td width="4%" height="40"><b>Sl. No.</b> </td>
      <td width="15%"><strong>Company Details </strong></td>
      <td width="19%">Local Address </td>
      <td width="20%"><strong>Permanent Address   </strong></td>
      <td width="18%"><strong>Contact Details </strong></td>
      <td width="11%"><strong>Active Status </strong></td>
      <td width="13%" height="40"><strong>Options</strong></td>
    </tr>
	<tr align="center" >
            <td height="25" colspan="11">&nbsp;</td>
    </tr>
	<?php
	if(isset($_GET['active']))
	  {	
	    $fsql = "select * from company_master where com_status = '0' order by com_id desc";
	  }
	 else
	 {
	    $fsql = "select * from company_master order by com_id desc";
	 } 
	  $frec = q($fsql);
	  $i = 1;
	  while($fres = f($frec))
	  {
		if($i % 2 == 0)
		$col = "bgcolor='#E5E5E5'";
		else
		$col = "bgcolor='#D5D5D5'";
		
		if($fres['com_status'] == '0')
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
      <td height="35"><?php echo $i;?></td>
      <td valign="top"><table width="100%" border="0 " cellspacing="0" cellpadding="0">
        <tr>
          <td width="48%" align="right" ><strong>Company</strong></td>
          <td width="6%" align="center" ><strong>:</strong></td>
          <td width="46%" ><?php echo $fres['com_name'];?></td>
        </tr>
        <tr>
          <td align="right"><strong>CEO</strong></td>
          <td align="center"><strong>:</strong></td>
          <td><?php echo $fres['com_ceo'];?></td>
        </tr>
      </table>      </td>
      <td valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="1">
        <tr>
          <td width="43%" align="right"><strong>Area</strong></td>
          <td width="6%" align="center"><strong>:</strong></td>
          <td width="51%" align="left"><?php echo $fres['com_local_address'];?></td>
        </tr>

        <tr>
          <td align="right"><strong>Ward </strong></td>
          <td align="center"><strong>:</strong></td>
          <td align="left"><?php echo $fres['com_local_ward'];?></td>
        </tr>
        <tr>
          <td align="right"><strong>District</strong></td>
          <td align="center"><strong>:</strong></td>
          <td align="left"><?php echo district_name($fres['com_local_district']);?></td>
        </tr>
        <tr>
          <td align="right"><strong>State</strong></td>
          <td align="center"><strong>:</strong></td>
          <td align="left"><?php echo state_name($fres['com_local_state']);?></td>
        </tr>
        
        <tr>
          <td align="right"><strong>PIN</strong></td>
          <td align="center"><strong>:</strong></td>
          <td align="left"><?php echo $fres['com_local_pin'];?></td>
        </tr>
      </table></td>
      <td valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="1">
        <tr>
          <td width="43%" align="right"><strong>Area</strong></td>
          <td width="6%" align="center"><strong>:</strong></td>
          <td width="51%" align="left"><?php echo $fres['com_per_address'];?></td>
        </tr>
        <tr>
          <td align="right"><strong>Ward </strong></td>
          <td align="center"><strong>:</strong></td>
          <td align="left"><?php echo $fres['com_per_ward'];?></td>
        </tr>
        <tr>
          <td align="right"><strong>District</strong></td>
          <td align="center"><strong>:</strong></td>
          <td align="left"><?php echo district_name($fres['com_per_district']);?></td>
        </tr>
        <tr>
          <td align="right"><strong>State</strong></td>
          <td align="center"><strong>:</strong></td>
          <td align="left"><?php echo state_name($fres['com_per_state']);?></td>
        </tr>
        <tr>
          <td align="right"><strong>PIN</strong></td>
          <td align="center"><strong>:</strong></td>
          <td align="left"><?php echo $fres['com_per_pin'];?></td>
        </tr>
      </table></td>
      <td valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="1">

        <tr>
          <td width="44%" align="right"><strong>Mobile 1 </strong></td>
          <td width="6%" align="center"><strong>:</strong></td>
          <td width="50%" align="left"><?php echo $fres['com_mobile1'];?></td>
        </tr>
        <tr>
          <td align="right"><strong>Mobile 2</strong></td>
          <td align="center"><strong>:</strong></td>
          <td align="left"><?php echo $fres['com_mobile2'];?></td>
        </tr>
        <tr>
          <td align="right"><strong>Telephone</strong></td>
          <td align="center"><strong>:</strong></td>
          <td align="left"><?php echo $fres['com_telephone'];?></td>
        </tr>
        <tr>
          <td align="right"><strong>Email 1</strong></td>
          <td align="center"><strong>:</strong></td>
          <td align="left"><?php echo $fres['com_email1'];?></td>
        </tr>
		<tr>
          <td align="right"><strong>Email 2</strong></td>
          <td align="center"><strong>:</strong></td>
          <td align="left"><?php echo $fres['com_email2'];?></td>
        </tr>
      </table>      </td>
      <td><strong style="color:<?php echo $clr;?>"><?php echo $status;?></strong></td>
      <td><table width="86%" height="36" border="0" cellpadding="0" cellspacing="0">
        <tr>
		
		   <td width="18%" align="center">
		   <?php 
		   		if(file_exists("company_qr/company-".$fres['com_id'].".png")){
					$src = "allicons/63.png";
					$formate = "Download";
			?>
		   <a href="company_qr/company-<?php echo @$fres['com_id'].".png";?>" download>
		   <?php 
		   		}
		   		else
				{
		   			$src = "allicons/63-2.png";
					$formate = "Generate";
		   ?>
		   <a href="company_list.php?Generate=<?php echo $fres['com_id']?>">
		   <?php }?>
			<input type="image" name="imageField22" src="<?php echo $src;?>" width="35" height="35" title="<?php echo $formate;?> QR Code" />
		  </a></td>
          <td align="center"><a href="company_master.php?Edit=<?php echo @$fres['com_id'];?>">
            <input type="image" name="imageField" src="allicons/68.gif" title="Edit Record" height="30" width="35"/>
          </a></td>
          <td align="center"><a href="company_record.php?REC=<?php echo @$fres['com_id'];?>">
            <input type="image" name="imageField2" src="allicons/69.gif" title="View Record"/>
          </a></td>
          <!--<td align="center"><a href="company_master.php?Del=<?php //echo @$fres['com_id'];?>">
            <input type="image" name="imageField22" src="allicons/70.gif" title="Delete Record" />
          </a></td>-->
        </tr>
        <tr>
          <td align="center"><a href="print_company_record.php?REC=<?php echo @$fres['com_id'];?>" target="_blank">
            <input type="image" name="imageField" src="allicons/62.gif" title="Print Record" height="30" width="35"/>
          </a></td>
          <td align="center">&nbsp;</td>
          <td align="center">&nbsp;</td>
        </tr>
		
      </table></td>
    </tr>
	<?php $i++; }?>
	<tr align="center" class="fnt" >
        <td height="58" colspan="29" valign="top" class="fnt" style="font-size:11px;"><table width="100%" height="65" border="0" cellpadding="1" cellspacing="1">
          <tr>
            <td width="48%" height="63" align="center" valign="middle" scope="col"><a href="export_company_list.php?<?php if(isset($_GET['active'])) {echo 'active';}?>"><img src="images/excel.png" width="280" height="52" border="0"/></a></td>
            <td width="52%" align="center" valign="middle" scope="col"><a href="print_company_list.php?<?php if(isset($_GET['active'])) {echo 'active';}?>" target="_blank"><img src="images/print.png" width="292" height="50" border="0"/></a></td>
          </tr>
        </table></td>
    </tr>
  </tbody>
  <tr align="center" background="images\1by25.jpg" >
            <td height="22" colspan="11">&nbsp;</td>
  </tr>
</table>  
  <br />
  
  
  
  
  <?php include "includes/footer.php";?>


