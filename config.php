<?php

/**
 * Change the following part when in prod:
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('ROOT_DIR', '/opt/lampp/htdocs/');

$config   = include(ROOT_DIR . 'config/config-pagination.php');
$proj_dir = ROOT_DIR . "pagination/";

/**
 * End of must-change part.
 */

define('BASE_URL', $config->base_url);

define('DB_HOST', $config->database['hostname']);
define('DB_NAME', $config->database['database']);
define('DB_USER', $config->database['username']);
define('DB_PASS', $config->database['password']);

function redirectToIndex($message = '')
{
    echo "<meta http-equiv='refresh' content='0;URL=" . BASE_URL . "'>";
    if(!empty($message)) {
        echo "<script type='text/javascript'> alert('" . $message . "'); </script>";
    }
    exit;

}

// EOF
