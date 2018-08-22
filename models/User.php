<?php



class User
{

    public static function register($user)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO user (first_name, last_name, email, password, description) '
                . 'VALUES (:first_name, :last_name, :email, :password, :description)';
        $hash_password = md5($user['password']);

        $result = $db->prepare($sql);
        $result->bindParam(':first_name', $user['first_name'], PDO::PARAM_STR);
        $result->bindParam(':last_name', $user['last_name'], PDO::PARAM_STR);
        $result->bindParam(':email', $user['email'], PDO::PARAM_STR);
        $result->bindParam(':password', $hash_password, PDO::PARAM_STR);
        $result->bindParam(':description', $user['description'], PDO::PARAM_STR);

        return $result->execute();
    }

    public static function edit($id, $name, $password)
    {
        $db = Db::getConnection();

        $sql = "UPDATE user 
            SET name = :name, password = :password 
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }

    public static function checkUserData($email, $password)
    {
        $db = Db::getConnection();
        $password = md5($password);

        $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();

        if ($user) {
            return $user['id'];
        }
        return false;
    }

    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    public static function checkLogged()
    {
        // Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /user/login");
    }

    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    public static function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    public static function checkPhone($phone)
    {
        if (strlen($phone) >= 10) {
            return true;
        }
        return false;
    }

    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public static function checkEmailExists($email)
    {
        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }

    public static function getUserById($id)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM user WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

    public static function setToken($id, $token)
    {
        $login_time = time();
        $db = Db::getConnection();
        $sql = 'UPDATE user SET session_token = :token , last_login = :last_login WHERE id = :uid';

        //var_dump("id: ", $id, 'tiken:' , $token);die;
        $result = $db->prepare($sql);

        $result->bindParam(':last_login', $login_time, PDO::PARAM_INT);
        $result->bindParam(':token', $token, PDO::PARAM_STR);
        $result->bindParam(':uid', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function removeToken($id)
    {
        $db = Db::getConnection();
        $sql = 'UPDATE user SET session_token = NULL WHERE id = :uid';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
    }

}
