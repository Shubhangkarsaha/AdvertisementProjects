<?php 
session_start();
include "config.php";
include "connection/connection.php";
include "functions/functions.php";
if(isset($_POST['category']))
{
	$category = $_POST['category'];
}
else
{
	echo "<script>
			alert('Error ! Please contact your Developer as soon as possible');
			location.replace('category_wise.php')
		</script>";
}

?><title>Category Wise List : Print</title>
<section class="content-header">
      <h1>
        Category Wise List
        <small>Selected Item <?php echo cat_name($category);?></small>
      </h1>
      
</section>
<br>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr align="center" class="head_font">
      <td width="3%"><b>Sl. No.</b></td>
      <td height="40" colspan="3"><strong>Landlord Details </strong></td>
      <td width="12%"><strong>Address</strong></td>
      <td width="17%"><strong>Site Details </strong></td>
      <td colspan="3"><strong>Item Details </strong></td>
      <td width="15%"><strong>Dates</strong></td>
      <td width="6%">Status</td>
    </tr>
    <tr align="center" >
      <td height="25" colspan="16">&nbsp;</td>
    </tr>
    <?php
	  
	  $fsql = "select * from site_details_master where cat_id = '$category' order by site_id desc";
	  $frec = q($fsql);
	  $i = 1;
	  while($fres = f($frec))
	  {
		
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
      <td><?php echo $status;?></td>
    </tr>
	 <?php $i++; }?>
    </tbody>
	</table>


   <script>
   		window.print();
   </script>