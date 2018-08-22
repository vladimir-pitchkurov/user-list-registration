<?php

ini_set('display_errors',1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Autoload.php');
$session_settings = include (ROOT.'/config/session_time.php');


session_start();

$now = time();
if (isset($_SESSION['discard_after']) && $now > $_SESSION['discard_after']) {
    session_unset();
    session_destroy();
    session_start();
}

$_SESSION['discard_after'] = $now + $session_settings['session_live_time'];



$router = new Router();
$router->run();

