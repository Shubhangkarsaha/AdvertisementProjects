<?php include "includes/header.php";
if(isset($_POST['Submit']))
{
	$company = $_POST['company'];
	$category = $_POST['category'];
}
?>
<section class="content-header">
      <h1>
         <!--Category &amp; Company Wise List-->
		<?php echo "Value of ".cat_name($category)." of ".com_name($company);?>
        <small>&nbsp;<!--Selected <?php //echo "Category ".cat_name($category)." and Company ".com_name($company);?>--></small>
      </h1>
      
</section>
<br>
<table width="90%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tbody>
    <tr align="center" class="head_font" background="images\1by25.jpg">
      <td width="8%"><b>Sl. No.</b></td>
      <td width="16%" height="40"><strong>Town</strong></td>
      <td width="50%"><strong>Location</strong></td>
      <td width="15%"><strong>Size</strong></td>
      <td width="11%"><?php if(size_type($category)=="sq.mt"){echo $size_type="SQ.MT";}else{echo $size_type="SQ.FT";}?></td>
    </tr>
    <tr align="center" >
      <td height="25" colspan="10">&nbsp;</td>
    </tr>
    <?php
	  
	  $fsql = "select * from site_details_master where com_id = '$company' and cat_id = '$category' order by site_id desc";
	  $frec = q($fsql);
	  $i = 1;
	  $total_size = 0;
	  while($fres = f($frec))
	  {
		if($i % 2 == 0)
		$col = "bgcolor='#E5E5E5'";
		else
		$col = "bgcolor='#D5D5D5'";
		
		
	  ?>
    <tr align="center" <?php echo $col;?>>
      <td height="30"><?php echo $i;?></td>
      <td align="center">Siliguri</td>
      <td align="center"><?php echo @$fres['site_location'].", ".$fres['site_area'].", Ward No. : ".$fres['site_ward_no'].", PIN : ".$fres['site_pin'];?></td>
      <td align="center"><?php echo $fres['item_length']." X ".$fres['item_width'];?></td>
      <td align="center"><?php echo $fres['item_total_size']; $total_size = $total_size + $fres['item_total_size'];?></td>
    </tr>
	<tr align="center" >
        <td height="23">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	  <?php $i++; }?>
      
      <tr align="center" bgcolor="#999999">
        <td height="30">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><strong>TOTAL <?php echo $size_type;?></strong></td>
        <td><strong><?php echo $total_size;?></strong></td>
      </tr>
    <tr align="center" >
      <td height="18" colspan="10">
        <table width="100%" border="0" cellspacing="1" cellpadding="1">
          <!--<tr>
		  <form name="export" id="export" method="post" action="#export_company_wise_list.php">
		  	<input type="hidden" name="company" id="company" value="<?php //echo $company;?>" />
		  </form>
		  <form name="print" id="print" method="post" action="#print_company_wise_list.php" target="_blank">
		  	<input type="hidden" name="company" id="company" value="<?php //echo $company;?>" />
		  </form>
            <td align="center" width="50%"><a href="#" onclick="send('export')"><img src="images/excel.png" width="213" height="43" border="0"/></a></th>
          <td align="center" width="50%"><a href="#" onclick="send('print')" ><img src="images/print.png" width="213" height="43" border="0"/></a></th>          </tr>-->
        </table></td>
    </tr>
   
    <!--<tr align="center" class="fnt" >
        <td height="58" colspan="28" valign="top" class="fnt" style="font-size:11px;"><strong><span class="fnt" style="font-size:11px;"><strong><a href="export_bank_list.php?"><img src="images/excel.png" height="40" border="0" /></a></strong></span>&nbsp;&nbsp;&nbsp;&nbsp;<a href="export_work_list.php"><img src="images/print.png" height="38" /></a></strong></td>
    </tr>-->
  </tbody>
  <tr align="center" background="images\1by25.jpg" >
    <td height="22" colspan="10">&nbsp;</td>
  </tr>
</table>
<br />
  
  
  
  
  <?php include "includes/footer.php";?>

<script>
function send($id){
	document.getElementById($id).submit();
}

</script>
   