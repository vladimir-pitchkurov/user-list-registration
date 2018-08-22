<?php
/**
 * Created by IntelliJ IDEA.
 * User: admin
 * Date: 20.08.2018
 * Time: 20:24
 */

class SiteController
{

    public function actionIndex()
    {
        include_once ROOT.'/public/views/login-page.php';
        return true;
    }

    public function actionList()
    {
        var_dump($_SESSION);
        echo 'Hello from List!';
        return true;
    }

}