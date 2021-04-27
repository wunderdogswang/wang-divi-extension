<?php
include_once 'divi-extension/divi-extension.php';

function divi__child_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	 wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/js/main.js' , ['jquery'], '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'divi__child_theme_enqueue_styles' );

//you can add custom functions below this line:


// Create Team Custom Post type

function registerTeamPostType()
{
    $labels = [
        'name'                  => _x('Our Team', 'Team General Name', 'quantum'),
        'singular_name'         => _x('Team', 'Team Singular Name', 'quantum'),
        'menu_name'             => __('Team', 'quantum'),
        'name_admin_bar'        => __('Our Team', 'quantum'),
        'archives'              => __('Item Archives', 'quantum'),
        'attributes'            => __('Item Attributes', 'quantum'),
        'parent_item_colon'     => __('Parent Item:', 'quantum'),
        'all_items'             => __('All Team Members', 'quantum'),
        'add_new_item'          => __('Add New Item', 'quantum'),
        'add_new'               => __('Add New', 'quantum'),
        'new_item'              => __('New Item', 'quantum'),
        'edit_item'             => __('Edit Item', 'quantum'),
        'update_item'           => __('Update Item', 'quantum'),
        'view_item'             => __('View Item', 'quantum'),
        'view_items'            => __('View Team Members', 'quantum'),
        'search_items'          => __('Search Item', 'quantum'),
        'not_found'             => __('Not found', 'quantum'),
        'not_found_in_trash'    => __('Not found in Trash', 'quantum'),
        'featured_image'        => __('Featured Image', 'quantum'),
        'set_featured_image'    => __('Set featured image', 'quantum'),
        'remove_featured_image' => __('Remove featured image', 'quantum'),
        'use_featured_image'    => __('Use as featured image', 'quantum'),
        'insert_into_item'      => __('Insert into item', 'quantum'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'quantum'),
        'items_list'            => __('Items list', 'quantum'),
        'items_list_navigation' => __('Items list navigation', 'quantum'),
        'filter_items_list'     => __('Filter items list', 'quantum'),
    ];
    $args = [
        'label'                 => __('Team', 'quantum'),
        'description'           => __('Member Description', 'quantum'),
        'labels'                => $labels,
        'supports'              => ['title'],
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'publicly_queryable'    => false,
        'capability_type'       => 'page',
        'menu_icon'             => 'dashicons-groups',
    ];
    register_post_type('member', $args);
}

add_action('init', 'registerTeamPostType');

// Create Custom Taxonomy

function registerDepartmentTaxonomy()
{
    $labels = [
        'name'                       => _x('Departments', 'Department General Name', 'quantum'),
        'singular_name'              => _x('Department', 'Department Singular Name', 'quantum'),
        'menu_name'                  => __('Department', 'quantum'),
        'all_items'                  => __('All Departments', 'quantum'),
        'parent_item'                => __('Parent Department', 'quantum'),
        'parent_item_colon'          => __('Parent Department:', 'quantum'),
        'new_item_name'              => __('New Department Name', 'quantum'),
        'add_new_item'               => __('Add New Department', 'quantum'),
        'edit_item'                  => __('Edit Department', 'quantum'),
        'update_item'                => __('Update Department', 'quantum'),
        'view_item'                  => __('View Department', 'quantum'),
        'separate_items_with_commas' => __('Separate Departments with commas', 'quantum'),
        'add_or_remove_items'        => __('Add or remove Departments', 'quantum'),
        'choose_from_most_used'      => __('Choose from the most used', 'quantum'),
        'popular_items'              => __('Popular Departments', 'quantum'),
        'search_items'               => __('Search Departments', 'quantum'),
        'not_found'                  => __('Not Found', 'quantum'),
        'no_terms'                   => __('No Departments', 'quantum'),
        'items_list'                 => __('Departments list', 'quantum'),
        'items_list_navigation'      => __('Departments list navigation', 'quantum'),
    ];
    $args = [
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    ];

    register_taxonomy('department', ['member'], $args);
}

add_action('init', 'registerDepartmentTaxonomy');

// Create Portfolio Custom Post type

function registerPortfolioPostType()
{
    $labels = [
        'name'                  => _x('Portfolio', 'Portfolio General Name', 'quantum'),
        'singular_name'         => _x('Portfolio', 'Portfolio Singular Name', 'quantum'),
        'menu_name'             => __('Portfolio', 'quantum'),
        'name_admin_bar'        => __('Portfolio', 'quantum'),
        'archives'              => __('Item Archives', 'quantum'),
        'attributes'            => __('Item Attributes', 'quantum'),
        'parent_item_colon'     => __('Parent Item:', 'quantum'),
        'all_items'             => __('All Portfolio Items', 'quantum'),
        'add_new_item'          => __('Add New Item', 'quantum'),
        'add_new'               => __('Add New', 'quantum'),
        'new_item'              => __('New Item', 'quantum'),
        'edit_item'             => __('Edit Item', 'quantum'),
        'update_item'           => __('Update Item', 'quantum'),
        'view_item'             => __('View Item', 'quantum'),
        'view_items'            => __('View Team Members', 'quantum'),
        'search_items'          => __('Search Item', 'quantum'),
        'not_found'             => __('Not found', 'quantum'),
        'not_found_in_trash'    => __('Not found in Trash', 'quantum'),
        'featured_image'        => __('Featured Image', 'quantum'),
        'set_featured_image'    => __('Set featured image', 'quantum'),
        'remove_featured_image' => __('Remove featured image', 'quantum'),
        'use_featured_image'    => __('Use as featured image', 'quantum'),
        'insert_into_item'      => __('Insert into item', 'quantum'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'quantum'),
        'items_list'            => __('Items list', 'quantum'),
        'items_list_navigation' => __('Items list navigation', 'quantum'),
        'filter_items_list'     => __('Filter items list', 'quantum'),
    ];
    $args = [
        'label'                 => __('Portfolio', 'quantum'),
        'description'           => __('Portfolio Description', 'quantum'),
        'labels'                => $labels,
        'supports'              => ['title'],
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'publicly_queryable'    => false,
        'capability_type'       => 'page',
        'menu_icon'             => 'dashicons-portfolio',
    ];
    register_post_type('portfolio', $args);
}

add_action('init', 'registerPortfolioPostType');

// Create Custom Taxonomy

function registerPortfolioTaxonomy()
{
    $labels = [
        'name'                       => _x('Portfolio categories', 'Portfolio categories General Name', 'quantum'),
        'singular_name'              => _x('Portfolio category', 'Department Singular Name', 'quantum'),
        'menu_name'                  => __('Portfolio categories', 'quantum'),
        'all_items'                  => __('All Portfolio categories', 'quantum'),
        'parent_item'                => __('Parent Portfolio categories', 'quantum'),
        'parent_item_colon'          => __('Parent Portfolio categories:', 'quantum'),
        'new_item_name'              => __('New Portfolio category Name', 'quantum'),
        'add_new_item'               => __('Add New Portfolio category', 'quantum'),
        'edit_item'                  => __('Edit Portfolio category', 'quantum'),
        'update_item'                => __('Update Portfolio category', 'quantum'),
        'view_item'                  => __('View Portfolio category', 'quantum'),
        'separate_items_with_commas' => __('Separate Portfolio categories with commas', 'quantum'),
        'add_or_remove_items'        => __('Add or remove Portfolio categories', 'quantum'),
        'choose_from_most_used'      => __('Choose from the most used', 'quantum'),
        'popular_items'              => __('Popular Portfolio category', 'quantum'),
        'search_items'               => __('Search Portfolio categories', 'quantum'),
        'not_found'                  => __('Not Found', 'quantum'),
        'no_terms'                   => __('No Portfolio categories', 'quantum'),
        'items_list'                 => __('Portfolio category list', 'quantum'),
        'items_list_navigation'      => __('Portfolio category list navigation', 'quantum'),
    ];
    $args = [
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    ];

    register_taxonomy('portfolio-category', ['portfolio'], $args);
}

add_action('init', 'registerPortfolioTaxonomy');

// add custom fields to Team and Portfolio
function set_custom_edit_portfolio_columns($columns)
{
    return [
        'cb' => $columns['cb'],
        'title' => $columns['title'],
        'taxonomy-portfolio-category' => $columns['taxonomy-portfolio-category'],
        'headquarters' => 'Headquarters',
        'year-of-investment' => 'Year of Investment',
        'leadership' => 'Leadership',
        'date' => $columns['date'],
    ];
}

add_filter('manage_portfolio_posts_columns', 'set_custom_edit_portfolio_columns');

function custom_portfolio_column($column, $post_id)
{
    if ($column == 'headquarters') {
        echo get_field('headquarters', $post_id);
    } else if ($column == 'year-of-investment') {
        echo get_field('year_of_investment', $post_id);
    } else if ($column == 'leadership') {
        echo get_field('leadership', $post_id);
    }
}
add_action('manage_portfolio_posts_custom_column', 'custom_portfolio_column', 10, 2);

function set_custom_edit_member_columns($columns)
{
    return [
        'cb' => $columns['cb'],
        'avatar' => 'Avatar',
        'title' => $columns['title'],
        'role' => 'Role',
        'position_ranking' => 'Position Ranking',
        'taxonomy-department' => $columns['taxonomy-department'],
        'date' => $columns['date'],
    ];
}

add_filter('manage_member_posts_columns', 'set_custom_edit_member_columns');

function custom_member_column($column, $post_id)
{
    if ($column == 'avatar') {
        $avatar = get_field('avatar', $post_id);
        if (!empty($avatar)) {
            echo '<img src="' . $avatar . '" alt="avatar" style="width: 150px;"/>';
        }
    } else if ($column == 'role') {
        echo get_field('role', $post_id);
    } else if ($column == 'position_ranking') {
        echo get_field('position_ranking', $post_id);
    }
}

add_action('manage_member_posts_custom_column', 'custom_member_column', 10, 2);

// wp ajax for portfoilo and our team
add_action('wp_ajax_get_portfolio', 'getPortfolioFunc');
add_action('wp_ajax_nopriv_get_portfolio', 'getPortfolioFunc');

function getPortfolioFunc()
{
    if (!wp_verify_nonce($_REQUEST['nonce'], 'get_portfolio_nonce')) {
        exit('No naughty business please');
    }

    $postId = intval($_REQUEST['postId']);
    $portfolio = get_post($postId);

    $Headquarters = get_field('headquarters', $postId);
    $year_of_investment = get_field('year_of_investment', $postId);
    $description = get_field('description', $postId);
    $visit_website = get_field('visit_website', $postId);
    $leadership = get_field('leadership', $postId);

    $result = [];
    $result['html'] = "
        <div class=\"popup-portfolio-row\">
            <div class=\"popup-portfolio-paginavigations\">
                <div class=\"popup-portfolio-paginavigation--back\">Back</div>
                <div class=\"popup-portfolio-paginavigations--next\">Next</div>
            </div>
            <div class=\"popup-portfolio-close\">Close</div>
            <div class=\"popup-portfolio-left\">
                <div class=\"popup-portfolio-image\"></div>
                <div class=\"popup-portfolio-leadership\">
                    <h3>leadership</h3>
                    <p>{$leadership}</p>
                </div>
            </div>
            <div class=\"popup-portfolio-right\">
                <div class=\"popup-portfolio-title\">
                    <h2>{$portfolio->post_title}</h2>
                    <a href=\"#linkedin\">Linkedin</a>
                </div>
                <div class=\"popup-portfolio-meta\"><span>Headquarters:</span> {$Headquarters}</div>
                <div class=\"popup-portfolio-meta\"><span>Year of investment:</span> {$year_of_investment}</div>
                <div class=\"popup-portfolio-content\"><p>{$description}</p></div>
                <div class=\"popup-portfolio-link\"><a href=\"{$visit_website}\">Visit Website</a></div>
            </div>
        </div>
    ";

    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $result = json_encode($result);
        echo $result;
    } else {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

    die();
}

add_action('wp_ajax_get_team_list', 'getTeamListFunc');
add_action('wp_ajax_nopriv_get_team_list', 'getTeamListFunc');

function getTeamListFunc()
{
    if (!wp_verify_nonce($_REQUEST['nonce'], 'get_team_list_nonce')) {
        exit('No naughty business please');
    }

    $termId = intval($_REQUEST['termId']);
    $sortType = $_REQUEST['sortType'];
    
    $args = [
        'post_type' => 'member',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'tax_query' => [
            [
                'taxonomy' => 'department',
                'field'    => 'term_id',
                'terms'    => $termId,
            ]
        ]
    ];

    if( $sortType === 'name' ){
        $args['orderby'] = 'title';
        $args['order'] = 'ASC';
    } else if( $sortType === 'position' ){
        $args['orderby'] = 'meta_value_num';
        $args['meta_key'] = 'position_ranking';
        $args['order'] = 'ASC';
    }

    $the_query = new WP_Query( $args );

    $output = '';

    if ( $the_query->have_posts() ) {
        global $post;
        
        $output .= '<div class="team-card-row">';
        
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
    $result['html'] = $output;

    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $result = json_encode($result);
        echo $result;
    } else {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

    die();
}

add_action('wp_ajax_get_team', 'getTeamFunc');
add_action('wp_ajax_nopriv_get_team', 'getTeamFunc');

function getTeamFunc()
{
    if (!wp_verify_nonce($_REQUEST['nonce'], 'get_team_nonce')) {
        exit('No naughty business please');
    }

    $postId = intval($_REQUEST['postId']);
    $team = get_post($postId);

    $my_energy = get_field('my_energy', $postId);
    $role = get_field('role', $postId);
    $bio = get_field('bio', $postId);

    $result = [];
    $result['html'] = "
        <div class=\"popup-team-row\">
            <div class=\"popup-team-paginavigations\">
                <div class=\"popup-team-paginavigation--back\">Back</div>
                <div class=\"popup-team-paginavigations--next\">Next</div>
            </div>
            <div class=\"popup-team-close\">Close</div>
            <div class=\"popup-team-left\">
                <div class=\"popup-team-image\"></div>
                <div class=\"popup-team-energy\">
                    <h3>MY ENERGY COMES FROM:</h3>
                    <p>{$my_energy}</p>
                </div>
            </div>
            <div class=\"popup-team-right\">
                <div class=\"popup-team-title\">
                    <h2>{$team->post_title}</h2>
                    <a href=\"#linkedin\">Linkedin</a>
                </div>
                <div class=\"popup-team-role\">{$role}</div>
                <div class=\"popup-team-bio\"><p>{$bio}</p></div>
            </div>
        </div>
    ";

    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $result = json_encode($result);
        echo $result;
    } else {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

    die();
}