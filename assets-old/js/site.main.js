$(function () {
	//'use strict';
	$('#show-menu').click(function (e) {
		e.preventDefault();
		$('body').addClass('menu-shown');
	});
	
	$('#close-menu').click(function (e) {
		e.preventDefault();
		$('body').removeClass('menu-shown');
	});
	
	$(window).scroll(function () {
		$('body').toggleClass('page-scrolled', $(window).scrollTop() > 0);
	});
	
	$('body').addClass('page-loaded');
	$(window).scroll();
	
	$('#faq dt').click(function () {
		$(this).toggleClass('opened');
	});
	/*
	$('#contact-form').submit(function (e) {
		e.preventDefault();
		$(this).find('input, textarea').val('');
		$(this).find('button').text('Thanks!');
	});
	*/
	$('.media-wrapper .media-content .video-player-play').click(function (e) {
		e.preventDefault();
		$(this).parent().addClass('video-play');
		$(this).siblings('video')[0].play();
	});
	
	$('.media-wrapper .media-content video').on('pause', function (e) {
		$(this).parent().removeClass('video-play');
	});
	
	$('.media-wrapper .media-content video').click(function (e) {
		e.preventDefault();
		$(this)[0].pause();
	});

	// Slick Slider
	
	
});

var map;

setTimeout(function(){
jQuery.noConflict();
if (jQuery('.testimonials-slicky').length) {
		var slickQuotes, slickFooters;
		$('.testimonials-slicky > *').clone().appendTo('.testimonials-slicky');
		slickQuotes = $('.testimonials-slicky');
		slickFooters = slickQuotes.clone();
		slickFooters.find('p').remove();
		slickQuotes.find('footer').remove();
		slickFooters.insertAfter(slickQuotes);
		slickFooters.addClass('slick-footers');
		slickQuotes.addClass('slick-quotes');

		jQuery('.slick-quotes').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			fade: true,
			asNavFor: '.slick-footers'
		});
		
		jQuery('.slick-footers').slick({
			slidesToShow: 5,
			slidesToScroll: 1,
			asNavFor: '.slick-quotes',
			centerMode: true,
			arrows: false,
			focusOnSelect: true,
			responsive: [
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 3
					}
				}
			]
		});
	}
},2000);

function contact_Map() {
	//'use strict';
	var place, marker;

	place = {
		lat: parseFloat(51.5259704),
		lng: parseFloat(-0.1660516)
	};

	map = new google.maps.Map(document.getElementById('contact-map'), {
		scrollwheel: false,
		zoom: 16,
		center: place,
		draggable: false
	});

	markerIcon = new google.maps.MarkerImage(
			'assets/images/map-marker.png',
			new google.maps.Size(32, 32),
			new google.maps.Point(0, 0),
			new google.maps.Point(16, 16),
			new google.maps.Size(32, 32)
	);
	
	marker = new google.maps.Marker({
		position: place,
		map: map,
		icon: markerIcon

	});

	//alert('hit');
}

function booking_SelectEstablishment() {
	//'use strict';
	$('.booking-content').addClass('show-panel');
	$('.booking-wrapper').addClass('w-show-panel');
}

function booking_HideEstablishment() {
	//'use strict';
	$('.booking-content').removeClass('show-panel');
	$('.booking-wrapper').removeClass('w-show-panel');
}
	/*
function booking_Map() {
	//'use strict';
	var place, marker, markerIcon;

	if(typeof globals.lat==="undefined"){

	place = {
		lat: parseFloat(51.5259704),
		lng: parseFloat(-0.1660516)
	};
	}else{
		//alert(globals.lat);
		//alert(globals.lng);

	place = {
		lat: parseFloat(globals.lat),
		lng: parseFloat(globals.lng)
	};	
	}

	map = new google.maps.Map(document.getElementById('booking-map'), {
		scrollwheel: false,
		zoom: 16,
		center: place,
		draggable: true,
		gestureHandling: 'cooperative'
	});
	
	markerIcon = new google.maps.MarkerImage(
		'https://dev.medicspot.co.uk/assets/images/map-marker.png',
		new google.maps.Size(32, 32),
		new google.maps.Point(0, 0),
		new google.maps.Point(16, 16),
		new google.maps.Size(32, 32)
	);
	
	// Add Markers.

	marker = new google.maps.Marker({
		position: {
			lat: place.lat,
			lng: place.lng
		},
		icon: markerIcon,
		map: map
	});
	
	marker.addListener('click', function () {
		booking_SelectEstablishment();
	});

	marker = new google.maps.Marker({
		position: {
			lat: parseFloat(51.52512),
			lng: parseFloat(-0.16)
		},
		icon: markerIcon,
		map: map
	});
	
	marker.addListener('click', function () {
		booking_SelectEstablishment();
	});

}
	*/
function initMap() {
	//'use strict';
	if ($('page#contact').length) { contact_Map(); }
	if ($('.booking-content').length) {
		booking_Map();
		
		//$('.booking-input input').keyup(function () {
			/*
			$('.booking-content').removeClass('show-panel');
			$('.booking-content').toggleClass('show-suggestions', $(this).val().length > 0);
			$('.booking-wrapper').removeClass('w-show-panel');
			$('.booking-wrapper').toggleClass('w-show-suggestions', $(this).val().length > 0);
			*/
		//});
	}
}