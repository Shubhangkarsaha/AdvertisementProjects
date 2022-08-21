<?php 
	include "includes/header.php";
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
        Select Category
        <small>&nbsp;</small>
      </h1>
      
      </section>
<br />

<form action="pay_site_list.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
          <table width="80%" border="0" align="center" cellpadding="1" cellspacing="1" class="main_bod" >
            <tr background="images\1by25.jpg">
              <td height="40" colspan="9" align="center">&nbsp;</td>
            </tr>
            <tr class="fnt">
              <td height="25" colspan="9" align="right">&nbsp;</td>
            </tr>
            <tr class="fnt">
              <td width="13%" height="39" align="right">&nbsp;</td>
              <td width="2%" height="39" align="center">&nbsp;</td>
              <td width="18%" height="39" align="left">&nbsp;</td>
              <td width="15%" height="39" align="right">Category</td>
              <td width="2%" height="39" align="center">:</td>
              <td width="17%" height="39" align="left"><select name="category" id="category" required="">
                  <option value="">--select category--</option>
                  <?php
			   $sql = "select * from category_master order by cat_name asc";
			   $rec = q($sql);
			   while($res = f($rec))
			    {
				?>
                  <option value="<?php echo @$res['cat_id'];?>"><?php echo $res['cat_name'];?></option>
                  <?php 
				 }
				?>
              </select></td>
              <td width="14%" height="38" align="right">&nbsp;</td>
              <td width="2%" height="38" align="center">&nbsp;</td>
              <td width="17%" height="38" align="left">&nbsp;</td>
            </tr>
            <tr class="fnt">
              <td height="30" colspan="9" align="right">&nbsp;</td>
            </tr>
            <tr>
              <td height="35" colspan="9" align="center"><input class="head_font" type="submit" name="Submit" />
              </td>
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
      