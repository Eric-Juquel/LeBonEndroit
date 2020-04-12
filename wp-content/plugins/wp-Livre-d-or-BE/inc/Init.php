<?php

/**
 * @package BonEndroitLivreOrPlugin
 */

namespace Inc;

final class Init
{
  /**
   * Store all the classes inside an array
   * @return array Full list of classes
   */
  public static function get_services() {
    return [
      Pages\Admin::class,
      Base\Enqueue::class,
      Base\SettingsLinks::class

    ];
  }

  /**
   * Loop through the classes, initialize them
   * and call the register() method if it exists 
   */
  public static function register_services() {
    foreach ( self::get_services() as $class ) {
      $service = self::instantiate( $class );
      if ( method_exists($service, 'register' ) ) {
        $service->register();
      }
    }

  }
  /**
   * Initialize tteh class
   * @param class $class class from the services array
   * @return class instance new instance of the class 
   */
  private static function instantiate( $class ) {
    $service = new $class();
    return $service;
  }
}




// if (!class_exists('AlecadddPlugin')) {
//   class LivreDOrPlugin
//   {
//     public $plugin;

//     function __construct()
//     {
//       $this->plugin = plugin_basename(__FILE__);
//       $this->create_post_type();
//     }
//     protected function create_post_type()
//     {
//       add_action('init', array($this, 'custom_post_type'));
//     }

//     // function activate()
//     // {
//     //   $this->custom_post_type();

//     // }

//     function custom_post_type()
//     {
//       register_post_type('livredor', ['public' => true, 'label' => 'Livre d\'Or']);
//     }








