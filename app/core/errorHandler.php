<?php

class ErrorHandler extends Controller {

    public function error($type) {
        http_response_code(404);
        $this->view('error_pages/404');
    }
}