<?php
	include "includes/header.php";
?>
<link href="style/style.css" rel="stylesheet" type="text/css" />


<section class="content-header">
<h1>
       Company Wise Report <small>&nbsp;</small>      </h1>
      
      </section>
<br>
<form id="form1" name="form1" method="post" action="company_wise_list.php" enctype="multipart/form-data">
  <table width="75%" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <th height="36" colspan="9" background="images\1by25.jpg" scope="col">&nbsp;</th>
    </tr>
    <tr>
      <td colspan="9">&nbsp;</td>
    </tr>
    <tr>
      <td width="15%" align="right">&nbsp;</td>
      <td width="6%" align="center">&nbsp;</td>
      <td width="13%" align="left">&nbsp;</td>
      <td width="14%" height="32" align="right"><strong>Comapany </strong></td>
      <td width="3%" align="center"><strong>:</strong></td>
      <td width="15%" align="left">
	  	<select name="company" id="company" required="">
			<option value="">--Select Company--</option>
		<?php
			$sql = "select * from company_master where com_status = '0' order by com_name asc";
			$rec = q($sql);
			while($res = f($rec))
			{
		?>
			<option value="<?php echo $res['com_id'];?>"><?php echo $res['com_name'];?></option>
		<?php }?>
		</select>
	  </td>
      <td width="10%" align="right">&nbsp;</td>
      <td width="4%" align="center">&nbsp;</td>
      <td width="20%" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="21" align="right">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="right"></td>
      <td align="center"></td>
      <td colspan="4" align="left"></td>
    </tr>
    <tr>
      <td colspan="9" align="center">
        <input type="submit" name="Submit" value="Submit" /></td>
    </tr>
    <tr>
      <td colspan="9"></td>
    </tr>
    <tr>
      <td colspan="9" background="images\1by25.jpg">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>


<?php include "includes/footer.php";?>

<!--<script>

/*Check User Name availability........................*/
function checkAvailability() {

jQuery.ajax({
url: "ajax_master.php",
data:'username='+$("#user_name").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
},
error:function (){}
});
}
/*Check Passward & Confirm Password availability........................*/


function checkPassword() {
	var pass1 = $("#pass").val();
  	var pass2 = $("#confirm_pass").val();
	if(pass1 != "")
	  {
		document.getElementById("pw1").innerHTML = "";
		//return false;
	  }
	if(pass2 != "")
		if(pass1 != pass2)
		  {	
			document.getElementById("pw2").innerHTML = "**Passwords did not match!";
			return false;
		  } 
		 else
		  {	
			document.getElementById("pw2").innerHTML = "";
			return false;
		  }
}

function matchPassword() {

  var pass1 = $("#pass").val();
  var pass2 = $("#confirm_pass").val();
  	
  if(pass1 == "")
  {
  	document.getElementById("pw1").innerHTML = "**Fill the password please!";
	return false;
  }
	if(pass1 != pass2)
  {	
  	document.getElementById("pw2").innerHTML = "**Passwords did not match!";
	return false;
  } 
  else
  {	
  	document.getElementById("pw2").innerHTML = "";
	return false;
  } 
}
/*Password Visibity........................*/
function show($id){
		var x = document.getElementById($id);
		if(x.type=="password")
		{
			x.type = "text";
		}
		else
		{
			x.type = "password";
		}
	}
</script>-->