<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'meet-bio' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'Andranik1' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'p13;wv?Fr[SDHQLJ4&pqwwbWU]M=+-d7Is!|3J[,brhyIf#s}#^b]r2Y$i}8JqU(' );
define( 'SECURE_AUTH_KEY',  '0y,RAa8rnJ=C|%A{qmiW__IqfC_OzLu-FgM:%=5|s8k7RA[yPj*nDNwJAj:tx2F;' );
define( 'LOGGED_IN_KEY',    '>7` VRmM3Bd*}=PHB?O?J8vH4$qUHD9 U0nB7yHFog];,(XtDDkkxe|GyLN^&i5p' );
define( 'NONCE_KEY',        'W,9?kH@Z5)@Ck`*obGa~2:q,~Qqa{`V%7z&6F`8D5LRxCW&][REp%9=D46O`?7kZ' );
define( 'AUTH_SALT',        'YsvY{luUVy+QWWd9O%I[KG_,uiQ;i~v;e{)kTcp!U/f7oU8$(h7;,YxYc@hHgiB=' );
define( 'SECURE_AUTH_SALT', '|PG2peFrL0?D5XF-bfTx6R)UH*TcL/h^{PKXIW1^^jBLW ^-XRa)F-aB=i%KnA!k' );
define( 'LOGGED_IN_SALT',   'jw>Q+GP@Pcc:5D!9Pb:D]ACA;IR @m<(t#{Q6Jhs YF5JLUgOu5X6M78J(#F9ykU' );
define( 'NONCE_SALT',       '^_@X6c MAzV8g_~}f5-M|WsN>|3tLonj6|n-S*SG|<~3Zjw%eK;CIT<F}wAF?qtu' );
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
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
