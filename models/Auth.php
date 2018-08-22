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


    }

    public static function userId()
    {

    }

    public static function addToSession( $user)
    {
        $token = md5($user['id'].$user['first_name'].time());
        $_SESSION['token'] = $token;
        $_SESSION['uid'] = $user['id'];
        return $token;
    }

}