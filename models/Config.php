<?php


class Config
{
    public static function get($key = null)
    {
        $configs = include (ROOT.'/config/app-config.php');
        if(isset($key)){
            return isset($configs[$key]) ? $configs[$key] : false;
        }else{
            return $configs;
        }
    }
}