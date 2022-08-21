<?php
if(@$_SESSION['lid'] == "")
{
	echo "<script>	
				alert('Please Login First');
				location.replace('index.php');
				</script>";
}
?>