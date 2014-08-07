<?php
/*
Plugin Name: WPML Shortcodes
Plugin URI: http://github.com/mircobabini/wpml-shortcodes
Description: Adds shortcodes to the WPML environment, like wpml__, wpml_e and more. Make your WordPress <strong>full WPML ready</strong>.
Author: Mirco Babini
Version: 1.2.0
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
	return _icl_t( $string, $context );
}
function wpml_e( $string, $context ){
	echo wpml__( $string, $context );
}

function _icl_t( $string, $context, $name = null ){
	$name = _icl_ensure_name( $name, $string );
	return icl_t( $context, $name, $string );
}
function _icl_register_string( $string, $context, $name = null ){
	$name = _icl_ensure_name( $name, $string );
	return icl_register_string( $context, $name, $string );
}
function _icl_ensure_name( $name, $string ){
	if( $name === null ){
		$name = sanitize_title( $string );
	}

	return $name;
}




/**
 * Usage (via shortcode)
 * [wpml_translate lang='en']Text[/wpml_translate]
 * [wpml_translate lang='it']Testo[/wpml_translate]
 * ( wpml_language is an alias for wpml_translate shortcode )
 * ( code and language are alias for lang attribute )
 *
 * Usage (via code)
 * echo wpml_text_if_language( 'en', 'Text' );
 * echo wpml_text_if_language( 'it', 'Testo' );
 *
 */
// init shortcode and handler
if ( !function_exists( 'load_wpml_translate_shortcode' ) ){
	function load_wpml_translate_shortcode(){

		add_shortcode( 'wpml_translate', 'wpml_text_if_language_sc');
		add_shortcode( 'wpml_language', 'wpml_text_if_language_sc');
	}
	add_action( 'init', 'load_wpml_translate_shortcode' );

	function wpml_text_if_language_sc( $attr, $content = null ){
		if ( ! defined( 'ICL_LANGUAGE_CODE' ) ){
			return '';
		}

		// choose the attr that you prefer
		extract(shortcode_atts(array(
			'lang' => '',
			'code' => '', // same of lang
			'language' => '', // same of lang
		), $attr));

		$lang = ( $code ) ? $code : $lang;
		$lang = ( $language ) ? $language : $lang;
		$lang = ( $lang ) ? $lang : ICL_LANGUAGE_CODE;

		return wpml_text_if_language( $lang, $content );
	}
}

// provide helper even for code
if ( !function_exists( 'wpml_text_if_language' ) ){
	function wpml_text_if_language( $lang, $content ){

		if ( ! defined( 'ICL_LANGUAGE_CODE' ) ){
			return '';
		}

		if ( $lang === null ){
			return '';
		}

		if ( ICL_LANGUAGE_CODE === $lang ){
			return do_shortcode( $content );
		} else{
			return '';
		}
	}
}

