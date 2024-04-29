<?php

require_once '../models/User.php';
require_once '../helpers/session_helper.php';

class Users
{

    private $userModel;

    public function __construct()
    {
        $this->userModel = new User;
    }



    public function login()
    {
        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //Init data
        $data = [
            'login' => trim($_POST['login']),
            'usersPwd' => trim($_POST['usersPwd'])
        ];

        if (empty($data['login']) || empty($data['usersPwd'])) {
            flash("login", "Veuillez remplir tout les champs");
            header("location: ../login.php");
            exit();
        }

        //Check for  login
        if ($this->userModel->findVisitorByLogin($data['login'], $data['login'])) {
            //User Found
            $loggedInUser = $this->userModel->login($data['login'], $data['usersPwd']);
            if ($loggedInUser) {
                //Create session
                $this->createUserSession($loggedInUser);
            } else {
                flash("login", "Mot de passe incorrect");
                redirect("../login.php");
            }
        } else {
            flash("login", "Utilisateur introuvable");
            redirect("../login.php");
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['usersId'] = $user->id;
        $_SESSION['usersName'] = $user->prenom;
        $_SESSION['usersLogin'] = $user->login;
        redirect("../indexe.php");
    }

    public function logout()
    {
        unset($_SESSION['usersId']);
        unset($_SESSION['usersName']);
        unset($_SESSION['usersLogin']);
        session_destroy();
        redirect("../login.php");
    }
}

$init = new Users;

//Ensure that user is sending a post request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_POST['type']) {
        case 'login':
            $init->login();
            break;
        default:
            redirect("../indexe.php");
    }
} else {
    switch ($_GET['q']) {
        case 'logout':
            $init->logout();
            break;
        default:
            redirect("../index.php");
    }
}
