<?php

class Administrator
{
    private $adminPanel;

    public function index()
    {
        require_once("admin/adminPanel.php");
        $this->adminPanel = new adminPanel();

        call_user_func_array([$this->adminPanel, "index"], []);
    }
}