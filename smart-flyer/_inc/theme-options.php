<?php
/**
 * CMB2 Theme Options
 * @version 0.1.0
 */
class Exsite_Admin {

	/**
 	 * Option key, and option page slug
 	 * @var string
 	 */
	private $key = 'exsite_options';

	/**
 	 * Options page metabox id
 	 * @var string
 	 */
	private $metabox_id = 'exsite_option_metabox';

	/**
	 * Options Page title
	 * @var string
	 */
	protected $title = '';

	/**
	 * Options Page hook
	 * @var string
	 */
	protected $options_page = '';

	/**
	 * Constructor
	 * @since 0.1.0
	 */
	public function __construct() {
		// Set our title
		$this->title = __( 'Site Options', 'exsite' );
	}

	/**
	 * Initiate our hooks
	 * @since 0.1.0
	 */
	public function hooks() {
		add_action( 'admin_init', array( $this, 'init' ) );
		add_action( 'admin_menu', array( $this, 'add_options_page' ) );
		add_action( 'cmb2_admin_init', array( $this, 'add_options_page_metabox' ) );
	}


	/**
	 * Register our setting to WP
	 * @since  0.1.0
	 */
	public function init() {
		register_setting( $this->key, $this->key );
	}

	/**
	 * Add menu options page
	 * @since 0.1.0
	 */
	public function add_options_page() {
		$this->options_page = add_menu_page( $this->title, $this->title, 'manage_options', $this->key, array( $this, 'admin_page_display' ) );

		// Include CMB CSS in the head to avoid FOUT
		add_action( "admin_print_styles-{$this->options_page}", array( 'CMB2_hookup', 'enqueue_cmb_css' ) );
	}

	/**
	 * Admin page markup. Mostly handled by CMB2
	 * @since  0.1.0
	 */
	public function admin_page_display() {
		?>
		<div class="wrap cmb2-options-page <?php echo $this->key; ?>">
			<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
			<?php cmb2_metabox_form( $this->metabox_id, $this->key ); ?>
		</div>
		<?php
	}

	/**
	 * Add the options metabox to the array of metaboxes
	 * @since  0.1.0
	 */
	function add_options_page_metabox() {

		$cmb = new_cmb2_box( array(
			'id'         => $this->metabox_id,
			'hookup'     => false,
			'cmb_styles' => false,
			'show_on'    => array(
				// These are important, don't remove
				'key'   => 'options-page',
				'value' => array( $this->key, )
			),
		) );
		
		
		$cmb->add_field( array(
			'name' => __( 'Phone Number', 'exsite' ),
			'id'   => 'phone',
			'type' => 'text',
		) );
		
		
		$cmb->add_field( array(
			'name' => __( 'Instagram', 'exsite' ),
			'id'   => 'instagram',
			'type' => 'text',
					'desc'	=> '<a href="https://api.instagram.com/oauth/authorize?app_id=592485698154016&redirect_uri=https%3A%2F%2Fmadebyarticle.com%2Finsta-auth%2F&scope=user_profile,user_media&response_type=code&state=thesmartflyer" target="_blank">Click here to connect Instagram</a>'
		) );
		
		$cmb->add_field( array(
			'name' => __( 'Facebook', 'exsite' ),
			'id'   => 'facebook',
			'type' => 'text',
		) );
			
		
		$cmb->add_field( array(
			'name' => __( 'Twitter', 'exsite' ),
			'id'   => 'twitter',
			'type' => 'text',
		) );
		
		$cmb->add_field( array(
			'name' => __( 'Snapchat', 'exsite' ),
			'id'   => 'snapchat',
			'type' => 'text',
		) );	
		
		$cmb->add_field( array(
			'name' => __( 'Pinterest', 'exsite' ),
			'id'   => 'pinterest',
			'type' => 'text',
		) );
		
		$cmb->add_field( array(
			'name' => __( 'Book Now Text', 'exsite' ),
			'id'   => 'book_now',
			'type' => 'textarea_small',
		) );

		
		$cmb->add_field( array(
		    'name' => 'SMART FLYER HEADQUARTERS',
		    'type' => 'title',
		    'id'   => 'head_quarters'
		) );
		
		
		$cmb->add_field( array(
			'name' => __( 'Address Line 1', 'exsite' ),
			'id'   => 'address_line_1',
			'type' => 'text',
		) );	
		
		
		$cmb->add_field( array(
			'name' => __( 'Address Line 2', 'exsite' ),
			'id'   => 'address_line_2',
			'type' => 'text',
		) );	
		
		
		$cmb->add_field( array(
			'name' => __( 'Directions link', 'exsite' ),
			'id'   => 'directions_link',
			'type' => 'text',
		) );
		
		$cmb->add_field( array(
			'name' => __( 'Tel', 'exsite' ),
			'id'   => 'tel',
			'type' => 'text',
		) );
		
		$cmb->add_field( array(
			'name' => __( 'Fax', 'exsite' ),
			'id'   => 'fax',
			'type' => 'text',
		) );
		
		$cmb->add_field( array(
			'name' => __( 'Toll-Free', 'exsite' ),
			'id'   => 'tollfree',
			'type' => 'text',
		) );
		
		
		$cmb->add_field( array(
		    'name' => 'HP Options',
		    'type' => 'title',
		    'id'   => 'hp_options'
		) );
		
		$cmb->add_field( array(
			'name' => __( 'Hero Large', 'exsite' ),
			'id'   => 'hp_hero_large',
			'type' => 'file',
		) );
		
		/*
		$cmb->add_field( array(
			'name' => __( 'Hero Small', 'exsite' ),
			'id'   => 'hp_hero_small',
			'type' => 'file',
		) );
		*/
		
		
		$cmb->add_field(array(
			'name' => __('Story/Review hero', 'theme_exsite'),
			'id' => 'hp_hero_story_review',
			'type'      	=> 'post_search_ajax',
			'desc'			=> __( '(Start typing title)', 'cmb2' ),
			'limit'      	=> 1, 
			'sortable' 	 	=> true,
			'query_args'	=> array(
				'post_type'			=> array( 'post','review' ),
				'post_status'		=> array( 'publish' ),
				'posts_per_page'	=> 10
			)
		));
		
		/*
		$cmb->add_field( array(
			'name' => __( 'Hero Link', 'exsite' ),
			'id'   => 'hp_hero_link',
			'type' => 'text',
		) );
*/
		$cmb->add_field( array(
			'name' => __( 'Hero Link Text', 'exsite' ),
			'id'   => 'hp_hero_link_text',
			'type' => 'text',
		) );
		
		/*
		$cmb->add_field( array(
			'name'    => 'Hero type',
			'id'      => 'hp_hero_type',
			'type'    => 'radio_inline',
			'options' => array(
				'reviews' => __( 'Reviews', 'cmb2' ),
				'stories'   => __( 'Stories', 'cmb2' ),
			),
			'default' => 'stories',
		) );
		*/
		
		
		$cmb->add_field(array(
			'name' => __('Story/Review Overrides', 'theme_exsite'),
			'id' => 'hp_overrides',
			'type'      	=> 'post_search_ajax',
			'desc'			=> __( '(Start typing title)', 'cmb2' ),
			'limit'      	=> 2, 
			'sortable' 	 	=> true,
			'query_args'	=> array(
				'post_type'			=> array( 'post','review' ),
				'post_status'		=> array( 'publish' ),
				'posts_per_page'	=> 10
			)
		));
		
		$cmb->add_field( array(
			'name' => __( 'Welcome Headline', 'exsite' ),
			'id'   => 'welcome_headline',
			'type' => 'text',
		) );
		
		$cmb->add_field( array(
			'name' => __( 'Welcome Text', 'exsite' ),
			'id'   => 'welcome_text',
			'type' => 'textarea',
		) );
		
		
		
		$cmb->add_field( array(
		    'name' => 'Why Smartflyer?',
		    'type' => 'title',
		    'id'   => 'why_smartflyer'
		) );
		
		$cmb->add_field( array(
		    'name' => 'Why Smartflyer Video',
		    'type' => 'file',
		    'id'   => 'video_why_smartflyer'
		) );
		
		$cmb->add_field( array(
			'name' => __( 'Section 1 Title', 'exsite' ),
			'id'   => 'why_section_1_title',
			'type' => 'text',
		) );
		
		$cmb->add_field( array(
			'name' => __( 'Section 1', 'exsite' ),
			'id'   => 'why_section_1',
			'type' => 'textarea_small',
		) );
		
		$cmb->add_field( array(
			'name' => __( 'Section 2 Title', 'exsite' ),
			'id'   => 'why_section_2_title',
			'type' => 'text',
		) );
		
		$cmb->add_field( array(
			'name' => __( 'Section 2', 'exsite' ),
			'id'   => 'why_section_2',
			'type' => 'textarea_small',
		) );
		
		$cmb->add_field( array(
			'name' => __( 'Section 3 Title', 'exsite' ),
			'id'   => 'why_section_3_title',
			'type' => 'text',
		) );
		
		$cmb->add_field( array(
			'name' => __( 'Section 3', 'exsite' ),
			'id'   => 'why_section_3',
			'type' => 'textarea_small',
		) );
		
		$cmb->add_field( array(
			'name' => __( 'Section 4 Title', 'exsite' ),
			'id'   => 'why_section_4_title',
			'type' => 'text',
		) );
		
		$cmb->add_field( array(
			'name' => __( 'Section 4', 'exsite' ),
			'id'   => 'why_section_4',
			'type' => 'textarea_small',
		) );
		
		/*
		$cmb->add_field( array(
			'name' => __( 'CTA Text', 'exsite' ),
			'id'   => 'why_cta_text',
			'type' => 'text',
		) );
		
		$cmb->add_field( array(
			'name' => __( 'CTA Link', 'exsite' ),
			'id'   => 'why_cta_link',
			'type' => 'text',
		) );
		
		
		$cmb->add_field( array(
		    'name' => 'Blue Bar',
		    'type' => 'title',
		    'id'   => 'blue_abr'
		) );
		
		$cmb->add_field( array(
			'name' => __( 'Blue Bar Title', 'exsite' ),
			'id'   => 'bb_title',
			'type' => 'text',
		) );
		
		$cmb->add_field( array(
			'name' => __( 'Blue Bar Text', 'exsite' ),
			'id'   => 'bb_text',
			'type' => 'textarea_small',
		) );
		
		$cmb->add_field( array(
			'name' => __( 'Blue Bar Image', 'exsite' ),
			'id'   => 'bb_img',
			'type' => 'file',
		) );
		*/
		
		
		
		$cmb->add_field( array(
			'name' => __( 'Review Title', 'exsite' ),
			'id'   => 'review_title',
			'type' => 'text',
		) );
		
		$cmb->add_field( array(
			'name' => __( 'Review text', 'exsite' ),
			'id'   => 'review_text',
			'type' => 'textarea_small',
		) );
		
		
		$cmb->add_field( array(
			'name' => __( 'Stories Title', 'exsite' ),
			'id'   => 'stories_title',
			'type' => 'text',
		) );
		
		$cmb->add_field( array(
			'name' => __( 'Stories text', 'exsite' ),
			'id'   => 'stories_text',
			'type' => 'textarea_small',
		) );
		
		
		
		
		$args = array(
			'post_type' => 'agent',
			'numberposts' => -1,
			'orderby' => 'title',
			'order' => 'ASC',
		);
		$post_options = array();
		$post_options[] = 'Select Featured Agent';
		$posts = get_posts( $args );
		if ( $posts ) {
			foreach ( $posts as $post ) {
				$post_options[ $post->ID ] = $post->post_title;
			}
		}
		
		$cmb->add_field( array(
			'name'    => __( 'Featured Agent', 'cmb2' ),
			'id'      => 'featured_agent',
			'type'    => 'pw_select',
			'options' => $post_options
		) );
		
		
		
		$cmb->add_field( array(
			'name' => __( 'Get In Touch Form ID', 'exsite' ),
			'id'   => 'get_in_touch_id',
			'type' => 'text',
		) );
		
		
		$cmb->add_field( array(
		    'name' => 'Team',
		    'type' => 'title',
		    'id'   => 'team_options'
		) );
		
		
		$cmb->add_field( array(
			'name' => __( 'Title', 'exsite' ),
			'id'   => 'team_title',
			'type' => 'text',
		) );
		
		$cmb->add_field( array(
			'name' => __( 'text', 'exsite' ),
			'id'   => 'team_text',
			'type' => 'textarea_small',
		) );
		
		
		$cmb->add_field( array(
			'name'    => __( 'Featured Agents', 'cmb2' ),
			'id'      => 'team_featured_agents',
			'type'    => 'pw_multiselect',
			'options' => $post_options
		) );
		
		
		
		$terms = get_terms( array('taxonomy' => 'agent_specialty' ));
		$tag_options = array();
		if ( $terms ) {
			foreach ( $terms as $term ) {
				$tag_options[ $term->term_id ] = $term->name;
			}
		}
		
		$cmb->add_field( array(
			'name'    => __( 'Default Specialty', 'cmb2' ),
			'id'      => 'team_specialty_default',
			'type'    => 'pw_select',
			'options' => $tag_options
		) );
		
		$cmb->add_field( array(
			'name' => __( 'Join Team Title', 'exsite' ),
			'id'   => 'join_team_title',
			'type' => 'text',
		) );
		
		$cmb->add_field( array(
			'name' => __( 'Join Team Link', 'exsite' ),
			'id'   => 'join_team_link',
			'type' => 'text',
		) );
		
		$cmb->add_field( array(
			'name' => __( 'Join Team Description', 'exsite' ),
			'id'   => 'join_team_subhead',
			'type' => 'textarea_small',
		) );
		
		
		
		$cmb->add_field( array(
		    'name' => 'Reviews',
		    'type' => 'title',
		    'id'   => 'review_options'
		) );
		
		
		$args = array(
			'post_type' => 'review',
			'numberposts' => -1,
			'orderby' => 'title',
			'order' => 'ASC',
		);
		$post_options = array();
		$posts = get_posts( $args );
		if ( $posts ) {
			foreach ( $posts as $post ) {
				$post_options[ $post->ID ] = $post->post_title;
			}
		}
		
		$cmb->add_field( array(
			'name'    => __( 'Agent Favourites', 'cmb2' ),
			'id'      => 'review_agent_favs',
			'type'    => 'pw_multiselect',
			'options' => $post_options
		) );
		
		
		$args = array(
			'post_type' => 'partner',
			'numberposts' => -1,
			'orderby' => 'title',
			'order' => 'ASC',
		);
		$post_options = array();
		$posts = get_posts( $args );
		if ( $posts ) {
			foreach ( $posts as $post ) {
				$post_options[ $post->ID ] = $post->post_title;
			}
		}
		
		$cmb->add_field( array(
			'name'    => __( 'Featured Partner', 'cmb2' ),
			'id'      => 'review_feat_partner',
			'type'    => 'pw_select',
			'options' => $post_options
		) );
		
		
		$terms = get_terms( array('taxonomy' => 'review_region', 'hide_empty' => false ));
		$tag_options = array();
		if ( $terms ) {
			foreach ( $terms as $term ) {
				$tag_options[ $term->term_id ] = $term->name;
			}
		}
		
		$cmb->add_field( array(
			'name'    => __( 'Discover', 'cmb2' ),
			'id'      => 'review_discover',
			'type'    => 'pw_select',
			'options' => $tag_options
		) );
		
		
		$terms = get_terms( array('taxonomy' => 'review_style', 'hide_empty' => false ));
		$tag_options = array();
		if ( $terms ) {
			foreach ( $terms as $term ) {
				$tag_options[ $term->term_id ] = $term->name;
			}
		}
		
		$cmb->add_field( array(
			'name'    => __( 'Best Of', 'cmb2' ),
			'id'      => 'review_best_of',
			'type'    => 'pw_multiselect',
			'options' => $tag_options
		) );
		
		
		
		$cmb->add_field( array(
		    'name' => 'Instagram Footer',
		    'type' => 'title',
		    'id'   => 'insta_footer'
		) );
		
		$cmb->add_field( array(
			'name' => __( 'Title', 'exsite' ),
			'id'   => 'insta_title',
			'type' => 'text',
		) );
		
		$cmb->add_field( array(
			'name' => __( 'text', 'exsite' ),
			'id'   => 'insta_text',
			'type' => 'textarea_small',
		) );

		
		$cmb->add_field( array(
		    'name' => 'Explore Page',
		    'type' => 'title',
		    'id'   => 'explore_title'
		) );
		
		$cmb->add_field( array(
			'name' => __( 'Text', 'exsite' ),
			'id'   => 'explore_text',
			'type' => 'text',
		) );

	}

	/**
	 * Public getter method for retrieving protected/private variables
	 * @since  0.1.0
	 * @param  string  $field Field to retrieve
	 * @return mixed          Field value or exception is thrown
	 */
	public function __get( $field ) {
		// Allowed fields to retrieve
		if ( in_array( $field, array( 'key', 'metabox_id', 'title', 'options_page' ), true ) ) {
			return $this->{$field};
		}

		throw new Exception( 'Invalid property: ' . $field );
	}

}

/**
 * Helper function to get/return the Exsite_Admin object
 * @since  0.1.0
 * @return Exsite_Admin object
 */
function exsite_admin() {
	static $object = null;
	if ( is_null( $object ) ) {
		$object = new Exsite_Admin();
		$object->hooks();
	}

	return $object;
}

/**
 * Wrapper function around cmb2_get_option
 * @since  0.1.0
 * @param  string  $key Options array key
 * @return mixed        Option value
 */
function exsite_get_option( $key = '' ) {
	return cmb2_get_option( exsite_admin()->key, $key );
}

// Get it started
exsite_admin();