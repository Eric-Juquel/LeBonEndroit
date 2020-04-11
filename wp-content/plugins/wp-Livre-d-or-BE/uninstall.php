<?php

/**
 * Trigger this file on Plugin uninstall
 * 
 * @package BonEndroitLivreOrPlugin
 */


 if ( ! defined( 'WP_UNINSTALL_PLUGIN') ) {
   die;
 }

 // Clear Datatabase stored data 
 
global $wpdb;
$wpdb->query( "DELETE FROM wp_posts WHERE post_type = 'livredor'" );
$wpdb->query( "DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts" );
$wpdb->query( "DELETE FROM wp_term_relationships WHERE post_id NOT IN (SELECT id FROM wp_posts" );

 