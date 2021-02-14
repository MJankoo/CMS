<?php

class Recipe {
    private $id;

    public function index() {

        $url = parseUrl();
        if(isset($url[2])) {
            $post = $this->getRecipeData($url[2]);
            $this->id = $post->getId();
        }

        if(isset($_POST['recipe_title'])) {
            $przepis = $this->createPost();
            if($przepis != null) {
                if($this->id != null) {
                    $this->editPost($przepis);
                } else {
                    $this->uploadFiles($przepis->getLink());
                    $this->addPost($przepis);
                }
            }
        }

        if(isset($url[2])) {
            require_once("themes/admin/Default/component/editPost.php");
        } else {
            require_once("themes/admin/Default/component/addPost.php");
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
        $preparationTime = $_POST['recipe_preparation_time'];
        $categories = $_POST['recipe_categories'];
        $status = $_POST['recipe_status'];

        if($link == "" || $title == "" || $description == "" || $content == "" || $content == "" || $status == "") {
            $everything_ok = false;
            echo("niedodano");
        }

        if($everything_ok) {
            $przepis = new Przepis($link, $title, $authorId, $categories, $content, $date, $preparationTime, $description, $ingredients, $status);
            echo("yes2");
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

        header('Location: '.$_SERVER['REQUEST_URI']);
    }

    private function uploadFiles($link) {
        if (!file_exists('public/recipes/'.$link)) {
            mkdir('public/recipes/'.$link, 0777, true);
        }
        $targetDir = "public/recipes/".$link."/";
        $targetFilePath = $targetDir . "main_image.".pathinfo($_FILES['recipe_main_image']['name'], PATHINFO_EXTENSION);
            if(move_uploaded_file($_FILES["recipe_main_image"]["tmp_name"], $targetFilePath)){
                if(isset($_FILES['recipe_images'])) {
                    echo("yes");
                    foreach($_FILES['recipe_images']['name'] as $key=>$val) {
                        $fileName = basename($_FILES['recipe_images']['name'][$key]);
                        $targetFilePath = $targetDir . $fileName;
                        if(move_uploaded_file($_FILES["recipe_images"]["tmp_name"][$key], $targetFilePath)){
                            return true;
                        }
                    }
                }
            }
    }

    private function getRecipeData($link) {
        $db = new Database();
        $post = $db->getRepository("Przepis")->findBy(['link'=>$link]);
        return $post;
    }
}