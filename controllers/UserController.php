<?php


class UserController
{
    public function actionEdit()
    {
        Auth::guardedRoute();
        $empty_image = Config::get('empty_image');
        $id = Auth::userId();
        $user = User::getUserById($id);
        include_once ROOT . '/public/views/edit.php';

        return true;
    }

    public function actionUpdate()
    {
        Auth::guardedRoute();
        if (sizeof($_POST) > 0) {
            $data = $_POST;
            User::edit($data);
        }
        header("Location: /user/edit");
        return true;
    }

    public function actionImage()
    {
        Auth::guardedRoute();

        $image_url = Config::get('images_path') . Auth::userId() . ".jpg";
        if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
            move_uploaded_file($_FILES["image"]["tmp_name"],
                $_SERVER['DOCUMENT_ROOT'] . $image_url);
            //var_dump($image_url);die;
            $res = User::setAvatar($image_url);
            //var_dump($res,$image_url);die;

        }
        header("Location: /user/edit");

        return true;
    }

    public function actionRegister()
    {
        $errors = [];
        $user = [];
        if ($_POST['first_name'] &&
            $_POST['last_name'] &&
            $_POST['email'] &&
            $_POST['password'] &&
            $_POST['description']
        ) {
            $user = $_POST;

            if (!User::checkName($user['first_name'])) {
                $errors[] = 'Имя не должно быть короче 2-х символов<br><h1><a href="/auth">Back to registration-form</a></h1>';
            }
            if (!User::checkName($user['last_name'])) {
                $errors[] = 'Фамилия не должно быть короче 2-х символов';
            }
            if (!User::checkPassword($user['password'])) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            if (User::checkEmailExists($user['email'])) {
                $errors[] = 'Такой email уже используется';
            }

            if (sizeof($errors) === 0) {
                $result = User::register($user);
            }else{
                var_dump($errors);echo '<br><h1><a href="/auth">Back to registration-form</a></h1>';die;
            }
            if ($result) {
                $user['id'] = $result;
                $token = Auth::addToSession($user);
                $set_token = User::setToken($result, $token);
                if ($set_token) {
                    header("Location: /users");
                    return true;
                } else {
                    echo 'что-то пошло не так при coхранении токена<br><h1><a href="/auth">Back to registration-form</a></h1>';
                    die;
                }
            } else {
                echo 'что-то пошло не так при регистрации / авторизации  :(<br><h1><a href="/auth">Back to registration-form</a></h1>';
                die;
            }
        } else {
            echo 'Регистрация не удалась ((<br><h1><a href="/auth">Back to registration-form</a></h1>';
            die;
        }

        return true;
    }

    public function actionLogin()
    {
        $errors = false;
        $user = [];
        $email = isset($_POST['login-email']) ? $_POST['login-email'] : false;
        $password = isset($_POST['login-password']) ? $_POST['login-password'] : false;
        if (
            $email &&
            $password
        ) {
            if (!User::checkPassword($password)) {
                header("Location: /auth");
            }
            $userId = User::checkUserData($email, $password);
            if (!$userId) {
                header("Location: /auth");
            }
            $token = Auth::addToSession(User::getUserById($userId));
            $isSetToken = User::setToken($userId, $token);
            if (!$isSetToken) {
                Auth::clearSession();
                header("Location: /auth");
            }
            header("Location: /users");
            return true;
        } else {
            header("Location: /auth");
            return true;
        }

    }

    public function actionLogout()
    {
        User::removeToken(Auth::userId());
        Auth::clearSession();
        header("Location: /auth");
        return true;
    }

}
