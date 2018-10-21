(function( $ ) {
	'use strict';

	if ( document.querySelector( '.gift-recorder-template' ) ) {
		
		var start_btn =	document.querySelector( '.get-started-btn' );
		start_btn.onclick = function (e) {
			e.preventDefault;
			console.log(this);
			
		};
	}

	function getting_started() {

	}
})( jQuery );
