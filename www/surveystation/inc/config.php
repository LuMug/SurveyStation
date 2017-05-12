<?php
	session_start();

	$mysql_con = mysqli_connect("localhost", "root", "root", "surveystation");

	if (!$mysql_con) {
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}
	if($_GET['action'] == "logout"){
	 $_SESSION['email'] = null;
	 header("Location: /surveystation");
	}
?>
