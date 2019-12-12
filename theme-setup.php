<?php

function cptui_register_my_cpts() {

    /**
     * Post Type: Speakers.
     */

    $labels = array(
        "name" => __( 'Speakers', '' ),
        "singular_name" => __( 'Speaker', '' ),
    );

    $args = array(
        "label" => __( 'Speakers', '' ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "speaker", "with_front" => true ),
        "query_var" => true,
        "supports" => array( "title", "editor", "thumbnail" ),
    );

    register_post_type( "speaker", $args );

    /**
     * Post Type: Features.
     */

    $labels = array(
        "name" => __( 'Features', '' ),
        "singular_name" => __( 'Feature', '' ),
    );

    $args = array(
        "label" => __( 'Features', '' ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => false,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => true,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "feature", "with_front" => true ),
        "query_var" => true,
        "supports" => array( "title", "editor", "thumbnail" ),
    );

    register_post_type( "feature", $args );


    /**
     * Post Type: Speakers.
     */

    $labels = array(
        "name" => __( 'Past Conferences', '' ),
        "singular_name" => __( 'Conference', '' ),
    );

    $args = array(
        "label" => __( 'Conferences', '' ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "past-conferences", "with_front" => true ),
        "query_var" => true,
        "supports" => array( "title", "editor", "thumbnail" ),
    );

    register_post_type( "past-conferences", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );
//
define( 'ACF_LITE', true );

if(function_exists("acf_add_local_field_group"))
{
    acf_add_local_field_group(array (
        'id' => 'acf_feature',
        'title' => 'Feature',
        'fields' => array (
            array (
                'key' => 'field_58798c6a6a15b',
                'label' => 'Style',
                'name' => 'style',
                'type' => 'radio',
                'required' => 1,
                'choices' => array (
                    '' => 'Light',
                    'dark' => 'Dark',
                    'photo' => 'Photo',
                    'patterned' => 'Pattern',
                ),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => '',
                'layout' => 'horizontal',
            ),
            array (
                'key' => 'field_58798d4b6a15c',
                'label' => 'Use Photo',
                'name' => 'use_photo',
                'type' => 'image',
                'required' => 1,
                'conditional_logic' => array (
                    'status' => 1,
                    'rules' => array (
                        array (
                            'field' => 'field_58798c6a6a15b',
                            'operator' => '==',
                            'value' => 'photo',
                        ),
                    ),
                    'allorany' => 'all',
                ),
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_58798d916a15d',
                'label' => 'Buttons',
                'name' => 'buttons',
                'type' => 'wysiwyg',
                'required' => 1,
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'feature',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
                0 => 'permalink',
                1 => 'excerpt',
                2 => 'custom_fields',
                3 => 'discussion',
                4 => 'comments',
                5 => 'slug',
                6 => 'author',
                7 => 'format',
                8 => 'featured_image',
                9 => 'categories',
                10 => 'tags',
            ),
        ),
        'menu_order' => 0,
    ));
    acf_add_local_field_group(array (
        'id' => 'acf_speaker',
        'title' => 'Speaker',
        'fields' => array (
            array (
                'key' => 'field_5879a99bc5993',
                'label' => '<span style="color:red">* In placing a featured image strictly use a square image with the same height and width.</span><br><br>Short Description',
                'name' => 'short_description',
                'type' => 'text',
                'required' => 0,
                'default_value' => '',
                'placeholder' => 'e.g. B.S. Computer Science',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'instructions' => '',
                'maxlength' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'speaker',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'acf_after_title',
            'layout' => 'no_box',
            'hide_on_screen' => array (
                0 => 'custom_fields',
                1 => 'discussion',
                2 => 'comments',
                3 => 'author',
                4 => 'format',
                5 => 'categories',
                6 => 'tags',
            ),
        ),
        'menu_order' => 0,
    ));
    acf_add_local_field_group(array(
    	'key' => 'group_5de7203e6801e',
    	'title' => 'Gallery',
    	'fields' => array(
    		array(
    			'key' => 'field_5de72041c860a',
    			'label' => 'Images',
    			'name' => 'gallery',
    			'type' => 'photo_gallery',
    			'instructions' => 'Add photos from this conference.',
    			'required' => 0,
    			'conditional_logic' => 0,
    			'wrapper' => array(
    				'width' => '',
    				'class' => '',
    				'id' => '',
    			),
    			'fields[' => array(
    				'edit_modal' => 'Default',
    			),
    			'edit_modal' => 'Default',
    		),
    	),
    	'location' => array(
    		array(
    			array(
    				'param' => 'post_type',
    				'operator' => '==',
    				'value' => 'past-conferences',
    			),
    		),
    	),
    	'menu_order' => 0,
    	'position' => 'normal',
    	'style' => 'seamless',
    	'label_placement' => 'top',
    	'instruction_placement' => 'label',
    	'hide_on_screen' => '',
    	'active' => true,
    	'description' => '',
    ));
}


?>
