<?php include "includes/header.php";
/*	if(isset($_POST['category']))
		{
			$cat_id = $_POST['category'];
		} 
		else
		{
			echo "<script>
					alert('Please select category!');
					location.replace('select_pay_category.php');
				</script>";
		}*/
?>
<section class="content-header">
      <h1>
         All Pending Renewals <small></small>      </h1>
      
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
      <td width="15%" height="40"><strong>Options</strong></td>
    </tr>
    <tr align="center" >
      <td height="25" colspan="13">&nbsp;</td>
    </tr>
    <?php
	        /*$today = date('Y-m-d');
			list($iy,$im,$id) = explode("-", $today);
			$this_year = $iy;
			$next_year = $this_year + 1;
			$s_date = $this_year.'-04-01';
			$e_date = $next_year.'-03-31';
			$season_start_date = strtotime($s_date);
			$season_end_date = strtotime($e_date);
			$install_date = strtotime($today);
			if($install_date >= $season_start_date && $install_date <= $season_end_date)
			{
				$starting_season = $this_year."-".$next_year;
			}
			elseif($install_date <= $season_start_date)
			{
				$starting_season = --$this_year."-".--$next_year;
			}*/
	  $starting_season = season(date('Y-m-d'));
	 	
	  $fsql = "select * from site_details_master sdm, category_master cm where sdm.cat_id = cm.cat_id and sdm.paid_upto_season <> '$starting_season' and sdm.site_status = '0' ";
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
      <td><strong><a href="#" style="color:<?php echo $clr;?>"><?php echo $status;?></a></strong></td>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center"><a href="payment_master.php?PAY_ID=<?php echo @$fres['site_id'];?>">
            <input type="image" name="imageField" src="allicons/102.gif" title="Make Payment" height="30" width="35"/>
          </a></td>
          </tr>
      </table></td>
    </tr>
	
	  <?php $i++; }if($i=='1'){?>
	   <tr bgcolor='#D5D5D5'>
            <td height="39" colspan="13" align="center"> <strong>No record found</strong></td>
    </tr>
		<?php }?>
    <tr align="center" >
      <td height="19" colspan="13">
        <table width="100%" border="0" cellspacing="1" cellpadding="1">
          <!--<tr>
            <td align="center" width="50%"><a href="export_site_list.php"><img src="images/excel.png" width="213" height="43" border="0"/></a></th>
          <td align="center" width="50%"><a href="print_site_list.php" target="_blank"><img src="images/print.png" width="213" height="43" border="0"/></a></th>          </tr>-->
      </table></td>
    </tr>
   
    <!--<tr align="center" class="fnt" >
        <td height="58" colspan="28" valign="top" class="fnt" style="font-size:11px;"><strong><span class="fnt" style="font-size:11px;"><strong><a href="export_bank_list.php?"><img src="images/excel.png" height="40" border="0" /></a></strong></span>&nbsp;&nbsp;&nbsp;&nbsp;<a href="export_work_list.php"><img src="images/print.png" height="38" /></a></strong></td>
    </tr>-->
  </tbody>
  <tr align="center" background="images\1by25.jpg" >
    <td height="22" colspan="13">&nbsp;</td>
  </tr>
</table>
<br />
  
  
  
  
  <?php include "includes/footer.php";?>


   