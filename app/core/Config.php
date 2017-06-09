<?php
/**
 * The base configurations of Cineflow.
 *
 * This file has the following configurations: MySQL Settings,
 * BASEPATH, Secret Keys.
 *
 * @package Cineflow
 */

//** MySQL Settings - This info should be available from the web host. **//

/** Web Host */
$db_host = '127.0.0.1';

/** MySQL database Username */
$db_user = 'root';

/** MySQL database password */
$db_pass = 'mtFE2MVsM8yFRaBN';

/** MySQL database name */
$db_name = 'cineflow_v3';

/** MySQL database charset */
$db_charset = 'utf8';

/** MySQL database collate type. Leave blank if unsure. */
$db_collate = '';

/** The base path (or absolute path) to the site's root directory. */
define('BASEPATH',              "http://localhost/atatusoft/cineflow/");
define('CDNPATH',               BASEPATH . "app/content/");
define('COMPONENTPATH',         'app/components/');
define('RESPATH',               'app/resources/');
// define('SRC_JS_JQUERY',         'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js');
// define('SRC_JS_BOOTSTRAP',      'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js');
define('SRC_JS_JQUERY',         'js/jquery-1.11.3.min.js');
define('SRC_JS_BOOTSTRAP',      'js/bootstrap.min.js');
define('SRC_JS_MODENIZER',      'js/vendor/modernizr-2.8.3-respond-1.4.2.min.js');
// define('SRC_CSS_BOOTSTRAP',     'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css');
// define('SRC_CSS_FONTAWESOME',   'http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css');
define('SRC_CSS_BOOTSTRAP',     'css/bootstrap.min.css');
define('SRC_CSS_FONTAWESOME',   'css/font-awesome.min.css');


/**#@+
 * Authentication Unique Keys and Salts information.
 * Change these to force all users to log in again.
 */
define('AUTH_KEY',          'agkp1sgIi9M}5;L_Ju<ERzf*h&ZFH[Bt*;k|}t}xUR ]i!%M^F{I=G%DYS<_.,+9');
define('SECURE_AUTH_KEY',   'i7PP-8F]Yl:.!p1aI.:xZfc_We|gGOS35%;C`[p8(t+`NzPfx7C(R`u}Ws75e|0q');
define('LOGGED_IN_KEY',     'r1gYWCeCu^q+hMM~c +Ic0q+qj+Z|-qO#,Li^(xb?mb<yY@:>JXD3:-u2aP,aDFN');
define('NONCE_KEY',         '$E+RSNf*vSvT}%P&Y&VGvLLg!X^3X|I)Leb|kH+|+7GSq,UD[VH?26Jj^oj|c<u~');
define('AUTH_SALT',         'i3]t bWM>s{Y^/<_Cc,g_g$I+M` G|{9^T-CgZAu|ymI$[1wAJ M{etW R~ks5v-');
define('SECURE_AUTH_SALT',  ')B$ >5|+}dXo.jRrp&muJ;`k(/-E|_F}&w}(@]DUp 6icpmO:MME184Y?E<f 4ne');
define('LOGGED_IN_SALT',    '#x@qqx7]^uhG}1= 6ZJHA]}rLyB_i22M- wsat-N<!2?06>k9,`F/7t1QsV*<t^p');
define('NONCE_SALT',        'Gc-RFFMg+PBBr2l@z+wC_sc-WxN|Qjnki0B7N>%0xCd1.T.AR%F~zgRCAmJgE?T.');

define('APP_NAME',          'Cineflow');
define('APP_VER',           '3.0.1');

define('SESSION_ID_KEY',    'cfs_id');

define('LABEL_APIKEY',      'apikey');
define('VALUE_APIKEY',      '$2y$10$FBl8u6GdhGBvcTxJVP5P0.K7nKdVc9NoG40Hn3Bnt7cvwLI/MAYS6');

define('TABLE_PREFIX',      'cineflow_');
define('TABLE_CATEGORY',    TABLE_PREFIX . 'categories');
define('TABLE_USERS',       TABLE_PREFIX . 'users');
define('TABLE_OPTIONS',     TABLE_PREFIX . 'options');

define('VALIDATE_TEXT',     0);
define('VALIDATE_EMAIL',    1);
define('VALIDATE_USERNAME', 2);
define('VALIDATE_POSTAL',   3);
define('VALIDATE_PHONE',    4);
define('VALIDATE_NAME',     5);

require_once "Status.php";
?>
