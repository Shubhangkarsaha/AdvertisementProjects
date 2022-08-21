
<!--<style>
.loader1 {
  position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url('images/loader.gif') 100% 100% no-repeat rgb(249,249,249,0.8);    background-position: center; 
  
}
</style>-->


<?php include"includes/header.php";

//URL..................................................................
if(isset($_GET['F']))
{
	
	$url = $_SESSION['filter_site'];
	
}
else
{
	$url = "site_data.php";
}

if(empty($_GET)){
 	echo "<script>
			alert('Please select site.');
			location.replace('site_data.php');
		</script>";
 }

if(isset($_GET['SID'])){
 	$SID = $_GET['SID'];
	if($SID != ""){
 		"<script>var sid = $SID;</script>";
	}
	else
	{
		echo "<script>
			alert('Please select site.');
			location.replace('$url');
		</script>";
	}
 }
 
if(isset($_GET['GEO'])){

	$latitude = $_GET['lat'];
	$longitude = $_GET['lng'];
	//echo $latitude.",".$longitude;exit;
	$sql = "update site_details_master set  site_latitude = '$latitude', site_longitude = '$longitude' where site_id = '$SID'";
	//echo $sql;exit;;
	$rec = q($sql);
	if($rec){
		$date = date('Y-m-d');
		$time = date('h:i A');
		$geo_sql = "INSERT INTO `geolocation_master`(`site_id`, `update_by`, `update_date`, `update_time`) VALUES ('$SID', '$_SESSION[lid]', '$date', '$time')";
		$geo_rec = q($geo_sql);
		echo "<script>
				alert('Geolocation Updated Successfully.');
				location.replace('$url');
			</script>";
	}
	else
	{
		echo "<script>
			alert('Error!!');
			location.replace('$url');
		</script>";
	}


}

else{
?>
	<div align="center" class="loader1"><br /><br /><h1>   Processing...</h1></div>
<?php }?>





<script type="text/javascript">

	if(navigator.geolocation)
	{
	  navigator.geolocation.getCurrentPosition(function(position)
		{
		  var lat = position.coords.latitude;
		  var lng = position.coords.longitude;
		  var sid = "<?php echo "$SID";?>";
		  window.location.href="geolocation.php?lat="+lat+"&lng="+lng+"&SID="+sid+"&GEO<?php if(isset($_GET['F'])){echo "&F";}?>";
	
		});
	}



		/*if (navigator && navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
        } else {
            console.log('Geolocation is not supported');
        }
		function errorCallback() {}
 
function successCallback(position) {
      
	  var lat = position.coords.latitude;
	  var lng = position.coords.longitude;
	  var sid = "<?php //echo "$SID";?>";
	  window.location.href="geolocation.php?lat="+lat+"&lng="+lng+"&SID="+sid+"&GEO";
	  
	  
	  var mapUrl = "http://maps.google.com/maps/api/staticmap?center=";
      mapUrl = mapUrl + position.coords.latitude + ',' + position.coords.longitude;
      mapUrl = mapUrl + '&zoom=15&size=512x512&maptype=roadmap&sensor=false';
      var imgElement = document.getElementById("static-map");
      imgElement.src = mapUrl;
    }*/
</script>





<?php //include"includes/footer.php";?>