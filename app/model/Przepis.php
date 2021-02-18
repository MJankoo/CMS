<?php

class Przepis {
    private $id;
    private $link;
    private $title;
    private $images;
    private $description;
    private $content;
    private $ingredients;
    private $authorId;
    private $date;
    private $preparationTime;
    private $categories;
    private $status;

    public function __construct($link="", $title="", $images="",$authorId=0, $categories=0, $content="", $date="", $preparationTime="", $description="", $ingredients="", $status="") {
        $this->id = "";
        $this->link = $link;
        $this->title = $title;
        $this->images = $images;
        $this->description = $description;
        $this->content = $content;
        $this->ingredients = $ingredients;
        $this->authorId = $authorId;
        $this->date = $date;
        $this->preparationTime = $preparationTime;
        $this->categories = $categories;
        $this->status = $status;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function setLink($link)
    {
        $this->link = $link;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getImages()
    {
        return $this->images;
    }

    public function setImages($images)
    {
        $this->images = $images;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getIngredients()
    {
        return $this->ingredients;
    }

    public function setIngredients($ingredients)
    {
        $this->ingredients = $ingredients;
    }

    public function getAuthorId()
    {
        return $this->authorId;
    }

    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getPreparationTime()
    {
        return $this->preparationTime;
    }

    public function setPreparationTime($preparationTime)
    {
        $this->preparationTime = $preparationTime;
    }

    public function getCategories()
    {
        return $this->categories;
    }

    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

}

?>