<?php
if (!class_exists('WPFaq')) :
	class WPFaq {
		public static function register_wpfaq_type(){
			  $labels = array(
    			'name' => _x('FAQ', 'post type general name'),
			    'singular_name' => _x('Question', 'post type singular name'),
			    'add_new' => _x('Add New Question', 'Question'),
			    'add_new_item' => __('Add New Question'),
			    'edit_item' => __('Edit Question'),
			    'new_item' => __('New Question'),
			    'all_items' => __('All FAQs'),
			    'view_item' => __('View Question'),
			    'search_items' => __('Search FAQs'),
			    'not_found' =>  __('No FAQ found'),
			    'not_found_in_trash' => __('No FAQ found in Trash'), 
			    'parent_item_colon' => '',
			    'menu_name' => 'WP FAQ'
			  );
			  $args = array(
			    'labels' => $labels,
			    'public' => true,
			    'publicly_queryable' => true,
			    'show_ui' => true, 
			    'show_in_menu' => true, 
			    'query_var' => true,
			    'rewrite' => true,
			    'has_archive' => true, 
			    'hierarchical' => false,
			    'menu_position' => null,
			    'supports' => array( 'title', 'editor', 'page-attributes' ),
			    'menu_icon' => WPFAQ_URLPATH. '/includes/question_mark.png'
			  ); 
			  register_post_type('jqfaq',$args);
		}

		public static function register_wpfaq_scripts(){
			wp_register_style('wpfaq-jquery-ui-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css');
			wp_enqueue_style('wpfaq-jquery-ui-style');
			
			wp_enqueue_script('jquery-ui-accordion');
			
			wp_register_script('wpfaq-js',WPFAQ_URLPATH.'/includes/wpfaq.js','jquery-ui-accordion','',true);
			wp_enqueue_script('wpfaq-js');
		}
		
		public static function get_wpfaq(){
			$faq_posts = get_posts(
				array(
					'numberposts'=>10,
					'orderby'=>'menu_order',
					'order'=>'ASC',
					'post_type'=>'jqfaq'
				)
			);
			
			$faq = '<!--starting faq--><div class="ui-accordion ui-widget ui-helper-reset" id="wpfaq-jq">';
			foreach($faq_posts as $post){
				$faq.=sprintf(('<h3><a href="">%1$s</a></h3>
					<div>%2$s</div>'), $post->post_title, wpautop($post->post_content));
			}
			$faq.='</div><!--ending faq-->';
			return $faq;
		}
	}
endif;
