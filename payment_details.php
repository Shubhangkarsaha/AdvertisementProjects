<?php include "includes/header.php";

if(empty($_POST['site_id']))
{
	echo "<script>
			alert('Please select category');
			location.replace('select_pay_category.php');
		</script>";
}
if(isset($_POST['check']))
{
		$site_id = $_POST['site_id'];
		$site_details = qf("select * from site_details_master where site_id = '$site_id'");
		$days = (strtotime(date('Y-m-d')) - strtotime($site_details['installation_date']))/86400;
		$financial_year = $_POST['financial_year'];
		list($f_s_y,$f_e_y) = explode('-', $financial_year);
		
		$asql = "select * from payment_master where site_id = '$site_id' order by financial_year_upto desc";
		
			$f_year = $site_details['paid_upto_season'];
			list($sy,$ey) = explode('-', $f_year);
			//++$sy;
			//++$ey;
		
		$due_year = $f_s_y - $sy;
		
		if($due_year <= 0)
		{
			echo "<script>
				alert('Already paid upto $financial_year');
				location.replace('select_pay_category.php');
			</script>";
		}
		$size = $site_details['item_total_size'];
		$rate = qf("select renew_rate from category_rate_master where cat_id = '1'");
		$amount = round(($size * $rate['renew_rate'])/12*6.5) ;//echo '<br>';
		$total_amount = $amount * $due_year;
}
if(isset($_POST['Submit']))
{
	$site_id = $_POST['site_id'];
	
	$pay_date = date('Y-m-d');
	$financial_year_upto = $_POST['financial_year_upto'];
	$total_amount = $_POST['total_amount'];
	$remarks = $_POST['remarks'];
	$amount_details = $_POST['amount_details'];
	$upsql = "update site_details_master set paid_upto_season = '$financial_year_upto' where site_id = '$site_id'";
	$uprec = q($upsql);
	$sql = "INSERT INTO `payment_master`(`site_id`, `financial_year_upto`, `pay_date`, `pay_amount`, `amount_details`, `remarks`) VALUES ('$site_id',  '$financial_year_upto', '$pay_date', '$total_amount', '$amount_details', '$remarks')";
	$pay_id = qi($sql);
	if($pay_id){
		echo "<script>
			alert('Payment has done successfully');
			window.open('print_bill.php?Pay=$pay_id');
			location.replace('select_pay_category.php');
		</script>";
	}
	//echo $sql;exit;
}
	/*if(isset($_POST['Edit']))
	{
	echo "Demo";
	}*/

	
	

?>
<style type="text/css">
<!--
.style6 {font-size: 18px}
-->
</style>


<section class="content-header">
      <h1>
        Make Payment
        <small>&nbsp;</small>
      </h1>
      
      </section>
<br />

<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
          <table width="80%" border="0" align="center" cellpadding="1" cellspacing="1" class="main_bod" >
            <tr background="images\1by25.jpg">
              <td height="40" colspan="4" align="center">&nbsp;</td>
            </tr>
            <tr class="fnt">
              <td height="25" colspan="4" align="right">&nbsp;</td>
            </tr>
            <tr class="fnt">
              <td colspan="3" align="center" valign="top"><u><span class="style6">Financial Year</span> </u></td>
              <td width="51%" height="39" align="center" valign="top"><u><span class="style6">Remarks</span></u></td>
            </tr>
            <tr class="fnt">
              <td colspan="3" align="center"><?php
					$i = 1;
					$sy++;
					$ey++;
					//$_SESSION['due_seasons'] = "";
					//if(!isset($_POST['Submit']))
						$due_seasons = "";
					while($i <= $due_year){
						$due_seasons.="<b><u>".$sy."-".$ey."</u></b><br> (".$size." * ".$rate['renew_rate']." = ".($size * $rate['renew_rate'])."/12*6.5) = ".$amount.'<br>';
						
						$sy++;
						$ey++;
						$i++;
					}
					 ;
					 echo $due_seasons;
					
					if($due_year>1){
						 $total="<br><b><u>Total</u></b> (";
						$i = 1;
						while($i<=$due_year){
							if($i==1)
								$total.= $amount;
							else
								$total.= ' + '.$amount;
							$i++;
						}
						echo $total.= ") = ".$total_amount;
					}
					else
						$total = "";
					$amount_details = $due_seasons.$total;
				 ?></td>
              <td align="center"><textarea name="remarks" cols="45" rows="5" id="remarks"></textarea></td>
            </tr>
            
            <tr class="fnt">
              <td height="30" colspan="4" align="right">&nbsp;</td>
            </tr>
            <tr>
              <td height="35" colspan="4" align="center"><input class="head_font" type="submit" name="Submit" value="Pay & Print"/>
                <input type="hidden" name="site_id" value="<?php echo $site_id;?>"/>
                <input type="hidden" name="amount_details" value="<?php echo $amount_details;?>"/>
				<input type="hidden" name="financial_year_upto" value="<?php echo $financial_year;?>"/>
				<input type="hidden" name="total_amount" value="<?php echo $total_amount;?>"/>	  </td>
            </tr>
            <tr class="fnt">
              <td colspan="4" align="center">&nbsp;</td>
            </tr>
            <tr background="images\1by25.jpg">
              <td colspan="4" align="center" height="21">&nbsp;</td>
            </tr>
  </table>
</form>

   
  
  


<?php include "includes/footer.php";?>