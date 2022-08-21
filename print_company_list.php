<?php 
session_start();
include "config.php";
include "connection/connection.php";
include "functions/functions.php";
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


?><title>Company List : Print</title>
<section class="content-header">
<h1>
        <section class="content-header">
          <h1>All
            <?php if(isset($_GET['active'])) {echo 'Active';}?>
            Company List <small>&nbsp;</small> </h1>
        </section>
      </h1>
      
      <table width="98%" border="1" align="center" cellpadding="2" cellspacing="2">
        <tbody>
          <tr align="center" class="head_font">
            <td width="6%" height="40"><b>Sl. No.</b> </td>
            <td width="20%"><strong>Company Details </strong></td>
            <td width="22%"><strong>Local Address </strong></td>
            <td width="22%"><strong>Permanent Address </strong></td>
            <td width="24%"><strong>Contact Details </strong></td>
            <td width="9%"><strong>Active Status </strong></td>
          </tr>
          <tr align="center" >
            <td height="25" colspan="11">&nbsp;</td>
          </tr>
          <?php	
		  if(isset($_GET['active']))
		    {
	          $fsql = "select * from company_master where com_status = '0' order by com_name asc" ;
			}
		   else
		   {
		      $fsql = "select * from company_master order by com_name asc" ;
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
            <tr>
              <td height="35" align="center"><?php echo $i;?></td>
              <td align="center" valign="top"><table width="100%" border="0 " cellspacing="0" cellpadding="0">
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
              </table></td>
              <td align="center" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="1">
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
              <td align="center" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="1">
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
              <td align="center" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="1">
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
              </table></td>
              <td align="center" valign="middle"><?php echo $status;?></td>
          </tr>
          <?php $i++; }?>
      </table>
	  
	  
      <script>
   		window.print();
      </script>
     
      