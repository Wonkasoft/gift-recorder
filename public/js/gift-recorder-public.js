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

			process_instructions(get_content, 'in', 350 );
			
			get_content.onclick = function (e) {
				e.preventDefault;
				if ( get_content.classList.contains( 'in' ) ) {
					process_instructions(get_content, 'out', 350 );
					return;
				}
				if ( get_content.classList.contains( 'out' ) ) {
					process_instructions(get_content, 'in', 350 );
					return;
				}
			};
		};

	}

	function getting_started() {

	}

	function process_instructions( element, effect, time ) {
		console.log(effect);
		if ( effect == 'in' ) {
			element.style.overflow = 'hidden';
			element.style.height = '50px';
			element.style.width = '150px';
			element.style.position = 'fixed';
			element.style.top = '50%';
			element.style.right = 0;
			element.style.transform = 'rotate(-90deg)';
			element.classList.add( 'in' );
			if ( element.classList.contains( 'out') ) {
				element.classList.remove( 'out' );
			}
			return;
		}
		if ( effect == 'out' ) {
			element.style.overflow = 'hidden';
			element.style.height = '100%';
			element.style.width = '500px';
			element.style.position = 'fixed';
			element.style.top = '50%';
			element.style.right = '50%';
			element.style.transform = 'rotate(0deg)';
			element.classList.add( 'out' );
			if ( element.classList.contains( 'in') ) {
				element.classList.remove( 'in' );
			}
			return;
		}

	}
})( jQuery );
