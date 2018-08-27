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
        $executed = $result->execute();

        if ($executed) {
            return $db->lastInsertId();
        } else {
            $errors[] = "Ошибка при регистрации.";
            var_dump($errors);die;
            return false;
        }
    }

    public static function edit($data)
    {
        $id = Auth::userId();
        $sql = "UPDATE user 
            SET first_name = :first_name, last_name = :last_name, description = :description 
            WHERE id = :id";

        $result = Db::getConnection()->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':first_name', $data['first_name'], PDO::PARAM_STR);
        $result->bindParam(':last_name', $data['last_name'], PDO::PARAM_STR);
        $result->bindParam(':description', $data['description'], PDO::PARAM_STR);
        return $result->execute();
    }

    public static function logout()
    {
        $id = Auth::userId();
        $id = intval($id);
        $empty = 'empty';
        $sql = "UPDATE user 
            SET session_token = :session_token
            WHERE id = :id";

        $result = Db::getConnection()->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':session_token', $empty, PDO::PARAM_STR);
        return $result->execute();
    }

    public static function countUsers()
    {
        return Db::getConnection()->query('SELECT count(id) FROM user')->fetch();
    }

    public static function checkUserData($email, $password)
    {
        $password = md5($password);

        $sql = "SELECT * FROM user WHERE email = :email AND password = :password";

        $result = Db::getConnection()->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();

        if ($user) {
            return $user['id'];
        }
        return false;
    }

    public static function checkName($name)
    {
        if (strlen($name) >= 2) {
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

    public static function checkEmailExists($email)
    {
        $sql = "SELECT COUNT(*) FROM user WHERE email = :email";

        $result = Db::getConnection()->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }

    public static function getUserById($id)
    {
        $sql = "SELECT * FROM user WHERE id = :id";

        $result = Db::getConnection()->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

    public static function setToken($id, $token)
    {
        $login_time = time();
        $sql = "UPDATE user SET session_token = :token , last_login = :last_login WHERE id = :uid";

        $result = Db::getConnection()->prepare($sql);

        $result->bindParam(':last_login', $login_time, PDO::PARAM_INT);
        $result->bindParam(':token', $token, PDO::PARAM_STR);
        $result->bindParam(':uid', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function setAvatar($url)
    {
        $id = Auth::userId();
        $sql = "UPDATE user SET image = :image WHERE id = :uid";

        $result = Db::getConnection()->prepare($sql);

        $result->bindParam(':image', $url, PDO::PARAM_STR);
        $result->bindParam(':uid', $id, PDO::PARAM_INT);
        $result->execute();
        return $result;
    }

    public static function removeToken($id)
    {
        $empty = 'empty';
        $intId = intval($id);
        $sql = "UPDATE user SET session_token = :empty WHERE id = :uid";
        $result = Db::getConnection()->prepare($sql);
        $result->bindParam(':uid', $intId, PDO::PARAM_INT);
        $result->bindParam(':empty', $empty, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function getAllForPage($page)
    {
        $limit = Config::get('showUsersInPage');
        $offset = ($page - 1) * $limit;
        $sql = "SELECT id, first_name, last_name, email, image, description FROM user "
            . "ORDER BY id ASC LIMIT :limit OFFSET :offset";

        $prepared = Db::getConnection()->prepare($sql);
        $prepared->bindParam(':limit', $limit, PDO::PARAM_INT);
        $prepared->bindParam(':offset', $offset, PDO::PARAM_INT);
        $prepared->execute();
        return $prepared->fetchAll();
    }

    public static function getIdByEmail($email)
    {
        $sql = "SELECT id FROM user WHERE email = :email";

        $result = Db::getConnection()->prepare($sql);
        $result->bindParam(':email', $password, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();

        if ($user) {
            return $user['id'];
        }
        return false;

    }
}
