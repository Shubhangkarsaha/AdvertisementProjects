<?php include "includes/header.php";
if(isset($_GET['PAY_ID']))
{
	$site_id = $_GET['PAY_ID'];
	if($site_id == 0 || $site_id == ""){
		echo "<script>
			alert('Please select category');
			location.replace('select_pay_category.php');
		</script>";
	}
	$site_details = qf("select * from site_details_master where site_id = '$site_id'");
	$pay_sql = "select * from payment_master where site_id = '$site_id' order by pay_id desc";
	$pay_details = qf($pay_sql);
	$days = (strtotime(date('Y-m-d')) - strtotime($site_details['installation_date']))/86400;
	//echo $days;exit;
}
else
{
	echo "<script>
		alert('Please select category');
		location.replace('select_pay_category.php');
	</script>";
}

/*if(isset($_POST['Submit']))
{
		$site_id = $_POST['pk'];
		$financial_year = $_POST['financial_year'];
		list($f_s_y,$f_e_y) = explode('-', $financial_year);
		$pay_date = date('Y-m-d');
		$remarks = $_POST['remarks'];
		$asql = "select * from payment_master where site_id = '$site_id' order by financial_year desc";
		if(row_count($asql) == 0)
		{
			$f_sql = qf("select starting_season from site_details_master where site_id = '$site_id'");
			$f_year = $f_sql['starting_season'];
			list($sy,$ey) = explode('-', $f_year);
			//++$sy;
		}
		else
		{
			$f_year = $asql['financial_year'];
			list($sy,$ey) = explode('-', $f_year);
			//++$sy;
		}
		echo $due_year = $f_s_y - ($sy);
		$size = $site_details['item_total_size'];
		//$amount = $size * 
}*/

	/*if(isset($_POST['Edit']))
	{
	echo "Demo";
	}*/

	
	

?><section class="content-header"><h1>
        Make Payment
        <small>&nbsp;</small>
      </h1>
      
      </section>
<br />

<form action="payment_history.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
          <table width="80%" border="0" align="center" cellpadding="1" cellspacing="1" class="main_bod" >
            <tr background="images\1by25.jpg">
              <td height="40" colspan="3" align="center">&nbsp;</td>
            </tr>
            <tr class="fnt">
              <td height="25" colspan="3" align="right">&nbsp;</td>
            </tr>
            <tr class="">
              <td height="35" colspan="3" align="right"><table width="100%" border="0" cellspacing="1" cellpadding="1">
                <tr>
                  <td height="27" align="right"><strong>Site Landlord </strong></td>
                  <td align="center"><strong>:</strong></td>
                  <td><?php echo $site_details['site_landlord'];?></td>
                  <td align="right"><strong>Company</strong></td>
                  <td align="center"><strong>:</strong></td>
                  <td><?php echo com_name($site_details['com_id']);?></td>
                  <td align="right"><strong>Address</strong></td>
                  <td align="center"><strong>:</strong></td>
                  <td><?php echo $site_details['site_location'].", ".$site_details['site_area'].", ".$site_details['site_ward_no'];?></td>
                  <td align="right"><strong>Installation Date</strong></td>
                  <td align="center"><strong>:</strong></td>
                  <td><?php echo date_reverse($site_details['installation_date']);?></td>
                </tr>
                <tr>
                  <td width="14%" height="27" align="right"><strong>Paid Upto  </strong></td>
                  <td width="2%" align="center"><strong>:</strong></td>
                  <td width="7%"><?php echo $paid_upto = $site_details['paid_upto_season'];?></td>
                  <td width="12%" align="right">&nbsp;</td>
                  <td width="2%" align="center">&nbsp;</td>
                  <td width="7%">&nbsp;</td>
                  <td width="10%" align="right">&nbsp;</td>
                  <td width="2%" align="center">&nbsp;</td>
                  <td width="17%">&nbsp;</td>
                  <td width="13%" align="right"><strong>Payment Date</strong></td>
                  <td width="2%" align="center"><strong>:</strong></td>
                <td width="12%"><?php if(row_count($pay_sql)>0){echo date_reverse($pay_details['pay_date']);}else{echo date_reverse($site_details['contract_date']);}?>                </tr>
              </table></td>
            </tr>
            <tr class="fnt">
              <td width="48%" height="38" align="right">Financial Year </td>
              <td width="3%" height="38" align="center">:</td>
              <td width="49%" height="39" align="left"><select name="financial_year" id="financial_year" required="">
                  <option value="">--Pay upto--</option>
         <?php 
			$today = date('Y-m-d');
			list($iy,$im,$id) = explode("-", $today);
			$this_year = $iy;
			$next_year = $this_year + 1;
			$s_date = $this_year.'-04-01';
			$e_date = $next_year.'-03-31';
			$season_start_date = strtotime($s_date);
			$season_end_date = strtotime($e_date);
			$present_date = strtotime($today);
			if($present_date >= $season_start_date && $present_date <= $season_end_date)
			{
				$season = $this_year."-".$next_year;
			}
			elseif($present_date <= $season_start_date)
			{
				$season = --$this_year."-".--$next_year;
			}
			//$season;
			list($ss,$se) = explode('-', $season);
			list($ps,$pe) = explode('-', $paid_upto);
			$diff = $ss - $ps;
			$i = 1;
			while($i<=$diff)
			{
				$ps++;
				$pe++;
		?>
                  <option value="<?php echo $ps."-".$pe;?>"><?php echo $ps."-".$pe;?></option>
        <?php 
					
					$i++;
				}
		?>
              </select></td>
            </tr>
            <tr class="fnt">
              <td height="21" colspan="3" align="right">&nbsp;</td>
            </tr>
            <tr>
              <td height="35" colspan="3" align="center"><input class="head_font" type="submit" name="check" value="Check"/>
                <input type="hidden" name="site_id" value="<?php echo $site_id;?>"/>			  </td>
            </tr>
            <tr class="fnt">
              <td colspan="3" align="center">&nbsp;</td>
            </tr>
            <tr background="images\1by25.jpg">
              <td colspan="3" align="center" height="21">&nbsp;</td>
            </tr>
  </table>
</form>

   
  
  


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
      