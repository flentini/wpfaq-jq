<?php
/*
Plugin Name: JQuery FAQ Plugin
Description: Jquery faq plugin widget
Author: Francesco Lentini
Version: 0.1
Author URI: http://github.com/flentini
*/
define('WPFAQ_URLPATH', WP_PLUGIN_URL . '/' . plugin_basename(dirname(__FILE__)));

require_once('includes/WPFaqClass.php');
require_once('includes/WPFaqWidgetClass.php');

add_action('init', 'WPFaq::register_wpfaq_type');
add_action('wp_enqueue_scripts', 'WPFaq::register_wpfaq_scripts');
add_action('widgets_init', 'WPFaqWidget::register_widget');
add_shortcode('wpfaq', 'WPFaq::get_wpfaq');