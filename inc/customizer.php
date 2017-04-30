<?php
/**
 * wp_underscore Theme Customizer
 *
 * @package wp_underscore
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wp_underscore_customize_register($wp_customize) {
  $wp_customize->get_setting('blogname')->transport = 'postMessage';
  $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
  $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

  $wp_customize->add_setting('nrphoto_footer_logo', array('default' => ''));
  $wp_customize->add_setting('nrphoto_bio_image', array('default' => ''));
$wp_customize->add_setting('nrphoto_gear_image', array('default' => ''));

  $wp_customize->add_control(
          new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
      'label' => __('Footer Logo', 'nrphoto'),
      'section' => 'title_tagline',
      'priority' => '40',
      'settings' => 'nrphoto_footer_logo'
          )
          )
  );
  
  $wp_customize->add_control(
          new WP_Customize_Image_Control($wp_customize, 'bio_image', array(
      'label' => __('Bio Image', 'nrphoto'),
      'section' => 'title_tagline',
      'priority' => '30',
      'settings' => 'nrphoto_bio_image'
          )
          )
  );
  
  $wp_customize->add_control(
          new WP_Customize_Image_Control($wp_customize, 'gear_image', array(
      'label' => __('Gear Image', 'nrphoto'),
      'section' => 'background_image',
      'priority' => '10',
      'settings' => 'nrphoto_gear_image'
          )
          )
  );
}

add_action( 'customize_register', 'wp_underscore_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wp_underscore_customize_preview_js() {
	wp_enqueue_script( 'wp_underscore_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'wp_underscore_customize_preview_js' );



function nrphoto_social_array() {

	$social_sites = array(
		'twitter'       => 'nrphoto_twitter_profile',
		'facebook'      => 'nrphoto_facebook_profile',
		'pinterest'     => 'nrphoto_pinterest_profile',
		'youtube'       => 'nrphoto_youtube_profile',
                'instagram'     => 'nrphoto_instagram_profile',
		'tumblr'        => 'nrphoto_tumblr_profile',
		'flickr'        => 'nrphoto_flickr_profile'
	);

	return apply_filters( 'nrphoto_social_array_filter', $social_sites );
}

function my_add_customizer_sections( $wp_customize ) {

	$social_sites = nrphoto_social_array();

	// set a priority used to order the social sites
	$priority = 5;

	// section
	$wp_customize->add_section( 'nrphoto_social_media_icons', array(
		'title'       => __( 'Social Media Icons', 'nrphoto' ),
		'priority'    => 25,
		'description' => __( 'Add the URL for each of your social profiles.', 'nrphoto' )
	) );

	// create a setting and control for each social site
	foreach ( $social_sites as $social_site => $value ) {

		$label = ucfirst( $social_site );
		// setting
		$wp_customize->add_setting( $social_site, array(
			'sanitize_callback' => 'esc_url_raw'
		) );
		// control
		$wp_customize->add_control( $social_site, array(
			'type'     => 'url',
			'label'    => $label,
			'section'  => 'nrphoto_social_media_icons',
			'priority' => $priority
		) );
		// increment the priority for next site
		$priority = $priority + 5;
	}
}
add_action( 'customize_register', 'my_add_customizer_sections' );


function my_social_icons_output() {

	$social_sites = nrphoto_social_array();

	foreach ( $social_sites as $social_site => $profile ) {

		if ( strlen( get_theme_mod( $social_site ) ) > 0 ) {
			$active_sites[ $social_site ] = $social_site;
		}
	}

	if ( ! empty( $active_sites ) ) {

		echo '<ul class="social-media-icons">';
		foreach ( $active_sites as $key => $active_site ) { 
        	$class = 'fa fa-' . $active_site; ?>
		 	
				<a class="<?php echo esc_attr( $active_site ); ?>" target="_blank" href="<?php echo esc_url( get_theme_mod( $key ) ); ?>">
					<i class="<?php echo esc_attr( $class ); ?>" title="<?php echo esc_attr( $active_site ); ?>"></i>
				</a>
			
		<?php } 
		echo "</ul>";
	}
}