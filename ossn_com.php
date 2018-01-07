<?php

function sale_init() {
	ossn_register_page('classifieds', 'classifieds_pages');
	  if (ossn_isLoggedin()) {       
		$icon = ossn_site_url('components/classifieds/image/classified.png');
    	ossn_register_sections_menu('newsfeed', array(
        	'text' => ossn_print('Classifieds'),
        	'url' => ossn_site_url('classifieds'),
        	 'icon' => $icon,
		 'section' => 'links'
	    	));		
    }
}


function classifieds_pages($pages) {

 if (!ossn_isLoggedin()) {
            ossn_error_page();
   }
$title = ossn_print('classifieds');
   $contents['content'] = ossn_plugin_view('classifieds/classifieds');
   $content = ossn_set_page_layout('contents', $contents);
   echo ossn_view_page($title, $content);
}

ossn_register_callback('ossn', 'init', 'classifieds_init');
