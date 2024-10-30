<?php
$content.= "<div class='likely " . get_option('buttons_size') . " " . get_option('light_theme') . "'>";
	if(get_option("show_facebook") == 1) {
		$content.= "<div class='facebook' tabindex='0' role='link' aria-label='" . get_option('facebook_label') . "'>" . get_option('facebook_label') . "</div>";
	}
	if(get_option("show_twitter") == 1) {
		$content.= "<div class='twitter' tabindex='0' role='link' data-via='" . get_option('twitter_acc') . "' aria-label='" . get_option('twitter_label') . "'>" . get_option('twitter_label') . "</div>";
	}
	if(get_option("show_linkedin") == 1) {
		$content.= "<div class='linkedin' tabindex='0' role='link' aria-label='" . get_option('linkedit_label') . "'>" . get_option('linkedin_label') . "</div>";
	}
	if(get_option("show_reddit") == 1) {
		$content.= "<div class='reddit' tabindex='0' role='link' aria-label='" . get_option('reddit_label') . "'>" . get_option('reddit_label') . "</div>";
	}
	if(get_option("show_pinterest") == 1) {
		$content.= "<div class='pinterest' tabindex='0' role='link' data-media='" . get_the_post_thumbnail_url() . "' aria-label='" . get_option('pinterest_label') . "'>" . get_option('pinterest_label') . "</div>";
	}
	if(get_option("show_vk") == 1) {
		$content.= "<div class='vkontakte' tabindex='0' role='link' aria-label='" . get_option('vk_label') . "'>" . get_option('vk_label') . "</div>";
	}
	if(get_option("show_ok") == 1) {
		$content.= "<div class='odnoklassniki' tabindex='0' role='link' aria-label='" . get_option('ok_label') . "'>" . get_option('ok_label') . "</div>";
	}
	if(get_option("show_whatsapp") == 1) {
		$content.= "<div class='whatsapp' tabindex='0' role='link' aria-label='" . get_option('whatsapp_label') . "'>" . get_option('whatsapp_label') . "</div>";
	}
	if(get_option("show_viber") == 1) {
		$content.= "<div class='viber' tabindex='0' role='link' data-comment='" . get_option('viber_datacomment') . "' aria-label='" . get_option('viber_label') . "'>" . get_option('viber_label') . "</div>";
	}
	if(get_option("show_telegram") == 1) {
		$content.= "<div class='telegram' tabindex='0' role='link' data-text='" . get_option('telegram_datatext') . "' aria-label='" . get_option('telegram_label') . "'>" . get_option('telegram_label') . "</div>";
	}
$content.= "</div>";
?>