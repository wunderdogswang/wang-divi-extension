<?php

class DIEX_OurTeam extends ET_Builder_Module {

	public $slug       = 'diex_our_team';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => '',
		'author'     => '',
		'author_uri' => '',
	);

	public function init() {
		$this->name = esc_html__( 'Our Team', 'diex-divi-extension' );
	}

	public function get_fields() {
		return [];
	}

	public function render( $attrs, $content = null, $render_slug ) {

        $output = '';

        // get terms
        $categories = get_terms(array(
			'taxonomy' => 'category',
			'hide_empty' => false,
		));

		foreach( $categories as $category ){
			$output .= '<div class="team-category" data-term-id="' . $category->term_id . '">' . $category->name. '</div>';
		}

        // get posts
        $args = [
			'post_type' => 'post',
			'posts_per_page' => -1,
			'post_status' => 'publish'
		];

		$the_query = new WP_Query( $args );

		if ( $the_query->have_posts() ) {
			global $post;
			
			while ( $the_query->have_posts() ) {
				$the_query->the_post();

				$output .= '<div class="team-avatar" data-post-id="' . $post->ID . '"><img src="' . get_the_post_thumbnail_url($post->ID) . '" /></div>';
				$output .= '<div class="team-title">' . $post->post_title . '</div>';
			}
		}
        
		wp_reset_postdata();

        // popup dialog
        $output .= '<div class="team-popup hide" data-nonce="' . wp_create_nonce('get_teams_nonce') . '">team-popup<div class="team-popup-inner"></div></div>';


		return $output;
	}
}

new DIEX_OurTeam;
