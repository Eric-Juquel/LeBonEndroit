<?php

/**
 * @package  LivreDOrPlugin
 */
class LivreOrSC
{

    public function __construct()
    {
        add_shortcode('livredor', array($this, 'affiche'));
    }
    public function affiche()
    {
?>

        <form id="form" action="" method="post">

            <div >
                <input type="text" placeholder="firstname" id="firstname" name="firstname" required/>
            </div><br />
            <div >
                <input type="text" placeholder="lastname" id="lastname" name="lastname" required />
            </div><br />
            <div >
                <input type="email" placeholder="Your Email" id="email" name="email" required />
            </div><br />
            <div >
                <textarea name="message" id="message" placeholder="Your Message" required></textarea>
            </div>
            <br />
            <div>
                <button type="submit" >Submit</input>
            </div>

        </form>

<?php
        global $wpdb;
        $req = "SELECT * FROM {$wpdb->prefix}livredor ORDER BY id DESC LIMIT 0,5";
        $response = $wpdb->get_results($req);
        foreach ($response as $res) {
            echo '<form><h4 style="color:teal">' . $res->firstname . ' ' . $res->lastname . ' :</h4><p style="text-align:center">"' . $res->message . '"</p></form><hr "/>';
        }
    }
}
