$(document).ready(function() {
	var swiper = new Swiper('#home-banner', {
		pagination: '.swiper-pagination',
		loop: true,
		lazyLoading: true
	});
	var scroll = new auiScroll({
		listen: true,
		distance: 200
	}, function(ret) {
		if (ret.scrollTop > 40) {
			$('#_js_goTop').show();
		} else {
			$('#_js_goTop').hide();
		}
	});
	$("#_js_goTop").on("click", function() {
		$("body").scrollTo({
			toT: 0
		});
	});
	$("#_js_vide_area").on("click", function() {
		if ($(".vide-area-info .intro").hasClass('aui-hide')) {
			$(".vide-area-info .intro").removeClass("aui-hide");
			$("#_js_vide_area i").removeClass("aui-icon-down").addClass("aui-icon-top");
		} else {
			$(".vide-area-info .intro").addClass("aui-hide");
			$("#_js_vide_area i").removeClass("aui-icon-top").addClass("aui-icon-down");
		}
	});
	$("#_js_detail_area").on("click", function() {
		if ($(".detail-intro-txt").hasClass('aui-ellipsis-2')) {
			$(".detail-intro-txt").removeClass("aui-ellipsis-2");
			$("#_js_detail_area i").removeClass("aui-icon-down").addClass("aui-icon-top");
		} else {
			$(".detail-intro-txt").addClass("aui-ellipsis-2");
			$("#_js_detail_area i").removeClass("aui-icon-top").addClass("aui-icon-down");
		}
	});
});

function back() {
	history.go(-1);
}

function closeTips(id) {
	$("#" + id).remove();
}

function openSearch() {
	$("#search").show();
}

function closeSearch() {
	$("#search").hide();
}