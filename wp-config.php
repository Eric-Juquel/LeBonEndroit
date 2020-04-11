<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('WP_CACHE', true);
define( 'WPCACHEHOME', 'C:\wamp64\www\Wordpress\LeBonEndroit\wp-content\plugins\wp-super-cache/' );
define( 'DB_NAME', 'LeBonEndroit' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'V]4r]3p4.D%DI*6V.ewc5?lsHASPZ*LU,k({n>M&PTLSNZ>,BWl<Pjo[N=q2TcC=' );
define( 'SECURE_AUTH_KEY',  'B<F|IJ5[d|zVZyvPaawW|S)(0Jpe471@ZT75RV:6T9#0_TpH~G2x:WDGDx8:A|B1' );
define( 'LOGGED_IN_KEY',    'iMOkxP`-~H(Dk[qcTk9X_f<iruxwv?[I %{m/bP~6}{Ur@eh(%{fo3(F8wWf;:{a' );
define( 'NONCE_KEY',        '|KD-}DC-#Y0T9!S?A!^-y}+!5I1ET.?vc3?sa%Z..LP:CH!R@4@xdO9wFszvAieS' );
define( 'AUTH_SALT',        'z^{z_dazY#~C9k(Ew<J9f|3Tg#c)OT*=FLg09j*0nIlYmI{xXOX!onY*6To8sAl4' );
define( 'SECURE_AUTH_SALT', 'RN3Q=&Egg+k>12``icgUH/_Gyk-YrT9eYfWu m<tRrZ:!*&GQ{o[i)n9Z&;Xh{Qv' );
define( 'LOGGED_IN_SALT',   '(w{4TJ`C,)a1f&)JbP]c,*p|^8mH-mD;]7I:y /2fyU6c|(2`wwXg--]|Re1l:EV' );
define( 'NONCE_SALT',       ']UP`ap&Ut.oN*$|gX@[u>jsY@VB!sN.G{2u9bHn2HfD=zA.;=d5*0NiLl<F8n^CI' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
