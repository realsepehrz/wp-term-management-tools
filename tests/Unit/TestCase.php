<?php


namespace Tests\Unit;

abstract class TestCase extends \WP_UnitTestCase {

	/**
	 * Helper. Removes all terms for a given taxonomy.
	 *
	 * @param string $taxonomy
	 */
	protected function clean_taxonomy( string $taxonomy ) {
		$terms = $this->get_all_terms( $taxonomy );
		foreach ( $terms as $term ) {
			wp_delete_term( $term->term_id, $taxonomy );
		}
	}

	/**
	 * Helper. Gets all terms for a supplied taxonomy.
	 *
	 * @param string $taxonomy
	 *
	 * @return int|\WP_Error|\WP_Term[]
	 */
	protected function get_all_terms( string $taxonomy ) {
		return get_terms(
			array(
				'taxonomy'   => $taxonomy,
				'hide_empty' => false,
			)
		);
	}

	/**
	 * Helper. True if the term has no parent term (is not a child term). False otherwise.
	 *
	 * @param $term_obj
	 *
	 * @return bool
	 */
	protected function term_has_no_parent( $term_obj ) : bool {
		return ( 0 === $term_obj->parent ) ? true : false;
	}

	/**
	 * Helper. True if the term has a parent term (is a child term). False otherwise.
	 *
	 * @param $term_obj
	 *
	 * @return bool
	 */
	protected function term_has_parent( $term_obj ) : bool {
		return ! $this->term_has_no_parent( $term_obj );
	}

	/**
	 * Helper. Add terms for testing.
	 *
	 * @param string $taxonomy
	 * @param int    $count
	 * @param int    $parent_id
	 *
	 * @return array
	 */
	protected function add_terms( string $taxonomy, int $count, int $parent_id = 0 ) : array {
		if ( $parent_id > 0 ) {
			$args['parent'] = $parent_id;
			$parent_prefix  = '';
		} else {
			$args          = array();
			$parent_prefix = 'Parent ';
		}
		for ( $i = 1; $i <= $count; $i++ ) {
			$added_terms[] = wp_insert_term( $parent_prefix . 'Term ' . rand( 1, 5000 ) . ' ' . $i, $taxonomy, $args );
		}
		return wp_list_pluck( $added_terms, 'term_id' );
	}

	/**
	 * Helper. Adds the CPT "Flat."
	 */
	protected function create_sample_taxonomy__flat() {
		$singular = 'Flat';
		$plural   = 'Flat';
		$labels   = array(
			'name'                       => $plural,
			'Taxonomy General Name',
			'singular_name'              => $singular,
			'Taxonomy Singular Name',
			'menu_name'                  => $plural,
			'all_items'                  => 'All ' . $plural,
			'parent_item'                => 'Parent ' . $singular,
			'parent_item_colon'          => 'Parent ' . $singular . ':',
			'new_item_name'              => 'New ' . $singular . ' Name',
			'add_new_item'               => 'Add New ' . $singular,
			'edit_item'                  => 'Edit ' . $singular,
			'update_item'                => 'Update ' . $singular,
			'separate_items_with_commas' => 'Separate ' . $plural . ' with commas',
			'search_items'               => 'Search ' . $plural,
			'add_or_remove_items'        => 'Add or remove' . $plural,
			'choose_from_most_used'      => 'Choose from the most used ' . $plural,
			'popular_items'              => 'Popular ' . $plural,
			'not_found'                  => 'No ' . $plural . ' found',
			'view_item'                  => 'View' . $singular,
			'not_found_in_trash'         => 'No' . $plural . ' found in Trash',
		);
		$rewrite  = array(
			'slug'         => 'flat',
			'with_front'   => false,
			'hierarchical' => false,
		);
		$args     = array(
			'description'        => 'Description goes here.',
			'labels'             => $labels,
			'hierarchical'       => false,
			'public'             => true,
			'show_ui'            => true,
			'show_in_quick_edit' => true,
			'meta_box_cb'        => true,
			'show_admin_column'  => true,
			'show_in_nav_menus'  => true,
			'show_tagcloud'      => false,
			'show_in_rest'       => true,
			'rewrite'            => $rewrite,
			'query_var'          => true,
			'args'               => array( 'orderby' => 'term_order' ),
		);
		register_taxonomy(
			'flat',
			array(
				'post',
			),
			$args
		);
	}

	/**
	 * Helper. Adds the CPT "Hierarchical."
	 */
	protected function create_sample_taxonomy__hierarchical() {
		$singular = 'Hierarchical';
		$plural   = 'Hierarchical';
		$labels   = array(
			'name'                       => $plural,
			'Taxonomy General Name',
			'singular_name'              => $singular,
			'Taxonomy Singular Name',
			'menu_name'                  => $plural,
			'all_items'                  => 'All ' . $plural,
			'parent_item'                => 'Parent ' . $singular,
			'parent_item_colon'          => 'Parent ' . $singular . ':',
			'new_item_name'              => 'New ' . $singular . ' Name',
			'add_new_item'               => 'Add New ' . $singular,
			'edit_item'                  => 'Edit ' . $singular,
			'update_item'                => 'Update ' . $singular,
			'separate_items_with_commas' => 'Separate ' . $plural . ' with commas',
			'search_items'               => 'Search ' . $plural,
			'add_or_remove_items'        => 'Add or remove' . $plural,
			'choose_from_most_used'      => 'Choose from the most used ' . $plural,
			'popular_items'              => 'Popular ' . $plural,
			'not_found'                  => 'No ' . $plural . ' found',
			'view_item'                  => 'View' . $singular,
			'not_found_in_trash'         => 'No' . $plural . ' found in Trash',
		);
		$rewrite  = array(
			'slug'         => 'hierarchical',
			'with_front'   => false,
			'hierarchical' => true,
		);
		$args     = array(
			'description'        => 'Description goes here.',
			'labels'             => $labels,
			'hierarchical'       => true,
			'public'             => true,
			'show_ui'            => true,
			'show_in_quick_edit' => true,
			'meta_box_cb'        => true,
			'show_admin_column'  => true,
			'show_in_nav_menus'  => true,
			'show_tagcloud'      => false,
			'show_in_rest'       => true,
			'rewrite'            => $rewrite,
			'query_var'          => true,
			'args'               => array( 'orderby' => 'term_order' ),
		);
		register_taxonomy(
			'hierarchical',
			array(
				'post',
			),
			$args
		);
	}


}
