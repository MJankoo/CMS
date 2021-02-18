<?php

class SearchController
{
    public function index() {
        if(isset($_GET['search'])) {
            $this->search($_GET['search']);
        }
    }

    public function search($searchValue) {

    }
}