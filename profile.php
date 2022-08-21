<?php
	include "includes/header.php";
?>
<link href="style/style.css" rel="stylesheet" type="text/css" />


<section class="content-header">
      <h1>
       Change Profile Info <small>&nbsp;</small>
      </h1>
      
      </section>
<br>
  <table width="80%" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <th height="36" colspan="4" background="images\1by25.jpg" scope="col">&nbsp;</th>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td  align="center" <?php if($_SESSION['type'] != 'A'){echo "width=50%";}else{echo "width=36%";}?>>
	  	<form id="form1" name="form1" method="post" action="change_password.php" enctype="multipart/form-data">
			<input name="change" type="submit" id="change" value="Change Password" />
		</form>
	  </td>
		<td align="center" <?php if($_SESSION['type'] != 'A'){echo "width=50%";}else{echo "width=30%";}?>>
		  
	  	<form id="form2" name="form2" method="post" action="update_profile.php" enctype="multipart/form-data">
			 <input name="profile" type="submit" id="profile" value="Update Profile" />  
	    </form>
      </td>
<?php if($_SESSION['type']=='A'){?>
	  <td width="34%" align="center">
		  
	  	<form id="form3" name="form3" method="post" action="create_profile.php" enctype="multipart/form-data">
			 <input name="new_profile" type="submit" id="new_profile" value="Add New Profile" />  
	    </form>
      </td>
	  <?php }?>
    </tr>
    
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" background="images\1by25.jpg">&nbsp;</td>
    </tr>
  </table>
</body>
</html>







<?php include "includes/footer.php";?>