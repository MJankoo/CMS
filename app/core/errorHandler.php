<?php

class ErrorHandler extends Controller {

    public function error($type) {

        $this->view('error_pages/404');
    }
}