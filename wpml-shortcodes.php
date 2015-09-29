<?php
/*
Plugin Name: WPML Shortcodes
Plugin URI: http://github.com/mircobabini/wpml-shortcodes
Description: Adds shortcodes to the WPML environment, like wpml__, wpml_e and more. Make your WordPress <strong>full WPML ready</strong>.
Author: Mirco Babini
Version: 1.2.4
Author URI: http://github.com/mircobabini
*/
defined('ABSPATH') or die("No script kiddies please!");
if( defined('WPML_SHORTCODES') ) return;

/* here we go */
define( 'WPML_SHORTCODES', 1 );

function wpml_icl_t__shortcode( $attr, $content = null ){
	if( $content === null ){
		return '';
	}

	extract(shortcode_atts(array(
		'context' => null,
		'name' => null,
	), $attr));

	if( $context === null ){
		return $content;
	}

	return icl_t( $context, $name, $content );
}
add_shortcode( 'wpml_icl_t', 'wpml_icl_t__shortcode' );

function wpml__shortcode( $attr, $content = null ){
	if( $content === null ){
		return '';
	}

	extract(shortcode_atts(array(
		'context' => null,
		'name'    => null,
	), $attr));

	if( $context === null ){
		return $content;
	}

	return wpml__( $content, $context, $name );
}
add_shortcode( 'wpml__', 'wpml__shortcode' );

function wpml__( $string, $context, $name = null ){
	_icl_register_string( $string, $context, $name );
	$translation = _icl_t( $string, $context, $name );
	return $translation;
}
function wpml_e( $string, $context, $name = null ){
	$translation = wpml__( $string, $context, $name );
	echo $translation;
}

function _icl_t( $string, $context, $name = null ){
	$name = _icl_ensure_name( $name, $string );

	if( function_exists('icl_t') ){
		$translation = icl_t( $context, $name, $string );
	}else{
		$translation = $string;
	}

	return $translation;
}
function _icl_register_string( $string, $context, $name = null ){
	if( ! function_exists('icl_register_string') ){
		return false;
	}

	$name = _icl_ensure_name( $name, $string );
	return icl_register_string( $context, $name, $string );
}
function _icl_ensure_name( $name, $string ){
	if( $name === null ){
		$name = sha1( $string );
	}

	return $name;
}

/* ex. WPML Translate Shortcode */
function wpml_if__shortcode( $attr, $content = null ){
	extract(shortcode_atts(array(
		'lang' => '',
	), $attr));

	if( ! $lang ){
		return '';
	}

	return wpml_e__if_language( $content, $lang );
}
add_shortcode( 'wpml_if', 'wpml_if__shortcode' );

/* tools */
function wpml_e__if_language( $content, $lang ){
	if ( wpml_secure__get_current_language() === $lang ){
		return do_shortcode( $content );
	} else{
		return '';
	}
}
function wpml_secure__get_current_language(){
	if( defined( 'ICL_LANGUAGE_CODE') ){
		$lang = ICL_LANGUAGE_CODE;
	}else{
		list( $lang ) = explode( '_', get_locale() );
	}

	return $lang;
}
