<?php

    // Register Custom Post Type
function custom_post_type_services() {

	$labels = array(
		'name'                  => 'Services',
		'singular_name'         => 'Service',
		'menu_name'             => 'Services',
		'name_admin_bar'        => 'Service',
		'archives'              => 'Service Archives',
		'attributes'            => 'Service Attributes',
		'parent_item_colon'     => 'Parent Service:',
		'all_items'             => 'All Services',
		'add_new_item'          => 'Add New Service',
		'add_new'               => 'Add Service',
		'new_item'              => 'New Service',
		'edit_item'             => 'Edit Service',
		'update_item'           => 'Update Service',
		'view_item'             => 'View Service',
		'view_items'            => 'View Services',
		'search_items'          => 'Search Service',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into item',
		'uploaded_to_this_item' => 'Uploaded to this item',
		'items_list'            => 'Items list',
		'items_list_navigation' => 'Items list navigation',
		'filter_items_list'     => 'Filter items list',
	);
	$rewrite = array(
		'slug'                  => 'services',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => 'Service',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		'taxonomies'            => array( 'service_category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-tools',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'post',
		'show_in_rest'          => false,
	);
	register_post_type( 'service', $args );

}
add_action( 'init', 'custom_post_type_services', 0 );