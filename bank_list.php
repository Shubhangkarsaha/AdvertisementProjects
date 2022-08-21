<?php include "includes/header.php";
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
}*/?>
<section class="content-header">
      <h1>
         All Bank List
        <small>&nbsp;</small>
      </h1>
      
</section>
<br>

<table width="98%" border="0" align="center" cellpadding="2" cellspacing="2">
  
  <tbody>
    <tr align="center" class="head_font" background="images\1by25.jpg">
      <td width="10%" height="40"><b>Sl. No.</b> </td>
      <td width="37%" height="40"><b>Bank Name</b></td>
      <td width="12%" height="40">Options</td>
    </tr>
	<tr align="center" >
            <td height="25" colspan="7">&nbsp;</td>
    </tr>
	<?php
	  $fsql = "select * from bank_master order by bank_name" ;
	  $frec = q($fsql);
	  $i = 1;
	  while($fres = f($frec))
	  {
		if($i % 2 == 0)
		$col = "bgcolor='#E5E5E5'";
		else
		$col = "bgcolor='#D5D5D5'";
	  ?>
    <tr align="center" <?php echo $col;?>>
      <td height="35"><?php echo $i;?></td>
      <td><?php echo $fres['bank_name'];?></td>
      <td><table width="95%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center"><a href="bank_register_1.php?Edit=<?php echo @$fres['bank_id'];?>">
            <input type="image" name="imageField" src="allicons/68.gif" title="Edit Record" height="30" width="35"/>
          </a></td>
          <td align="center"><a href="#">
            <input type="image" name="imageField2" src="allicons/69.gif" title="View Record"/>
          </a></td>
          <td align="center"><a href="#">
            <input type="image" name="imageField22" src="allicons/70.gif" title="Delete Record" />
          </a></td>
        </tr>
		
      </table></td>
    </tr>
    <tr align="center" >
            <td height="25" colspan="7">&nbsp;</td>
    </tr>
	<?php $i++; }?>
	<!--<tr align="center" class="fnt" >
        <td height="58" colspan="28" valign="top" class="fnt" style="font-size:11px;"><strong><span class="fnt" style="font-size:11px;"><strong><a href="export_bank_list.php?"><img src="images/excel.png" height="40" border="0" /></a></strong></span>&nbsp;&nbsp;&nbsp;&nbsp;<a href="export_work_list.php"><img src="images/print.png" height="38" /></a></strong></td>
    </tr>-->
  </tbody>
  <tr align="center" background="images\1by25.jpg" >
            <td height="22" colspan="7">&nbsp;</td>
    </tr>
</table>  
  <br />
  
  
  
  
  <?php include "includes/footer.php";?>


