<?php

session_start();

class adminPanel
{
    private $db;
    private $controller;

    public function __construct() {
        $this->db = new Database();
    }

    public function index($error = 0) {
        if(isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
            $url = $this->parseUrl($_GET['url']);
            if(isset($url[1]) && file_exists("app/admin/controllers/". $url[1] . '.php')){
                require_once ("app/admin/controllers/". $url[1] . ".php");
                $this->controller = new $url[1];
            } else {
                require_once ("app/admin/controllers/Main.php");
                $this->controller = new Main();
            }

            require_once("themes/admin/Default/index.php");
            return;
        }

        if(!isset($_POST['username']) && !isset($_POST['password']) ) {
            require_once("themes/admin/Default/login.php");
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
            require_once("themes/admin/Default/index.php");
        }
        else {
            unset($_POST['username']);
            unset($_POST['password']);
            $this->index("Invalid data");
        }
     }

    private function parseUrl(){
        if(isset($_GET['url'])){
            return $url = explode("/", filter_var(rtrim($_GET["url"], "/"), FILTER_SANITIZE_URL));
        }
    }
}