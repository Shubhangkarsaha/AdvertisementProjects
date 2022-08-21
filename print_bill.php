 <?php 
 	session_start();
	include "config.php";
	include "connection/connection.php";
	include"functions/functions.php";
	if(isset($_GET['Pay'])){
		$pay_id = $_GET['Pay'];
		if($pay_id == "" || $pay_id == 0){
			echo "<script>
				alert('Please select category');
				location.replace('select_pay_category.php');
			</script>";
		}
		else
			$pay_details = qf("select * from payment_master where pay_id = '$pay_id'");
	}
	else
	{
		echo "<script>
			alert('Please select category');
			location.replace('select_pay_category.php');
		</script>";
	}
	
	//echo $_SESSION['due_seasons'].$_SESSION['total'];
	/*		echo $installation_date = '2023-03-31';echo ' today <br>';
			$this_year = '2022';
			$next_year = $this_year + 1;//2023
			echo $s_date = $this_year.'-04-01';echo' start<br>';//2022
			echo $e_date = $next_year.'-03-31';echo' end<br>';//2023
			echo $season_start_date = strtotime($s_date);echo'<br>';
			echo $season_end_date = strtotime($e_date);echo'<br>';
			echo $install_date = strtotime($installation_date);echo'<br>';
			//echo $season_start_date - $install_date;
			if($install_date >= $season_start_date && $install_date <= $season_end_date)
			{
				echo $starting_season = $this_year."-".$next_year;
			}
			elseif($install_date >= $season_end_date) 
			{
				echo $starting_season = --$this_year."-".--$next_year;
			}
exit;*/

?>
<style type="text/css">
<!--
.style6 {
	font-size: 24px;
	font-weight: bold;
}
-->
</style>

<p>&nbsp;</p>

	<title><?php echo $title_head ; ?></title>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="70">
			<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-radius:5px;">
          <tr>
            <td colspan="8" align="center"><table width="100%" border="1" cellspacing="0" cellpadding="0">
              <tr>
                <td width="6%" align="center" scope="col"><img src="images/smc_logo.png" width="85" height="100" /></td>
                <td width="94%" align="center" scope="col"><u><span class="style6">SILIGURI MUNICIPAL CORPORATION</span></u><br />
                  P.O. SILIGURI, DIST. DARJEELING (W.B), PHN: 2432804, 2435444, 2433277, 2433744, 2435282, 2534311 </td>
              </tr>
            </table></td>
            </tr>
		  
		  <tr>
            <td>&nbsp;</td>
            <td width="14%">&nbsp;</td>
            <td width="14%">&nbsp;</td>
            <td width="14%">&nbsp;</td>
            <td width="14%">&nbsp;</td>
            <td width="15%">&nbsp;</td>
            <td width="14%">&nbsp;</td>
            <td width="15%">&nbsp;</td>
          </tr>
          
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>		</td>
      </tr>

      <tr>
        <td align="center"><table width="98%" border="1" align="center" cellpadding="0" cellspacing="0">
          <tr align="center" class="main_bg head_font" >
            <td width="4%" height="40"><span style="font-weight: bold">Serial. </span></td>
            <td width="18%" height="40"><span style="font-weight: bold">Company</span></td>
            <td width="19%" height="40"><span style="font-weight: bold">Installation Date  </span></td>
            <td width="19%"><span style="font-weight: bold">Address</span></td>
            <td width="17%"><span style="font-weight: bold">Total Size </span></td>
            <td width="23%" height="40"><span style="font-weight: bold">Amount</span></td>
          </tr>
          <tr align="center" >
            <td height="25" colspan="6">&nbsp;</td>
          </tr>
          <?php
		  $site_id = 5;//$_POST['site_id'];
		  //$days = $_POST['total_days'];
	$i=1; 
	$esql = "select * from site_details_master sdm, category_master cm where sdm.cat_id = cm.cat_id and sdm.site_id = '$site_id'";
	$pres = qf($esql);
	
		$add = $pres['site_location'].", ".$pres['site_area'].", W/No-".$pres['site_ward_no'];
		$rate = qf("select * from category_rate_master where cat_id = '".$pres['cat_id']."'");
		
	?>
          <tr align="center" class="fnt" >
            <td valign="middle" class="fnt"><?php echo $i;?></td>
            <td valign="middle"><?php echo com_name($pres['com_id']);?></td>
            <td valign="middle"><?php echo print_date($pres['installation_date']);?></td>
            <td valign="middle"><?php echo $add; ?></td>
            <td valign="middle"><?php echo $pres['item_total_size']." ".$pres['cat_size_type']; ?></td>
            <td valign="middle"><?php echo $pay_details['amount_details']; ?></td>
          </tr>
          
          

        </table></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
</table>


<script>
	
			//window.open('select_pay_category.php');
			window.print();
			
	
</script>
 