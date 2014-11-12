<?php
	ini_set("display_errors", 0);
	$server = null;
	if (!$server = file_get_contents("config/config.txt")) {
		header("Location: http://" . $_SERVER["HTTP_HOST"]);
	}
	if (isset($_GET['plid']) && !empty($_GET['plid'])) {
		setcookie('plid', addslashes($_GET['plid']), 0, '/');
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Maxoptra - Login Page</title>
	<link rel="stylesheet" type="text/css" href="style/main.css">
	<link rel="shortcut icon" href="../themes/maxoptracom/images/favicon.png">
	<script type="text/javascript" src="js/jquery-1.11.1.js"></script>
	<script type="text/javascript" src="js/jquery.simplemodal.1.4.4.min.js"></script>
</head>
<body>
	<div class="container">
		<div style="padding:0; width:1200px; float:left; margin:50px;">
			<div style="width:350px; float:left; position:relative; border-right:1px dotted #999;">
				<p><img src="pics/max_logo.png" width="200" height="45" align="right" /><br /></p>
			</div>
			<div style="width:750px; float:left; position:relative;">
				<p style="margin-bottom:0">SAAS solution for smart scheduling, paperless jobs dispatch and real-time control.</p>
				<p>Suitable for companies of any size. Read more at <a href="http://www.maxoptra.com"><u>www.maxoptra.com</u></a></p>
			</div>
		</div>
		<div style="padding:0; width:1200px; height:566px; float:left; background:URL(pics/greeting.jpg) no-repeat">
			<div style="width:400px; height:566px; float:left; position:relative; margin-left:400px;"><!-- set background:rgba(156,40,130,0.3);-->
				<h2 style="margin-bottom:44px; display: none;">Maxoptra account</h2><!-- Hidden element -->
				<form style="display: none;"><!-- Hidden element -->
					<p><input type="text" size="30" placeholder="account name" /></p>
					<p><input type="text" size="30" placeholder="username" /></p>
					<p><input type="password" size="30" placeholder="password" /></p>
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<p style="padding-right:10px"><input id="chck1" type="checkbox" style="width:20px; height:20px; color:White; background-color:#fff; margin:10px 0; padding:0;" /></p>
							</td>
							<td>
								<label for="chck1"><small style="color:white;">Keep me logged on this workstation</small></label>
							</td>
						</tr>
					</table>
					<p style="margin-top:85px"><input type="submit" class="login" value="log in" /></p>
				</form>
				<p><br /><a href="" style="color:White; display: none;"><u>Password reminder</u></a></p><!-- Hidden element -->
			</div>
			<div style="width:400px; height:566px; float:left; position:relative; background:rgba(80,0,60,0.6)">
				<h2 style="margin-bottom:0">Login through <img src="pics/webfleet.png" width="163" height="64" align="top" style="margin-top:-5px" /></h2>
				<form id="wf-form" action="" method="POST">
					<p><input type="text" name="wf-account" id="wf-account" class="wf-field" size="30" placeholder="webfleet account name" /></p>
					<p><input type="text" name="wf-username" id="wf-username" class="wf-field" size="30" placeholder="username" /></p>
					<p><input type="password" name="wf-password" id="wf-password" class="wf-field" size="30" placeholder="password" /></p>

					<p style="margin:20px 0">
						<small style="color:white;">
							Any TomTom Webfleet user can access Maxoptra routing and scheduling.
							When you login for the first time, Maxoptra downloads your TomTom vehicles to prepare your Maxoptra account.
						</small>
					</p>
					<div style="padding:0 30px 0 45px; margin:5px 0 10px 0;">
						<div style="position: relative; display: inline-block;">
							<input type="text" name="wf-industry" id="wf-industry" class="wf-field" size="27" autocomplete="off" placeholder="select your industry" />
							<span id="dropDownArrow"></span>
							<div id="dropDownMenu" style="display: none;">
								<a href="">Distribution</a>
								<a href="">E-commerce</a>
								<a href="">Home Delivery</a>
								<a href="">Service engineers</a>
								<a href="">Transportation</a>
								<a href="">Other</a>
							</div> 
						</div>
					</div>
					<p style="margin-top:30px">
						<input type="submit" id="wf-submit" class="login" value="log in" />
						<span class="loading-icon-wrap"><img id="loading-icon" src="pics/loading.png"></span>
						<p id="wf-error" class="error"></p>
					</p>
				</form>
			</div>
		</div>
		<div style="padding:0; width:1200px; float:left; margin:50px;">
			<div style="width:350px; float:left; position:relative; border-right:1px dotted #999;">
				<p align="right"><small><a href="" id="video"><img src="pics/video.png" width="41" height="29" valign="middle" hspace="10" />Watch Maxoptra video</a></small></p>
			</div>
			<div style="width:270px; float:left; position:relative; border-right:1px dotted #999;">
				<p><small><a href="http://www.maxoptra.com">Visit <b><u>www.maxoptra.com</u></b></a></small></p>
			</div>
			<div style="width:500px; float:left; position:relative;">
				<p><small><b>Maxoptra</b> trademark is a property of <a href="http://magenta-technology.com/">Magenta Technology</a></small></p>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/app.js"></script>
	<script type="text/javascript">
		setServer("<?php echo $server ?>");
		animateRotate(360);
	</script>
</body>
</html>