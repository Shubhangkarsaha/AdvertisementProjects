
<style>
.loader {
  position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url('images/loader.gif') 100% 100% no-repeat rgb(249,249,249,0.8);    background-position: center; 
  
}


</style>




<?php
if(isset($_GET['SID'])){
 	$SID = 1;//$_GET['SID'];
 	"<script>var sid = $SID;</script>";
 }
if(isset($_GET['lat'])){

$lat = $_GET['lat'];
$long = $_GET['lng'];
echo $lat.",".$long;exit;


}

else{
	/*$ip = $_SERVER['REMOTE_ADDR'];
	 $ch = curl_init();
	 
	 curl_setopt($ch, CURLOPT_URL, "https:/api.ipgeolocation.io.ipgeo?apikey=cc757032438646de8ff4fd5206ca0df6&ip=".$ip);
	 
	 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	 
	 $output = curl_exec($ch);
	 print $output;
	 curl_close($ch);*/
	 
	 
	 
/* function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
$ip = getIPAddress();  
echo 'User Real IP Address - '.$ip."<br>";  

echo $_SERVER['SERVER_NAME'];
 echo $_SERVER['HTTP_HOST'];

*/


?>
<div align="center" class="loader"></div>
<?php }?>
<script type="text/javascript">

	if(navigator.geolocation)
	{
	  navigator.geolocation.getCurrentPosition(function(position)
		{
		  var lat = position.coords.latitude;
		  var lng = position.coords.longitude;
		  var sid = "<?php echo "$SID";?>";
		  window.location.href="get_location.php?lat="+lat+"&lng="+lng+"&SID="+sid+"&GEO";
	
		});
	}

</script>

<?php //echo $lat;?>
