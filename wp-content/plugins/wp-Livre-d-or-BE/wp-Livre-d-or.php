<?php

/**
 * @package BonEndroitLivreOrPlugin
 */
/*
Plugin Name: Wordpress Livre d'Or
Plugin URI: http://wp-Livre-d-or-BE.com
Description: Un plugin d'essai pour un Livre d'Or
Version: 1.0.0
Author: Eric Juquel
Author URI:https://github.com/Eric-Juquel/LeBonEndroit.git
License: GPLv2 or later
Text domain BonEndroit-plugin

*/
/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/



if (!function_exists('add_action')) {
  echo 'Hey, you can\'t access this file !';
  exit;
}

if (!class_exists('AlecadddPlugin')) {
  class LivreDOrPlugin
  {
    public $plugin;

    function __construct()
    {
      $this->plugin = plugin_basename(__FILE__);
      $this->create_post_type();
    }
    protected function create_post_type()
    {
      add_action('init', array($this, 'custom_post_type'));
    }

    // function activate()
    // {
    //   $this->custom_post_type();
    //   flush_rewrite_rules();
    // }



    function register()
    {
      add_action('admin_enqueue_scripts', array($this, 'enqueue'));

      add_action('admin_menu', array($this, 'add_admin_pages'));



      add_filter("plugin_action_links_$this->plugin"  , array($this, 'settings_link'));
    }

    public function settings_link( $links )
    {
      $settings_link = '<a href="admin.php?page=livredor_plugin">Settings</a>';
      array_push( $links, $settings_link );
      return $links;
    }

    public function add_admin_pages()
    { 
      add_menu_page(
        'Livred\'Or Plugin',
        'Livre d\'Or',
        'manage_options',
        'livredor_plugin',
        array($this, 'admin_index'),
        'dashicons-book-alt',
        110
      );
    }

    public function admin_index()
    {
      require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
      
    }

    function custom_post_type()
    {
      register_post_type('livredor', ['public' => true, 'label' => 'Livre d\'Or']);
    }

    function enqueue()
    {
      // enqueue all our scripts
      wp_enqueue_style('mypluginstyle', plugins_url('./assets/mystyle.css', __FILE__));
      wp_enqueue_script('mypluginscript', plugins_url('./assets/myscript.js', __FILE__));
    }
  }


  $livreDOrPlugin = new LivreDOrPlugin();
  $livreDOrPlugin->register();


  // activation
  require_once plugin_dir_path(__FILE__) . 'inc/livredor-plugin-activate.php';
  register_activation_hook(__FILE__, array('LivreDOrActivate', 'activate'));

  // deactivation
  require_once plugin_dir_path(__FILE__) . 'inc/livredor-plugin-deactivate.php';
  register_deactivation_hook(__FILE__, array('LivreDOrDeactivate', 'deactivate'));
}
