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
Author URI: https://github.com/Eric-Juquel?tab=repositories
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

// if (! defined( 'ABSPATH')) {
//   die;
// };

if (!function_exists('add_action')) {
  echo 'Hey, you can\'t access this file !';
  exit;
}

class LivreDOrPlugin
{



  function register()
  {
    add_action('admin_enqueue_scripts', array($this, 'enqueue'));
  }

  protected function create_post_type()
  {
    add_action('init', array($this, 'custom_post_type'));
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

if (class_exists('LivreDOrPlugin')) {
  $livreDOrPlugin = new LivreDOrPlugin();
  $livreDOrPlugin->register();
}

// activation
register_activation_hook(__FILE__, array($livreDOrPlugin, 'activate'));

// deactivation
register_deactivation_hook(__FILE__, array($livreDOrPlugin, 'deactivate'));
