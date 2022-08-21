<?php include "includes/header.php";

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
        Filter Site Details
        <small>&nbsp;</small>
      </h1>
      
      </section>
<br /><br />

<form action="filter_site_list.php" method="get" enctype="multipart/form-data" name="form1" id="form1">
          <table width="80%" border="0" align="center" cellpadding="1" cellspacing="1" class="main_bod" >
            <tr background="images\1by25.jpg">
              <td height="40" colspan="9" align="center">&nbsp;</td>
            </tr>
            <tr class="fnt">
              <td height="25" colspan="9" align="right">&nbsp;</td>
            </tr>
            <tr class="fnt">
              <td width="13%" height="39" align="right">Ward No </td>
              <td width="2%" height="39" align="center">:</td>
              <td width="18%" height="39" align="left"><input name="site_ward_no" type="number" id="site_ward_no" value="<?php echo @$fres2['site_ward_no'];?>" />              </td>
              <td width="13%" height="39" align="right">Site Area</td>
              <td width="2%" height="39" align="center">:</td>
              <td width="18%" height="39" align="left"><input name="site_area" type="text" id="site_area" value="<?php echo @$fres2['site_area'];?>" /></td>
              <td width="14%" height="38" align="right">Site Pin </td>
              <td width="2%" height="38" align="center">:</td>
              <td width="18%" height="38" align="left"><input name="site_pin" type="number" id="site_pin" value="<?php echo @$fres2['site_pin'];?>"  maxlength="6" oninput="javascript: if (this.value.length &gt; this.maxLength) this.value = this.value.slice(0, this.maxLength);"/></td>
            </tr>
            <tr class="fnt">
              <td height="38" align="right">Site location</td>
              <td height="38" align="center">:</td>
              <td height="38" align="left"><input name="site_location" type="text" id="site_location" value="<?php echo @$fres2['site_location'];?>" />              </td>
              <td height="39" align="right">Company</td>
              <td height="39" align="center">:</td>
              <td height="39" align="left"><select name="company" id="company" >
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
              <td height="38" align="right">Category</td>
              <td height="38" align="center">:</td>
              <td height="38" align="left"><select name="category" id="category" >
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
              <td height="39" align="right">Installation Date</td>
              <td height="39" align="center">:</td>
              <td height="39" align="left"><input name="installation_date" type="date" id="installation_date" value="<?php echo @$fres2['installation_date'];?>" /></td>
              <td height="38" align="right">Unique Add ID  </td>
              <td height="38" align="center">:</td>
              <td height="38" align="left"><input name="unique_add_id" type="text" id="unique_add_id" value="<?php echo @$fres2['unique_add_id'];?>" /></td>
              <td height="38" align="right">Contract Date</td>
              <td height="38" align="center">:</td>
              <td height="38" align="left"><input name="contract_date" type="date" id="contract_date" value="<?php echo @$fres2['contract_date'];?>" /></td>
            </tr>
            <tr class="fnt">
              <td height="30" colspan="9" align="right">&nbsp;</td>
            </tr>
            <tr>
              <td height="35" colspan="9" align="center"><input class="head_font" type="submit" name="Submit" <?php if(isset($_GET['Edit'])) { echo "value=Edit" ;} else { echo "value=Submit" ;}?> />              </td>
            </tr>
            <tr class="fnt">
              <td colspan="9" align="center">&nbsp;</td>
            </tr>
            <tr background="images\1by25.jpg">
              <td colspan="9" align="center" height="21">&nbsp;</td>
            </tr>
  </table>
</form>
 <p>&nbsp;   </p>
   
  
  


<?php include "includes/footer.php";?>
<script>
		function get_scheme(MAIN_SCHEME){
		$("#ben_sub_scheme_id").html("<option value=''>Please wait...</option>");
			var data = "main_scheme="+MAIN_SCHEME+"&get_sub_scheme";
			$.ajax({
				type:'GET',
				data:data,
				url:"ajax_master.php",
				success: function(result){
					$("#ben_sub_scheme_id").html(result);
				}				
			})
		}

		function get_bank(MAIN_BANK){
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
		}
	
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