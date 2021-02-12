<?php

class Recipe {
    public function index() {
        if(isset($_POST['recipe_title'])) {
            $this->addPost();
        }

        $url = parseUrl();

        if(isset($url[2])) {
            $post = $this->getRecipeData($url[2]);
            $post = $post[0];
            require_once("themes/admin/Default/component/editPost.php");
        } else {
            require_once("themes/admin/Default/component/addPost.php");
        }
    }

    private function addPost() {
        $everything_ok = true;

        $link = $_POST['recipe_link'];
        $title= $_POST['recipe_title'];
        $description = $_POST['recipe_description'];
        $content = $_POST['recipe_content'];
        $ingredients = $_POST['recipe_ingredients'];
        $authorId = 1;
        $date = $_POST['recipe_date'];
        $categories = $_POST['recipe_categories'];
        $status = $_POST['recipe_status'];

        if($link == "" || $title == "" || $description == "" || $content == "" || $content == "" || $status == "") {
            $everything_ok = false;
        }

        if($everything_ok) {
            $przepis = new Przepis($link, $title, $authorId, $categories, $content, $date, $description, $ingredients, $status);

            $db = new Database();
            $em = $db->getManager();
            $em->create($przepis);
        }
    }

    private function getRecipeData($link) {
        $db = new Database();
        $post = $db->getRepository("Przepis")->findBy(['link'=>$link]);
        return $post;
    }
}