<?php
include "connection/connection.php";
include "functions/functions.php";
if(isset($_GET['F']))
{
	
	$url = $_SESSION['filter_site'];
	
}
else
{
	$url = "site_data.php";
}
if(isset($_GET['MAP']))
{
	$site_id = $_GET['MAP'];
	$sql = "select * from site_details_master where site_id = '$site_id'";
	$sd = qf($sql);
	if(($sd['site_latitude'] != "") && ($sd['site_longitude'] != ""))
	{
		$latlon = $sd['site_latitude'].",".$sd['site_longitude'];
		echo "<script>
				
				location.replace('http://maps.google.com/?q=$latlon');
			</script>";
	}
	else
	{
		echo "<script>
				alert('Geolocation is not updated!!');
				location.replace('$url');
			</script>";
	}
}


     // Get lat and long by address         
       /* $address = $sd['site_area']; //$dlocation; // Google HQ
        $prepAddr = str_replace(' ','+',$address);
        $geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
        $output= json_decode($geocode);
      echo  $latitude = $output->results[0]->geometry->location->lat;
      echo  $longitude = $output->results[0]->geometry->location->lng; exit;*/
	 

?>


