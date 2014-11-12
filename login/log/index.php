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
		body ::selection {
			background: #b7d6ff;
		}
		.container {
			width: 600px;
			margin: 85px auto 0;
		}
		.caption {
			margin: 0;
			margin-bottom: 5px;
		}
		.passwordForm {
			position: relative;
			display: inline-block;
		}
		.passField,
		.submitButton {
			margin: 0;
			padding: 6px;
			border: solid 1px #aaa;
		}
		.passField {
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
		.visitorsList {
			width: 1350px;
			margin: 0 auto;
			list-style: none;
			margin-top: 10px;
			padding-left: 0px;
			font-size: 14px;
			font-family: Arial, sans-serif;
		}
		.visitorsList li {
			padding: 10px 0;
			position: relative;
		}
		.error {
			color: #f00;
			font-size: 20px;
			text-align: center;
		}
		.logs {
			margin: 30px 0;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="wrapper">
			<p class="caption">Get information about visitors</p>
			<form action="" method="POST" id="passwordForm" class="passwordForm">
				<input type="password" id="passField" class="passField" name="password" placeholder="Enter password" autocomplete="off" />
				<input type="submit" id="submitButton" class="submitButton" value="Send" />
			</form>
		</div>
	</div>
	<div id="logs" class="logs"></div>
	<script type="text/javascript">
		var form = $("#passwordForm"),
			textField = $("#passField"),
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
			$.ajax({
				type: "POST",
				url: "get-visitors.php",
				data: { 
					"password" : $("#passField").val()
				}
			})

			.done(function(msg) {
				$("#logs").html(msg);
			})

			.fail(function() {
				$("#logs").html("<p class=\"error\">Request error</p>");
			});
			return false; // Never be sent
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