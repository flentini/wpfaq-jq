<?php
class WPFaqWidget extends WP_Widget {
	public $name = 'WP JQuery-FAQ';
	public $description = 'Display FAQ post types using Jquery';
	public $control_options = array(
		'title'=>'WP JQuery-FAQ'
	);
	
	public function __construct() {
		$widget_options = array(
			'classname' => __CLASS__,
			'description' => $this->description
			);
			
			parent::__construct(__CLASS__,$this->name, $widget_options, $this->control_options);		
	}
	
	public static function register_widget(){
		register_widget(__CLASS__);
	}
	
	public function widget($args,$instance){
		echo WPFaq::get_wpfaq();
	}
}
