<?php
error_reporting(E_ALL);

include_once 'Database.php';

$database = new Database();

session_start();

switch ($_REQUEST['action']) {
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include('templates/login.php');
        } else {
            $login = $_REQUEST['login'];
            $password = $_REQUEST['password'];
            $result = $database->signIn($login, $password);

            if($result['success']) {
                header('Location: /?action=dashboard');
            } else {
                header('Location: /?action=login&error='.$result['message']);
            }
        }
        break;
    case 'register':
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include('templates/register.php');
        } else {
            $login = $_REQUEST['login'];
            $password1 = $_REQUEST['password1'];
            $password2 = $_REQUEST['password2'];
            $email = $_REQUEST['email'];

            if($password1 != $password2) header('Location: /?action=register&error=Пароли не совпадают');

            $database->signUp($login, $email, $password2);
        }
        break;
    case 'check_login':
        header('Content-Type: Application/JSON');
        echo(json_encode(array(
            'result' => $database->exists(array(
                'login' => $_REQUEST['login']
            ))
        )));
        break;
    case 'check_email':
        header('Content-Type: Application/JSON');
        echo(json_encode(array(
            'result' => $database->exists(array(
                'email' => $_REQUEST['email']
            ))
        )));
        break;
    case 'logout':
        unset($_SESSION['user']);
        header('Location: /?action=login');
        break;
    case 'dashboard':
        if(!isset($_SESSION['user'])) {
            header('Location: /?action=login');
        }
        include('templates/dashboard.php');
        break;
    default:
        if(isset($_SESSION['user'])) {
            header('Location: /?action=dashboard');
        } else {
            header('Location: /?action=login');
        }
        break;
}

