<?php include "includes/header.php";
if(isset($_POST['Submit']))
	{
		$com_name = $_POST['com_name'];
		$com_ceo = $_POST['com_ceo'];
		$com_email1 = $_POST['com_email1'];
		$com_email2 = $_POST['com_email2'];
		$com_mobile1 = $_POST['com_mobile1'];
		$com_mobile2 = $_POST['com_mobile2'];
		$com_telephone = $_POST['com_telephone'];
//Local Address................................
		$local_state = $_POST['local_state'];
		$local_district = $_POST['local_district'];
		$local_address = $_POST['local_address'];
		$local_ward = $_POST['local_ward'];
		$local_pin = $_POST['local_pin'];
//Permanent Address................................
		$per_state = $_POST['per_state'];
		$per_district = $_POST['per_district'];
		$per_address = $_POST['per_address'];
		$per_ward = $_POST['per_ward'];
		$per_pin = $_POST['per_pin'];
		
		
		
		$id = $_POST['pk']; 
		
		
		if($_POST['Submit']=="Submit")
		  {
		    $sql ="INSERT INTO `company_master`(`com_name`, `com_ceo`, `com_email1`, `com_email2`, `com_mobile1`, `com_mobile2`, `com_telephone`, `com_local_state`, `com_local_district`, `com_local_address`, `com_local_ward`, `com_local_pin`, `com_per_state`, `com_per_district`, `com_per_address`, `com_per_ward`, `com_per_pin`) VALUES ('$com_name', '$com_ceo', '$com_email1', '$com_email2', '$com_mobile1', '$com_mobile2', '$com_telephone', '$local_state', '$local_district', '$local_address', '$local_ward', '$local_pin', '$per_state', '$per_district', '$per_address', '$per_ward', '$per_pin')";
			//echo $sql;exit;

			   $company_id = qi($sql);
			  
						
			if($company_id>0)
			{
				include "phpqrcode/qrlib.php";

				$path = "company_qr/company-".$company_id.".png";
				
				//$file = $company_id.".png";
				//$url = "classicsoftwares.com/Projects/smc_adv/company_record.php?REC=$company_id";
				$url = $qr_url."qr_company_record.php?REC=$company_id";
				QRcode::png($url, $path,'H',8,14);
				
				echo "<script>
					alert('Data Submitted Successfully');
					location.replace('company_master.php?');
				</script>";
			}
			else
			{
				echo "<script>
					alert('Error ! Please contact your Developer as soon as possible');
					location.replace('company_master.php');
				</script>";
		     }
	
	       }
	if($_POST['Submit']=="Edit")
	  {
	   $sql = "UPDATE `company_master` SET com_name='$com_name', com_ceo='$com_ceo', com_email1='$com_email1', com_email2='$com_email2', com_mobile1='$com_mobile1', com_mobile2='$com_mobile2', com_telephone='$com_telephone', com_local_state='$local_state', com_local_district='$local_district', com_local_address='$local_address', com_local_ward='$local_ward', com_local_pin='$local_pin', com_per_state='$per_state', com_per_district='$per_district', com_per_address='$per_address', com_per_ward='$per_ward', com_per_pin='$per_pin' where com_id = '$id'";
	   //echo $sql;exit;
					
			   $uprec = q($sql);
			  //exit;
	   if($uprec>0)
	     {
			 echo alert_replace('Company details updated successfully','company_list.php');
			 /*echo"<script>
           alert('Your data updated successfully.');
		   location.replace('company_list.php?');		    
		  </script>";*/
		 }
		else
		  {
		   echo"<script>
		    alert('Error ! Please contact your Developer as soon as possible');
			location.replace('company_master.php?');
		   </script>";
		  } 
		
    }	
}	  
	/*if(isset($_POST['Edit']))
	{
	echo "Demo";
	}*/
	if(isset($_GET['Edit']))
	{
	 $id = $_GET['Edit'];
	 $sql = "select * from company_master where com_id = '$id'";
	 $rec = q($sql);
	 $fres2 = f($rec);
	 
	}
	
	/*if (isset($_GET['Del']))
      {
	  $D = $_GET['Del'];
	  $dsql= "update company_master set com_status = '1' where com_id='$D'";
	  $drec = q($dsql);
	  echo "<script>
		alert('Category details removed successfully');
		location.replace('company_list.php?')
		</script>";
    }*/
	
?>
<style type="text/css">
<!--
.style3 {font-size: 24px; font-weight: bold; }
-->
</style>


<section class="content-header">
      <h1>
        <?php if(isset($_GET['Edit'])){echo "Edit";}else{echo "Add";}?> Company Details
        <small>&nbsp;</small>
      </h1>
      
      </section>
<br>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
          <table width="90%" border="0" align="center" cellpadding="1" cellspacing="1" class="main_bod" >
            <tr background="images\1by25.jpg">
              <td height="40" colspan="9" align="center"><span class="style3">Company Details</span> </td>
            </tr>
            <tr class="fnt">
              <td height="21" colspan="9" align="right">&nbsp;</td>
            </tr>
            <tr class="fnt">
              <td width="14%" height="38" align="right">Company</td>
              <td width="2%" height="38" align="center">:</td>
              <td width="15%" height="38" align="left">
                <input name="com_name" type="text" id="com_name" value="<?php echo @$fres2['com_name'];?>"  required="" />              </td>
              <td width="13%" height="39" align="right">&nbsp;</td>
              <td width="1%" height="39" align="center">&nbsp;</td>
              <td width="21%" height="39" align="left">&nbsp;</td>
              <td width="10%" height="39" align="right">CEO</td>
              <td width="1%" height="39" align="center">:</td>
              <td width="23%" height="39" align="left"><input name="com_ceo" type="text" id="com_ceo" value="<?php echo @$fres2['com_ceo'];?>"  required="" />              </td>
            </tr>
            <tr class="fnt">
              <td height="39" align="right"> Email 1 </td>
              <td height="39" align="center">:</td>
              <td height="39" align="left"><input name="com_email1" type="email" id="com_email1" value="<?php echo @$fres2['com_email1'];?>"  required="" />              </td>
              <td height="39" align="right">&nbsp;</td>
              <td height="39" align="center">&nbsp;</td>
              <td height="39" align="left">&nbsp;</td>
              <td height="39" align="right"> Email 2 </td>
              <td height="39" align="center">:</td>
              <td height="39" align="left"><input name="com_email2" type="email" id="com_email2" value="<?php echo @$fres2['com_email2'];?>"  required="" />              </td>
            </tr>
            <tr class="fnt">
              <td height="39" align="right"> Mobile 1 </td>
              <td height="39" align="center">:</td>
              <td height="39" align="left"><input name="com_mobile1" type="number" id="com_mobile1" value="<?php echo @$fres2['com_mobile1'];?>"  required="" maxlength="10" oninput="javascript: if (this.value.length &gt; this.maxLength) this.value = this.value.slice(0, this.maxLength);"/>              </td>
              <td height="38" align="right"> Mobile 2 </td>
              <td height="38" align="center">:</td>
              <td height="38" align="left"><input name="com_mobile2" type="number" id="com_mobile2" value="<?php echo @$fres2['com_mobile2'];?>" maxlength="10" oninput="javascript: if (this.value.length &gt; this.maxLength) this.value = this.value.slice(0, this.maxLength);"/></td>
              <td height="38" align="right">Telephone</td>
              <td height="38" align="center">:</td>
              <td height="38" align="left"><input name="com_telephone" type="text" id="com_telephone" /></td>
            </tr>
            <tr class="fnt">
              <td height="21" colspan="9" align="right">&nbsp;</td>
            </tr>
            <tr background="images\1by25.jpg">
              <td height="40" colspan="9" align="center"><span class="style3">Company Address </span> </td>
            </tr>
            <tr class="fnt">
              <td height="21" colspan="9" align="right">&nbsp;</td>
            </tr>
            <tr class="fnt">
              <td height="38" align="center">&nbsp;</td>
              <td height="38" colspan="2" align="center">Local Address </td>
              <td height="39" align="right">&nbsp;</td>
              <td height="39" align="center">&nbsp;</td>
              <td height="39" align="left">&nbsp;</td>
              <td height="38" colspan="3" align="center">Permanent Address </td>
            </tr>
            <tr class="fnt">
              <td height="21" colspan="9" align="right">&nbsp;</td>
            </tr>
            <tr class="fnt">
              <td height="39" align="right">State</td>
              <td height="39" align="center">:</td>
              <td height="39" align="left">
			  <select name="local_state" id="local_state" onchange="get_local_districts(this.value)" required="">
                <option value="">--Select State--</option>
			<?php 
				$sql = "select * from state_master order by state_name asc";
				$rec = q($sql);
				while($res = f($rec))
				{
			?>
				<option value="<?php echo $res['state_id'];?>"<?php if(isset($_GET['Edit']) && $res['state_id'] == $fres2['com_local_state']){echo "selected";}?>><?php echo state_name($res['state_id']);?></option>
			<?php 
				}
			?>
              </select>              </td>
              <td height="39" align="right">&nbsp;</td>
              <td height="39" align="center">&nbsp;</td>
              <td height="39" align="left">&nbsp;</td>
              <td height="39" align="right">State</td>
              <td height="39" align="center">:</td>
              <td height="39" align="left">
			  <select name="per_state" id="per_state" onchange="get_per_districts(this.value)" required="">
                <option value="">--Select State--</option>
			<?php 
				$sql = "select * from state_master order by state_name asc";
				$rec = q($sql);
				while($res = f($rec))
				{
			?>
				<option value="<?php echo $res['state_id'];?>"<?php if(isset($_GET['Edit']) && $res['state_id'] == $fres2['com_local_state']){echo "selected";}?>><?php echo state_name($res['state_id']);?></option>
			<?php 
				}
			?>
              </select></td>
            </tr>
            <tr class="fnt">
              <td height="39" align="right">District</td>
              <td height="39" align="center">:</td>
              <td height="39" align="left">
			  <select name="local_district" id="local_district" required="">
                <option value="">--Select District--</option>
			<?php if(isset($_GET['Edit']) && $fres2['com_local_district'] > "0"){?>
				<option value="<?php echo $fres2['com_local_district'];?>" selected="selected"><?php echo district_name($fres2['com_local_district']);?></option>
			<?php }?>
              </select>			  
			  </td>
              <td height="39" align="right">&nbsp;</td>
              <td height="39" align="center">&nbsp;</td>
              <td height="39" align="left">&nbsp;</td>
              <td height="39" align="right">District</td>
              <td height="39" align="center">:</td>
              <td height="39" align="left">
			  <select name="per_district" id="per_district" required="">
                <option value="">--Select District--</option>
				<?php if(isset($_GET['Edit']) && $fres2['com_per_district'] > "0"){?>
				<option value="<?php echo $fres2['com_per_district'];?>" selected="selected"><?php echo district_name($fres2['com_per_district']);?></option>
			<?php }?>
			
             </select></td>
            </tr>
            <tr class="fnt">
              <td height="39" align="right">Area</td>
              <td height="39" align="center">:</td>
              <td height="39" align="left"><textarea name="local_address" cols="22" id="local_address" required><?php if(isset($_GET['Edit'])){echo $fres2['com_local_address'];}?></textarea></td>
              <td height="39" align="right">&nbsp;</td>
              <td height="39" align="center">&nbsp;</td>
              <td height="39" align="left">&nbsp;</td>
              <td height="39" align="right">Area</td>
              <td height="39" align="center">:</td>
              <td height="39" align="left"><textarea name="per_address" id="per_address" required ><?php if(isset($_GET['Edit'])){echo $fres2['com_per_address'];}?></textarea></td>
            </tr>
            <tr class="fnt">
              <td height="39" align="right"> Ward No. </td>
              <td height="39" align="center">:</td>
              <td height="39" align="left"><input name="local_ward" type="number" id="local_ward" value="<?php if(isset($_GET['Edit'])){echo $fres2['com_local_ward'];}?>"  required="" maxlength="3" oninput="javascript: if (this.value.length &gt; this.maxLength) this.value = this.value.slice(0, this.maxLength);"/>              </td>
              <td height="39" align="right">&nbsp;</td>
              <td height="39" align="center">&nbsp;</td>
              <td height="39" align="left">&nbsp;</td>
              <td height="39" align="right"> Ward No. </td>
              <td height="39" align="center">:</td>
              <td height="39" align="left"><input name="per_ward" type="number" id="per_ward" value="<?php if(isset($_GET['Edit'])){echo $fres2['com_per_ward'];}?>"  required="" maxlength="3" oninput="javascript: if (this.value.length &gt; this.maxLength) this.value = this.value.slice(0, this.maxLength);"/>              </td>
            </tr>
            <tr class="fnt">
              <td height="38" align="right"> PIN </td>
              <td height="38" align="center">:</td>
              <td height="38" align="left"><input name="local_pin" type="number" id="local_pin" value="<?php if(isset($_GET['Edit'])){echo $fres2['com_local_pin'];}?>" required="" maxlength="6" oninput="javascript: if (this.value.length &gt; this.maxLength) this.value = this.value.slice(0, this.maxLength);"/></td>
              <td height="39" align="right">&nbsp;</td>
              <td height="39" align="center">&nbsp;</td>
              <td height="39" align="left">&nbsp;</td>
              <td height="38" align="right"> PIN </td>
              <td height="38" align="center">:</td>
              <td height="38" align="left"><input name="per_pin" type="number" id="per_pin" value="<?php if(isset($_GET['Edit'])){echo $fres2['com_per_pin'];}?>" required="" maxlength="6" oninput="javascript: if (this.value.length &gt; this.maxLength) this.value = this.value.slice(0, this.maxLength);"/></td>
            </tr>
            <tr class="fnt">
              <td height="30" colspan="9" align="right">&nbsp;</td>
            </tr>
            <tr>
              <td height="35" colspan="9" align="center"><input type="submit" name="Submit" <?php if(isset($_GET['Edit'])) { echo "value=Edit" ;} else { echo "value=Submit" ;}?> />
                      <input type="hidden" name="pk" value="<?php echo @$fres2['com_id'];?>"/></td>
            </tr>
            <tr class="fnt">
              <td colspan="9" align="center">&nbsp;</td>
            </tr>
            <tr background="images\1by25.jpg">
              <td colspan="9" align="center" height="21">&nbsp;</td>
            </tr>
          </table>
</form>
	<?php include "includes/footer.php";?>
	<script>
		function get_local_districts(state){
		$("#local_district").html("<option value=''>Please wait...</option>");
			var data = "state_id="+state+"&get_districts";
			$.ajax({
				type:'GET',
				data:data,
				url:"ajax_master.php",
				success: function(result){
					$("#local_district").html(result);
				}				
			})
		}
		
		function get_per_districts(state){
		$("#per_district").html("<option value=''>Please wait...</option>");
			var data = "state_id="+state+"&get_districts";
			$.ajax({
				type:'GET',
				data:data,
				url:"ajax_master.php",
				success: function(result){
					$("#per_district").html(result);
				}				
			})
		}
		
		/*function get_bank(MAIN_BANK){
		$("#branch_id").html("<option value=''>Please wait...</option>");
			var data = "main_bank="+MAIN_BANK+"&get_branch";
			$.ajax({
				type:'GET',
				data:data,
				url:"ajax_master.php",
				success: function(result){
					$("#branch_id").html(result);
				}				
			})
		}*/
	</script>
 