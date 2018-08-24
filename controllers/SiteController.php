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
        $setting = include_once (ROOT."/config/user_list_is_open.php");
        if(!$setting['isOpen']){
            Auth::guardedRoute();
        }
        $showEmail = $setting['canShowEmail'];
        $empty_image = '/public/uploads/images/empty.jpg';
        $users = User::getAllForPage($page);
        if(!sizeof($users) && $page !== 1){
            header("Location: /users");
            return true;
        }
        $total = intval(User::countUsers()[0]);
        $pagination = new Pagination($total, $page, User::SHOW_BY_DEFAULT, 'page-');

        include_once(ROOT . '/public/views/user-list.php');
        return true;
    }

}