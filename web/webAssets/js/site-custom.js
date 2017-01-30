$(document).ready(function() {
	$('.js-toggle-menu').click(function(e){
	  e.preventDefault();
	  $('.mobile-header-nav').slideToggle();
	  $(this).toggleClass('open');
	});

//	$('.js-participa-cta').click(function(e){
//	  e.preventDefault();
//
//	  $('.js-page-home').css('opacity','0');
//	  setTimeout(function(){
//	  	$('.js-page-home').css('display','none');
//	  	$('.js-page-registro').css('display','block');
//	  	$('.js-page-registro').css('opacity','1');
//
//	  	$('.js-participa-aqui').trigger('click');
//	  }, 300);
//
//	});


});
