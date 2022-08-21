<?php include "includes/header.php";
if(isset($_POST['Submit']))
	{
		$company = $_POST['company'];
		$category = $_POST['category'];
		$site_location = $_POST['site_location'];
		$site_landlord = $_POST['site_landlord'];
		$landlord_fname = $_POST['landlord_fname'];
		$site_ward_no = $_POST['site_ward_no'];
		$site_area = $_POST['site_area'];
		$site_pin = $_POST['site_pin'];
		$landlord_mobile = $_POST['landlord_mobile'];
		$site_type = $_POST['site_type'];
		
		$item_length = $_POST['item_length'];
		$item_width = $_POST['item_width'];
		$item_total_size = $_POST['item_total_size'];
		$contract_date = $_POST['contract_date'];
		$installation_date = $_POST['installation_date'];
		$permission_date = $_POST['permission_date'];
		$entry_date = date('Y-m-d');
		$entry_by = $_SESSION['lid'];

		$season_start = "";
		$upto_days = "";
		$upto_month = "";
		//echo var_export(unserialize(file_get_contents('http://www.geoplugin.net/php.gp? 
  //ip='.$_SERVER['REMOTE_ADDR'])));
		
		$id = $_POST['pk']; 
		
		
		if($_POST['Submit']=="Submit")
		  {
		  	/*list($iy,$im,$id) = explode("-", $installation_date);
			$instal_year = $iy;
			$next_year = $instal_year + 1;
			$s_date = $instal_year.'-04-01';
			$e_date = $next_year.'-03-31';
			$season_start_date = strtotime($s_date);
			$season_end_date = strtotime($e_date);
			$install_date = strtotime($installation_date);
			if($install_date >= $season_start_date && $install_date <= $season_end_date)
			{
				$starting_season = $instal_year."-".$next_year;
			}
			elseif($install_date <= $season_start_date)
			{
				$starting_season = --$instal_year."-".--$next_year;
			}*/
			$cat_pay_type = qf("select cat_payment_type from category_master where cat_id = '$category'");
			switch($cat_pay_type['cat_payment_type']){
				case 1:
					$upto_days = date('Y-m-d',(strtotime($installation_date)+2592000));
					break;
				case 2:
					$upto_month = "";//date('Y-m-d', );
					
			}
			$starting_season = season($installation_date);
			
		    $sql ="INSERT INTO `site_details_master`(`cat_id`, `com_id`, `site_location`, `site_landlord`, `landlord_fname`, `site_ward_no`, `site_area`, `site_pin`, `landlord_mobile`, `site_type`, `item_length`, `item_width`, `item_total_size`, `contract_date`, `installation_date`, `permission_date`, `paid_upto_season`, `entry_date`, `entry_by`) VALUES ('$category', '$company', '$site_location','$site_landlord','$landlord_fname','$site_ward_no','$site_area','$site_pin','$landlord_mobile','$site_type','$item_length','$item_width','$item_total_size','$contract_date','$installation_date','$permission_date','$starting_season','$entry_date','$entry_by')";
			//echo $sql;exit;

			  $uprec = qi($sql);
			  $unique_add_id = 1000+$uprec;
			  $unique_add_sql = q("update site_details_master set unique_add_id = '$unique_add_id' where site_id = '$uprec'");
			  $path = "site_qr/site-".$uprec.".png";
	
			//$url = "classicsoftwares.com/Projects/smc_adv/qr_site_record.php?REC=$uprec";
			$url = $qr_url."site_record/site_details.php?SID=$uprec";
			QRcode::png($url, $path,'H',8,14);		
			if($unique_add_sql)
			{
				echo "<script>
					alert('Site details Submitted Successfully');
					location.replace('document_register.php?SID=$uprec');
				</script>";
				/*echo "<script>
					alert('Site details Submitted Successfully');
					location.replace('site_master.php');
				</script>";*/
			}
			else
			{
				echo "<script>
					alert('Error ! Please contact your Developer as soon as possible');
					location.replace('site_master.php');
				</script>";
		     }
	
	       }
	if($_POST['Submit']=="Edit")
	  {
	  	
		$update_date = date('Y-m-d');
		$update_by = $_SESSION['lid'];
		if(isset($_GET['F']))
		{
			$url = $_SESSION['filter_site'];
		}
		else
		{
			$url = "site_data.php";
		}
		
	   $sql = "UPDATE `site_details_master` SET `cat_id` = '$category', `com_id` = '$company',`site_location`= '$site_location',`site_landlord`= '$site_landlord',`landlord_fname`='$landlord_fname',`site_ward_no`='$site_ward_no',`site_area`= '$site_area',`site_pin`= '$site_pin',`landlord_mobile`= '$landlord_mobile',`site_type`= '$site_type',`item_length`='$item_length',`item_width`='$item_width',`item_total_size`='$item_total_size',`contract_date`='$contract_date',`installation_date`='$installation_date',`permission_date`='$permission_date',`update_date`='$update_date',`update_by`='$update_by' where site_id = '$id'";
	  // echo $sql;exit;
					
			   $uprec = q($sql);
			  //exit;
	   if($uprec>0)
	     {
		  echo"<script>
           alert('Your data updated successfully.');
		   location.replace('$url');		    
		  </script>";
		 }
		else
		  {
		   echo"<script>
		    alert('Error ! Please contact your Developer as soon as possible');
			location.replace('site_master.php?Edit=$id');
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
	 $sql = "select * from site_details_master where site_id = '$id'";
	 $rec = q($sql);
	 $fres2 = f($rec);
	 
	 
}
	
    if (isset($_GET['Del']))
 {
  $D = $_GET['Del'];
  $dsql= "update site_details_master set site_status = '1' where site_id='$D'";
  $drec = q($dsql);
  echo "<script>
		alert('Category details removed successfully');
		location.replace('site_data.php?')
		</script>";
  }	
/*if(isset($_POST['Submit2'])){
echo $geolocation = "<script><p id='demo'></p></script>";
echo "<script>document.writeIn(x);</script>";
}*/

?>
<style type="text/css">
<!--
.style3 {font-size: 24px; font-weight: bold; }
.style4 {
	font-size: 16px;
	font-weight: bold;
}
-->
</style>


<section class="content-header">
      <h1>
        <?php if(isset($_GET['Edit'])){echo "Edit";}else{echo "Add";}?> Site Details
        <small>&nbsp;</small>
      </h1>
      
      </section>
<br />

<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
          <table width="90%" border="0" align="center" cellpadding="1" cellspacing="1" class="main_bod" >
            <tr class="head_font" background="images\1by25.jpg">
              <td height="40" colspan="9" align="center">Landlord Details</td>
            </tr>
            <tr class="fnt">
              <td height="21" colspan="9" align="right">&nbsp;</td>
            </tr>
            <tr class="fnt">
              <td width="13%" height="39" align="right">Name</td>
              <td width="2%" height="39" align="center">:</td>
              <td width="18%" height="39" align="left"><input name="site_landlord" type="text" id="site_landlord" value="<?php echo @$fres2['site_landlord'];?>"/></td>
              <td width="13%" height="38" align="right">Father's Name </td>
              <td width="2%" height="38" align="center">:</td>
              <td width="18%" height="38" align="left"><input name="landlord_fname" type="text" id="landlord_fname" value="<?php echo @$fres2['landlord_fname'];?>"/></td>
              <td width="14%" height="39" align="right">Mobile No. </td>
              <td width="2%" height="39" align="center">:</td>
              <td width="18%" height="39" align="left"><input name="landlord_mobile" type="number" id="landlord_mobile" value="<?php echo @$fres2['landlord_mobile'];?>" maxlength="10" oninput="javascript: if (this.value.length &gt; this.maxLength) this.value = this.value.slice(0, this.maxLength);"/></td>
            </tr>
            <tr class="fnt">
              <td height="21" colspan="9" align="right">&nbsp;</td>
            </tr>
            <tr class="head_font" background="images\1by25.jpg">
              <td height="36" colspan="9" align="center" >Site Details </td>
            </tr>
            <tr class="fnt">
              <td height="21" colspan="9" align="right">&nbsp;</td>
            </tr>
            <tr class="fnt">
              <td height="39" align="right">Company</td>
              <td height="39" align="center">:</td>
              <td height="39" align="left"><select name="company" id="company" required="">
                  <option value="">--Select Company--</option>
                  <?php
					$sql = "select * from company_master where com_status = '0' order by com_name asc";
					$rec = q($sql);
					while($res = f($rec))
					{
			?>
                  <option value="<?php echo $res['com_id'];?>" <?php if(isset($_GET['Edit']))if($fres2['com_id'] == $res['com_id']){echo "selected";}?>><?php echo $res['com_name'];?></option>
                  <?php }?>
              </select></td>
              <td height="39" align="right">&nbsp;</td>
              <td height="39" align="center">&nbsp;</td>
              <td height="39" align="left">&nbsp;</td>
              <td height="39" align="right">Category</td>
              <td height="39" align="center">:</td>
              <td height="39" align="left"><select name="category" id="category" onchange="get_size_type()" required="">
                <option value="">--Select Category--</option>
                <?php
					$sql = "select * from category_master order by cat_name asc";
					$rec = q($sql);
					while($res = f($rec))
					{
			?>
                <option value="<?php echo $res['cat_id'];?>" <?php if(isset($_GET['Edit']))if($fres2['cat_id'] == $res['cat_id']){echo "selected";}?>><?php echo $res['cat_name'];?></option>
                <?php }?>
              </select></td>
            </tr>
            <tr class="fnt">
              <td height="38" align="right">Item Length </td>
              <td height="38" align="center">:</td>
              <td height="38" align="left"><input name="item_length" type="number" id="item_length" value="<?php echo @$fres2['item_length'];?>" onchange="total_size()" required=""/></td>
              <td height="39" align="right">&nbsp;</td>
              <td height="39" align="center">&nbsp;</td>
              <td height="39" align="left">&nbsp;</td>
              <td height="39" align="right">Item Width </td>
              <td height="39" align="center">:</td>
              <td height="39" align="left"><input name="item_width" type="number" id="item_width" value="<?php echo @$fres2['item_width'];?>"  onchange="total_size()" required=""/></td>
            </tr>
            <tr class="fnt">
              <td height="38" align="right">Site Type</td>
              <td height="38" align="center">:</td>
              <td height="38" align="left"><input name="site_type" type="text" id="site_type" value="<?php echo @$fres2['site_type'];?>" required=""/></td>
              <td height="39" align="right">&nbsp;</td>
              <td height="39" align="center">&nbsp;</td>
              <td height="39" align="left">&nbsp;</td>
              <td height="39" align="right">Item Total Size</td>
              <td height="39" align="center">:</td>
              <td height="39" align="left"><input name="item_total_size" type="text" id="item_total_size" value="<?php echo @$fres2['item_total_size'];?>" readonly="" required=""/>
              <span id="size_type_2">&nbsp;</span></td>
            </tr>
            <tr class="fnt">
              <td height="38" align="right">Contract Date</td>
              <td height="38" align="center">:</td>
              <td height="38" align="left"><input name="contract_date" type="date" id="contract_date" value="<?php echo @$fres2['contract_date'];?>" required=""/></td>
              <td height="39" align="right">Installation Date</td>
              <td height="39" align="center">:</td>
              <td height="39" align="left"><input name="installation_date" type="date" id="installation_date" value="<?php echo @$fres2['installation_date'];?>" required=""/></td>
              <td height="39" align="right">Work Permit Date</td>
              <td height="39" align="center">:</td>
              <td height="39" align="left"><input name="permission_date" type="date" id="upto" value="<?php echo @$fres2['permission_date'];?>" required=""/></td>
            </tr>
            <tr class="fnt">
              <td height="21" colspan="9" align="right">&nbsp;</td>
            </tr>
            <tr class="head_font" background="images\1by25.jpg">
              <td height="36" colspan="9" align="center" >Site Adderess </td>
            </tr>
            <tr class="fnt">
              <td height="21" colspan="9" align="right">&nbsp;</td>
            </tr>
            <tr class="fnt">
              <td height="39" align="right">Ward No </td>
              <td height="39" align="center">:</td>
              <td height="39" align="left"><input name="site_ward_no" type="number" id="site_ward_no" value="<?php echo @$fres2['site_ward_no'];?>" required=""/>              </td>
              <td height="39" align="right">Location</td>
              <td height="39" align="center">:</td>
              <td height="39" align="left"><input name="site_location" type="text" id="site_location" value="<?php echo @$fres2['site_location'];?>" required=""/></td>
              <td height="38" align="right"> PIN </td>
              <td height="38" align="center">:</td>
              <td height="38" align="left"><input name="site_pin" type="number" id="site_pin" value="<?php echo @$fres2['site_pin'];?>" required="" maxlength="6" oninput="javascript: if (this.value.length &gt; this.maxLength) this.value = this.value.slice(0, this.maxLength);"/></td>
            </tr>
            <tr class="fnt">
              <td height="38" align="right">Area</td>
              <td height="38" align="center">:</td>
              <td height="39" colspan="7" align="left"><label>
                <textarea name="site_area" cols="155" id="site_area" required="required"><?php echo @$fres2['site_area'];?></textarea>
              </label></td>
            </tr>
            
            <tr class="fnt">
              <td height="21" colspan="9" align="right">&nbsp;</td>
            </tr>
            <tr>
              <td height="35" colspan="9" align="center"><input class="head_font" type="submit" name="Submit" <?php if(isset($_GET['Edit'])) { echo "value=Edit" ;} else { echo "value=Submit" ;}?> />
                      <input type="hidden" name="pk" value="<?php echo @$fres2['site_id'];?>"/>			  </td>
            </tr>
            <tr class="fnt">
              <td colspan="9" align="center">&nbsp;</td>
            </tr>
            <tr background="images\1by25.jpg">
              <td colspan="9" align="center" height="21">&nbsp;</td>
            </tr>
  </table>
</form>

   
  
  
<br /><br />

<?php include "includes/footer.php";?>
<script>
	function total_size(){
		var length = $('#item_length').val();
		var width = $('#item_width').val();
		if(length>0 && width>0)
		{
			var size = length*width;
			document.getElementById("item_total_size").value = size;
		}
		
	}
		function get_item_size_type(){
			var type = $('#category').val();
			$("#item_size_type").html("<option value=''>Please wait...</option>");
				var data = "value="+type+"&get_item_size_type";
				$.ajax({
					type:'GET',
					data:data,
					url:"ajax_master.php",
					success: function(result){
						$("#item_size_type").html(result);
					}				
				})
		}
	
	function get_size_type() {

		jQuery.ajax({
		url: "ajax_master.php",
		data:'get_size_type='+$("#category").val(),
		type: "POST",
		success:function(data){
		$("#size_type").html(data);
		$("#size_type_2").html(data);
		},
		error:function (){}
		});
	}
	
	/*function switch_opt() {
		var data = "input="+categoey;
		$.ajax({
			type:'GET',
			data:data,
			url:"ajax_master.php",
			success: function(result){
				$("#upto").html(result);
			}				
		})
	}*/	
/*var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = "<strong>Latitude : </strong> <input type='text' name='latitude' id='latitude' value='"+ position.coords.latitude +"'/>" +
  "&nbsp;&nbsp;&nbsp;<strong>Longitude : </strong> <input type='text' name='longitude' id='longitude' value='" + position.coords.longitude +"'/>";
}*/
</script>
      