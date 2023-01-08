$(document).ready(() => {

	/** Forms and buttons**/
	$('.login-btn').click((element) => {
		$('.register-form').slideUp();

		$(element.target).parent().addClass('form-showed');
		$('.login-form').slideDown();
	});

	$('.close-login-form').click(() => {
		$('.login-form').slideUp();
	});

	$('.register-btn').click((element) => {
		$('.login-form').slideUp();

		$(element.target).parent().addClass('form-showed');
		$('.register-form').slideDown();
	});

	$('.close-register-form').click(() => {
		$('.register-form').slideUp();
	});

	/**Scroll down button**/
	$('.btn-showmore').click(function () {
		let offset = $('#about-us').offset().top;

		$('html').animate({scrollTop: offset}, 700);
	});
});