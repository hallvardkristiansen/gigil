/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ) {

	// Update the site title in real time...
	wp.customize( 'blogname', function( value ) {
		value.bind( function( newval ) {
			$( '#site-title a' ).html( newval );
		} );
	} );
	
	//Update the site description in real time...
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( newval ) {
			$( '.site-description' ).html( newval );
		} );
	} );

	wp.customize( 'text_color', function( value ) {
		value.bind( function( newval ) {
			$('body').css('color', newval );
		} );
	} );
	
	wp.customize( 'link_color', function( value ) {
		value.bind( function( newval ) {
			$('a').css('color', newval );
		} );
	} );
	
	wp.customize( 'search_bg_color', function( value ) {
		value.bind( function( newval ) {
			$('#search-field').css('background-color', newval );
		} );
	} );

	wp.customize( 'header_bg_color', function( value ) {
		value.bind( function( newval ) {
			$('#header').css('background-color', newval );
		} );
	} );

	wp.customize( 'body_bg_color', function( value ) {
		value.bind( function( newval ) {
			$('body').css('background-color', newval );
		} );
	} );
	
	wp.customize( 'sponsors_bg_color', function( value ) {
		value.bind( function( newval ) {
			$('#sponsors').css('background-color', newval );
		} );
	} );
	
	wp.customize( 'footer_bg_color', function( value ) {
		value.bind( function( newval ) {
			$('#footer').css('background-color', newval );
		} );
	} );
	
	wp.customize( 'footer_text_color', function( value ) {
		value.bind( function( newval ) {
			$('#footer').css('color', newval );
		} );
	} );
	
	wp.customize( 'footer_link_color', function( value ) {
		value.bind( function( newval ) {
			$('#footer a').css('color', newval );
		} );
	} );
	
	wp.customize( 'error_color', function( value ) {
		value.bind( function( newval ) {
			$('.error').css('color', newval );
		} );
	} );
	
	wp.customize( 'warning_color', function( value ) {
		value.bind( function( newval ) {
			$('.warning').css('color', newval );
		} );
	} );
	
	wp.customize( 'ok_color', function( value ) {
		value.bind( function( newval ) {
			$('.ok').css('color', newval );
		} );
	} );

} )( jQuery );