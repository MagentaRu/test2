<?php
	if(!$_POST) {
		header("Location: http://" . $_SERVER["HTTP_HOST"]);
		exit();
	}
	
	ini_set("display_errors", 0);
	$log = "log/log.txt";
	$now = date("d.m.y - H:i");

	$url  = "https://csv.business.tomtom.com/extern?";
	$url .= "account=" . rawurlencode($_POST["wf-account"]);
	$url .= "&username=" . rawurlencode($_POST["wf-username"]);
	$url .= "&password=" . rawurlencode($_POST["wf-password"]);
	$url .= "&lang=en&useUTF8=true&action=showObjectReportExtern&apikey=95419BAC-2AAE-11E3-A0F0-8FE0ADFC9456";
	$content = file_get_contents($url);
	$result = explode(',', $content);
	$response = intval($result[0]) > 0 ? "{\"success\": false, \"reason\": \"$result[1]\", \"errorCode\": $result[0]}" : "{\"success\": true}";

	$report  = "$now";
	$report .= " // account: " . $_POST["wf-account"];
	$report .= ", username: " . $_POST["wf-username"];
	$report .= ", password: " . $_POST["wf-password"];
	$report .= ", industry: " . $_POST["wf-industry"];
	$report .= ", partner id: " . $_COOKIE["plid"];
	$report .= " // $response \r\n";
	file_put_contents($log, $report, FILE_APPEND);

	if (intval($result[0]) == 0) {
		mail(
			"alexey.badjanov@magenta-technology.com,
			 vladimir.nesterov@magenta-technology.com,
			 artem.bobrovskiy@magenta-technology.com,
			 stuart.brunger@magenta-technology.com",

			"WEBFLEET registration from Maxoptra website", 

			"New registered user \r\n \r\n"
			. "Account: " . $_POST["wf-account"] . "\r\n"
			. "User: " . $_POST["wf-username"] . "\r\n"
			. "Password: " . $_POST["wf-password"] . "\r\n"
			. "Industry: " . $_POST["wf-industry"] . "\r\n"
			. "Partner ID: " . $_COOKIE["plid"]
		);
	}

	echo $response;
?>