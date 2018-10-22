(function( $ ) {
	'use strict';

	if ( document.querySelector( '.gift-recorder-template' ) ) {
		
		var start_btn =	document.querySelector( '.get-started-btn' );
		var get_content = document.querySelector( '.instruction-content' );
		var header_img = document.querySelector( '.gift-recorder-header-image' );
		start_btn.onclick = function (e) {
			e.preventDefault;
			var header_img_link = header_img.src;
			header_img_link = header_img_link.replace( /gatewaysHeader/gi, 'gatewaysHeader2' );
			header_img.src = header_img_link;

			process_effects(get_content, 'fade', 350 );
			;
		};
	}

	function getting_started() {

	}

	function process_effects( element, effect, time ) {
		console.log(element);
		element.style.overflow = 'hidden';
		element.style.height = '50px';
	}
})( jQuery );
