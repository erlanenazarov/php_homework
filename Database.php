<?php
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PASS', '123456789a');
define('DB_NAME', 'authentication');


class Database {
    private $connection = null;

    function db_connect() {
        if ($this->connection == null)
            $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        return $this->connection;
    }

    function signIn($login, $password) {
        $pass = md5($password);
        $sql = "SELECT * FROM users WHERE login='$login'";
        $result = mysqli_query($this->db_connect(), $sql);
        if(mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            if($user['password'] == $pass) {
                $_SESSION['user'] = $user;
                return array(
                    'success' => true,
                    'message' => 'Вы успешно вошли в систему'
                );
            } else {
                return array(
                    'success' => false,
                    'message' => 'Не правильный пароль'
                );
            }
        } else {
            return array(
                'success' => false,
                'message' => 'Пользователь не найден!'
            );
        }
    }

    function signUp($login, $email, $password) {
        $password = md5($password);
        $sql = "INSERT INTO users(login, email, password) VALUES('$login', '$email', '$password')";
        $result = mysqli_query($this->db_connect(), $sql) or die(mysqli_error($this->db_connect()));
        if($result) {
            $_SESSION['user'] = $this->get(array('login' => $login));
            header('Location: /?action=dashboard');
        } else {
            header('Location: /?action=register&error=Произошла неизвестная ошибка в базе...');
        }
    }

    function exists($options) {
        $filters = $this->prepareWhere($options);

        $sql = "SELECT * FROM users WHERE ".$filters;
        $result = mysqli_query($this->db_connect(), $sql);
        return mysqli_num_rows($result) > 0;
    }

    function get($options) {
        $filters = $this->prepareWhere($options);

        $sql = "SELECT * FROM users WHERE ".$filters;
        $result = mysqli_query($this->db_connect(), $sql);
        return mysqli_fetch_assoc($result);
    }

    function prepareWhere($data) {
        $filters = "";
        foreach($data as $key=>$value) {
            if(gettype($value) == "NULL") {
                $filters .= $filters != "" ? " AND $key IS $value" : "$key IS $value";
            } else if(gettype($value) == "boolean") {
                $value = $value ? 1 : 0;
                $filters .= $filters != "" ? " AND $key=$value" : "$key=$value";
            } else {
                $filters .= $filters != "" ? " AND $key='$value'" : "$key='$value'";
            }
        }

        return $filters;
    }

}