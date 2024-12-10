<?php
namespace TURNERPLUGIN\Inc;
use TURNERPLUGIN\Inc\Abstracts\Taxonomy;
class Taxonomies extends Taxonomy {
	public static function init() {		
		//Project Taxonomy Start
		$labels = array(
			'name'              => _x( 'Project Category', 'wpturner' ),
			'singular_name'     => _x( 'Project Category', 'wpturner' ),
			'search_items'      => __( 'Search Category', 'wpturner' ),
			'all_items'         => __( 'All Categories', 'wpturner' ),
			'parent_item'       => __( 'Parent Category', 'wpturner' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpturner' ),
			'edit_item'         => __( 'Edit Category', 'wpturner' ),
			'update_item'       => __( 'Update Category', 'wpturner' ),
			'add_new_item'      => __( 'Add New Category', 'wpturner' ),
			'new_item_name'     => __( 'New Category Name', 'wpturner' ),
			'menu_name'         => __( 'Project Category', 'wpturner' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'project_cat' ),
		);
		register_taxonomy( 'project_cat', 'project', $args );
		
		//Career Taxonomy Start
		$labels = array(
			'name'              => _x( 'Career Category', 'wpturner' ),
			'singular_name'     => _x( 'Career Category', 'wpturner' ),
			'search_items'      => __( 'Search Category', 'wpturner' ),
			'all_items'         => __( 'All Categories', 'wpturner' ),
			'parent_item'       => __( 'Parent Category', 'wpturner' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpturner' ),
			'edit_item'         => __( 'Edit Category', 'wpturner' ),
			'update_item'       => __( 'Update Category', 'wpturner' ),
			'add_new_item'      => __( 'Add New Category', 'wpturner' ),
			'new_item_name'     => __( 'New Category Name', 'wpturner' ),
			'menu_name'         => __( 'Career Category', 'wpturner' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'career_cat' ),
		);
		register_taxonomy( 'career_cat', 'career', $args );
		
		//Services Taxonomy Start
		$labels = array(
			'name'              => _x( 'Service Category', 'wpturner' ),
			'singular_name'     => _x( 'Service Category', 'wpturner' ),
			'search_items'      => __( 'Search Category', 'wpturner' ),
			'all_items'         => __( 'All Categories', 'wpturner' ),
			'parent_item'       => __( 'Parent Category', 'wpturner' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpturner' ),
			'edit_item'         => __( 'Edit Category', 'wpturner' ),
			'update_item'       => __( 'Update Category', 'wpturner' ),
			'add_new_item'      => __( 'Add New Category', 'wpturner' ),
			'new_item_name'     => __( 'New Category Name', 'wpturner' ),
			'menu_name'         => __( 'Service Category', 'wpturner' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'service_cat' ),
		);
		register_taxonomy( 'service_cat', 'service', $args );
		
		//Team Taxonomy Start
		$labels = array(
			'name'              => _x( 'Team Category', 'wpturner' ),
			'singular_name'     => _x( 'Team Category', 'wpturner' ),
			'search_items'      => __( 'Search Category', 'wpturner' ),
			'all_items'         => __( 'All Categories', 'wpturner' ),
			'parent_item'       => __( 'Parent Category', 'wpturner' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpturner' ),
			'edit_item'         => __( 'Edit Category', 'wpturner' ),
			'update_item'       => __( 'Update Category', 'wpturner' ),
			'add_new_item'      => __( 'Add New Category', 'wpturner' ),
			'new_item_name'     => __( 'New Category Name', 'wpturner' ),
			'menu_name'         => __( 'Team Category', 'wpturner' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'team_cat' ),
		);
		register_taxonomy( 'team_cat', 'team', $args );
		
		//Testimonials Taxonomy Start
		$labels = array(
			'name'              => _x( 'Testimonials Category', 'wpturner' ),
			'singular_name'     => _x( 'Testimonials Category', 'wpturner' ),
			'search_items'      => __( 'Search Category', 'wpturner' ),
			'all_items'         => __( 'All Categories', 'wpturner' ),
			'parent_item'       => __( 'Parent Category', 'wpturner' ),
			'parent_item_colon' => __( 'Parent Category:', 'wpturner' ),
			'edit_item'         => __( 'Edit Category', 'wpturner' ),
			'update_item'       => __( 'Update Category', 'wpturner' ),
			'add_new_item'      => __( 'Add New Category', 'wpturner' ),
			'new_item_name'     => __( 'New Category Name', 'wpturner' ),
			'menu_name'         => __( 'Testimonials Category', 'wpturner' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'testimonials_cat' ),
		);
		register_taxonomy( 'testimonials_cat', 'testimonials', $args );				
	}
	
}
