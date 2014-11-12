/* ################################## */
/* ##### WEBFLEET AUTHORIZATION ##### */
/* ################################## */
function setServer(serverName) {
	$("#wf-submit").click(function() {
		$('#wf-error').css("display", "none");

		if (!checkFields(true)) {
			return false;
		}

		$("#loading-icon").css("display", "block");

		$.ajax({
			type: "POST",
			url: "request-to-wf.php",
			data: { 
				"wf-account" : $("#wf-account").val(),
				"wf-username" : $("#wf-username").val(),
				"wf-password" : $("#wf-password").val(),
				"wf-industry" : $("#wf-industry").val()
			}
		})
		
		.done(function(msg) {
			var res = JSON.parse(msg);
			if (!res.success) {
				if (res.errorCode == 8014) {
					$("#loading-icon").css("display", "none");
					accessError();
					return false;
				}
				$("#loading-icon").css("display", "none");
				$('#wf-error').css("display", "block");
				$('#wf-error').html(res.reason);
				return false;
			}
			$.ajax({
				type: "POST",
				url: "http://" + serverName + "/launcher/api/tomtom/createSession",
				data: { 
					"account" : $("#wf-account").val(),
					"user" : $("#wf-username").val(),
					"pass" : $("#wf-password").val()
				}
			})
			.done(function(msg) {
				if (!msg.success) {
					$('#wf-error').css("display", "block");
					$('#wf-error').html("Server error");
					return false;
				}
				window.location = "http://" + serverName + "/launcher/tomtom?session=" + msg.rows[0];
			})
			.fail(function() {
				$("#loading-icon").css("display", "none");
				$('#wf-error').css("display", "block");
				$('#wf-error').html("Cannot connect to Maxoptra");
			});
		})
		
		.fail(function(jqXHR, textStatus) {
			$("#loading-icon").css("display", "none");
			$('#wf-error').css("display", "block");
			$('#wf-error').html("Cannot connect to TomTom");
		});
		return false; // Never be sent
	});
}

$(".wf-field").focus(function() {
	$(this).keyup(function() {
		$(this).val() ? $(this).css("outline", "none") : "";
		checkFields() ? $("#wf-submit").css("border-color", "#ff0086").css("color", "#ff0086").css("cursor", "pointer") : $("#wf-submit").css("border-color", "#a798ca").css("color", "#aaa").css("cursor", "default");
	});
});

function checkFields(changeColor) {
	var count = 0;
	var fields = $(".wf-field");
	for (var i = fields.length - 1; i >= 0; i--) {
		if (!fields[i].value) {
			count++;
			changeColor ? fields[i].style.outline = "solid 2px red" : "";
		}
	}
	if (count) {
		return false;
	}
	return true;
};

function accessError() {
	$.modal('<div style="padding: 45px 75px 90px 40px; background: white;">' + 
				'<h4 style="font-size: 22px; font-weight: normal; margin: 0 0 20px;">Authorization error</h4>' + 
				'<span style="display: block; font-size: 16px; margin-bottom: 55px;">You need to enable WEBFLEET.connect.access</span>' +
				'<a href="https://uk.support.business.tomtom.com/app/answers/detail/a_id/133/kw/webfleet.connect" target="_blank" style="text-decoration: underline">How to enable WEBFLEET.connect.access for a WEBFLEET user</a>' +
			'</div>',
		{
			overlayCss: {
				"background": "black"
			},
			closeHTML: '<div class="close-button" style="background: url(pics/cross.png); position: absolute; top: 10px; right: 10px; width: 10px; height: 10px; cursor: pointer"></div>'
		}
	);
};

function animateRotate(d) {
	var elem = $("#loading-icon");

	$({deg: 0}).animate({deg: d}, {
		duration: 1150,
		easing: "linear",
		queue: false,
		step: function(now){
			elem.css({
				transform: "rotate(" + now + "deg)"
			});
		},
		done: function() {
			animateRotate(d);
		}
	});
};

/* ################################## */
/* ############ DROPDOWN ############ */
/* ################################## */
$("#wf-industry").focus(function() {
	$("#dropDownArrow").trigger("click");
	$(this).keyup(function(e) {
		if (e.keyCode != 9) {
			if (e.keyCode != 13) {
				$(this).val() ? hideDropMenu() : showDropMenu();
			}
		}
	});
});

$("#dropDownArrow").click(function() {
	$("#dropDownMenu").css("display") == "none" ? showDropMenu() : hideDropMenu();
});

$("#dropDownMenu a").click(function() {
	var industry = $(this).html();
	if (industry == "Other") {
		$("#wf-industry").val("").focus();
		return false;
	}
	$("#wf-industry").val(industry).trigger("keyup").focus();
	hideDropMenu();
	return false;
});

$(document).click(function(event){
	if ($(event.target).closest("#wf-industry").length || $(event.target).closest("#dropDownMenu").length || $(event.target).closest("#dropDownArrow").length) {
		return;
	}
	hideDropMenu();
	event.stopPropagation();
});

function hideDropMenu() {
	$("#dropDownMenu").css("display", "none");
	$("#dropDownArrow").css("background-position-y", "-35px");
}

function showDropMenu() {
	$("#dropDownMenu").css("display", "block");
	$("#dropDownArrow").css("background-position-y", "0px");
}

/* ################################## */
/* ########## POPUP PLAYER ########## */
/* ################################## */
$("#video").click(function() {
	$.modal('<iframe width="853" height="480" src="//www.youtube.com/embed/JlVX5JLHuFk?rel=0" frameborder="0" allowfullscreen></iframe>',
		{
			overlayCss: {
				"background": "black"
			},
			closeHTML: '<div class="close-button" style="background: url(pics/close_button.png); position: absolute; top: -10px; right: -10px; width: 20px; height: 20px; cursor: pointer"></div>'
		}
	);
	return false;
});