<title>QR code</title>
<?php
session_start();
include "config.php";
include "connection/connection.php";
include "functions/functions.php";
include "phpqrcode/qrlib.php";

$path = "qr_images/";

$file = $path.uniqid().".png";
$text = "facebook.com";

QRcode::png($text, $file,'H',8,14);
echo "<center><img src='$file'></center>";
?>