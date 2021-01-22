<?php

class przepisy extends Controller {

    public function index()
    {
        $data['route'] = 'Przepisy';
        $this->view("recipes", $data);
    }
}