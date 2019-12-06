<?php

add_action( 'tgmpa_register', 'gccph__register_required_plugins' );
function gccph__register_required_plugins() {
	$plugins = array(

		array(
			'name'      => 'Advanced Custom Fields',
			'slug'      => 'advanced-custom-fields',
			'required'  => true,
		),

		array(
			'name'      => 'ACF Photo Gallery Field',
			'slug'      => 'navz-photo-gallery',
			'required'  => true,
		),

		array(
			'name'        => 'WordPress SEO by Yoast',
			'slug'        => 'wordpress-seo',
			'is_callable' => 'wpseo_init',
		),

		array(
      'name' => 'Safe SVG', // The plugin name.
      'slug' => 'safe-svg', // The plugin slug (typically the folder name).
			'is_callable' => 'safe_svg::allow_svg'
    ),

	);

	$config = array(
		'id'           => 'csctheme',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
