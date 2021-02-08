<?php

class Recipe {
    public function index() {
        var_dump("xDDD");
        if(isset($_POST['recipe_title'])) {
            var_dump($_POST['recipe_title']);
            $this->addPost();
        }
        require_once("app/admin/themes/Default/component/addPost.php");
    }

    private function addPost() {
        $link = $_POST['recipe_link'];
        $title= $_POST['recipe_title'];
        $description = $_POST['recipe_description'];
        $content = $_POST['recipe_content'];
        $ingredients = "{\"1\": \"lala\"}";
        $authorId = 1;
        $date = $_POST['recipe_date'];
        $categories = $_POST['recipe_categories'];
        $status = $_POST['recipe_status'];

        $przepis = new Przepis($link, $title, $authorId, $categories, $content, $date, $description, $ingredients, $status);

        $db = new Database();
        $em = $db->getManager();
        $em->flush($przepis);
    }


}