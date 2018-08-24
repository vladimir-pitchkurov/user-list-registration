<?php

return array(
    'auth'                => 'site/index',
    'users/page-([0-9]+)' => 'site/list/$1',
    'users'               => 'site/list',
    'user/register'       => 'user/register',
    'user/login'          => 'user/login',
    'user/logout'         => 'user/logout',
    'user/edit'           => 'user/edit',
    'user/update-image'   => 'user/image',
    'user/update'         => 'user/update',
    'index.php'           => 'site/index', // actionIndex в SiteController
    ''                    => 'site/index', // actionIndex в SiteController

);
