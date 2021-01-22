<?php

session_start();

class adminPanel
{
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function index($error = 0) {
        if(isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
            require_once("themes/Default/index.php");
            return;
        }

        if(!isset($_POST['username']) && !isset($_POST['password']) ) {
            require_once("themes/Default/login.php");
        } else {
            $this->login($_POST['username'], $_POST['password']);
        }

        if($error != 0) {
            echo($error);
        }
    }
     private function login($username, $password) {

        $params = ['username' => $username, 'password' => $password];
        $repository = $this->db->getRepository('Admins');
        $response = $repository->findBy($params);

        if(count($response) > 0) {
            $_SESSION['logged'] = true;
            require_once("themes/Default/index.php");
        }
        else {
            unset($_POST['username']);
            unset($_POST['password']);
            $this->index("Invalid data");
        }
     }
}