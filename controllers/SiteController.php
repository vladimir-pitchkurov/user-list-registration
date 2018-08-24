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
        if (!Auth::isGuest() || Auth::userId()) {
            header("Location: /users");
            return true;
        }
        include_once ROOT . '/public/views/login-page.php';
        return true;
    }

    public function actionList($page = 1)
    {
        if (Auth::isGuest() || !Auth::userId()) {
            header("Location: /auth");
            return true;
        }

        $empty_image = '/public/uploads/images/empty.jpg';
        $users = User::getAllForPage($page);
        $total = intval(User::countUsers()[0]);

        $pagination = new Pagination($total, $page, User::SHOW_BY_DEFAULT, 'page-');


        include_once(ROOT . '/public/views/user-list.php');
        return true;
    }

}