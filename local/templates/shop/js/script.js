$(document).ready(function() {

	// При программировании на битрикс это убрать - начало
	$(document).mouseup(function (e){
		$(".select_site.active").children('.select_popup').slideUp(200, function() {
			$(".select_site.active").removeClass('active');
		});
	});

	/*
	$(document).click(function(event) {
		if($(event.target).closest(".katalog_ul").length) return;
		if($(event.target).closest(".with_child.active").length) return;
		$(".katalog_ul").slideUp(200);
		$(".header_bottom_menu > .with_child.active").removeClass("active");
		event.stopPropagation();
	});
	*/

	$(".select_site").on('click', function(event) {
		event.preventDefault();
		var current_select = $(this);

		if($(current_select).hasClass('active')) return;
		if($(current_select).parent().hasClass('disabled')) return;

		$(current_select).children('.select_popup').slideDown(200, function() {
			$(current_select).addClass('active');
		});
	});

	// Всплывающая форма
	$(".btn_callback").on('click', function(event) {
		event.preventDefault();
		$(".bg_page_site, .forma_callback").fadeIn(500);
	});
	$(".bg_page_site, .close_forma_callback").on('click', function(event) {
		event.preventDefault();
		$(".bg_page_site, .forma_callback").fadeOut(500);
	});
	// При программировании на битрикс это убрать - конец

	// Маска для телефона
	if($("input").is(".phone")) {
		var numberedFromId = new Numbered('.phone');
	}

	// Адаптивное меню
	$(".menu-icon, .close_box_nav_mob").on('click', function(event) {
		$(".box_nav_mob").toggleClass('active');
	});

	$(".header_bottom_menu .hidden_menu .with_child").on('click', function(event) {
		event.preventDefault();

		$(this).next().slideToggle(200);
		$(this).toggleClass('active');
	});

	// В каталоге в левом меню сворачиваем и разворачиваем меню
	$(".menu_left .arrow_menu").on('click', function(event) {
		event.preventDefault();

		$(this).toggleClass('arrow_top arrow_bottom');
		$(this).next().slideToggle(200);
	});

	$('.our_works_slider').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		arrows: false,
		dots: true,
		responsive: [
		{
			breakpoint: 767,
			settings: {
				slidesToShow: 1
			}
		}
		]
	});

	$(".mobile_head_filter").on('click', function(event) {
		if($(window).width() <= 991) {
			$(this).toggleClass('arrow_bottom arrow_top');
			$(this).closest('.search_auto').find('.item_search, .btn_site').slideToggle(300);
		}
	});

	$(".head_mobile_menu_left").on('click', function(event) {
		$(this).toggleClass('arrow_bottom arrow_top');
		$(this).next().slideToggle(300);
	});

	$(".filter_left .head_filter").on('click', function(event) {
		$(this).toggleClass('arrow_bottom arrow_top');
		$(this).next().slideToggle(300);
	});

	// Табы в карточке
	$(".tab_site a, .tab_left_menu a").click(function(e){
		e.preventDefault();
		$(this).tab('show');
	});

	// блок с сортировкой
	$(".sort_popup").on('click', function(event) {
		event.preventDefault();

		$(".sort_block .popup").slideToggle(300);
	});

	// Запоминаем начальную позицию верхнего меню
	var start_katalog = $(".header_bottom").offset().top;
	$(window).scroll(function() {
		// Меню с каталогом
		if($(window).width() >= 992) {
			if($(this).scrollTop() > start_katalog) {
				$(".wrapper_site").addClass("fix_header");
			} else {
				$(".wrapper_site").removeClass("fix_header");
			}
		} else {
			$(".wrapper_site").removeClass("fix_header");
		}
	});

	/* Новые страницы 21_10_2017 - начало */

	// Переход на следующий шаг регистрации
	$(".next_reg").on('click', function(event) {
		var current_form = $(this).closest('.reg_step');

		$(current_form).fadeOut(300, function() {
			$(current_form).next().fadeIn(300);
		});
	});

	// Переходы в оформлении заказа
	$(".order_item .next_order").on('click', function(event) {
		event.preventDefault();

		$(this).closest('.slide_content').slideToggle(300).parent().next().find(".slide_content").slideToggle(300);
	});

	$(".order_item .prev_order").on('click', function(event) {
		event.preventDefault();

		$(this).closest('.slide_content').slideToggle(300).parent().prev().find(".slide_content").slideToggle(300);
	});

	/* Новые страницы 21_10_2017 - конец */

});