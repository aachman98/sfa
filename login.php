<?php

require_once('dbconnect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$email = $_POST['email'];
	$sql = "SELECT COUNT(email) FROM account WHERE email='$email'";
	if (mysqli_fetch_array(mysqli_query($con, $sql))[0] == '0') {
		$pass = $_POST['pass'];
		$name = $_POST['name'];
		$contact = $_POST['contact'];
		$personname = $_POST['personname'];
		$sql = "INSERT INTO account VALUES ('$email', '$pass', '$personname', '$name', '$contact', false)";
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
				$sql = "SELECT name FROM account WHERE email='$email'";
				echo mysqli_fetch_array(mysqli_query($con, $sql))[0];
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
