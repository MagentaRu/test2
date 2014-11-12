<?php
	ini_set("display_errors", 0);
	$server = null;
	$configFile = "config.txt";
	$logFile = "changes.txt";

	$logs = explode("\r\n", file_get_contents($logFile));

	if (!$server = file_get_contents($configFile)) {
		file_put_contents($configFile, "start.maxoptra.com") ? $server = file_get_contents($configFile) : header("Location: http://" . $_SERVER["HTTP_HOST"]);
	}

	if (isset($_POST["newServerName"])) {
		file_put_contents($configFile, $_POST["newServerName"]);
		file_put_contents($logFile, $_POST["newServerName"] . " - from " . $_SERVER["REMOTE_ADDR"] . "\r\n", FILE_APPEND);

		$server = file_get_contents($configFile);
		$logs = explode("\r\n", file_get_contents($logFile));
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Maxoptra - Configure Server</title>
	<link rel="shortcut icon" href="../../themes/maxoptracom/images/favicon.png">
	<script type="text/javascript" src="../js/jquery-1.11.1.js"></script>
	<style type="text/css">
		body {
			color: #000;
			background: #fff;
			margin: 0; padding: 0;
			font: 18px Georgia, sans-serif;
		}
		.container {
			width: 600px;
			min-height: 200px;
			margin: 85px auto 0;
		}
		.serverName {
			margin: 0;
			margin-bottom: 5px;
		}
		.serverName span {
			font-size: 24px;
			margin-left: 5px;
			font-weight: bold;
			font-variant: small-caps;
		}
		.changeServerForm {
			position: relative;
			display: inline-block;
		}
		.nameField,
		.submitButton {
			margin: 0;
			padding: 6px;
			border: solid 1px #aaa;
		}
		.nameField {
			width: 507px;
			padding-right: 85px;
		}
		.submitButton {
			cursor: default;
			position: absolute;
			top: 0; right: 0;
			padding-right: 10px;
			padding-left: 10px;
			text-transform: uppercase;
			background: #aaa;
			opacity: 0.5;
		}
		.submitButton:active,
		.submitButton:focus {
			outline: none;
		}
		.changesListCaption {
			margin-bottom: 10px;
		}
		.changesList {
			margin-top: 10px;
			padding-left: 20px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="wrapper">
			<p class="serverName">Current server is <span><?php echo $server;?></span></p>
			<form action="" method="POST" id="changeServerForm" class="changeServerForm">
				<input type="text" id="nameField" class="nameField" name="newServerName" placeholder="Enter new server name" autocomplete="off" />
				<input type="button" id="submitButton" class="submitButton" value="Change" />
			</form>
			<div class="logs">
			<?php
				if (count($logs) > 1) {
					krsort($logs);
					$last = array_slice($logs, 1, 3);
					echo "<p class=\"changesListCaption\">Last changes:</p>\r\n";
					echo "<ul class=\"changesList\">\r\n";
						foreach ($last as $value) {
							if($value) {
								echo "<li>$value</li>\r\n";
							}
						}
					echo "</ul>\r\n";
				}
			?>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		var form = $("#changeServerForm"),
			textField = $("#nameField"),
			button = $("#submitButton");

		textField.focus(function() {
			$(this).keyup(function() {
				$(this).val() ? enableButton() : disableButton();
			});
		});

		button.click(function() {
			if (!textField.val()) {
				return false;
			}
			textField.val(textField.val().replace(/\s+/g, ''));
			form.submit();
		});

		function enableButton() {
			button.css("background", "#ddd").css("opacity", "1").css("cursor", "pointer");
			button.mouseenter(function() {
				$(this).css("background", "#eee");
			});
			button.mouseleave(function() {
				$(this).css("background", "#ddd");
			});
		}

		function disableButton() {
			button.css("background", "#aaa").css("opacity", "0.5").css("cursor", "default");
			button.hover(function() {
				$(this).css("background", "#aaa");
			});
		}
	</script>
</body>
</html>