<?php

	/**
	 * @package Region Halland Parent Page
	 */
	/*
	Plugin Name: Region Halland Parent Page
	Description: Front-end-plugin som hämtar data om förälder-sida
	Version: 1.2.0
	Author: Roland Hydén
	License: GPL-3.0
	Text Domain: regionhalland
	*/

	// Hämta data om förälder-sida
	function get_region_halland_parent_page($getFront = 0)
	{
		
		// Aktuell sida
		global $post;

		// Hämta förälder-ID
		$myParentPost = wp_get_post_parent_id($post);
		
		// Om det inte finns någon förälder
		if ($myParentPost == 0) {

			if ($getFront == 1) {

				// Hämta front-page-id
				$myFrontPageID = get_option('page_on_front');

				// Hämta namn på sajten, svs samma som för bredcrumbs
				$myFrontPageName = get_bloginfo('name');
				
				// Hämta information om parent page
				$page = get_post($myFrontPageID, ARRAY_A);
				
				// Skriv över post_title
				$page['post_title'] = $myFrontPageName;

				// Lägg till sidans url
				$page['url'] = get_permalink($page['ID']);

				// Sätt "has_back" till 1
				$page['has_back'] = 1;

			} else {
				
				// Sätt "has_back" till 0
				$page = array();
				$page['has_back'] = 0;

			}

		// Om sidan har en förälder
		} else {
			
			// Hämta information om parent page
			$page = get_post($myParentPost, ARRAY_A);

			// Lägg till sidans url
			$page['url'] = get_permalink($page['ID']);

			// Sätt "has_back" till 1
			$page['has_back'] = 1;
		
		}
		

		// Returnera page-array
		return $page;

	}

	// Metod som anropas när pluginen aktiveras
	function region_halland_parent_page_activate() {
		// Ingenting just nu...
	}

	// Metod som anropas när pluginen avaktiveras
	function region_halland_parent_page_deactivate() {
		// Ingenting just nu...
	}
	
	// Vilken metod som ska anropas när pluginen aktiveras
	register_activation_hook( __FILE__, 'region_halland_parent_page_activate');
	
	// Vilken metod som ska anropas när pluginen avaktiveras
	register_deactivation_hook( __FILE__, 'region_halland_parent_page_deactivate');

?>