<?php

require_once('dbconnect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$reg = json_decode($_POST['json'], true);
	$email = $reg['email'];
	$sql = "SELECT COUNT(email) FROM account WHERE email='$email'";
	if (mysqli_fetch_array(mysqli_query($con, $sql))[0] == '0') {
		$pass = $reg['pass'];
		$name = $reg['name'];
		$contact = $reg['contact'];
		$personname = $reg['personname'];
		$sql = "INSERT INTO account VALUES ('$email', '$pass', '$personname', '$name', '$contact')";
		if (mysqli_query($con, $sql)) {
			require_once('smtpreg.php');
		}
	} else {
		echo "email";
	}
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	$email = $_GET['email'];
	$sql = "SELECT COUNT(email) FROM account WHERE email='$email'";
	if (mysqli_fetch_array(mysqli_query($con, $sql))[0] != '0') {
		$pass = $_GET['pass'];
		$sql = "SELECT pass FROM account WHERE email='$email'";
		if (mysqli_fetch_array(mysqli_query($con, $sql))[0] == "$pass") {
			$sql = "SELECT auth FROM account WHERE email='$email'";
			if (mysqli_fetch_array(mysqli_query($con, $sql))[0] == "1") {
				$sql = "SELECT * FROM spv,account WHERE email=$email AND spv.name=account.name";
				echo json_encode(mysqli_fetch_assoc(mysqli_query($con, $sql)));
			} else {
				echo "auth";
			}
		} else {
			echo "pass";
		}
	} else {
		echo "email";
	}
}

?>