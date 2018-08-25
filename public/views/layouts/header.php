<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sign IN / Sign UP form</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="/public/css/bootstrap.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="/public/css/mdb.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="/public/css/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-light bg-info navbar-1 white mb-3">

    <a class="navbar-brand" href="#" data-toggle="collapse" data-target="#navbarSupportedContent15"
       aria-controls="navbarSupportedContent15"
       aria-expanded="false" aria-label="Toggle navigation">MENU </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent15"
            aria-controls="navbarSupportedContent15"
            aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent15">
        <ul class="navbar-nav mr-auto">
            <? if (Auth::isGuest()): ?>
                <li class="nav-item active">
                    <a class="nav-link" href="/auth">Registration / Login</a>
                </li>
            <? elseif (!Auth::isGuest() && Auth::userId()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/user/edit">Edit profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/user/logout">Logout</a>
                </li>
            <? endif; ?>
            <? if (Config::get('isOpenListForGuests') || Auth::userId()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/users">Users List</a>
                </li>
            <? endif; ?>
        </ul>
    </div>
</nav>
