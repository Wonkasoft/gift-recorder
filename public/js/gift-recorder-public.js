(function( $ ) {
	'use strict';

	if ( document.querySelector( '.gift-recorder-template' ) ) {
		
		var start_btn =	document.querySelector( '.get-started-btn' );
		var get_rows = document.querySelector( '.site-main' );
		start_btn.onclick = function (e) {
			e.preventDefault;
			console.log(this);
			process_effects(get_rows.children, 'fade', 350 );
			;
		};
	}

	function getting_started() {

	}

	function process_effects( elements, effect, time ) {
		console.log(elements);
		for (var i = 0; i < elements.length; i++) {
			elements[i].style.opacity = 0;
			if ( i == 0 ) {
				elements[i].style.opacity = 1;
			}
		}
	}
})( jQuery );
