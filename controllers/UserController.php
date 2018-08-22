<?php


class UserController
{

    public function actionRegister()
    {
        $errors = false;
        $user = [];
        if($_POST['first_name'] &&
            $_POST['last_name'] &&
            $_POST['email'] &&
            $_POST['password'] &&
            $_POST['description']
        ){
            $user = $_POST;

            if (!User::checkName($user['first_name'])) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            if (!User::checkName($user['last_name'])) {
                $errors[] = 'Фамилия не должно быть короче 2-х символов';
            }
            if (!User::checkEmail($user['email'])) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($user['password'])) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            if (User::checkEmailExists($user['email'])) {
                $errors[] = 'Такой email уже используется';
            }

            if ($errors == false) {
                $result = User::register($user);
            }
            if($result){
                $uid = User::checkUserData($user['email'], $user['password']);
                if($uid){
                    $user['id'] = $uid;
                    $token = Auth::addToSession($user);
                    $set_token = User::setToken($uid, $token);
                    if(isset($set_token)){
                        header("Location: /users");
                    }else{
                        $errors[] = 'что-то пошло не так при coхранении токена';
                    }
                }else{
                    $errors[] = 'что-то пошло не так при регистрации / авторизации  :(';
                }
            }else{
                $errors[] = 'Регистрация не удалась ((';
            }
        }




        require_once(ROOT . '/public/views/login-page.php');
        return true;
    }

    public function actionLogin()
    {
        $email = false;
        $password = false;

        var_dump($_COOKIE);
        echo '<br>';

        var_dump($_POST);
        echo '<br>';

        $token = Auth::addToSession(['id' => 2, 'first_name' => 'vasya']);
        echo '$token: '.$token;
        echo '<br>';

        var_dump($_SESSION);
        echo '<br>';
        die;

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];


            $errors = false;

            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);

                // Перенаправляем пользователя в закрытую часть - кабинет 
                header("Location: /cabinet");
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/user/login.php');
        return true;
    }

    /**
     * Удаляем данные о пользователе из сессии
     */
    public function actionLogout()
    {
        // Стартуем сессию
        session_start();
        
        // Удаляем информацию о пользователе из сессии
        unset($_SESSION["user"]);
        
        // Перенаправляем пользователя на главную страницу
        header("Location: /");
    }



}
