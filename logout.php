<?php
session_start();
session_destroy();
echo "<script>	
				alert('Logged Out !!');
				location.replace('index.php');
				</script>";
?>