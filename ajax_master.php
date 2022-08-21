<?php 
session_start();
include "config.php";
include "connection/connection.php";
include "functions/functions.php";

/*if(isset($_GET['password'])){
	 $pass = $_GET['password'];
	 $confirm_pass = $_GET['confirm_pass'];
	if($pass == ""){
		echo "1";
		//echo "<span style='color:#FF0000'>**Fill the password please!</span>";
	}
	else if($pass != $confirm_pass){
		echo "2";
		//echo "<span style='color:#FF0000'>**Fill the password please!</span>";
	}
}*/
	
	
if(!empty($_POST["username"])) {
  $_POST["username"] = trim($_POST["username"]);
  $sql = "SELECT user_name FROM login_master WHERE user_name='" . $_POST["username"] . "'";
  		
  if(row_count($sql) > '0') {
		echo "<span class='status-not-available' style='color:#FF0000'> **Username Not Available!!</span>";
  } else {
  		echo "<span class='status-not-available' style='color:#24FC00'> **Username Available.</span>";      
  }
}

if(!empty($_POST["get_size_type"])) {
  $id = $_POST['get_size_type'];
  $sql = "SELECT * FROM category_master WHERE cat_id = '".$id."'";
  $rec = qf($sql);		
  
		echo "<span>$rec[cat_size_type]</span>";
		
  
}

/*if(isset($_GET['input'])){
	$id = $_GET['input'];
	$sql = qf("select cat_payment_type from category_master where cat_id = '$id'");
	 switch($sql['cat_payment_type']){
		case "1":
			echo "<input name='' />";
		case "2":
			return "Month Wise";
		case "3":
			return "Year Wise";
}*/

if(isset($_GET['get_districts']))
	{
		$id = $_GET['state_id'];
		if($id != ""){
			$sql = "SELECT * FROM district_master WHERE state_id = '".$id."' order by district_name asc";
			$rec = q($sql);
	
	?>
		<option value="">--Select District--</option>
	<?php
			while($fetch = f($rec))
			{
	?>
			<option value="<?php echo $fetch['district_id']; ?>"><?php echo district_name($fetch['district_id']); ?></option>
	<?php
			}
		}
	}	
?>
