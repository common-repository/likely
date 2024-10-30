=== Plugin Name ===
Contributors: seezer
Donate link:
Tags: social, social media, share, sharing, button, facebook, twitter, whatsapp, pinterest, linkedin, telegram, odnoklassniki, vkontakte, reddit, viber
Requires at least: 4.0
Tested up to: 6.5
Stable tag: 3.2
License: GPLv2 or later

== Description ==

Likely are "the social sharing buttons that aren't shabby". Social sharing buttons with two themes, three sizes, ten social networks, any button text and retina support. Supports Facebook, Twitter, LinkedIn, Reddit, Pinterest, Odnoklassniki, VKontakte, WhatsApp, Viber and Telegram. Based on [Likely](http://ilyabirman.ru/projects/likely/) by [Ilya Birman](http://ilyabirman.ru/)

== Installation ==

1. Upload plugin folder to the `/wp-content/plugins/` directory, make sure to keep all files in plugins folder so you end up with `/wp-content/plugins/likely/`.
2. Activate plugin.
3. Configure plugin (you can choose large or small sizes, light or dark theme, use any text for buttons or leave them empty).

== Screenshots ==

1. Social buttons settings.
2. Display settings.

== Changelog ==

= 3.2 =

* Update `Likely` sources

= 3.1 =

* Update `Likely` sources

= 3.0 =

* Made WhatsApp into a popup version that works even if the app is not installed
* Fix duplicated content for some of the services
* Increased accessibility. Now you can iterate over it with tabs, and they are links.
* Deprecated `Likely_visible` CSS class, now it is merged with `likely_ready`
* Updated dependencies.
* Removed parameters that were deprecated by the services.
* Updated Licence to ICS.
* Internal refactoring.

= 2.7.1 =

* Fixed styles for the dark theme (Likely core)
* Removed noisy deprecation messages in the console (Likely core)
* Updated all the dependencies to modern to possible fix security issues (Likely core)
* Added source maps to the NPM release (Likely core)
* Fixed CSS loading in common.js builds (Likely core)

= 2.5 =

* Add Viber and Reddit support (Likely core)
* Restore counters disabling (Likely core)
* Remove hard-coded `aria-label`s - text labels for buttons will be used as aria-labels instead.
* See full changelog for Likely core on [Githab](https://github.com/NikolayRys/Likely/issues/173)

= 2.4 =

* Remove Google+ support (Likely core)
* Fix Facebook counter (Likely core)
* Add a11y support (add `tabindex=0` and `aria-label` to every button)

= 2.3.2 =

* Remove Google+ support

= 2.3.1 =

* Improve Twitter icon

= 2.3 =

* Add WhatsApp support

= 2.2.3 =

* Fix Google+ counter
* Update Likely sources

= 2.2.2 =

* Show Likely in pages is now optional

= 2.2.1 =

* Pinterest button respects Featured Image

= 2.2 =

* Update Likely sources to v2.2, this update includes:
* Better support for SPA
* Buttons are updated automatically when using History API
* Add method for manual update
* Add LinkedIn support

= 2.1 =

* Update Likely sources to v2.1.3 (fixed Facebook button counter)

= 2.0 =

* Add tabbed navigation
* Separate visual and social settings into tabbed sections

= 1.0 =
* Initial release.

== Upgrade Notice ==

= 1.0 =

None yet.