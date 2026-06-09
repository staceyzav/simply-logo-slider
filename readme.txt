=== Simply Logo Slider ===
Contributors: simplydesign
Tags: logo, slider, carousel, sponsors, partners
Requires at least: 6.0
Tested up to: 6.8
Requires PHP: 7.4
Stable tag: 1.1.0
License: GPL-2.0-or-later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Auto-scrolling logo strip. Grayscale by default, color on hover, pauses on hover. Only animates when logos exceed container width.

== Description ==

Simply Logo Slider outputs a smooth, auto-scrolling logo strip using a simple shortcode. Perfect for sponsor walls, partner logos, and client showcases.

**Features:**

* Grayscale by default — logos pop to full color on hover
* Pauses scrolling on hover
* Only animates when logos exceed the container width — no awkward looping on sparse sets
* Optional link per logo (opens in new tab)
* Drag-and-drop logo ordering via menu order
* Height, speed, and gap configurable globally or per shortcode instance

**Shortcode usage:**

`[simply_logos]`

`[simply_logos height="60" speed="30" gap="80" limit="10"]`

**Attributes:**

* `height` — logo height in px (default: from Settings)
* `speed` — scroll duration in seconds, lower = faster (default: from Settings)
* `gap` — space between logos in px (default: from Settings)
* `limit` — max logos to show, -1 for all (default: -1)

**Managing logos:**

Add logos under **Logo Slider → Add New Logo**. Set the featured image as the logo image. Optionally add a link URL in the Logo Link meta box. Control display order via menu order (drag to reorder in the list view).

Part of the [Simply Design](https://simplydesign.com) plugin suite.

== Installation ==

1. Upload the plugin folder to `/wp-content/plugins/`
2. Activate the plugin through the Plugins menu
3. Add logos under Logo Slider → Add New Logo
4. Add `[simply_logos]` to any page or post
5. Optionally configure defaults under Logo Slider → Settings

== Frequently Asked Questions ==

= Does it work with any theme? =

Yes. Simply Logo Slider has zero theme dependencies and works on any WordPress theme.

= How do I reorder logos? =

Use the menu order field on each logo post, or install a drag-and-drop order plugin. Logos are displayed in ascending menu order.

= Can logos link to external sites? =

Yes — add a URL in the Logo Link meta box when editing a logo. Links open in a new tab.

= Why isn't it scrolling? =

The slider only animates when the total logo width exceeds the container width. If you have only a few logos, it stays static to avoid awkward looping. Add more logos or increase the height/gap to trigger the animation.

== Screenshots ==

1. Auto-scrolling logo strip on a light background
2. Logo management screen in the WordPress admin
3. Settings page under Logo Slider → Settings

<!-- TODO: capture and upload screenshots before WP.org submission -->

== Changelog ==

= 1.1.0 =
* Added grayscale toggle and no-grayscale CSS modifier

= 1.0.0 =
* Initial release

== Upgrade Notice ==

= 1.1.0 =
Added grayscale toggle option.
