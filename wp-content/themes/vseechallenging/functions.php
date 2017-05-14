<?php
/**
 * Vsee Challenging functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Vsee
 * @subpackage Vsee_Challenging
 * @since 1.0
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function vseechallenging_setup() {
	/*
	 * Make theme available for translation.
	 * If you're building a theme based on Vsee Challenging, use a find and replace
	 * to change 'vseechallenging' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'vseechallenging' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'vseechallenging-featured-image', 2000, 1200, true );

	add_image_size( 'vseechallenging-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
//	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'vseechallenging' ),
		'social' => __( 'Social Links Menu', 'vseechallenging' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );
}
add_action( 'after_setup_theme', 'vseechallenging_setup' );

/**
 * Register custom fonts.
 */
function vseechallenging_fonts_url() {
    $font_families = array();
    $font_families[] = 'Open Sans:400italic,300,400,700,800,100';

    $query_args = array(
        'family' => urlencode( implode( '|', $font_families ) ),
        'subset' => urlencode( 'latin,latin-ext' ),
    );

    $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

    return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Vsee Challenging 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function vseechallenging_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'vseechallenging-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'vseechallenging_resource_hints', 10, 2 );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Vsee Challenging 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function vseechallenging_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'vseechallenging' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'vseechallenging_excerpt_more' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Vsee Challenging 1.0
 */
function vseechallenging_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'vseechallenging_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function vseechallenging_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'vseechallenging_pingback_header' );

if ( ! function_exists( 'vseechallenging_edit_link' ) ) :
    /**
     * Returns an accessibility-friendly link to edit a post or page.
     *
     * This also gives us a little context about what exactly we're editing
     * (post or page?) so that users understand a bit more where they are in terms
     * of the template hierarchy and their content. Helpful when/if the single-page
     * layout with multiple posts/pages shown gets confusing.
     */
    function vseechallenging_edit_link() {

        $link = edit_post_link(
            sprintf(
            /* translators: %s: Name of current post */
                __( 'Edit<span class="screen-reader-text"> "%s"</span>', 'vseechallenging' ),
                get_the_title()
            ),
            '<span class="edit-link">',
            '</span>'
        );

        return $link;
    }
endif;

/**
 * Enqueue scripts and styles.
 */
function vseechallenging_scripts() {
    // Add custom fonts, used in the main stylesheet.
    wp_enqueue_style( 'vseechallenging-fonts', vseechallenging_fonts_url(), array(), null );

	// Theme stylesheet.
	wp_enqueue_style( 'vseechallenging-style', get_stylesheet_uri() );

    wp_enqueue_style( 'vseechallenging-bootstrap', get_theme_file_uri( '/css/bootstrap.min.css' ), array( 'vseechallenging-style' ), '1.0' );
    wp_enqueue_style( 'vseechallenging-bootstrap-theme', get_theme_file_uri( '/css/bootstrap-theme.min.css' ), array( 'vseechallenging-style' ), '1.0' );
    wp_enqueue_style( 'vseechallenging-original-style', get_theme_file_uri( '/css/style.css' ), array( 'vseechallenging-style' ), '1.0' );
    wp_enqueue_style( 'vseechallenging-custom-style', get_theme_file_uri( '/css/custom.css' ), array( 'vseechallenging-style' ), '1.0' );

    // Theme js
	wp_enqueue_script( 'bootstrap-js', get_theme_file_uri( '/js/bootstrap.min.js' ), array('jquery'), '3.3.7' );

	wp_enqueue_script( 'vseechallenging-global', get_theme_file_uri( '/js/custom.js' ), array( 'jquery' ), '1.0', true );

	wp_enqueue_script( 'jquery-scrollto', get_theme_file_uri( '/js/jquery.scrollTo.js' ), array( 'jquery' ), '2.1.2', true );
}
add_action( 'wp_enqueue_scripts', 'vseechallenging_scripts' );

/***
 ***	@profile header Override the profile header of ultimatemember plugin to make it as requested
 ***/
add_action('custom_um_profile_header', 'custom_um_profile_header', 10);
function custom_um_profile_header($args) {
    global $ultimatemember;

    $classes = null;

    if ( !$args['cover_enabled'] ) {
        $classes .= ' no-cover';
    }

    $default_size = str_replace( 'px', '', $args['photosize'] );

    $overlay = '<span class="um-profile-photo-overlay">
			<span class="um-profile-photo-overlay-s">
				<ins>
					<i class="um-faicon-camera"></i>
				</ins>
			</span>
		</span>';
    ?>

    <div class="um-header<?php echo $classes; ?>">
        <?php do_action('um_pre_header_editprofile', $args); ?>
        <div class="row">
            <div class="col-md-2 col-xs-12 col-md-offset-3 text-center um-profile-photo" data-user_id="<?php echo um_profile_id(); ?>">
                <a href="<?php echo um_user_profile_url(); ?>" class="um-profile-photo-img" title="<?php echo um_user('display_name') . ', ' . um_user('degree'); ?>">
                    <?php echo $overlay . get_avatar( um_user('ID'), $default_size ); ?>
                </a>
                <?php
                if ( !isset( $ultimatemember->user->cannot_edit ) ) {
                    $ultimatemember->fields->add_hidden_field( 'profile_photo' );

                    if ( !um_profile('profile_photo') ) { // has profile photo
                        $items = array(
                            '<a href="#" class="um-manual-trigger" data-parent=".um-profile-photo" data-child=".um-btn-auto-width">'.__('Upload photo','ultimatemember').'</a>',
                            '<a href="#" class="um-dropdown-hide">'.__('Cancel','ultimatemember').'</a>',
                        );

                        $items = apply_filters('um_user_photo_menu_view', $items );

                        echo $ultimatemember->menu->new_ui( 'bc', 'div.um-profile-photo', 'click', $items );
                    } else if ( $ultimatemember->fields->editing == true ) {
                        $items = array(
                            '<a href="#" class="um-manual-trigger" data-parent=".um-profile-photo" data-child=".um-btn-auto-width">'.__('Change photo','ultimatemember').'</a>',
                            '<a href="#" class="um-reset-profile-photo" data-user_id="'.um_profile_id().'" data-default_src="'.um_get_default_avatar_uri().'">'.__('Remove photo','ultimatemember').'</a>',
                            '<a href="#" class="um-dropdown-hide">'.__('Cancel','ultimatemember').'</a>',
                        );

                        $items = apply_filters('um_user_photo_menu_edit', $items );
                        echo $ultimatemember->menu->new_ui( 'bc', 'div.um-profile-photo', 'click', $items );
                    }
                }
                ?>
            </div>
            <div class="col-md-5 col-xs-12 col-sm-6 col-sm-push-4 col-md-push-0 col-xs-push-0  text-left">
                <div class="um-main-meta">
                    <?php if ( $args['show_name'] ) { ?>
                        <div class="um-name">
                            <a href="<?php echo um_user_profile_url(); ?>" title="<?php echo um_user('display_name') . ', ' . um_user('degree'); ?>"><?php echo um_user('display_name', 'html') . ', ' . um_user('degree'); ?></a>
                            <?php do_action('um_after_profile_name_inline', $args ); ?>
                        </div>
                    <?php } ?>
                    <div class="um-clear"></div>
                    <?php do_action('um_after_profile_header_name_args', $args ); ?>
                    <?php do_action('um_after_profile_header_name'); ?>
                </div>
                <?php if ( isset( $args['metafields'] ) && !empty( $args['metafields'] ) ) { ?>
                    <div class="um-meta">
                        <?php echo $ultimatemember->profile->show_meta( $args['metafields'] ); ?>
                    </div>
                <?php } ?>
                <?php if ( $ultimatemember->fields->viewing == true && um_user('description') && $args['show_bio'] ) { ?>
                    <div class="um-meta-text">
                        <?php
                        $description = get_user_meta( um_user('ID') , 'description', true);
                        if( um_get_option( 'profile_show_html_bio' ) ) : ?>
                            <?php echo make_clickable( wpautop( wp_kses_post( $description ) ) ); ?>
                        <?php else : ?>
                            <?php echo esc_html( $description ); ?>
                        <?php endif; ?>
                    </div>
                <?php } else if ( $ultimatemember->fields->editing == true  && $args['show_bio'] ) { ?>
                    <div class="um-meta-text">
                        <textarea id="um-meta-bio" data-character-limit="<?php echo um_get_option('profile_bio_maxchars'); ?>" placeholder="<?php _e('Tell us a bit about yourself...','ultimatemember'); ?>" name="<?php echo 'description-' . $args['form_id']; ?>" id="<?php echo 'description-' . $args['form_id']; ?>"><?php if ( um_user('description') ) { echo um_user('description'); } ?></textarea>
                        <span class="um-meta-bio-character um-right"><span class="um-bio-limit"><?php echo um_get_option('profile_bio_maxchars'); ?></span></span>
                        <?php
                        if ( $ultimatemember->fields->is_error('description') ) {
                            echo $ultimatemember->fields->field_error( $ultimatemember->fields->show_error('description'), true );
                        }
                        ?>
                    </div>
                <?php } ?>

                <div class="um-profile-status <?php echo um_user('account_status'); ?>">
                    <span><?php printf(__('This user account status is %s','ultimatemember'), um_user('account_status_name') ); ?></span>
                </div>

                <?php do_action('um_after_header_meta', um_user('ID'), $args ); ?>

            </div>
            <div class="um-clear"></div>
            <?php
            if ( $ultimatemember->fields->is_error( 'profile_photo' ) ) {
                echo $ultimatemember->fields->field_error( $ultimatemember->fields->show_error('profile_photo'), 'force_show' );
            }
            ?>

            <?php do_action('um_after_header_info', um_user('ID'), $args); ?>
        </div>
    </div>
<?php
}


function getAllSubscribers() {
    return searchSubscribers();
}

function searchSubscribers($keyword = '') {
    global $wpdb;

    $allUsersWithMetadataQuery = "
        SELECT
            us.ID,
            us.user_login,
            us.user_pass,
            us.user_email,
            m1.meta_value AS fullname,
            m2.meta_value AS degree,
            m3.meta_value AS specialization,
            m4.meta_value AS licensed_state,
            m5.meta_value AS profile_photo,
            m6.meta_value AS url_slug
        FROM $wpdb->users us
        JOIN $wpdb->usermeta m1 ON (m1.user_id = us.ID AND m1.meta_key = 'full_name')
        JOIN $wpdb->usermeta m2 ON (m2.user_id = us.ID AND m2.meta_key = 'degree')
        JOIN $wpdb->usermeta m3 ON (m3.user_id = us.ID AND m3.meta_key = 'specialization')
        JOIN $wpdb->usermeta m4 ON (m4.user_id = us.ID AND m4.meta_key = 'licensed_state')
        JOIN $wpdb->usermeta m5 ON (m5.user_id = us.ID AND m5.meta_key = 'profile_photo')
        JOIN $wpdb->usermeta m6 ON (m6.user_id = us.ID AND m6.meta_key = 'um_user_profile_url_slug_user_login')
        JOIN $wpdb->usermeta m7 ON (m7.user_id = us.ID AND m7.meta_key = 'role')
        JOIN $wpdb->usermeta m8 ON (m8.user_id = us.ID AND m8.meta_key = 'account_status')
        WHERE m7.meta_value = 'member' AND
              m8.meta_value = 'approved'
    ";

    if ($keyword) {
        $pattern = '%' . $keyword . '%';
        $allUsersWithMetadataQuery = $wpdb->prepare(
            $allUsersWithMetadataQuery . "
            AND
                (m1.meta_value LIKE %s OR
                m2.meta_value LIKE %s OR
                m3.meta_value LIKE %s OR
                m4.meta_value LIKE %s)
            ",
            array(
                $pattern,
                $pattern,
                $pattern,
                $pattern
            )
        );
    }

    return $wpdb->get_results($allUsersWithMetadataQuery);
}
function autocomplete_search_scripts() {
    wp_enqueue_script( 'autocomplete-search', get_theme_file_uri( '/js/autocomplete_search.js' ), array('jquery'), '1.0.0', true );

    wp_localize_script( 'autocomplete-search', 'VseeAutocompleteSearchAjax', array(
        // URL to wp-admin/admin-ajax.php to process the request
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        // generate a nonce with a unique ID "vseeautocompletesearchajax-post-comment-nonce"
        // so that you can check it later when an AJAX request is sent
        'security' => wp_create_nonce( 'vsee-autocomplete-search-2017' )
    ));
}
add_action( 'wp_enqueue_scripts', 'autocomplete_search_scripts' );

// The function that handles the AJAX searching users
function autocomplete_search_user_callback() {
    check_ajax_referer( 'vsee-autocomplete-search-2017', 'security' );

    $keyword = trim($_POST['keyword']);

    // Only search if
    if ($keyword) {
        $users = searchSubscribers($keyword);
        set_query_var( 'searchedUsers', $users);
        $html = get_template_part('template-parts/ajax/search', 'search');

        echo $html;
        die(); // this is required to return a proper result
    }
}
add_action( 'wp_ajax_autocomplete_search_user', 'autocomplete_search_user_callback' );
add_action( 'wp_ajax_nopriv_autocomplete_search_user', 'autocomplete_search_user_callback' );