$(function() {

	$("#menu .menu-items>li>a").click(function() {
		if ($(this).hasClass("active")) {
			$(this).siblings(".menu-child-items").slideUp();
			$(this).removeClass("active");
		}
		else {
			$(this).siblings(".menu-child-items").slideDown();
			$(this).addClass("active");
		}
	});

});