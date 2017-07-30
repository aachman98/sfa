<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$jt = json_decode($_POST, true);
	echo $jt;
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	$wt = $_GET['wt'];
	echo $wt;
}
?>
