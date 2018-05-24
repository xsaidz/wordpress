<?php
/**
 * Saidz Kingdom
 *
 * @link https://fb.com/ssaidz
 *
 * Paste on functions.php
 */

function enable_comments_for_all(){
    global $wpdb;
    $wpdb->query( $wpdb->prepare("UPDATE $wpdb->posts SET comment_status = 'open'")); // Enable comments
    $wpdb->query( $wpdb->prepare("UPDATE $wpdb->posts SET ping_status = 'open'")); // Enable trackbacks
}
enable_comments_for_all();

?>
