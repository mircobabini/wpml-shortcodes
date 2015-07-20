<?php
/*
Plugin Name: WPML Shortcodes
Plugin URI: http://github.com/mircobabini/wpml-shortcodes
Description: Adds shortcodes to the WPML environment, like wpml__, wpml_e and more. Make your WordPress <strong>full WPML ready</strong>.
Author: Mirco Babini
Version: 1.2.2
Author URI: http://github.com/mircobabini
*/

function wpml_icl_t_shortcode( $attr, $content = null ){
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
add_shortcode( 'wpml_icl_t', 'wpml_icl_t_shortcode' );

function wpml__shortcode( $attr, $content = null ){
	if( $content === null ){
		return '';
	}

	extract(shortcode_atts(array(
		'context' => null,
	), $attr));

	if( $context === null ){
		return $content;
	}

	return wpml__( $content, $context );
}
add_shortcode( 'wpml__', 'wpml__shortcode' );

function wpml__( $string, $context ){
	_icl_register_string( $string, $context );
	$translation = _icl_t( $string, $context );
	return $translation;
}
function wpml_e( $string, $context ){
	$translation = wpml__( $string, $context );
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
