(function ($) {
	"use strict";

	// $("header .site_menu").meanmenu({
	// 	meanMenuContainer: ".mobile-menu",
	// 	meanScreenWidth: "767",
	// 	meanExpand: ['<i class="fal fa-plus"></i>'],
	// });

	$("header .menu_bars a").on("click", function () {
		$(".side-menu").addClass("open");
	});

	$(".side-menu .cross-icon-box").on("click", function () {
		$(".side-menu").removeClass("open");
	});

	var wow = new WOW({
		boxClass: "wow", // default
		animateClass: "animated", // default
		offset: 0, // default
		mobile: true, // default
		live: true, // default
	});
	wow.init();

	// clients carousels

	$(window).on("load", function () {
		if ($(".grid").length > 0) {
			$(".grid").imagesLoaded(function () {
				// init Isotope
				$(".grid").packery({
					layoutMode: "packery",
					itemSelector: ".grid-item",
					percentPosition: true,
					packery: {
						columnWidth: ".grid-sizer",
						// horizontal: true,
					},
				});
			});
		}
	});

	// Sticky Menu
	$(window).on("scroll", function () {
		var scroll = $(window).scrollTop();
		if (scroll < 1) {
			$(".site-header").removeClass("sticky");
		} else {
			$(".site-header").addClass("sticky");
		}
	}); // end: Sticky Menu

	$(document).ready(function () {
		$(".mobile-menu li.has-dropdown").on("click", function () {
			$(this).children(".sub-menu").slideToggle();
		});
	});
})(jQuery);
