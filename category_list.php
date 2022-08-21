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
         All <?php if(isset($_GET['active'])) {echo 'Active';}?> Category List
        <small>&nbsp;</small>
      </h1>
      
</section>
<br>

<table width="98%" border="0" align="center" cellpadding="2" cellspacing="2">
  
  <tbody>
    <tr align="center" class="head_font" background="images\1by25.jpg">
      <td width="5%" height="40"><b>Sl. No.</b> </td>
      <td width="26%"><b>Category Name</b></td>
      
      <td width="20%"><strong> Size Type </strong></td>
      <td width="20%" height="40"><strong>Payment Type  </strong></td>
      <td width="18%">Rate</td>
      <td width="18%" height="40"><strong>Options</strong></td>
    </tr>
	<tr align="center" >
            <td height="25" colspan="11">&nbsp;</td>
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
    <tr align="center" <?php echo $col;?>>
      <td height="35"><?php echo $i;?></td>
      <td><?php echo $fres['cat_name'];?></td>
      
      <td><?php echo $fres['cat_size_type'];?></td>
      <td><?php echo pay_type($fres['cat_id']);?></td>
      <td><?php echo $fres['cat_rate'];?></td>
      <td><table width="95%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center"><a href="category_register.php?Edit=<?php echo @$fres['cat_id'];?>">
            <input type="image" name="imageField" src="allicons/68.gif" title="Edit Record" height="30" width="35"/>
          </a></td>
          <td align="center"><a href="#">
            <input type="image" name="imageField2" src="allicons/69.gif" title="View Record"/>
          </a></td>
          <td align="center"><a href="category_register.php?Del=<?php echo @$fres['cat_id'];?>">
            <input type="image" name="imageField22" src="allicons/70.gif" title="Delete Record" />
          </a></td>
        </tr>
		
      </table></td>
    </tr>
	<tr align="center" >
      <td height="36" colspan="18">
        <table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr>&nbsp;          </tr>
        </table></td>
    </tr>
	<?php $i++; }?>
	 <tr align="center" >
      <td height="36" colspan="18">
        <table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td align="center" width="50%"><a href="export_category_list.php"><img src="images/excel.png" width="269" height="43" border="0"/></a></th>
          <td align="center" width="50%"><a href="print_category_list.php" target="_blank"><img src="images/print.png" width="302" height="43" border="0"/></a></th>          </tr>
        </table></td>
    </tr>
	<!--<tr align="center" class="fnt" >
        <td height="58" colspan="28" valign="top" class="fnt" style="font-size:11px;"><strong><span class="fnt" style="font-size:11px;"><strong><a href="export_bank_list.php?"><img src="images/excel.png" height="40" border="0" /></a></strong></span>&nbsp;&nbsp;&nbsp;&nbsp;<a href="export_work_list.php"><img src="images/print.png" height="38" /></a></strong></td>
    </tr>-->
  </tbody>
  <tr align="center" background="images\1by25.jpg" >
            <td height="22" colspan="11">&nbsp;</td>
  </tr>
</table>  
  <br />
  
  
  
  
  <?php include "includes/footer.php";?>


