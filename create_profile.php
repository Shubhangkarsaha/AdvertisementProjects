<?php
	include "includes/header.php";
	
if(isset($_POST['Submit']))
{
		$full_name = $_POST['full_name'];
		
		$user_name = $_POST['user_name'];
		
		$password = $_POST['pass'];
		$confirm_pass = $_POST['confirm_pass'];
		$user_type = $_POST['user_type'];
		//$image = $_FILES['user_image']['name'];
		$entry_date = date('M-d-Y');
		
		
//Submit..............................................................
	 if($_POST['Submit']=='Submit')
	 {
		
		$user_sql = "SELECT user_name FROM login_master WHERE user_name='$user_name'";	
		if(row_count($user_sql) > 0)
		{
			echo "<script>
						alert('Username Not Available!!!');
						location.replace('create_profile.php?');
					</script>";	
		}
		else
		{    
			 if($password  != $confirm_pass)
			 {
					echo "<script>
						alert('Passwords did not match!');
						location.replace('create_profile.php?');
					</script>";	
			 }
			 else
			 {
			    $sql = "INSERT INTO `login_master`(`user_name`, `password`, `full_name`, `user_type`, `entry_date`) VALUES ('$user_name', '$password', '$full_name', '$user_type', '$entry_date')";
			    //$sql = $sql." where login_id = '$pk'";
				$rec = q($sql);
				if($rec>0)
				{
					echo "<script>
						alert('User Account created Successfully');
						location.replace('dashboard.php?');
					</script>";
				}
				else
				{
					echo "<script>
						alert('Error ! Please contact your Developer as soon as possible');
						location.replace('create_profile.php')
						</script>";
				}
			}
		}
	}		
}
	
	

?>
<link href="style/style.css" rel="stylesheet" type="text/css" />


<section class="content-header">
<h1>
       Create New Profile  <small>&nbsp;</small>      </h1>
      
      </section>
<br>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table width="80%" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <th height="36" colspan="9" background="images\1by25.jpg" scope="col">&nbsp;</th>
    </tr>
    <tr>
      <td colspan="9">&nbsp;</td>
    </tr>
    <tr>
      <td width="10%" align="right"><strong>Full Name</strong></td>
      <td width="3%" align="center"><strong>:</strong></td>
      <td width="21%" align="left"><input name="full_name" type="text" id="full_name" size="21" required=""/></td>
      <td width="9%" height="32" align="right"><strong>User Name </strong></td>
      <td width="3%" align="center"><strong>:</strong></td>
      <td width="14%" align="left"><input name="user_name" type="text" id="user_name" required="" size="21" onkeyup="checkAvailability()"/>
	  <br/>
	  </td>
      <td width="13%" align="right"><strong>User Type </strong></td>
      <td width="3%" align="center"><strong>:</strong></td>
      <td width="24%" align="left">
	  <select name="user_type" id="user_type" required="">
	  	<option value="">&nbsp;&nbsp;&nbsp;--- Select User Type ---&nbsp;&nbsp;&nbsp;</option> 
	  	<option value="U">Normal User</option>
		<option value="SU">Super User</option>
      </select>      </td>
    </tr>
    <tr>
      <td height="21" align="right">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="right"></td>
      <td align="center"></td>
      <td colspan="4" align="left"><span id="user-availability-status">&nbsp;</span></td>
    </tr>
    <tr>
      <td height="28" align="right"><strong>Password</strong></td>
      <td align="center"><strong>:</strong></td>
      <td align="left"><input name="pass" type="password" id="pass" size="21" onkeyup="checkPassword()" required="" />
	  <br /><input type="checkbox" onclick="show('pass')" /><small> Show Password</small>
	  <br/>
	  </td>
      <td align="right">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="right"><strong>Confirm Password </strong></td>
      <td align="center"><strong>:</strong></td>
      <td align="left"><input name="confirm_pass" type="password" id="confirm_pass" size="21" onkeyup="matchPassword()" required=""/>
       <br />  <input type="checkbox" onclick="show('confirm_pass')" /><small> Show Password</small>
	  </td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="left"><span id="pw1" style="color:#FF0000">&nbsp;</span></td>
      <td align="right">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left"><span id="pw2" style="color:#FF0000">&nbsp;</span></td>
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






<script>

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
		return false;
	  }
	if(pass2 != ""){
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
}

function matchPassword() {

  var pass1 = $("#pass").val();
  var pass2 = $("#confirm_pass").val();
  	
  if(pass1 == "")
  {
  	document.getElementById("pw1").innerHTML = "**Fill the password please!";
	return false;
  }
   if(pass2 == "")
  {
  	document.getElementById("pw2").innerHTML = "";
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
</script>