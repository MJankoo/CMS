<?php

$post = $data['post'];

?>

<!DOCTYPE HTML>
<?php require_once("header.php") ?>

<body>
<?php require_once("top_bar.php") ?>

<div class="container recipe_container flex">
    <div class="recipe_images">
        <img src="<?php echo ABSPATH."public/img/buleczki.png"?>" alt="main_image">
    </div>
    <div class="recipe_data">
        <div class="recipe_header">
            <div class="small_data_header flex">
                <div class="recipe_date_small">4 styczeń, 2020</div>
                <div class="recipe_preparation_time flex">
                    <img src="<?php echo ABSPATH."themes/user/Default/img/clock_icon.svg"?>" alt="preparation_time_icon">
                    <span><?php echo $post->getPreparationTime() ?></span>
                </div>
            </div>
            <h1 class="recipe_title"><?php echo $post->getTitle() ?></h1>
        </div>
        <div class="recipe_ingredients">
            <h3 class="recipe_section_title">Składniki:</h3>
            <ul>
                <?php
                foreach ($post->getIngredients() as $ingredient) {
                    echo "<li>".$ingredient."</li>";
                }
                ?>
            </ul>
        </div>
        <div class="recipe_content">
            <h3 class="recipe_section_title">Sposób przygotowania:</h3>
            <ul>
                <li></li>
            </ul>
        </div>
    </div>
</div>


<footer>
    <div class="container">
        <?php require_once("footer.php") ?>
    </div>
</footer>
<!--Load JavaScript-->
<?php require_once("scripts.php") ?>
</body>
</html>