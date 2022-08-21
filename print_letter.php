 <?php 
	include "connection/connection.php";
	include"functions/functions.php";
 

//echo $si;exit;


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

	<table width="95%" border="0" align="center" cellpadding="2" cellspacing="0">
      <tr>
        <td align="center" scope="col">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" scope="col">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" scope="col">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" scope="col">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" scope="col"><p align="center" class="style6"><u>Financial  Assistance under Mayor Relief Fund</u></p></td>
      </tr>
      <tr>
        <td align="left" scope="col">&nbsp;</td>
      </tr>
      <tr>
        <td height="23" align="center"><p>We have  received few applications from different ward for financial help in education  or treatment under Mayor&rsquo;s Relief Fund. Hon&rsquo;ble Mayor, SMC has sanctioned the  amount on beneficiaries&rsquo; letter.</p></td>
      </tr>
      <tr>
        <td height="23" align="center"><table width="100%" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <th width="7%" scope="col">Sl No. </th>
            <th width="33%" scope="col">Name of the applicant </th>
            <th width="20%" scope="col">Ward No. </th>
            <th width="20%" scope="col">Purpose</th>
            <th width="20%" scope="col">Sanctioned Amount </th>
          </tr>
		   <?php
	
	  $fsql2 = "select * from benificiary_master bm, purpose_master pm where bm.ben_purpose_id=pm.prps_id and bm.status = '0' and bm.file_status= '4'"  ;
	  	if(isset($_GET['Chq']))
		{
			$cheque_no = $_GET['Chq'];
			$fsql2 = $fsql2."and bm.ben_cheque_no ='$cheque_no' ";
		}
	    if(isset($_GET['Bnk']))
		{
			$cheque_bank_id = $_GET['Bnk'];
			$fsql2 = $fsql2."and bm.cheque_bank_id ='$cheque_bank_id' ";
		}
	    if(isset($_GET['Brn']))
		{
			$cheque_branch_id = $_GET['Brn'];
			$fsql2 = $fsql2."and bm.cheque_branch_id ='$cheque_branch_id' ";
		}
	 	if(isset($_GET['Dt']))
		{
			$cheque_date = $_GET['Dt'];
			$fsql2 = $fsql2."and bm.cheque_date ='$cheque_date' ";
		}

	  $fsql2 = $fsql2." order by ben_id desc ";
	//  echo $fsql2;exit;
	  $frec2 = q($fsql2);
	  $i = 1;
	  $total_amount = 0;
	  while($fres2 = f($frec2))
	  {
		$total_amount = $total_amount+$fres2['ben_ammount']; 
	  ?>
          <tr>
            <td align="center"><?php echo $i;?></td>
            <td align="center"><?php echo $fres2['ben_name'];?></td>
            <td align="center"><?php echo $fres2['ben_ward'];?></td>
            <td align="center"><?php echo $fres2['prps_name'];?></td>
            <td align="center"><?php echo $fres2['ben_ammount'];?></td>
          </tr>
		  <?php $i++;}
		  	$ntw = no_to_words($total_amount);
		  ?>
          <tr>
            <td colspan="4" align="center"><strong>Total</strong> (<?php echo $ntw;?> Only) </td>
            <td align="center"><?php echo $total_amount;?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="23" align="left">&nbsp;</td>
      </tr>
      <tr>
        <td height="23" align="center">However,  the matter is to put up for your kind perusal and necessary order may kindly be  passed for payment. </td>
      </tr>
      <tr>
        <td height="23" align="right">Submitted</td>
      </tr>
      <tr>
        <td height="23" align="left">&nbsp;</td>
      </tr>
      <tr>
        <td height="23" align="left">&nbsp;</td>
      </tr>
</table>
<script>
	<?php if(isset($_GET['Print'])){?>
				window.print();
			
	<?php  }?>
</script>
