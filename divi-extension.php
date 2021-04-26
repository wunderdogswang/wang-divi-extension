<?php
/*
Plugin Name: Divi Extension
Plugin URI:  
Description: 
Version:     1.0.0
Author:      
Author URI:  
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: diex-divi-extension
Domain Path: /languages

Divi Extension is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Divi Extension is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Divi Extension. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/


if ( ! function_exists( 'diex_initialize_extension' ) ):
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.0
 */
function diex_initialize_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/DiviExtension.php';
}
add_action( 'divi_extensions_init', 'diex_initialize_extension' );
endif;

function add_theme_scripts() {
	wp_enqueue_style( 'my-divi-extension', plugin_dir_url( __FILE__ ) . 'styles/style.css');
}

add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

add_action('wp_ajax_get_teams', 'getTeamsFunc');
add_action('wp_ajax_nopriv_get_teams', 'getTeamsFunc');

function getTeamsFunc()
{
    if (!wp_verify_nonce($_REQUEST['nonce'], 'get_teams_nonce')) {
        exit('No naughty business please');
    }

    $result = [];
    $result['type'] = 'success';

    $teamPostId = intval($_REQUEST['teamPostId']);

    $args = [
		'p' => $teamPostId,
        'post_type' => 'post',
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => -1,
    ];

	$result['html'] = '';

	$the_query = new WP_Query( $args );

	if ( $the_query->have_posts() ) {
		global $post;
		
		while ( $the_query->have_posts() ) {
			$the_query->the_post();

			$result['html'] .= '<div class="team-avatar" data-post-id="' . $post->ID . '"><img src="' . get_the_post_thumbnail_url($post->ID) . '" /></div>';
			$result['html'] .= '<div class="team-title">' . $post->post_title . '</div>';
		}
	}

	wp_reset_postdata();

    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $result = json_encode($result);
        echo $result;
    } else {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

    die();
}
