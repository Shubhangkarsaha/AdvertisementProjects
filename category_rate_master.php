<?php include "includes/header.php";
if(isset($_POST['category']))
{
	 $category = $_POST['category'];
	 $sql = "select * from category_rate_master where cat_id = '$category'";
	 $rec = q($sql);
	 $fres2 = f($rec);
	 
	 
}
if(isset($_POST['Submit2']))
	{
		if($fres2['rate']!=''){
			$rate = $_POST['rate'];
		}
		else
		{
			$rate = '';
		}
		if($fres2['1st_year_rate']!=''){
		    $first_year_rate = $_POST['first_year_rate'];
		}
		else
		{
		     $first_year_rate = '';
		}
		if($fres2['renew_rate']!=''){	 
		    $renew_rate = $_POST['renew_rate'];
		}
		else
		{
		    $renew_rate = '';
		}	
		if($fres2['1to30_days_rate']!=''){
		     $first30_days_rate = $_POST['first_30_days_rate'];
		 }
		 else
		 {
		     $first30_days_rate = '';
		}
		if($fres2['31to60_days_rate']!=''){	 
		   $second30_days_rate = $_POST['second_30_days_rate'];
		}
		else
		{
		   $second30_days_rate = '';
		}
		if($fres2['7days_rate']!=''){   
		    $seven_days_rate = $_POST['seven_days_rate'];
		}
		else
		{
		     $seven_days_rate = '';
		}
		if($fres2['10days_rate']!=''){	 
		     $ten_days_rate = $_POST['ten_days_rate'];
		}
		else
		{
		     $ten_days_rate = '';
	     }
		 if($fres2['15days_rate']!=''){
		    $fifteen_days_rate = $_POST['fifteen_days_rate'];
		}
		else
		{
		    $fifteen_days_rate = '';
		}
		if($fres2['20days_rate']!=''){	
		   $twenty_days_rate = $_POST['twenty_days_rate'];
		}
		else
		{
		    $twenty_days_rate = '';
		}
		if($fres2['30days_rate']!=''){	
		   $thirty_days_rate = $_POST['thirty_days_rate'];
		}
		else
		{
		   $thirty_days_rate ='';
		}  
		if($fres2['15days_non_illu_rate']!=''){
		   $fifteen_days_non_illu_rate = $_POST['fifteen_days_non_illu_rate'];
		}
		else
		{
		   $fifteen_days_non_illu_rate = '';
		}
		if($fres2['30days_non_illu_rate']!=''){   
		   $thirty_days_non_illu_rate = $_POST['thirty_days_non_illu_rate'];
		}
		else
		{
		    $thirty_days_non_illu_rate = '';
		}
		if($fres2['15days_illu_rate']!=''){	
  			$fifteen_days_illu_rate = $_POST['fifteen_days_illu_rate'];
		 }
		 else
		 {
		    $fifteen_days_illu_rate = '';
		  }
		 if($fres2['30days_illu_rate']!=''){	
		     $thirty_days_illu_rate = $_POST['thirty_days_illu_rate'];
		  
		 }
		 else
		  {
		     $thirty_days_illu_rate = '';
		}	 
		
		
		//echo var_export(unserialize(file_get_contents('http://www.geoplugin.net/php.gp? 
  //ip='.$_SERVER['REMOTE_ADDR'])));
		
	
	
	  	
		
	   $sql = "UPDATE `category_rate_master` SET
`rate`='$rate',`1st_year_rate`='$first_year_rate',`renew_rate`='$renew_rate',`1to30_days_rate`='$first30_days_rate',`31to60_days_rate`='$second30_days_rate',`7days_rate`='$seven_days_rate',`10days_rate`='$ten_days_rate',`15days_rate`='$fifteen_days_rate',`20days_rate`='$twenty_days_rate',`30days_rate`='$thirty_days_rate',`15days_non_illu_rate`='$fifteen_days_non_illu_rate',`30days_non_illu_rate`='$thirty_days_non_illu_rate',`15days_illu_rate`='$fifteen_days_illu_rate',`30days_illu_rate`='$thirty_days_illu_rate' WHERE cat_id='$category'";
	   //echo $sql;exit;
					
			   $uprec = q($sql);
			  //exit;
	   if($uprec>0)
	     {
		  echo"<script>
           alert('Your data updated successfully.');
		   location.replace('select_category2.php');		    
		  </script>";
		 }
		else
		  {
		   echo"<script>
		    alert('Error ! Please contact your Developer as soon as possible');
			location.replace('dashboard.php?');
		   </script>";
		  } 
		
    	
}

	/*if(isset($_POST['Edit']))
	{
	echo "Demo";
	}*/

	
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
         Category Rate Details
        <small>&nbsp;</small>
      </h1>
      
      </section>
<br />

<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
          <table width="80%" border="0" align="center" cellpadding="1" cellspacing="1" class="main_bod" >
            <tr background="images\1by25.jpg">
              <td height="40" colspan="9" align="center">&nbsp;</td>
            </tr>
            <tr class="fnt">
              <td height="25" colspan="9" align="right">&nbsp;</td>
            </tr>
			<?php
				if($category == '1')
				{
			
			?>
            <tr class="fnt">
              <td width="15%" height="38" align="right">1st year rate</td>
              <td width="1%" height="38" align="center">:</td>
              <td width="24%" height="38" align="left"><input name="first_year_rate" type="text" id="first_year_rate" value="<?php if($category == '1'){echo @$fres2['1st_year_rate'];}?>" /></td>
              <td width="7%" height="39" align="right">&nbsp;</td>
              <td width="2%" height="39" align="center">&nbsp;</td>
              <td width="17%" height="39" align="left">&nbsp;</td>
              <td width="14%" height="39" align="right">Renew rate</td>
              <td width="2%" height="39" align="center">:</td>
              <td width="18%" height="39" align="left"><input name="renew_rate" type="number" id="renew_rate" value="<?php echo @$fres2['renew_rate'];?>"/></td>
            </tr>
			<?php }if($fres2['rate']!=''){?>
            <tr class="fnt">
              <td height="39" align="right">&nbsp;</td>
              <td height="39" align="center">&nbsp;</td>
              <td height="39" align="left">&nbsp;</td>
              <td height="39" align="right">Rate</td>
              <td height="39" align="center">:</td>
              <td height="39" align="left">
			  
                  <input name="rate" type="text" id="rate" value="<?php echo @$fres2['rate'];?>" />                </td>
              <td height="39" align="right">&nbsp;</td>
              <td height="39" align="center">&nbsp;</td>
              <td height="39" align="left">&nbsp;</td>
            </tr>
			<?php }if($category == '2')
			         {
			?>
            <tr class="fnt">
              <td height="39" align="right">1to30_days_rate</td>
              <td height="39" align="center">:</td>
              <td height="39" align="left"><input name="first_30_days_rate" type="number" id="first_30_days_rate" value="<?php echo @$fres2['1to30_days_rate'];?>" />              </td>
              <td height="39" align="right">&nbsp;</td>
              <td height="39" align="center">&nbsp;</td>
              <td height="39" align="left">&nbsp;</td>
              <td height="39" align="right">31to60_days_rate</td>
              <td height="39" align="center">:</td>
              <td height="39" align="left"><input name="second_30_days_rate" type="text" id="second_30_days_rate" value="<?php echo @$fres2['31to60_days_rate'];?>"/></td>
            </tr>
			<?php }if($category == '3')
			         {
			?>
            <tr class="fnt">
              <td height="38" align="right">7days_rate</td>
              <td height="38" align="center">:</td>
              <td height="38" align="left"><input name="seven_days_rate" type="number" id="seven_days_rate" value="<?php echo @$fres2['7days_rate'];?>"/></td>
              <td height="39" align="right">15days_rate</td>
              <td height="39" align="center">:</td>
              <td height="39" align="left"><input name="fifteen_days_rate" type="text" id="fifteen_days_rate" value="<?php echo @$fres2['15days_rate'];?>"/></td>
              <td height="38" align="right">30days_rate</td>
              <td height="38" align="center">:</td>
              <td height="38" align="left"><input name="thirty_days_rate" type="text" id="thirty_days_rate" value="<?php echo @$fres2['30days_rate'];?>"/></td>
            </tr>
			<?php }if($category == '8')
			         {
			?>
            <tr class="fnt">
              <td height="38" align="right">10days_rate</td>
              <td height="38" align="center">:</td>
              <td height="38" align="left"><input name="ten_days_rate" type="text" id="ten_days_rate" value="<?php echo @$fres2['10days_rate'];?>" /></td>
              <td height="38" align="right">20days_rate</td>
              <td height="38" align="center">:</td>
              <td height="38" align="left"><input name="twenty_days_rate" type="number" id="twenty_days_rate" value="<?php echo @$fres2['20days_rate'];?>"/></td>
              <td height="38" align="right">30days_rate</td>
              <td height="38" align="center">:</td>
              <td height="38" align="left"><input name="thirty_days_rate" type="text" id="thirty_days_rate" value="<?php echo @$fres2['30days_rate'];?>"/></td>
            </tr>
			<?php }if($category == '4')
  			         {
			    ?>
            <tr class="fnt">
              <td height="39" align="right">15days_non_illu_rate</td>
              <td height="39" align="center">:</td>
              <td height="39" align="left"><input name="fifteen_days_non_illu_rate" type="text" id="fifteen_days_non_illu_rate" value="<?php echo @$fres2['15days_non_illu_rate'];?>"/></td>
              <td height="39" align="right">&nbsp;</td>
              <td height="39" align="center">&nbsp;</td>
              <td height="39">&nbsp;</td>
              <td height="39" align="right">30days_non_illu_rate</td>
              <td height="39" align="center">:</td>
              <td height="39" align="left"><input name="thirty_days_non_illu_rate" type="text" id="thirty_days_non_illu_rate" value="<?php echo @$fres2['30days_non_illu_rate'];?>" /></td>
            </tr>
            <tr class="fnt">
              <td height="39" align="right">15days_illu_rate</td>
              <td height="39" align="center">:</td>
              <td height="39" align="left"><input name="fifteen_days_illu_rate" type="text" id="fifteen_days_illu_rate" value="<?php echo @$fres2['15days_illu_rate'];?>"/></td>
              <td height="39" align="right">&nbsp;</td>
              <td height="39" align="center">&nbsp;</td>
              <td height="39">&nbsp;</td>
              <td height="39" align="right">30days_illu_rate</td>
              <td height="39" align="center">&nbsp;</td>
              <td height="39"><input name="thirty_days_illu_rate" type="text" id="thirty_days_illu_rate" value="<?php echo @$fres2['15days_illu_rate'];?>"/></td>
            </tr>
			<?php }?>
            <tr class="fnt">
              <td height="30" colspan="9" align="right">&nbsp;</td>
            </tr>
            <tr>
              <td height="35" colspan="9" align="center"><input class="head_font" type="submit" name="Submit2" value="Edit"/>
                      <input type="hidden" name="category" value="<?php echo @$category;?>"/>			  </td>
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
