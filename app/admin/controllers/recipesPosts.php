<?php


class recipesPosts
{
    public function index() {
        $db = new Database();
        $posts = $db->getRepository('Przepis')->findAll(50, 0);
        require_once("themes/admin/Default/component/recipesPosts.php");
    }
}