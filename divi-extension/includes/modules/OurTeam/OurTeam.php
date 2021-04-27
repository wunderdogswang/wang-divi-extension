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
			'taxonomy' => 'department',
			'hide_empty' => false,
		));

		$output .= '<section class="our-team-section">';

			$output .= '<div class="our-team-content">';
				$output .= '<div class="our-team-content-left"><h2>Our People Make the Difference</h2></div>';
				$output .= '<div class="our-team-content-right"><p>Every member of our team has a true passion for the Sustainable Energy Ecosystem and working with the entrepreneurs that drive its progress. We believe that it takes a true partnership mentality to build great companies and we live that belief every day.</p></div>';
			$output .= '</div>';
			
			$output .= '<div class="our-team-category-row" data-term-id="' . $categories[0]->term_id . '" data-get-team-list-nonce="' . wp_create_nonce('get_team_list_nonce') .'">';
				foreach( $categories as $key => $category ){
					$output .= '<div class="team-category-col">';
						$output .= '<div class="team-category ' . ( $key === 0 ? 'active' : '' ) . '" data-term-id="' . $category->term_id . '">' . $category->name. '</div>';
					$output .= '</div>';
				}
			$output .= '</div>';

			$output .= '<div class="our-team-sort" data-sort="name">Sort By Name</div>';
			$output .= '<div class="our-team-sort" data-sort="position">Sort By Position</div>';

			// get posts
			$args = [
				'post_type' => 'member',
				'posts_per_page' => -1,
				'post_status' => 'publish',
				'tax_query' => [
					[
						'taxonomy' => 'department',
						'field'    => 'term_id',
						'terms'    => $categories[0]->term_id,
					]
				]
			];

			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) {
				global $post;
				
				$output .= '<div class="team-card-row" data-team-nonce="' . wp_create_nonce('get_team_nonce') .'">';
				
					while ( $the_query->have_posts() ) {
						$the_query->the_post();

						$output .= '<div class="team-card-col">';
							$output .= '<div class="team-card" data-post-id="' . $post->ID . '">';
								$output .= '<div class="team-avatar"><img src="' . get_field('avatar', $post->ID) . '" /></div>';
								$output .= '<div class="team-name">' . $post->post_title . '</div>';
								$output .= '<div class="team-role">' . get_field('role', $post->ID) . '</div>';
							$output .= '</div>';
						$output .= '</div>';
					}
					
				$output .= '</div>';
			}
			
			wp_reset_postdata();

		$output .= '</section>';
		$output .= '<div class="ajax-spinner hide"></div>';

		return $output;
	}
}

new DIEX_OurTeam;