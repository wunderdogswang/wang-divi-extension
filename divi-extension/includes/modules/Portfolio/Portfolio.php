<?php

class DIEX_Porftolio extends ET_Builder_Module {

	public $slug       = 'diex_portfolio';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => '',
		'author'     => '',
		'author_uri' => '',
	);

	public function init() {
		$this->name = esc_html__( 'Portfolio', 'diex-divi-extension' );
	}

	public function get_fields() {
		return [];
	}

	public function render( $attrs, $content = null, $render_slug ) {

		$output = '';

        // get terms
        $categories = get_terms(array(
			'taxonomy' => 'portfolio-category',
			'hide_empty' => false,
		));

		$output .= '<section class="portfolio-section">';
			
			$output .= '<div class="portfolio-category-row">';
					$output .= '<div class="portfolio-category-col">';
						$output .= '<div class="portfolio-category active" data-term-id="0">All</div>';
					$output .= '</div>';
				foreach( $categories as $category ){
					$output .= '<div class="portfolio-category-col">';
						$output .= '<div class="portfolio-category" data-term-id="' . $category->term_id . '">' . $category->name. '</div>';
					$output .= '</div>';
				}
			$output .= '</div>';

			// get posts
			$args = [
				'post_type' => 'portfolio',
				'posts_per_page' => -1,
				'post_status' => 'publish'
			];

			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) {
				global $post;
				
				$output .= '<div class="portfolio-card-row" data-portfolio-nonce="' . wp_create_nonce('get_portfolio_nonce') .'">';
				
					while ( $the_query->have_posts() ) {
						$the_query->the_post();

						$catList = get_the_terms($post->ID, 'portfolio-category');
						$catStr = '';
						$catClass = '';
						
						foreach( $catList as $cat ){
							if( !empty($catStr) ) $catStr .= ', ';

							$catStr .=  $cat->name;
							$catClass .= ' portfolio-card-col-term-' . $cat->term_id;
						}

						$output .= '<div class="portfolio-card-col ' . $catClass . '">';
							$output .= '<div class="portfolio-card" data-post-id="' . $post->ID . '">';
								$output .= '<div class="portfolio-image"></div>';
								$output .= '<div class="portfolio-name">' . $post->post_title . '</div>';
								$output .= '<div class="portfolio-role">' . $catStr . '</div>';
								$output .= '<div class="portfolio-link">View info</div>';
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

new DIEX_Porftolio;
