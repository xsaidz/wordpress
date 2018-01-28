<?php
/* ----------------------------------------------------------------------------
 * Add the support for your CPT in the widget activity of the admin dashboard
 * ------------------------------------------------------------------------- */
add_filter( 'dashboard_recent_posts_query_args', 'add_page_to_dashboard_activity' );
function add_page_to_dashboard_activity( $query_args ) {
	// Return all post types
	$query_args['post_type'] = 'any';
	// Or return post types of your choice
	// query_args['post_type'] = array( 'post', 'foo', 'bar' );
	if ( $query_args['post_status'] == 'publish' ) {
		$query_args['posts_per_page'] = 10;
	}
	return $query_args;
}
?>
