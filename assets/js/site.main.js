$(function(){$('#show-menu').click(function(e){e.preventDefault();$('body').addClass('menu-shown')});$('#close-menu').click(function(e){e.preventDefault();$('body').removeClass('menu-shown')});$(window).scroll(function(){$('body').toggleClass('page-scrolled',$(window).scrollTop()>0)});$('body').addClass('page-loaded');$(window).scroll();$('#faq dt').click(function(){$(this).toggleClass('opened')});$('.media-wrapper .media-content .video-player-play').click(function(e){e.preventDefault();$(this).parent().addClass('video-play');$(this).siblings('video')[0].play()});$('.media-wrapper .media-content video').on('pause',function(e){$(this).parent().removeClass('video-play')});$('.media-wrapper .media-content video').click(function(e){e.preventDefault();$(this)[0].pause()})});var map;setTimeout(function(){jQuery.noConflict();if(jQuery('.testimonials-slicky').length){var slickQuotes,slickFooters;$('.testimonials-slicky > *').clone().appendTo('.testimonials-slicky');slickQuotes=$('.testimonials-slicky');slickFooters=slickQuotes.clone();slickFooters.find('p').remove();slickQuotes.find('footer').remove();slickFooters.insertAfter(slickQuotes);slickFooters.addClass('slick-footers');slickQuotes.addClass('slick-quotes');jQuery('.slick-quotes').slick({slidesToShow:1,slidesToScroll:1,arrows:!1,fade:!0,asNavFor:'.slick-footers'});jQuery('.slick-footers').slick({slidesToShow:5,slidesToScroll:1,asNavFor:'.slick-quotes',centerMode:!0,arrows:!1,focusOnSelect:!0,responsive:[{breakpoint:1024,settings:{slidesToShow:3}}]})}},2000);function contact_Map(){var place,marker;place={lat:parseFloat(51.5259704),lng:parseFloat(-0.1660516)};map=new google.maps.Map(document.getElementById('contact-map'),{scrollwheel:!1,zoom:16,center:place,draggable:!1});markerIcon=new google.maps.MarkerImage('assets/images/map-marker.png',new google.maps.Size(32,32),new google.maps.Point(0,0),new google.maps.Point(16,16),new google.maps.Size(32,32));marker=new google.maps.Marker({position:place,map:map,icon:markerIcon})}
function booking_SelectEstablishment(){$('.booking-content').addClass('show-panel');$('.booking-wrapper').addClass('w-show-panel')}
function booking_HideEstablishment(){$('.booking-content').removeClass('show-panel');$('.booking-wrapper').removeClass('w-show-panel')}
function initMap(){if($('page#contact').length){contact_Map()}
    if($('.booking-content').length){booking_Map()}}