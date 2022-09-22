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
define( 'DB_NAME', 'concessionnaire' );

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
define( 'AUTH_KEY',         'u^0SkN]&G/IM8x-)rCRRW({?-|qDsYXB?5R:Md:SJ=ow;7CcGT);7`_Le7UMMP1.' );
define( 'SECURE_AUTH_KEY',  'vO Q=*%tHSVjP+rDU%{w9A2>ddYGWtB~y>ei+uS?wB#RK*%ym~GuT.z)4EisawP2' );
define( 'LOGGED_IN_KEY',    '*0bTUW`f2u:9}YN8*ot`.s9<qV6;Ip9ACgvp8<nn1C_ccZb@#))>;jNqv}q[?!{a' );
define( 'NONCE_KEY',        'LcyjAaaI>6s]8S&NC@3SR,Rk_dZY@BLqiycj|B$6IhZ/ p? skm~i--s<K:J++gF' );
define( 'AUTH_SALT',        'GJMsw#XN%sMVF=ux7zq3{/xe:Ek%Oi>yNNZq~O5T5Z19kGC:@=2/rf7G-Fbz`Z$;' );
define( 'SECURE_AUTH_SALT', '{nvzj?zGX6m?KI(A!_-7+0N))9`FL)W8h4gH1<Qb.<|g{%EQ4~e5}Ot9rtQ@FE/h' );
define( 'LOGGED_IN_SALT',   'mCKdim)!Sj:T^wVl%Z+LK7F~0Z!Le!Ikj2oLIQv#DAA=-wXFd/!QIxcyL)to!$8`' );
define( 'NONCE_SALT',       'lm-I`E4Xz.HE+4v<D][]U81I3kyCdYs8+>)(n%5.u{t>h:44}A@@uuuV4r5?^>WQ' );
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
