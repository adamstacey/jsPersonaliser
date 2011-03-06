$(document).ready(function() {
	// Setup the round corners
	$.jcorners("input, textarea, select, .button, .errors, a.header-link, .orange-button, .green-button, .purple-button, .blue-button, #success_message, #warning_message, #error_message", {radius:8});
	// Dashboard quick menu
	$("#dashboard_quick_menu_link").click(function() {
		if ($(this).attr("src") == "/images/buttons/dashboard-quick-menu-show.png")
		{
			$(this).animate({
				right: "+=237"
			}, 1000, function() {
				$(this).attr("src", "/images/buttons/dashboard-quick-menu-hide.png");
			});
			$("#dashboard_quick_menu").animate({ right: "+=237"	}, 1000);
		} else {
			$(this).animate({
				right: "-=237"
			}, 1000, function() {
				$(this).attr("src", "/images/buttons/dashboard-quick-menu-show.png");
			});
			$("#dashboard_quick_menu").animate({ right: "-=237"	}, 1000);
		}
	});
	// Close messages
	$(".close-message").click(function() {
		$(".close-message").fadeOut();
	});
});