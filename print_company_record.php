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
		$fsql = "select * from site_details_master sdm, category_master cm where sdm.cat_id = cm.cat_id and sdm.com_id = '$com_id' order by sdm.site_id desc";
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
<style type="text/css">
<!--
.style5 {font-size: 18px; font-weight: bold; }
-->
</style>


          <title>Company Record | Print</title>
		  <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="main_bod" >
            <tr class="head_font">
              <td width="100%" height="34" align="center"><span class="style5">Company Details</span></td>
            </tr>
            <tr class="fnt">
              <td height="25" align="right">&nbsp;</td>
            </tr>
            <tr class="">
              <td height="21"><table width="100%" border="0" cellpadding="1" cellspacing="0">
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
            <tr class="head_font">
              <td height="29" align="center"><span class="style5">Advertisementes</span></td>
            </tr>
            <tr>
              <td align="center">&nbsp;</td>
            </tr>
            <tr class="">
              <td align="center">
			  <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
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
                  <?php $i++; }}else{?>
				  <tr>
				  	<td align="center" colspan="16"><strong>No Record Found </strong></td>
				  </tr>
				  <?php }?>
                </tbody>
              </table>			  </td>
            </tr>
            <tr class="fnt">
              <td align="center">&nbsp;</td>
            </tr>
</table>


   
  
  



<script>
window.print();
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
      