<?php

/**
 * @package  LivreDOrPlugin
 */
/*
Plugin Name: Livre d'Or Le Bon Endroit
Plugin URI: http://livredorericJ.com
Description: Un plugin d'essai pour un Livre d'Or
Version: 1.0.0
Author: Eric Juquel
Author URI:https://github.com/Eric-Juquel/LeBonEndroit.git
License: GPLv2 or later
Text domain BonEndroit-plugin
*/

class LivreOrPlugin
{
    public function __construct()
    {
        add_action('init', array($this, 'custom_post_type'));

        add_action('init', array($this, 'create_shortcode'));

        include_once plugin_dir_path(__FILE__) . '/LivreOrDB.php';
        new LivreOrDB();
        register_activation_hook(__FILE__, array('LivreOrDB', 'install'));
        register_uninstall_hook(__FILE__, array('LivreOrDB', 'uninstall'));
    }

    public function activate()
    {
        // generated a CPT
        $this->custom_post_type();

        // Shortcode
        $this->create_shortcode();

        // flush rewrite rules
        flush_rewrite_rules();
    }

    public function deactivate()
    {
        // flush rewrite rules
        flush_rewrite_rules();
    }

    public function custom_post_type()
    {
        register_post_type('livredor', ['public' => true, 'label' => 'Livre d\'Or']);
    }

    public function create_shortcode()
    {
        include_once plugin_dir_path(__FILE__) . '/LivreOrSC.php';
        new LivreOrSC();
    }
    
    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    public function enqueue()
    {
        // enqueue all our scripts
        wp_enqueue_style('mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__));
        wp_enqueue_script('mypluginscript', plugins_url('/assets/myscript.js', __FILE__));
    }
}

$livredor = new LivreOrPlugin();
$livredor->register();

// activation
register_activation_hook(__FILE__, array($livredor, 'activate'));

// deactivation
register_deactivation_hook(__FILE__, array($livredor, 'deactivate'));
