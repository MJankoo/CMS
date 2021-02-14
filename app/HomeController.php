<?php

class HomeController extends Controller {

    public function index()
    {
        $db = new Database();
        $posts = $db->getRepository("Przepis")->findAll(5, 0,"date" ,["status" => "active", "date" => date("Y-m-d")]);

        $data['posts'] = $posts;
        $data['route'] = 'Strona główna';
        $this->view("index", $data);
    }
}
