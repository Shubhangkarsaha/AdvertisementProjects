<?php
	include "includes/header.php";

if(isset($_POST['Submit']))
{
		
		
		$id = $_SESSION['lid'];
		//$image = $_FILES['user_image']['name'];
		
		
		
//update..............................................................
		if($_POST['Submit']=='Change')
		{
				$pre_password = $_POST['pre_password'];
				$new_password = $_POST['new_password'];
			    $conf_password = $_POST['conf_password'];
			    
			   // echo $pre_password;exit;
					
					 if($pre_password == " ")
					 {
					 		echo "<script>
											alert('Please insert your previous password!!');
											location.replace('change_password.php?);
											</script>";
					}
					else
					{
							$check_password = qf("select * from login_master where login_id = '$id'");
							if($check_password['password'] == $pre_password)
							{
									   if($new_password == $conf_password)
									   {												
			    							$sql = "update login_master set password='$new_password' where login_id = '$id'";
											$rec = q($sql);
											if($rec>0)
											{
												echo "<script>
													alert('Password Updated Successfully');
													location.replace('profile.php?');
												</script>";
											}
											else
											{
												echo "<script>
													alert('Error ! Please contact your Developer as soon as possible');
													location.replace('change_password.php?);
													</script>";
											}
									   }
									   else
									   {
									   //echo "NEW PASSWORD";exit;
											echo "<script>
													alert('New Password does not match!!');
													location.replace('change_password.php?);
													</script>";
												
										}
							}
							else
							{
								echo "<script>
											alert('Previous password does not match!!');
											location.replace('change_password.php?);
										</script>";
							}
					}
					
				
		}
}


?>
<link href="style/style.css" rel="stylesheet" type="text/css" />


<section class="content-header">
      <h1>
       Change Your Password
        <small>&nbsp;</small>
      </h1>
      
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
      <td width="18%" height="32" align="right">Previous Password</td>
      <td width="1%" align="center">:</td>
      <td width="17%" align="left"><input name="pre_password" required="" type="password" id="pre_password" size="23">
      <br /><input type="checkbox" onclick="show('pre_password')" /><small> Show Password</small></td>
      <td width="11%" align="right">New Password </td>
      <td width="1%" align="center">:</td>
      <td width="17%" align="left"><input name="new_password" required="" type="password" id="new_password" size="23">
      <br /><input type="checkbox" onclick="show('new_password')" /><small> Show Password</small></td>
      <td width="12%" align="right">Confirm Password </td>
      <td width="1%" align="center">:</td>
      <td width="22%" align="left"><input name="conf_password" required="" type="password" id="conf_password" size="23" />
 	  <br /><input type="checkbox" onclick="show('conf_password')" /><small> Show Password</small></td> 
    <tr>
      <td align="right">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td colspan="2" align="left">&nbsp;</td>
      <td colspan="3" align="right">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="9" align="center">
	  
        <input type="submit" name="Submit" value="Change" /></td>
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
<script>
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






<?php include "includes/footer.php";?>