<?php

class App {
    protected $controller = "home";
    protected $method = "index";
    protected $params = [];

    public function __construct(){

        $url = $this -> parseUrl();

        if(isset($url[0]) && file_exists("../cheat/app/". $url[0] . '.php')){

            $this->controller = $url[0];
            unset($url[0]);

            require_once ("../cheat/app/".$this->controller.".php");
            $this -> controller = new $this -> controller;
        } else {
            if(!isset($url[0])) {
                $this->controller = "home";
                require_once ("../cheat/app/".$this->controller.".php");
                $this -> controller = new $this -> controller;
            } else {
                $this->controller = "errorHandler";
                $this->method = "error";
                $this->params = ['404'];
                require_once ("../cheat/app/core/".$this->controller.".php");
                $this -> controller = new $this -> controller;
            }
        }

        if(isset($url[1])){

            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl(){
        if(isset($_GET['url'])){
            return $url = explode("/", filter_var(rtrim($_GET["url"], "/"), FILTER_SANITIZE_URL));
        }
    }
}
