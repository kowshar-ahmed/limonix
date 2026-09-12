/**
 * Limonix — Customizer live preview handlers.
 *
 * @package Limonix
 */

( function ( $ ) {
	'use strict';

	// Site title.
	wp.customize( 'blogname', function ( value ) {
		value.bind( function ( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );

	// Site tagline/description.
	wp.customize( 'blogdescription', function ( value ) {
		value.bind( function ( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
} )( jQuery );
