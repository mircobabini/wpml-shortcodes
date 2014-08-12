# WPML Shortcodes
Developed by [Mirco Babini](http://www.mircobabini.com/donate) (Web Developer & Mobile App Developer), CEO @ [SED Web](http://www.sedweb.it)

**Easily add strings to translate to your (child) theme or everywhere in your WordPress website.**

## Description
Adds the wpml__ and wpml_e functions to your theme and the wpml__ shortcode to your WordPress website. Make your WordPress <strong>full WPML ready</strong>!

<pre>&lt;?php wpml__( $text, $context ); ?>
&lt;?php wpml_e( $text, $context ); ?></pre>

Similarly to the behaviour of the __, _e functions, you must provide a string to make translateable and a context.
That’s it; just provide translations from the WPML > String Translations admin panel.

Check how to use the shotcode below.

## Usage (via code)
<pre>&lt;h1>&lt;?php echo wpml__( ‘Title’, ‘wpmlshortcodes’ ); ?>&lt;/h1>
&lt;h2>&lt;?php wpml_e( ‘Subtitle’, ‘wpmlshortcodes’ ); ?>&lt;/h2></pre>

## Usage (via shortcode)
<pre>&lt;h1>[wpml__ context=wpmlshortcodes]Title[/wpml__]&lt;/h1>
&lt;h2>[wpml__ context=wpmlshortcodes]Subtitle[/wpml__]&lt;/h2></pre>

## Contribute
If you wanna contribute, pull requests on [github.com](https://github.com/mircobabini/wpml-shortcodes).

## Installation

Simply search for ‘WPML Shortcodes’ in the Plugins Admin page, then install and activate it. That's it!

###### License
[GPLv2](http://www.gnu.org/licenses/gpl-2.0.html) or later
