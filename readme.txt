=== WPML Shortcodes ===
Contributors: mirkolofio <mirkolofio@gmail.com>, SED Web Enhancement <it@sed-web.com>
Donate link: http://mircobabini.com/donate/
Tags: wpml, language, translate, translation, translator, shortcode, lang, theme, plugin
Requires at least: 2.8
Tested up to: 4.2.2
Stable tag: 1.2.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Easily add strings to translate to your (child) theme or everywhere in your WordPress website.

== Description ==
Adds the wpml__ and wpml_e functions to your theme and the wpml__ shortcode to your WordPress website. Make your WordPress <strong>full WPML ready</strong>

<pre>&lt;?php wpml__( $text, $domain ); ?>
&lt;?php wpml_e( $text, $domain ); ?></pre>

Similarly to the behaviour of the __, _e functions, you must provide a string to make translateable and a domain.
That’s it; just provide translations from the WPML > String Translations admin panel.

Check how to use the shotcode below.

= Usage (via code) =
<pre>&lt;h1>&lt;?php echo wpml__( ‘Title’, ‘wpmlshortcodes’ ); ?>&lt;/h1>
&lt;h2>&lt;?php wpml_e( ‘Subtitle’, ‘wpmlshortcodes’ ); ?>&lt;/h2></pre>

= Usage (via shortcode) =
<pre>&lt;h1>[wpml__ domain=wpmlshortcodes]Title[/wpml__]&lt;/h1>
&lt;h2>[wpml__ domain=wpmlshortcodes]Subtitle[/wpml__]&lt;/h2></pre>

= Contribute =
If you wanna contribute, pull requests on [github.com](https://github.com/mircobabini/wpml-shortcodes).

Author: [Mirco Babini](http://www.mircobabini.com/), **Web Developer and Mobile App Developer; Wordpress Consultant**.

== Installation ==

Simply search for ‘WPML Shortcodes’ in the Plugins Admin page, then install and activate it. That's it!

== Frequently asked questions ==

== Screenshots ==

== Changelog ==

= 1.2.2 =
* Fallback (english) if WPML is missing

= 1.2.1 =
* Fix the J.D. Grimes issue (/pull/1)
* Needed to manually restore all the translated strings

= 1.2.0 =
* Ready for the marketplace
