<?php


class LivreOrDB
{
    public function __construct()
    {

        add_action('wp_loaded', array($this, 'saveMessages'));
    }

    public static function install()
    {
        global $wpdb;

        $table_name = $wpdb->prefix . 'livredor';
        $charset_collate = $wpdb->get_charset_collate();


        $livredor_sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id INT AUTO_INCREMENT PRIMARY KEY,
        firstname TEXT NOT NULL,
        lastname TEXT NOT NULL,
        email TEXT NOT NULL,
         message VARCHAR(255) NOT NULL
         ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

        dbDelta($livredor_sql);
    }
    public static function uninstall()
    {
        global $wpdb;
        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}livredor;");
    }

    public function saveMessages()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'livredor';

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $wpdb->insert($table_name, array('firstname' => $firstname, 'lastname' => $lastname, 'email' => $email,  'message' => $message));
    }
}
