<?php

class Recipe {
    private $id;

    public function index() {

        $url = parseUrl();
        if(isset($url[2])) {
            $post = $this->getRecipeData($url[2]);
            if($post != null)
                $this->id = $post->getId();
        }

        if(isset($_POST['recipe_title'])) {
            $przepis = $this->createPost();
            if($przepis != null) {
                if($this->id != null) {
                    $images = $this->uploadFiles($przepis->getLink(), $post->getLink());
                    if(is_array($images)) {
                        $przepis->setImages(json_encode($images, JSON_FORCE_OBJECT));
                        $this->editPost($przepis);
                    } else {
                        $przepis->setImages($post->getImages());
                        $this->editPost($przepis);
                    }
                } else {
                    $images = $this->uploadFiles($przepis->getLink());
                    if(is_array($images)) {
                        $przepis->setImages(json_encode($images, JSON_FORCE_OBJECT));
                        $this->addPost($przepis);
                    }
                }
            }
        }

        if(isset($url[2]) && $post != null) {
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
        }

        if($everything_ok) {
            $przepis = new Przepis($link, $title, "", $authorId, $categories, $content, $date, $preparationTime, $description, $ingredients, $status);
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

        //header('Location: '.ABSPATH."administrator/recipe/".$przepis->getLink());
    }

    private function updateFiles($oldLink, $newLink) {
        rename('public/recipes/'.$oldLink, 'public/recipes/'.$newLink);
    }

    private function uploadFiles($link, $oldLink = null) {
        if (!file_exists('public/recipes/'.$link)) {
            mkdir('public/recipes/'.$link, 0777, true);
        }

        if($oldLink != null) {
            rename('public/recipes/'.$oldLink, 'public/recipes/'.$link);
        }

        var_dump($_FILES['recipe_main_image']['name'] != "");
        var_dump($_FILES);
        var_dump($_FILES['recipe_main_image']['name'] != "" || $_FILES['recipe_images']['name'][0] != "");
        if($_FILES['recipe_main_image']['name'] != "") {
            echo("lala");
            $images = [];
            $targetDir = "public/recipes/".$link."/";
            $mainImageName = "main_image.".pathinfo($_FILES['recipe_main_image']['name'], PATHINFO_EXTENSION);
            $targetFilePath = $targetDir . $mainImageName;
            if(move_uploaded_file($_FILES["recipe_main_image"]["tmp_name"], $targetFilePath)){
                array_push($images, $mainImageName);
                if(isset($_FILES['recipe_images'])) {
                    foreach($_FILES['recipe_images']['name'] as $key=>$val) {
                        $fileName = basename($_FILES['recipe_images']['name'][$key]);
                        $targetFilePath = $targetDir . $fileName;
                        if(move_uploaded_file($_FILES["recipe_images"]["tmp_name"][$key], $targetFilePath)){
                            array_push($images, $fileName);
                        }
                    }
                    if(!empty($images)) {
                        return $images;
                    }
                }
            } else {
                echo("error");
            }
        }
    }

    private function getRecipeData($link) {
        $db = new Database();
        $post = $db->getRepository("Przepis")->findBy(['link'=>$link]);
        return $post;
    }
}