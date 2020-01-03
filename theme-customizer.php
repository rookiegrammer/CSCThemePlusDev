<?php


function csc_fetch_settings() {
	return array (
		array (
			'title' => 'General',
			'id' => 'csc_mod_general_section',
			'settings' => array (
				array (
					'type' => 'text',
					'label' => 'Display Title',
					'id' => 'display_title',
					'default' => 'Cordillera Studies'
				),
				array (
					'type' => 'text',
					'label' => 'Display Title Prefix',
					'id' => 'display_title_prefix',
					'default' => '3rd International Conference on'
				),
				array (
					'type' => 'text',
					'label' => 'Base Font Size',
					'id' => 'display_font_size',
					'default' => '16',
					'description' =>'Font size in pixels'
				),
				array (
					'type' => 'text',
					'label' => 'Post/Page Text Line Spacing',
					'id' => 'display_line_height',
					'default' => '1.5'
				),
				array (
					'type' => 'text',
					'label' => 'Feature Percentage Padding',
					'id' => 'display_feature_padding',
					'default' => '20',
					'description' =>'Space a feature\'s content is padded left or padded right (in percentage)'
				),
				array (
					'type' => 'color',
					'label' => 'Front Title Text Color',
					'id' => 'title_text_color',
					'default' => '#fff'
				),
				array (
					'type' => 'image',
					'label' => 'Front Page Image',
					'id' => 'display_image',
					'default' => get_template_directory_uri().'/img/hero.jpg'
				),
				array (
					'type' => 'image',
					'label' => 'Front Page Overlay Image',
					'id' => 'display_image_overlay',
					'default' => get_template_directory_uri().'/img/feature.png',
					'description'=> 'For best results upload a long portrait PNG image with a transparent background.'
				)
			)
		),
		array (
			'title' => 'Banner',
			'id' => 'csc_mod_banner_section',
			'settings' => array (
				array (
					'type' => 'checkbox',
					'label' => 'Enable Main Banner Image Filter',
					'id' => 'display_header_filter_enable',
					'default' => 'checked'
				),
				array (
					'type' => 'text',
					'label' => 'Page/Post Banner Desktop Scale Size',
					'id' => 'display_banner_desktop_size',
					'default' => '3.0',
					'description'=> 'Scales up or scales down relative to original value'
				),
				array (
					'type' => 'text',
					'label' => 'Page/Post Banner Mobile Scale Size',
					'id' => 'display_banner_mobile_size',
					'default' => '1.5',
					'description'=> 'Scales up or scales down relative to original value'
				),
				array (
					'type' => 'text',
					'label' => 'Post Date Scale Size',
					'id' => 'display_post_date_scale',
					'default' => '1.0',
					'description'=> 'Scales up or scales down relative to original value'
				)
			)
		),
		array (
			'title' => 'Speaker Display',
			'id' => 'csc_mod_speaker_section',
			'settings' => array (
				array (
					'type' => 'checkbox',
					'label' => 'Enable Thumbnail Border',
					'id' => 'display_speaker_border_enable',
					'default' => 'checked'
				),
				array (
					'type' => 'checkbox',
					'label' => 'Enable Round Thumbnails',
					'id' => 'display_speaker_round_enable',
					'default' => ''
				),
				array (
					'type' => 'text',
					'label' => 'Thumbnail Pixel Size',
					'id' => 'display_speaker_thumb_size',
					'default' => '80',
					'description' =>'Pixel size of a Speaker Thumbnail'
				),
				array (
					'type' => 'text',
					'label' => 'Text Scale Size',
					'id' => 'display_speaker_scale_size',
					'default' => '1.0',
					'description' =>'Scale size of a speaker\'s feature text'
				)
			)
		),
		array (
			'title' => 'Conference Details',
			'id' => 'csc_mod_confdetails_section',
			'settings' => array (
				array (
					'type' => 'checkbox',
					'label' => 'Show Conference Details',
					'id' => 'enable_conf_details',
					'default' => 'checked'
				),
				array (
					'type' => 'text',
					'label' => 'Displayed Date',
					'id' => 'display_date',
					'default' => 'July 2020'
				),
				array (
					'type' => 'text',
					'label' => 'Start Date',
					'id' => 'start_date',
					'default' => '2020-07-01T12:00',
					'description' => 'Date in format YYYY-MM-DD\'T\'HH:MM'
				),
				array (
					'type' => 'text',
					'label' => 'Place',
					'id' => 'display_place',
					'default' => 'UP Baguio'
				)
			)
		),
		array (
			'title' => 'Alert',
			'id' => 'csc_mod_alert_section',
			'settings' => array (
				array (
					'type' => 'checkbox',
					'label' => 'Enable',
					'id' => 'display_alert_enable',
					'default' => 'checked'
				),
				array (
					'type' => 'text',
					'label' => 'Text',
					'id' => 'display_alert_text',
					'default' => 'Papers are still accepted! Send one?'
				),
				array (
					'type' => 'text',
					'label' => 'Action Title',
					'id' => 'display_alert_link_text',
					'default' => 'Send'
				),
				array (
					'type' => 'text',
					'label' => 'Action Link',
					'id' => 'display_alert_link',
					'default' => ''
				)
			)
		),
		array (
			'title' => 'Social Links',
			'id' => 'csc_mod_social_section',
			'settings' => array (
				array (
					'type' => 'text',
					'label' => 'Facebook Link',
					'id' => 'social_facebook',
					'default' => ''
				),
				array (
					'type' => 'text',
					'label' => 'Twitter Link',
					'id' => 'social_twitter',
					'default' => ''
				)
			)
		)

	);
}

function csc_customize_register( $wp_customize ){
	$priority = 30;

	foreach (csc_fetch_settings() as $section) {
		$wp_customize->add_section( $section['id'] , array(
		  'title'				=>	$section['title'],
		  'priority'			=>	$priority
		));
		foreach ($section['settings'] as $setting) {
			$wp_customize->add_setting( $setting['id'], array(
	      'default'			=>	isset($setting['default']) ? $setting['default'] : false,
	      'transport'			=>	'refresh'
	    ));
			switch ($setting['type']) {

				case 'image':
					$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, $setting['id'], array(
			      'type'		=>	'image',
						'section'	=>	$section['id'],
						'label'		=>	$setting['label'],
						'description' => (isset($setting['description']) ? $setting['description'] : '')
			      )
			    ));
					break;

				case 'color':
					$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, $setting['id'], array(
						'section'	=>	$section['id'],
						'label'		=>	$setting['label'],
						'description' => (isset($setting['description']) ? $setting['description'] : '')
						)
					));
					break;

				default:
					$wp_customize->add_control( $setting['id'], array(
						'type'		=>	$setting['type'],
						'section'	=>	$section['id'],
						'label'		=>	$setting['label'],
						'description' => (isset($setting['description']) ? $setting['description'] : '')
						)
					);
					break;
			}
		}
		$priority +=10;
	}
}
if ( get_option('csc_use_customizer', true) )
	add_action('customize_register', 'csc_customize_register');

function csc_mod_media_enqueue() {
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_media();
	wp_enqueue_script('csc-admin-mods', get_template_directory_uri().'/js/admin-mods.js', array('jquery', 'wp-color-picker'), false, true);
}
add_action('admin_enqueue_scripts', 'csc_mod_media_enqueue');
function csc_mod_page() {
	add_theme_page( 'Modifications', 'Modifications', 'manage_options', 'mods', 'csc_mod_page_callback');
}
function csc_mod_settings() {
	add_settings_section( 'csc_mod_toggle', 'Toggle from Customizer', '', 'mods');
	add_settings_field(
		'csc_use_customizer',
		'Use Customizer',
		'csc_mod_page_input_callback',
		'mods',
		'csc_mod_toggle',
		array('type' => 'checkbox', 'id' => 'csc_use_customizer', 'description' => 'Toggle usage between Customizer options and this page.')
	);
	register_setting('mods', 'csc_use_customizer', array('type' => 'boolean'));

	if (!get_option('csc_use_customizer', true)) {
		register_setting('mods', 'csc_mod' );
		foreach (csc_fetch_settings() as $section) {
			$section_id = 'csc_mod_section_'.$section['id'];
			add_settings_section( $section_id, $section['title'], '', 'mods');
			foreach ($section['settings'] as $setting) {
				add_settings_field(
					$setting['id'],
					$setting['label'],
					'csc_mod_page_input_callback',
					'mods',
					$section_id,
					$setting
				);
			}
		}
	}
}
function csc_mod_page_input_callback($options = array()) {
	if ($options['id'] == 'csc_use_customizer') {
		echo '<input name="csc_use_customizer" id="csc_use_customizer" type="checkbox" value="1" class="code" '
		. ( get_option('csc_use_customizer', true) ? 'checked="checked"' : '' ) . ' /> '
		. ( isset($options['description']) ? '<p class="description">'.$options['description'].'</p>' : '' );
		return;
	}
	$uses_customizer = get_option('csc_use_customizer', true);
	$name = 'csc_mod['.$options['id'].']';
	switch ($options['type']) {
		case 'color':
			echo '<input class="csc-color-field" name="'
			. ($uses_customizer ? '' : $name) .'" id="csc_mod_'
			. $options['id'] .'" type="text" value="'
			. csc_get_mod($options['id'], isset($options['default']) ? $options['default'] : '' ) . '" class="code" '
			. ( $uses_customizer ? 'disabled="disabled"' : '' ) .' /> '
			. ( isset($options['description']) ? '<p class="description">'.$options['description'].'</p>' : '' );
			break;

		case 'image':
			echo '<div class="csc-media-uploader">';
			echo '<input class="image-url" name="'
			. ($uses_customizer ? '' : $name) .'" id="csc_mod_'
			. $options['id'] .'" type="text" value="'
			. csc_get_mod($options['id'], isset($options['default']) ? $options['default'] : '' ) . '" class="code" '
			. ( $uses_customizer ? 'disabled="disabled"' : '' ) .' /> ';
			echo '<input type="button" class="upload-button button-primary" value="Choose Image" '. ( $uses_customizer ? 'disabled="disabled"' : '' ) .' /></div>';
			echo ( isset($options['description']) ? '<p class="description">'.$options['description'].'</p>' : '' );
			break;

		case 'checkbox':
			echo '<input name="'
			. ($uses_customizer ? '' : $name) .'" id="csc_mod_'
			. $options['id'] .'" type="checkbox" value="checked" '
			. ( csc_get_mod( $options['id'], $options['default'] ) == 'checked' ? 'checked="checked"' : '' ) . ' '
			. ( $uses_customizer ? 'disabled="disabled"' : '' ) .' /> '
			. ( isset($options['description']) ? '<p class="description">'.$options['description'].'</p>' : '' );
			break;

		default:
			echo '<input name="'
			. ($uses_customizer ? '' : $name) .'" id="csc_mod_'
			. $options['id'] .'" type="'
			. $options['type'].'" value="'
			. csc_get_mod($options['id'], isset($options['default']) ? $options['default'] : '' ) . '" class="code" '
			. ( $uses_customizer ? 'disabled="disabled"' : '' ) .' /> '
			. ( isset($options['description']) ? '<p class="description">'.$options['description'].'</p>' : '' );
			break;
	}

}
function csc_mod_page_callback () {
		echo '<form method="post" action="options.php" novalidate="novalidate" class="wrap">';
		settings_fields( 'mods' );
		echo '<input type="hidden" name="csc_mod[initialized]" value="1" />';
    echo '<h2>Modifications</h2>';
		do_settings_sections( 'mods' );
		submit_button();
    echo '</form>';
}
add_action('admin_init', 'csc_mod_settings' );
add_action('admin_menu', 'csc_mod_page' );

function csc_get_mod( $option, $default = false ) {
	if ( $option == 'csc_use_customizer' )
		return get_option('csc_use_customizer', true);
	else if ( get_option('csc_use_customizer', true) )
		return get_theme_mod($option, $default);
	else
		$mods = get_option('csc_mod');
		return is_array($mods) && isset($mods['initialized']) ? (isset($mods[$option]) ? $mods[$option] : false) : $default;
}
