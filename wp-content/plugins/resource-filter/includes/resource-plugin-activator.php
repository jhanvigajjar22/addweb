<?php



function resourcesinit()
{
	// set up Resource labels
	$labels = array(
		'name' => 'Resource',
		'singular_name' => 'Resource',
		'add_new' => 'Add New Resource',
		'add_new_item' => 'Add New Resource',
		'edit_item' => 'Edit Resource',
		'new_item' => 'New Resource',
		'all_items' => 'All Resource',
		'view_item' => 'View Resource',
		'search_items' => 'Search Resource',
		'not_found' => 'No Resource Found',
		'not_found_in_trash' => 'No Resource Found in Trash',
		'parent_item_colon' => '',
		'menu_name' => 'Resource',
	);

	// register post type
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug' => 'resource'),
		'query_var' => true,
		'menu_position' => 25,
		'menu_icon' => 'dashicons-portfolio',
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'trackbacks',
			'custom-fields',
			'comments',
			'revisions',
			'thumbnail',
			'author',
			'page-attributes'
		)
	);
	register_post_type('resource', $args);

	register_taxonomy('resource_type', 'resource', array('hierarchical' => true, 'label' => 'Resource Type', 'query_var' => true, 'rewrite' => array('slug' => 'resource_type')));

    register_taxonomy('resource_topic', 'resource', array('hierarchical' => true, 'label' => 'Resource Topic', 'query_var' => true, 'rewrite' => array('slug' => 'resource_topic')));

}
add_action('init', 'resourcesinit');