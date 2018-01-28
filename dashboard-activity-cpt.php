<?php
/*
  Plugin Name: Dashboard Widget Activity Custom Post Type
  Plugin URI:
  Description:
  Author: Daniele Mte90 Scasciafratte
  Version: 1.0.0
  Author URI: http://mte90.net
 */
//Add the support for your cpt in the Widget Activity of the Admin Dashboard
if ( is_admin() ) {
    add_filter( 'dashboard_recent_posts_query_args', 'add_page_to_dashboard_activity' );
    function add_page_to_dashboard_activity( $query_args ) {
        if ( is_array( $query_args[ 'post_type' ] ) ) {
            //Set yout post type
            $query_args[ 'post_type' ][] = 'page';
        } else {
            $temp = array( $query_args[ 'post_type' ], 'page' );
            $query_args[ 'post_type' ] = $temp;
        }
        return $query_args;
    }
}

?>

 == == == == == ===
# This displays the custom posts in the activity, though what I'm seeing is it's displaying the oldest 3. Is it possible to modify this to show the newest posts?

     just $query_args['order'] = 'DESC'; $query_args['orderby'] = 'date';. If you want to update how many posts are displayed update$query_args['posts_per_page'] = $int; It's that easy. The dashboard_recent_posts_query_args hook accepts all of the same arguments as WP_Query.

# Thanks.. it works for just one kind of custom post type...
What if I have two diferent custom post types?

     
if ( is_admin() ) {
  add_filter( 'dashboard_recent_posts_query_args', 'add_page_to_dashboard_activity' );
  function add_page_to_dashboard_activity( $query ) {
    // Return all post types
    $post_types = get_post_types();
    // Return post types of your choice
    // $post_types = ['post', 'foo', 'bar'];
    if ( is_array( $query['post_type'] ) ) {
      $query['post_type'] = $post_types;
    } else {
      $temp = $post_types;
      $query['post_type'] = $temp;
    }
    return $query;
  }
}

