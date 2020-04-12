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


// If this file is called directly, abort !!
if (!function_exists('add_action')) {
  echo 'Hey, you can\'t access this file !';
  exit;
}

// Require once the Composer Autoload
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
  require_once dirname(__FILE__) . '/vendor/autoload.php';
}

// Define CONSTANT
define('PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugin_dir_url(__FILE__));
define('PLUGIN', plugin_basename(__FILE__));

use Inc\Base\Activate;
use Inc\Base\Deactivate;

/**
 * The code that runs during plugin activation
 */
function activate_livredor_plugin()
{
  Activate::activate();
}

/**
 * The code that runs during deactivation
 */
function deactivate_livredor_plugin()
{
  Deactivate::deactivate();
}

register_activation_hook(__FILE__, 'activate_livredor_plugin');
register_deactivation_hook(__FILE__, 'deactivate_livredor_plugin');

/**
 * Initialize all the core classes of the plugin
 */
if (class_exists('Inc\\Init')) {
  Inc\Init::register_services();
}
