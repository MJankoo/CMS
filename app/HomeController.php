<?php

class HomeController extends Controller {

    public function index()
    {
        $db = new Database();
        $posts = $db->getRepository("Przepis")->findAll(5, 0);

        $data['posts'] = $posts;
        $data['route'] = 'Strona główna';
        $this->view("index", $data);
    }
}
