<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	require_once('dbconnect.php');
	$email = $_GET['email'];
	$sql = "UPDATE account SET auth=true WHERE email='$email'";
	if (mysqli_query($con, $sql)) {
		echo "Your account has been successfully activated.";
	} else{
		echo "error";
	}
}

?>
