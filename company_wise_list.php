<?php include "includes/header.php";
if(isset($_POST['Submit']))
{
	$company = $_POST['company'];
	
}
?>
<section class="content-header">
      <h1>
         Company Wise List
        <small>Selected Company <?php echo com_name($company);?></small>
      </h1>
      
</section>
<br>
<table width="95%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tbody>
    <tr align="center" class="head_font" background="images\1by25.jpg">
      <td width="3%"><b>Sl. No.</b></td>
      <td height="40"><strong>Landlord Details </strong></td>
      <td width="12%"><strong>Address</strong></td>
      <td width="17%"><strong>Site Details </strong></td>
      <td><strong>Item Details </strong></td>
      <td width="13%"><strong>Dates</strong></td>
      <td width="7%">Status</td>
    </tr>
    <tr align="center" >
      <td height="25" colspan="12">&nbsp;</td>
    </tr>
    <?php
	  
	  $fsql = "select * from site_details_master where com_id = '$company' order by site_id desc";
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
          <td width="47%" align="left"><?php echo size_type($fres['cat_id']);?></td>
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
      <td><strong style="color:<?php echo $clr;?>"><?php echo $status;?></strong></td>
    </tr>
	
	  <?php $i++; }?>
    <tr align="center" >
      <td height="36" colspan="12">
        <table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr>
		  <form name="export" id="export" method="post" action="export_company_wise_list.php">
		  	<input type="hidden" name="company" id="company" value="<?php echo $company;?>" />
		  </form>
		  <form name="print" id="print" method="post" action="print_company_wise_list.php" target="_blank">
		  	<input type="hidden" name="company" id="company" value="<?php echo $company;?>" />
		  </form>
            <td align="center" width="50%"><a href="#" onclick="send('export')"><img src="images/excel.png" width="213" height="43" border="0"/></a></th>
          <td align="center" width="50%"><a href="#" onclick="send('print')" ><img src="images/print.png" width="213" height="43" border="0"/></a></th>          </tr>
        </table></td>
    </tr>
   
    <!--<tr align="center" class="fnt" >
        <td height="58" colspan="28" valign="top" class="fnt" style="font-size:11px;"><strong><span class="fnt" style="font-size:11px;"><strong><a href="export_bank_list.php?"><img src="images/excel.png" height="40" border="0" /></a></strong></span>&nbsp;&nbsp;&nbsp;&nbsp;<a href="export_work_list.php"><img src="images/print.png" height="38" /></a></strong></td>
    </tr>-->
  </tbody>
  <tr align="center" background="images\1by25.jpg" >
    <td height="22" colspan="12">&nbsp;</td>
  </tr>
</table>
<br />
  
  
  
  
  <?php include "includes/footer.php";?>

<script>
function send($id){
	document.getElementById($id).submit();
}

</script>
   