<?php

/**
 * @package BonEndroitLivreOrPlugin
 */



class LivreDOrActivate {

  public static function activate() {
   flush_rewrite_rules();
  }
}