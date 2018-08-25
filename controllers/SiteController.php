<?php

class SiteController
{

    public function actionIndex()
    {
        if (!Auth::isGuest() || Auth::userId()) {
            header("Location: /users");
            return true;
        }
        include_once ROOT . '/public/views/login-page.php';
        return true;
    }

    public function actionList($page = 1)
    {
        if(!Config::get('isOpenListForGuests')){
            Auth::guardedRoute();
        }
        $showEmail = Config::get('canShowEmail');
        $empty_image = Config::get('empty_image');
        $users = User::getAllForPage($page);
        if(!sizeof($users) && $page !== 1){
            header("Location: /users");
            return true;
        }
        $total = intval(User::countUsers()[0]);
        $pagination = new Pagination($total, $page, Config::get('showUsersInPage'), 'page-');

        include_once(ROOT . '/public/views/user-list.php');
        return true;
    }

    public function actionErrUrl($url = false)
    {
        include_once (ROOT.'/public/views/error404.php');
        return true;
    }

}