<?php

class Controller {
    public function index() {
        echo "Welcome on ".$_SERVER['REQUEST_URI']."!";
    }

    public function model($model){
        require_once "../cheat/app/models/" . $model . ".php";
        return new $model();
    }


    public function view($view, $data=[]){
        require_once ("../cheat/themes/Default/" . $view . ".php");
    }

}