<?php

/**
 * @package BonEndroitLivreOrPlugin
 */

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

class Admin extends BaseController
{
  public $settings;
  public $pages = array();
  public $subpages = array();

  public function __construct()
  {
    $this->settings = new SettingsApi;

    $this->pages = array(
      [
        'page_title' => 'Livred\'Or Plugin',
        'menu_title' => 'Livre d\'Or',
        'capability' => 'manage_options',
        'menu_slug' => 'livredor_plugin',
        'callback' => function () {
          echo '<h1>Welcome</h1>';
        },
        'icon_url' => 'dashicons-book-alt',
        'position' => 110
      ]
    );

    $this->subpages = array(
			[
				'parent_slug' => 'livredor_plugin', 
				'page_title' => 'Custom Post Types', 
				'menu_title' => 'CPT', 
				'capability' => 'manage_options', 
				'menu_slug' => 'livredor_cpt', 
				'callback' => function() { echo '<h1>CPT Manager</h1>'; }
      ],
			[
				'parent_slug' => 'livredor_plugin', 
				'page_title' => 'Custom Taxonomies', 
				'menu_title' => 'Taxonomies', 
				'capability' => 'manage_options', 
				'menu_slug' => 'livredor_taxonomies', 
				'callback' => function() { echo '<h1>Taxonomies Manager</h1>'; }
      ],
			[
				'parent_slug' => 'livredor_plugin', 
				'page_title' => 'Custom Widgets', 
				'menu_title' => 'Widgets', 
				'capability' => 'manage_options', 
				'menu_slug' => 'livredor_widgets', 
				'callback' => function() { echo '<h1>Widgets Manager</h1>'; }
      ]
		);
  }

  public function register()
  {

    $this->settings->addPages($this->pages)->withSubPage( 'Dashboard' )->addSubPages( $this->subpages)->register();
  }
}
