$('.page-scroll').on('click', function(e){

	// console.log('klik');

	var tujuan = $(this).attr('href');

	// console.log(href);

	var elementTujuan = $(tujuan);

	// console.log(elementTujuan);	

	// $('body').animate({
	// 	scrollTop: elementTujuan.offset().top - 50
	// }, 1000);

	$('html , body').animate({
	  scrollTop: elementTujuan.offset().top - 60
	}, 1000);

	e.preventDefault();


})