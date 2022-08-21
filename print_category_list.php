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
}*/?><title>Category List : Print</title>
<section class="content-header"><h1>
         All Category List
        <small>&nbsp;</small>
      </h1>
      
</section>
<br>

<table width="98%" border="1" align="center" cellpadding="0" cellspacing="0">
  
  <tbody>
    <tr align="center" class="head_font">
      <td width="5%" height="40"><b>Sl. No.</b> </td>
      <td width="26%"><b>Category Name</b></td>
      <td width="20%"><strong>Size Type </strong></td>
      <td width="20%"><strong>Payment Type </strong></td>
	  <td width="20%"><strong>Rate </strong></td>
    </tr>
	<tr align="center" >
            <td height="25" colspan="9">&nbsp;</td>
    </tr>
	<?php
	if(isset($_GET['active']))
	  {	
	    $fsql = "select * from category_master where cat_status = '0' order by cat_name asc" ;
	  }
	else
	  {
	    $fsql = "select * from category_master order by cat_name asc" ;
	  }  
	  $frec = q($fsql);
	  $i = 1;
	  while($fres = f($frec))
	  {
		if($i % 2 == 0)
		$col = "bgcolor='#E5E5E5'";
		else
		$col = "bgcolor='#D5D5D5'";
		
	  ?>
    <tr align="center">
      <td height="35"><?php echo $i;?></td>
      <td><?php echo $fres['cat_name'];?></td>
      <td><?php echo $fres['cat_size_type'];?></td>
      <td><?php echo pay_type($fres['cat_id']);?></td>
	  <td><?php echo $fres['cat_rate'];?></td>
    </tr>
	<?php $i++; }?>
  </tbody>
</table>  
<script>  
	window.print();
</script>