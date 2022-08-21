<?php include "includes/header.php";?>
<div align="center" class="loader1"><br /><br /><h1>   Processing...</h1></div>
<?php

if(isset($_GET['F']))
	{
		$url = $_SESSION['filter_site'];
	}
	else
	{
		$url = "site_data.php";
	}
	//echo $url;exit;

if(isset($_GET['SID']))
{
	$site_id = $_GET['SID'];
	if($site_id == "")
	{
		echo "<script>
			alert('Please select site.');
			location.replace('$url');
		</script>";
	}
	$status = qf("select site_status from site_details_master where site_id = '$site_id'");
	
	 if($status['site_status'] == '0')
	 {
	 	$sql = "update site_details_master set site_status = '1' where site_id = '$site_id'";
		$rec = q($sql);
		echo "<script>
			location.replace('$url');
		</script>";
	 }	
	 else
	 {
	 	$sql = "update site_details_master set site_status = '0' where site_id = '$site_id'";
		$rec = q($sql);
		echo "<script>
			location.replace('$url');
		</script>";
	 }
}


?>
<div class="loader"></div>