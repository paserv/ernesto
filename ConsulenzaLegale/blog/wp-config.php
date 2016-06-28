<?php
/**
 * Il file base di configurazione di WordPress.
 *
 * Questo file viene utilizzato, durante l’installazione, dallo script
 * di creazione di wp-config.php. Non è necessario utilizzarlo solo via
 * web, è anche possibile copiare questo file in «wp-config.php» e
 * riempire i valori corretti.
 *
 * Questo file definisce le seguenti configurazioni:
 *
 * * Impostazioni MySQL
 * * Prefisso Tabella
 * * Chiavi Segrete
 * * ABSPATH
 *
 * È possibile trovare ultetriori informazioni visitando la pagina del Codex:
 *
 * @link https://codex.wordpress.org/it:Modificare_wp-config.php
 *
 * È possibile ottenere le impostazioni per MySQL dal proprio fornitore di hosting.
 *
 * @package WordPress
 */

// ** Impostazioni MySQL - È possibile ottenere queste informazioni dal proprio fornitore di hosting ** //
/** Il nome del database di WordPress */
define('DB_NAME', 'ernesto');

/** Nome utente del database MySQL */
define('DB_USER', 'ernesto');

/** Password del database MySQL */
define('DB_PASSWORD', 'ernesto');

/** Hostname MySQL  */
define('DB_HOST', '127.0.0.1');

/** Charset del Database da utilizzare nella creazione delle tabelle. */
define('DB_CHARSET', 'utf8mb4');

/** Il tipo di Collazione del Database. Da non modificare se non si ha idea di cosa sia. */
define('DB_COLLATE', '');

/**#@+
 * Chiavi Univoche di Autenticazione e di Salatura.
 *
 * Modificarle con frasi univoche differenti!
 * È possibile generare tali chiavi utilizzando {@link https://api.wordpress.org/secret-key/1.1/salt/ servizio di chiavi-segrete di WordPress.org}
 * È possibile cambiare queste chiavi in qualsiasi momento, per invalidare tuttii cookie esistenti. Ciò forzerà tutti gli utenti ad effettuare nuovamente il login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Dy_+vzz]#e>u=CjSyqz*ETgVUf$m~P&mRV.f:^|B5&;jL( HF~&H]tl,T(|F%&,d');
define('SECURE_AUTH_KEY',  '8Ie,]=,b.%/E}G!0EwfrK_(D9K#h_nB,N&9c*sn0I?|RrIDF6@ lC)^b.zW[)UVx');
define('LOGGED_IN_KEY',    '(y;yfK[>7z<r*0Xp52;6:~1cdmM?Y|?E-XW+a?vFcKcY_ZOXN&yE;x0HN(%Go)5a');
define('NONCE_KEY',        '?Wn56L!Z{ 2}yrP0jh0X>pt@eu!HRq$m<CqOm;qUb!a#*+#M?U,{N[-b5z;FSwp8');
define('AUTH_SALT',        '`J!as#z&M%^H863kD6b%B[3I>iL1to KBy],&J{zW0>Ylp(r[g-X(mf(=T=V56Qe');
define('SECURE_AUTH_SALT', 'u><F76t =3e?@Kb<RQf#Rd,pNL5|i>7;>BQ<($!,%$t%|=/3[YoB+L|.SI<ut%Vv');
define('LOGGED_IN_SALT',   '*j[b~p]1O,pqF.yU%V4X[y@z|Fmv2Fe/()C|Pp#<JJk{YjvXvbM *~6%J6qPk/Pj');
define('NONCE_SALT',       'QAjH5qWD,MA9Q;D5IY4l7{ECKmtG$q|J_@+wy|5,{vs!S;:<7Y1-~M4D98:e6S@2');

/**#@-*/

/**
 * Prefisso Tabella del Database WordPress.
 *
 * È possibile avere installazioni multiple su di un unico database
 * fornendo a ciascuna installazione un prefisso univoco.
 * Solo numeri, lettere e sottolineatura!
 */
$table_prefix  = 'wp_';

/**
 * Per gli sviluppatori: modalità di debug di WordPress.
 *
 * Modificare questa voce a TRUE per abilitare la visualizzazione degli avvisi
 * durante lo sviluppo.
 * È fortemente raccomandato agli svilupaptori di temi e plugin di utilizare
 * WP_DEBUG all’interno dei loro ambienti di sviluppo.
 */
define('WP_DEBUG', false);

/* Finito, interrompere le modifiche! Buon blogging. */

/** Path assoluto alla directory di WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Imposta le variabili di WordPress ed include i file. */
require_once(ABSPATH . 'wp-settings.php');