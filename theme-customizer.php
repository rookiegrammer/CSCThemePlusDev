<?php

function csc_customize_register( $wp_customize ){
	$priority = 30;

	$section = 'csc_mod_general_section'; $section_label = 'General';
	$wp_customize->add_section( $section, array(
		'title'				=>	$section_label,
		'priority'			=>	$priority
	));

		$id = 'display_title'; $label = 'Display Title';
		$wp_customize->add_setting( $id, array(
				'default'			=>	'Cordillera Studies',
				'transport'			=>	'refresh'
			));
		$wp_customize->add_control( $id, array(
				'type'		=>	'text',
				'section'	=>	$section,
				'label'		=>	$label
				)
			);

		$id = 'display_title_prefix'; $label = 'Display Title Prefix';
		$wp_customize->add_setting( $id, array(
				'default'			=>	'2nd International Conference on',
				'transport'			=>	'refresh'
			));
		$wp_customize->add_control( $id, array(
				'type'		=>	'text',
				'section'	=>	$section,
				'label'		=>	$label
				)
			);
		$id = 'display_font_size'; $label = 'Base Font Size';
		$wp_customize->add_setting( $id, array(
				'default'			=>	'16',
				'transport'			=>	'refresh'
			));
		$wp_customize->add_control( $id, array(
				'type'		=>	'text',
				'section'	=>	$section,
				'label'		=>	$label,
				'description' =>'Font size in pixels'
				)
			);

		$id = 'display_line_height'; $label = 'Post/Page Text Line Spacing';
		$wp_customize->add_setting( $id, array(
				'default'			=>	'1.5',
				'transport'			=>	'refresh'
			));
		$wp_customize->add_control( $id, array(
				'type'		=>	'text',
				'section'	=>	$section,
				'label'		=>	$label
				)
			);

		$id = 'display_feature_padding'; $label = 'Feature Percentage Padding';
		$wp_customize->add_setting( $id, array(
				'default'			=>	'20',
				'transport'			=>	'refresh'
			));
		$wp_customize->add_control( $id, array(
				'type'		=>	'text',
				'section'	=>	$section,
				'label'		=>	$label,
				'description' =>'Space a feature\'s content is padded left or padded right (in percentage)'
				)
			);

		$id = 'title_text_color'; $label = 'Front Title Text Color';
		$wp_customize->add_setting( $id, array(
				'default'			=>	'#fff',
				'transport'			=>	'refresh'
			));
		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, $id, array(
				'section'	=>	$section,
				'label'		=>	$label
				)
			));

		$id = 'display_image'; $label = 'Front Page Image';
		$wp_customize->add_setting( $id, array(
				'default'			=>	get_template_directory_uri().'/img/hero.jpg',
				'transport'			=>	'refresh'
			));
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, $id, array(
				'type'		=>	'image',
				'section'	=>	$section,
				'label'		=>	$label
				)
			));
		$id = 'display_image_overlay'; $label = 'Front Page Overlay Image';
		$wp_customize->add_setting( $id, array(
				'default'			=>	get_template_directory_uri().'/img/feature.png',
				'transport'			=>	'refresh'
			));
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, $id, array(
				'type'		=>	'image',
				'section'	=>	$section,
				'label'		=>	$label,
				'description'=> 'For best results upload a long portrait PNG image with a transparent background.'
				)
			));
	$priority += 10;

	$section = 'csc_mod_banner_section'; $section_label = 'Banner';
	$wp_customize->add_section( $section, array(
		'title'				=>	$section_label,
		'priority'			=>	$priority
	));
		$id = 'display_header_filter_enable'; $label = 'Enable Main Banner Image Filter';
		$wp_customize->add_setting( $id, array(
				'default'			=>	'checked',
				'transport'			=>	'refresh'
			));
		$wp_customize->add_control( $id, array(
				'type'		=>	'checkbox',
				'section'	=>	$section,
				'label'		=>	$label,
				)
			);

		$id = 'display_banner_desktop_size'; $label = 'Page/Post Banner Desktop Scale Size';
		$wp_customize->add_setting( $id, array(
				'default'			=>	'3.0',
				'transport'			=>	'refresh'
			));
		$wp_customize->add_control( $id, array(
				'type'		=>	'text',
				'section'	=>	$section,
				'label'		=>	$label,
				'description'=> 'Scales up or scales down relative to original value'
				)
			);

		$id = 'display_banner_mobile_size'; $label = 'Page/Post Banner Mobile Scale Size';
		$wp_customize->add_setting( $id, array(
				'default'			=>	'1.5',
				'transport'			=>	'refresh'
			));
		$wp_customize->add_control( $id, array(
				'type'		=>	'text',
				'section'	=>	$section,
				'label'		=>	$label,
				'description'=> 'Scales up or scales down relative to original value'
				)
			);

		$id = 'display_post_date_scale'; $label = 'Post Date Scale Size';
		$wp_customize->add_setting( $id, array(
				'default'			=>	'1.0',
				'transport'			=>	'refresh'
			));
		$wp_customize->add_control( $id, array(
				'type'		=>	'text',
				'section'	=>	$section,
				'label'		=>	$label,
				'description'=> 'Scales up or scales down relative to original value'
				)
			);

	$priority += 10;

	$section = 'csc_mod_speaker_section'; $section_label = 'Speaker Display';
	$wp_customize->add_section( $section, array(
		'title'				=>	$section_label,
		'priority'			=>	$priority
	));

		$id = 'display_speaker_border_enable'; $label = 'Enable Thumbnail Border';
		$wp_customize->add_setting( $id, array(
				'default'			=>	'checked',
				'transport'			=>	'refresh'
			));
		$wp_customize->add_control( $id, array(
				'type'		=>	'checkbox',
				'section'	=>	$section,
				'label'		=>	$label
				)
			);

		$id = 'display_speaker_round_enable'; $label = 'Enable Round Thumbnails';
		$wp_customize->add_setting( $id, array(
				'default'			=>	'',
				'transport'			=>	'refresh'
			));
		$wp_customize->add_control( $id, array(
				'type'		=>	'checkbox',
				'section'	=>	$section,
				'label'		=>	$label
				)
			);

		$id = 'display_speaker_thumb_size'; $label = 'Thumbnail Pixel Size';
		$wp_customize->add_setting( $id, array(
				'default'			=>	'80',
				'transport'			=>	'refresh'
			));
		$wp_customize->add_control( $id, array(
				'type'		=>	'text',
				'section'	=>	$section,
				'label'		=>	$label,
				'description' =>'Pixel size of a Speaker Thumbnail'
				)
			);

		$id = 'display_speaker_scale_size'; $label = 'Text Scale Size';
		$wp_customize->add_setting( $id, array(
				'default'			=>	'1.0',
				'transport'			=>	'refresh'
			));
		$wp_customize->add_control( $id, array(
				'type'		=>	'text',
				'section'	=>	$section,
				'label'		=>	$label,
				'description' =>'Scale size of a speaker\'s feature text'
				)
			);

		
	$priority += 10;

	$section = 'csc_mod_confdetails_section'; $section_label = 'Conference Details';
	$wp_customize->add_section( $section, array(
		'title'				=>	$section_label,
		'priority'			=>	$priority
	));

		$id = 'enable_conf_details'; $label = 'Show Conference Details';
		$wp_customize->add_setting( $id, array(
				'default'			=>	'checked',
				'transport'			=>	'refresh'
			));
		$wp_customize->add_control( $id, array(
				'type'		=>	'checkbox',
				'section'	=>	$section,
				'label'		=>	$label
				)
			);

		$id = 'display_date'; $label = 'Date';
		$wp_customize->add_setting( $id, array(
				'default'			=>	'July 16-17, 2017',
				'transport'			=>	'refresh'
			));
		$wp_customize->add_control( $id, array(
				'type'		=>	'text',
				'section'	=>	$section,
				'label'		=>	$label
				)
			);

		$id = 'display_place'; $label = 'Place';
		$wp_customize->add_setting( $id, array(
				'default'			=>	'UP Baguio',
				'transport'			=>	'refresh'
			));
		$wp_customize->add_control( $id, array(
				'type'		=>	'text',
				'section'	=>	$section,
				'label'		=>	$label
				)
			);
	$priority += 10;

	$section = 'csc_mod_alert_section'; $section_label = 'Alert';
	$wp_customize->add_section( $section, array(
		'title'				=>	$section_label,
		'priority'			=>	$priority
	));

		$id = 'display_alert_enable'; $label = 'Enable';
		$wp_customize->add_setting( $id, array(
				'default'			=>	'checked',
				'transport'			=>	'refresh'
			));
		$wp_customize->add_control( $id, array(
				'type'		=>	'checkbox',
				'section'	=>	$section,
				'label'		=>	$label
				)
			);

		$id = 'display_alert_text'; $label = 'Text';
		$wp_customize->add_setting( $id, array(
				'default'			=>	'Papers are still accepted! Send one?',
				'transport'			=>	'refresh'
			));
		$wp_customize->add_control( $id, array(
				'type'		=>	'text',
				'section'	=>	$section,
				'label'		=>	$label
				)
			);

		$id = 'display_alert_link_text'; $label = 'Action Title';
		$wp_customize->add_setting( $id, array(
				'default'			=>	'Send',
				'transport'			=>	'refresh'
			));
		$wp_customize->add_control( $id, array(
				'type'		=>	'text',
				'section'	=>	$section,
				'label'		=>	$label
				)
			);

		$id = 'display_alert_link'; $label = 'Action Link';
		$wp_customize->add_setting( $id, array(
				'default'			=>	'',
				'transport'			=>	'refresh'
			));
		$wp_customize->add_control( $id, array(
				'type'		=>	'text',
				'section'	=>	$section,
				'label'		=>	$label
				)
			);


	$priority += 10;

	$section = 'csc_mod_social_section'; $section_label = 'Social Links';
	$wp_customize->add_section( $section, array(
		'title'				=>	$section_label,
		'priority'			=>	$priority
	));

		$id = 'social_facebook'; $label = 'Facebook Link';
		$wp_customize->add_setting( $id, array(
				'default'			=>	'',
				'transport'			=>	'refresh'
			));
		$wp_customize->add_control( $id, array(
				'type'		=>	'text',
				'section'	=>	$section,
				'label'		=>	$label
				)
			);

		$id = 'social_twitter'; $label = 'Twitter Link';
		$wp_customize->add_setting( $id, array(
				'default'			=>	'',
				'transport'			=>	'refresh'
			));
		$wp_customize->add_control( $id, array(
				'type'		=>	'text',
				'section'	=>	$section,
				'label'		=>	$label
				)
			);
	$priority += 10;
}
add_action('customize_register', 'csc_customize_register');

?>