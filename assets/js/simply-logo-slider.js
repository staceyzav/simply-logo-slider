( function() {
	'use strict';

	function initSlider( slider ) {
		var track = slider.querySelector( '.sls-track' );
		if ( ! track ) return;

		var logos = Array.prototype.slice.call( track.querySelectorAll( '.sls-logo' ) );
		if ( ! logos.length ) return;

		// Only animate if logos overflow the container
		if ( track.scrollWidth <= slider.offsetWidth ) return;

		// Clone all logos and append — creates the seamless loop
		// translateX(-50%) lands back at the start of the originals
		logos.forEach( function( logo ) {
			var clone = logo.cloneNode( true );
			clone.setAttribute( 'aria-hidden', 'true' );
			if ( clone.tagName === 'A' ) {
				clone.setAttribute( 'tabindex', '-1' );
			}
			track.appendChild( clone );
		} );

		slider.classList.add( 'sls-slider--active' );

		// Freeze on hover
		slider.addEventListener( 'mouseenter', function() {
			slider.classList.add( 'sls-slider--paused' );
		} );
		slider.addEventListener( 'mouseleave', function() {
			slider.classList.remove( 'sls-slider--paused' );
		} );
	}

	// Measure after all images have loaded so dimensions are accurate
	window.addEventListener( 'load', function() {
		var sliders = document.querySelectorAll( '[data-sls]' );
		sliders.forEach( function( slider ) {
			initSlider( slider );
		} );
	} );

} )();
