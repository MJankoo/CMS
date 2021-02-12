<?php

class przepisy extends Controller {

    public function index()
    {
        $url = parseUrl();
        if(isset($url[1])) {
            $db = new Database();
            $post = $db->getRepository("Przepis")->findBy(["link"=>$url[1]]);
            if(count($post) > 0) {
                $data['route'] = 'Przepis';
                $this->view("recipe", $data);
            } else
                echo ("Nie ma takiego przepisu");
        } else {
            $data['route'] = 'Przepisy';
            $this->view("recipes", $data);
        }
    }
}