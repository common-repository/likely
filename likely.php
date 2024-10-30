<?php
/*
Plugin Name: Likely
Plugin URI: https://dreamless.pw/
Description: "The social sharing buttons that aren't shabby". Plugin adds <a href="http://ilyabirman.ru/projects/likely/" target="_blank">Likely</a> social buttons to posts and pages. Social sharing buttons with two themes, three sizes, ten social networks, any button text and retina support. Currently supports Facebook, Twitter, LinkedIn, Pinterest, Odnoklassniki, VKontakte, Reddit, WhatsApp, Viber and Telegram.
Version: 3.2
Author: Azim Hikmatov
Author URI: https://dreamless.pw/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
?>
<?php
// enqueue plugin script and style for posts;
function likely_enqueue_in_posts () {
	if( is_single() ) {
		wp_enqueue_script( 'likely-script', plugins_url('/likely.js', __FILE__) );
		wp_enqueue_style( 'likely-style', plugins_url('/likely.css', __FILE__) );
	}
}
add_action( 'wp_enqueue_scripts', 'likely_enqueue_in_posts' );

// enqueue plugin script and style for pages;
function likely_enqueue_in_pages () {
    if(get_option("show_in_pages") == 1 && is_page() ) {
        wp_enqueue_script( 'likely-script', plugins_url('/likely.js', __FILE__) );
        wp_enqueue_style( 'likely-style', plugins_url('/likely.css', __FILE__) );
    }
}
add_action( 'wp_enqueue_scripts', 'likely_enqueue_in_pages' );

// append plugin output for posts and pages;
function append_likely($content) {
	if( is_single() ) {
        include_once( plugin_dir_path( __FILE__ ) . 'social-buttons.php');
    }
    if(get_option("show_in_pages") == 1 && is_page() ) {
        include( plugin_dir_path( __FILE__ ) . 'social-buttons.php');
    }
    return $content;
}
add_filter ('the_content', 'append_likely');

// load localization
add_action( 'plugins_loaded', 'likely_load_textdomain' );
function likely_load_textdomain() {
	load_plugin_textdomain( 'likely', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' ); 
	}
?>
<?php
// Settings Page
function likely_settings_page() {
?>
<div class="wrap">
	<h1><?php _e("Likely Settings", "likely"); ?></h1>
	<h2><?php _e("For selected but empty fields social icons only (without text) will be shown", "likely"); ?></h2>
	<?php
		if( isset( $_GET[ 'tab' ] ) ) {
			$active_tab = $_GET[ 'tab' ];
		} else {
			$active_tab = 'likely_social_tab' ;
		}
	?>
	<div class="nav-tab-wrapper">
		<a href="?page=likely&tab=likely_social_tab" class="nav-tab <?php echo $active_tab == 'likely_social_tab' ? 'nav-tab-active' : ''; ?>"><?php _e("Social Settings", "likely"); ?></a>
		<a href="?page=likely&tab=likely_display_tab" class="nav-tab <?php echo $active_tab == 'likely_display_tab' ? 'nav-tab-active' : ''; ?>"><?php _e("Display Settings", "likely"); ?></a>
	</div>
	<form method="post" action="options.php">
	<?php
		if( $active_tab == 'likely_social_tab' ) {
			settings_fields("social-settings");
			do_settings_sections("likely-social-options");
		} else {
			settings_fields( 'display-settings' );
			do_settings_sections( 'likely-display-options' );
		}
		submit_button();
	?>
	</form>
</div>
<?php }
function show_twitter() {  
?>
	<label for="twitter_checkbox">
		<input type="checkbox" id="twitter_checkbox" name="show_twitter" value="1" <?php checked(1, get_option('show_twitter'), true); ?> />
	</label>
<?php }
function twitter_label() {
?>
	<label for="twitter_label">
		<input type="text" id="twitter_label" name="twitter_label" value="<?php echo get_option('twitter_label'); ?>" />
	</label>
<?php }
function twitter_acc() {
?>
	<label for="twitter_acc">
		<input type="text" id="twitter_acc" name="twitter_acc" value="<?php echo get_option('twitter_acc'); ?>" />
		<small><?php _e("Do not use @, it will be included automatically.", "likely"); ?></small>
	</label>
<?php }
function show_facebook() {
?>
	<label for="facebook_checkbox">
		<input type="checkbox" id="facebook_checkbox" name="show_facebook" value="1" <?php checked(1, get_option('show_facebook'), true); ?> />
	</label>
<?php }
function facebook_label() {
?>
	<label for="facebook_label">
		<input type="text" id="facebook_label" name="facebook_label" value="<?php echo get_option('facebook_label'); ?>" />
	</label>
<?php }
function show_linkedin() {
?>
	<label for="linkedin_checkbox">
		<input type="checkbox" id="linkedin_checkbox" name="show_linkedin" value="1" <?php checked(1, get_option('show_linkedin'), true); ?> />
	</label>
<?php }
function linkedin_label() {
?>
	<label for="linkedin_label">
		<input type="text" id="linkedin_label" name="linkedin_label" value="<?php echo get_option('linkedin_label'); ?>" />
	</label>
<?php }
function show_reddit() {
?>
	<label for="reddit_checkbox">
		<input type="checkbox" id="reddit_checkbox" name="show_reddit" value="1" <?php checked(1, get_option('show_reddit'), true); ?> />
	</label>
<?php }
function reddit_label() {
?>
	<label for="reddit_label">
		<input type="text" id="reddit_label" name="reddit_label" value="<?php echo get_option('reddit_label'); ?>" />
	</label>
<?php }
function show_vk() {  
?>
	<label for="vk_checkbox">
		<input type="checkbox" id="vk_checkbox" name="show_vk" value="1" <?php checked(1, get_option('show_vk'), true); ?> />
	</label>
<?php }
function vk_label() {
?>
	<label for="vk_label">
		<input type="text" id="vk_label" name="vk_label" value="<?php echo get_option('vk_label'); ?>" />
	</label>
<?php }
function show_telegram() {  
?>
	<label for="telegram_checkbox">
		<input type="checkbox" id="telegram_checkbox" name="show_telegram" value="1" <?php checked(1, get_option('show_telegram'), true); ?> />
	</label>
<?php }
function telegram_label() {
?>
	<label for="telegram_label">
		<input type="text" id="telegram_label" name="telegram_label" value="<?php echo get_option('telegram_label'); ?>" />
	</label>
<?php }
function telegram_datatext() {
?>
	<label for="telegram_datatext">
		<input type="text" id="telegram_datatext" name="telegram_datatext" value="<?php echo get_option('telegram_datatext'); ?>" />
	</label>
<?php }
function show_ok() {  
?>
	<label for="ok_checkbox">
		<input type="checkbox" id="ok_checkbox" name="show_ok" value="1" <?php checked(1, get_option('show_ok'), true); ?> />
	</label>
<?php }
function ok_label() {
?>
	<label for="ok_label">
		<input type="text" id="ok_label" name="ok_label" value="<?php echo get_option('ok_label'); ?>" />
	</label>
<?php }
function show_whatsapp() {
?>
	<label for="whatsapp_checkbox">
		<input type="checkbox" id="whatsapp_checkbox" name="show_whatsapp" value="1" <?php checked(1, get_option('show_whatsapp'), true); ?> />
	</label>
<?php }
function whatsapp_label() {
?>
	<label for="whatsapp_label">
		<input type="text" id="whatsapp_label" name="whatsapp_label" value="<?php echo get_option('whatsapp_label'); ?>" />
	</label>
<?php }
function show_viber() {
?>
	<label for="viber_checkbox">
		<input type="checkbox" id="viber_checkbox" name="show_viber" value="1" <?php checked(1, get_option('show_viber'), true); ?> />
	</label>
<?php }
function viber_label() {
?>
	<label for="viber_label">
		<input type="text" id="viber_label" name="viber_label" value="<?php echo get_option('viber_label'); ?>" />
	</label>
<?php }
function viber_datacomment() {
?>
	<label for="viber_datacomment">
		<input type="text" id="viber_datacomment" name="viber_datacomment" value="<?php echo get_option('viber_datacomment'); ?>" />
	</label>
<?php }
function show_pinterest() {  
?>
	<label for="pinterest_checkbox">
		<input type="checkbox" id="pinterest_checkbox" name="show_pinterest" value="1" <?php checked(1, get_option('show_pinterest'), true); ?> />
	</label>
<?php }
function pinterest_label() {
?>
	<label for="pinterest_label">
		<input type="text" id="pinterest_label" name="pinterest_label" value="<?php echo get_option('pinterest_label'); ?>" />
	</label>
<?php }
// other settings;
function show_in_pages() {
?>
    <label for="show_in_pages">
        <input type="checkbox" id="show_in_pages" name="show_in_pages" value="1" <?php checked(1, get_option('show_in_pages'), true); ?> />
        <small>(<?php _e("check if you want Likely to appear in pages", "likely"); ?>)</small>
    </label>
<?php }
function use_light_theme() {
?>
	<label for="light_theme">
		<input type="checkbox" id="light_theme" name="light_theme" value="likely-light" <?php checked('likely-light', get_option('light_theme'), true); ?> />
		<small>(<?php _e("for dark backgrounds", "likely"); ?>)</small>
	</label>
<?php }
function buttons_size() { ?>
	<p>
		<label for="buttons_medium">
			<input type="radio" id="buttons_medium" name="buttons_size" value="" <?php checked( '', get_option( 'buttons_size' ) ); ?> />
			<?php _e("Medium", "likely"); ?> <?php _e("(default)", "likely"); ?>
		</label>
	</p>
	<p>
		<label for="buttons_large">
			<input type="radio" id="buttons_large" name="buttons_size" value="likely-big" <?php checked( 'likely-big', get_option( 'buttons_size' ) ); ?> />
			<?php _e("Large", "likely"); ?>
		</label>
	</p>
	<p>
		<label for="buttons_small">
			<input type="radio" id="buttons_small" name="buttons_size" value="likely-small" <?php checked( 'likely-small', get_option( 'buttons_size' ) ); ?> />
			<?php _e("Small", "likely"); ?>
		</label>
	</p>
<?php }
function likely_panel_fields() {
	add_settings_section(
		"display-settings",
		__("Customize appearance", "likely"),
		null,
		"likely-display-options"
	);
    add_settings_field(
    	"show_in_pages",
    	__("Show in pages?", "likely"),
    	"show_in_pages",
    	"likely-display-options",
    	"display-settings"
    );
    add_settings_field(
    	"buttons_size",
    	__("Buttons size", "likely"),
    	"buttons_size",
    	"likely-display-options",
    	"display-settings"
    );
	add_settings_field(
		"light_theme",
		__("Use Light theme", "likely"),
		"use_light_theme",
		"likely-display-options",
		"display-settings"
	);
	add_settings_section(
		"social-settings",
		__("Select social services you would like to use", "likely"),
		null,
		"likely-social-options"
	);
	add_settings_field(
		"show_twitter",
		__("Show Twitter button?", "likely"),
		"show_twitter",
		"likely-social-options",
		"social-settings"
	);
	add_settings_field(
		"twitter_label",
		__("Text label for Twitter", "likely"),
		"twitter_label",
		"likely-social-options",
		"social-settings"
	);
	add_settings_field(
		"twitter_acc",
		__("Twitter account to be mentioned", "likely"),
		"twitter_acc",
		"likely-social-options",
		"social-settings"
	);
	add_settings_field(
		"show_facebook",
		__("Show Facebook button?", "likely"),
		"show_facebook",
		"likely-social-options",
		"social-settings"
	);
	add_settings_field(
		"facebook_label",
		__("Text label for Facebook", "likely"),
		"facebook_label",
		"likely-social-options",
		"social-settings"
	);
	add_settings_field(
		"show_linkedin",
		__("Show LinkedIn button?", "likely"),
		"show_linkedin",
		"likely-social-options",
		"social-settings"
	);
	add_settings_field(
		"linkedin_label",
		__("Text label for LinkedIn", "likely"),
		"linkedin_label",
		"likely-social-options",
		"social-settings"
	);
	add_settings_field(
		"show_reddit",
		__("Show Reddit button?", "likely"),
		"show_reddit",
		"likely-social-options",
		"social-settings"
	);
	add_settings_field(
		"reddit_label",
		__("Text label for Reddit", "likely"),
		"reddit_label",
		"likely-social-options",
		"social-settings"
	);
	add_settings_field(
		"show_pinterest",
		__("Show Pinterest button?", "likely"),
		"show_pinterest",
		"likely-social-options",
		"social-settings"
	);
	add_settings_field(
		"pinterest_label",
		__("Text label for Pinterest", "likely"),
		"pinterest_label",
		"likely-social-options",
		"social-settings"
	);
	add_settings_field(
		"show_vk",
		__("Show VKontakte button?", "likely"),
		"show_vk",
		"likely-social-options",
		"social-settings"
	);
	add_settings_field(
		"vk_label",
		__("Text label for Vkontakte", "likely"),
		"vk_label",
		"likely-social-options",
		"social-settings"
	);
	add_settings_field(
		"show_ok",
		__("Show Odnoklassniki button?", "likely"),
		"show_ok",
		"likely-social-options",
		"social-settings"
	);
	add_settings_field(
		"ok_label",
		__("Text label for Odnoklassniki", "likely"),
		"ok_label",
		"likely-social-options",
		"social-settings"
	);
	add_settings_field(
		"show_whatsapp",
		__("Show WhatsApp button?", "likely"),
		"show_whatsapp",
		"likely-social-options",
		"social-settings"
	);
	add_settings_field(
		"whatsapp_label",
		__("Text label for WhatsApp", "likely"),
		"whatsapp_label",
		"likely-social-options",
		"social-settings"
	);
	add_settings_field(
		"show_viber",
		__("Show Viber button?", "likely"),
		"show_viber",
		"likely-social-options",
		"social-settings"
	);
	add_settings_field(
		"viber_label",
		__("Text label for Viber", "likely"),
		"viber_label",
		"likely-social-options",
		"social-settings"
	);
	add_settings_field(
		"viber_datacomment",
		__("Text to be appended to the link in Viber", "likely"),
		"viber_datacomment",
		"likely-social-options",
		"social-settings"
	);
	add_settings_field(
		"show_telegram",
		__("Show Telegram button?", "likely"),
		"show_telegram",
		"likely-social-options",
		"social-settings"
	);
	add_settings_field(
		"telegram_label",
		__("Text label for Telegram", "likely"),
		"telegram_label",
		"likely-social-options",
		"social-settings"
	);
	add_settings_field(
		"telegram_datatext",
		__("Text to be appended to the link in Telegram", "likely"),
		"telegram_datatext",
		"likely-social-options",
		"social-settings"
	);

    register_setting("display-settings", "show_in_pages");
    register_setting("display-settings", "light_theme");
	register_setting("display-settings", "buttons_size");

	register_setting("social-settings", "show_twitter");
	register_setting("social-settings", "twitter_label");
	register_setting("social-settings", "twitter_acc");

	register_setting("social-settings", "show_facebook");
	register_setting("social-settings", "facebook_label");

	register_setting("social-settings", "show_linkedin");
	register_setting("social-settings", "linkedin_label");

	register_setting("social-settings", "show_reddit");
	register_setting("social-settings", "reddit_label");

	register_setting("social-settings", "show_pinterest");
	register_setting("social-settings", "pinterest_label");

	register_setting("social-settings", "show_vk");
	register_setting("social-settings", "vk_label");

	register_setting("social-settings", "show_ok");
	register_setting("social-settings", "ok_label");

	register_setting("social-settings", "show_whatsapp");
	register_setting("social-settings", "whatsapp_label");

	register_setting("social-settings", "show_viber");
	register_setting("social-settings", "viber_label");
	register_setting("social-settings", "viber_datacomment");

	register_setting("social-settings", "show_telegram");
	register_setting("social-settings", "telegram_label");
	register_setting("social-settings", "telegram_datatext");
}
add_action("admin_init", "likely_panel_fields");

// Add submenu item to Options page
function add_settings_menu_item() {
	add_options_page("Likely", "Likely", "manage_options", "likely", "likely_settings_page", null, 99);
}
add_action("admin_menu", "add_settings_menu_item");
?>