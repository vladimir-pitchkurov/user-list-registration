<?php
/**
 * Created by IntelliJ IDEA.
 * User: admin
 * Date: 20.08.2018
 * Time: 20:24
 */

class SiteController
{

    function actionIndex()
    {
        //echo "Hello world!";
        include_once ROOT.'/public/views/login-page.php';
        return true;
    }

}