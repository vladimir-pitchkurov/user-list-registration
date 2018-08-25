<?php
/**
 * Created by IntelliJ IDEA.
 * User: admin
 * Date: 21.08.2018
 * Time: 22:35
 */

class Auth
{
    public static function isGuest()
    {
        return (!isset($_SESSION['token']) && !isset($_SESSION['uid']));
    }

    public static function userId()
    {
        if (self::isGuest()) {
            return false;
        } else {
            $session_time = Config::get('session_live_time');
            $user = User::getUserById(intval($_SESSION['uid']));
            if (!isset($user)) {
                return false;
            }
            return ($user['session_token'] == $_SESSION['token']
                && intval($user['last_login']) > time() - (intval($session_time)))
                ? $user['id'] : false;
        }

    }

    public static function addToSession($user)
    {
        $token = md5($user['id'] . $user['first_name'] . time());
        $_SESSION['token'] = $token;
        $_SESSION['uid'] = $user['id'];
        return $token;
    }

    public static function clearSession()
    {
        session_unset();
        session_destroy();
        session_start();
    }

    public static function guardedRoute()
    {
        if (self::isGuest() || !Auth::userId()) {
            self::clearSession();
            header("Location: /auth");
            return true;
        }
    }
}