<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));
require_once(ROOT . '/components/Autoload.php');
$session_live_time = Config::get('session_live_time');
$now = time();

session_start();

if (isset($_SESSION['discard_after']) && $now > $_SESSION['discard_after']) {
    Auth::clearSession();
}

$_SESSION['discard_after'] = $now + $session_live_time;

$router = new Router();
$router->run();

