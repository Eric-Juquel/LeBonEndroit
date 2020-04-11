<?php

/**
 * @package BonEndroitLivreOrPlugin
 */



class LivreDOrDeactivate {

  public static function deactivate() {
    flush_rewrite_rules();
  }
}