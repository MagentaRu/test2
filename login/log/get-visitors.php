<?php
	if (!isset($_POST["password"])) {
		header("Location: http://" . $_SERVER["HTTP_HOST"]);
		exit();
	}

	ini_set("display_errors", 0);

	$logFile = "log.txt";
	$pass = md5($_POST["password"]);
	define("DEFAULT_PASSWORD_HASH", "9aeb96c8da9bd63888b00fc28af9e1d6");

	if ($pass != DEFAULT_PASSWORD_HASH) {
		echo "<p class=\"error\">Wrong password!</p>\r\n";
		exit();
	}

	$logs = explode("\r\n", file_get_contents($logFile));

	if (count($logs) == 1) {
		echo "<p class=\"error\">Log file is empty</p>\r\n";
	}

	krsort($logs);
	echo "<ul class=\"visitorsList\">\r\n";
	foreach (array_slice($logs, 1) as $value) {
		if($value) {
			echo "<li>$value</li>\r\n";
		}
	}
	echo "</ul>\r\n";
?>