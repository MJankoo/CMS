<?php

class App {
    protected $controller = "homeController";
    protected $method = "index";
    protected $params = [];

    public function __construct(){

        $url = parseUrl();

        if(isset($url[0]) && isset(ROUTES[$url[0]])) {
            $this->controller = ROUTES[$url[0]];
            unset($url[0]);

            require_once ("../cheat/app/".$this->controller.".php");
            $this -> controller = new $this -> controller;
        } else {
            if(!isset($url[0]) || $url[0] == "") {
                $this->controller = "homeController";
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
}
