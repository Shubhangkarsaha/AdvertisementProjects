<?php include "includes/header.php";

if(isset($_POST['Submit']))
{
	$cat_name = $_POST['cat_name'];
	$cat_size_type = $_POST['cat_size_type'];
	$cat_pay_type = $_POST['cat_pay_type'];
	$cat_rate = $_POST['cat_rate'];	
	if($_POST['Submit'] == "Submit")
	{
		$sql = "INSERT INTO `category_master`(`cat_name`, `cat_size_type`, `cat_payment_type`, `cat_rate`) VALUES ('$cat_name', '$cat_size_type', '$cat_pay_type', '$cat_rate')";
		$rec = q($sql);
		if($rec>0)
		{
			echo "<script>
				alert('Category details submitted successfully');
				location.replace('category_register.php?');
			</script>";
		}
		else
		{
			echo "<script>
				alert('Error');
				location.replace('category_register.php');
			</script>";
		}
	
	}
	 elseif($_POST['Submit'] == "Edit")
	 {
	    $pk = $_POST['pk'];
		$sql = "UPDATE `category_master` SET `cat_name`='$cat_name', `cat_size_type`='$cat_size_type', `cat_payment_type`='$cat_pay_type', `cat_rate`='$cat_rate' where cat_id='$pk'";
		$rec = q($sql);
		if($rec>0)
		{
			echo "<script>
					alert('Category details updated successfully');
					location.replace('category_list.php?')
					</script>";
		}
		else
		{
			echo "<script>
				alert('Error');
				location.replace('category_register.php?Edit=$pk');
			</script>";
		}
	 }
}
if (isset($_GET['Edit']))
 {
  $E = $_GET['Edit'];
  $esql= "select * from category_master where cat_id='$E'";
  $erec = q($esql);
  $eres = f($erec);
  }
  
 if (isset($_GET['Del']))
 {
  $D = $_GET['Del'];
  $dsql= "update category_master set cat_status = '1' where cat_id='$D'";
  $drec = q($dsql);
  echo "<script>
		alert('Category details removed successfully');
		location.replace('category_list.php?')
		</script>";
  }
?>
<section class="content-header">
      <h1><?php if(isset($_GET['Edit'])){echo "EDIT";}else{echo "ADD";}?> CATEGORY REGISTER </h1>
</section>
<br>








<form name="form1" method="post" action="">
  <table width="98%" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr background="images\1by25.jpg">
      <td height="31" colspan="6" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td width="1%" align="right">&nbsp;</td>
      <td width="24%" align="right">&nbsp;</td>
      <td width="17%" align="right">&nbsp;</td>
      <td width="2%" align="center">&nbsp;</td>
      <td width="32%" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td width="24%" align="right"><strong>Category Name </strong></td>
      <td align="center"><strong>:</strong></td>
      <td align="left"><input name="cat_name" type="text" id="cat_name" value="<?php echo @$eres['cat_name'];?>" required="" /></td>
      <td align="right"><strong>Size Type </strong></td>
      <td align="center"><strong>:</strong></td>
      <td align="left"><select name="cat_size_type" id="cat_size_type" required>
          <option value="">--Select Size Type--</option>
          <option value="sq.ft" <?php if(@$eres['cat_size_type'] == "sq.ft"){echo "selected";}?>>sq.ft</option>
          <option value="sq.mt" <?php if(@$eres['cat_size_type'] == "sq.mt"){echo "selected";}?>>sq.mt</option>
        </select>      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="right"><strong>Payment Type </strong></td>
      <td align="center"><strong>:</strong></td>
      <td align="left"><select name="cat_pay_type" id="cat_pay_type" required>
          <option value="">--Select Payment Type--</option>
          <option value="1" <?php if(@$eres['cat_payment_type'] == "1"){echo "selected";}?>>Day Wise</option>
          <option value="2" <?php if(@$eres['cat_payment_type'] == "2"){echo "selected";}?>>Month Wise</option>
          <option value="3" <?php if(@$eres['cat_payment_type'] == "3"){echo "selected";}?>>Year Wise</option>
        </select>      </td>
      <td align="right"><strong>Category Rate </strong></td>
      <td align="center"><strong>:</strong></td>
      <td align="left"><input name="cat_rate" type="number" id="cat_rate" value="<?php echo @$eres['cat_rate'];?>" required="" /></td>
      <!--<td align="right">Maximum Days </td>
      <td align="center">:</td>
      <td align="left"><input name="max_days" type="nummber" id="max_days" value="<?php //echo @$eres['cat_max_days'];?>" required=""/></td>-->
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="6" align="center"><input type="submit" name="Submit" <?php if(isset($_GET['Edit'])){echo "value='Edit'";}else{?>value="Submit"<?php }?> />
      <input name="pk" type="hidden" id="pk" value="<?php echo $eres['cat_id'];?>" /></td>
    </tr>
    <tr background="images\1by25.jpg">
      <td colspan="6">&nbsp;</td>
    </tr>
  </table>
</form>










	<?php include "includes/footer.php";?>
 