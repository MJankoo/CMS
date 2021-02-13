<?php

class Recipe {
    private $id;

    public function index() {
        $url = parseUrl();
        if(isset($url[2])) {
            $post = $this->getRecipeData($url[2]);
            $this->id = $post->getId();
            require_once("themes/admin/Default/component/editPost.php");
        } else {
            require_once("themes/admin/Default/component/addPost.php");
        }

        if(isset($_POST['recipe_title'])) {
            $przepis = $this->createPost();
            echo($this->id);
            if($przepis != null) {
                if($this->id != null) {
                    $this->editPost($przepis);
                } else {
                    $this->addPost($przepis);
                }
            }
        }
    }

    private function createPost() {
        $everything_ok = true;

        $link = $_POST['recipe_link'];
        $title= $_POST['recipe_title'];
        $description = $_POST['recipe_description'];
        $content = $_POST['recipe_content'];
        $ingredients = $_POST['recipe_ingredients'];
        $authorId = 1;
        $date = $_POST['recipe_date'];
        $preparationTime = "20 min";
        $categories = $_POST['recipe_categories'];
        $status = $_POST['recipe_status'];

        if($link == "" || $title == "" || $description == "" || $content == "" || $content == "" || $status == "") {
            $everything_ok = false;
        }

        if($everything_ok) {
            $przepis = new Przepis($link, $title, $authorId, $categories, $content, $date, $preparationTime, $description, $ingredients, $status);

            return $przepis;
        } else {
            return null;
        }
    }

    private function addPost($przepis) {
            $db = new Database();
            $em = $db->getManager();
            $em->create($przepis);
    }

    private function editPost($przepis) {
        $przepis->setId($this->id);

        $db = new Database();
        $em = $db->getManager();
        $em->update($przepis);

    }

    private function getRecipeData($link) {
        $db = new Database();
        $post = $db->getRepository("Przepis")->findBy(['link'=>$link]);
        return $post;
    }
}