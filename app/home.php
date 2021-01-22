<?php

class Home extends Controller {

    public function index()
    {
        $data['route'] = 'Strona główna';
        $this->view("index", $data);
    }
}
