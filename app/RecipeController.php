<?php

class recipeController extends Controller {

    public function index()
    {
        $url = parseUrl();
        if(isset($url[1])) {
            $db = new Database();
            $post = $db->getRepository("Przepis")->findBy(["link"=>$url[1]]);
            if($post != null) {
                $data['route'] = 'Przepis';
                $post->setIngredients(json_decode($post->getIngredients()));
                $data['post'] = $post;
                $this->view("recipe", $data);
            } else
                echo ("Nie ma takiego przepisu");
        } else {
            header("Location: strona-glowna");
        }
    }
}