<!DOCTYPE HTML>
<?php require_once("header.php") ?>

<body>
    <?php require_once("top_bar.php") ?>

    <main>
        <div class="container">
            <section class="best_recipes_section">
                <div class="best_recipe flex">
                    <div class="best_recipe_data">
                        <span class="best_recipe_date">4 styczeń, 2021</span>
                        <h3 class="best_recipe_title">Domowe bułeczki z sezamem do burgerów</h3>
                        <div class="more_button">Więcej</div>
                        <div class="slider"></div>
                    </div>
                    <div class="best_recipe_image"><img src="<?php echo ABSPATH ?>public/img/buleczki.png" alt="buleczki"></div>
                </div>
                <div class="social_media_container">
                    <div class="social_media">
                        <img src="<?php echo ABSPATH ?>themes/Default/img/instagram-icon.png" alt="instagram-icon">
                    </div>
                    <div class="social_media">
                        <img src="<?php echo ABSPATH ?>themes/Default/img/facebook-icon.png" alt="facebook-icon">
                    </div>
                </div>
            </section>
            <section class="worlds_cuisines_section flex">
                <div class="left_arrow arrow" id="prevBtn"><img src="<?php echo ABSPATH ?>themes/Default/img/arrow2-icon.svg" alt="DOZMIANY"></div>
                <div class="worlds_cuisines_main">
                    <h2 class="section_title">Kuchnie świata</h2>
                    <div class="worlds_cuisines_slider_container">
                        <div class="worlds_cuisines_slider flex">
                            <div class="world_cuisine"">
                            <img src="<?php echo ABSPATH ?>public/img/3.png" alt="DOZMIANY">
                        </div>
                        <div class="world_cuisine">
                            <img src="<?php echo ABSPATH ?>public/img/4.png" alt="DOZMIANY">
                        </div>
                        <div class="world_cuisine" id="lastClone">
                            <img src="<?php echo ABSPATH ?>public/img/5.png" alt="DOZMIANY">
                        </div>
                        <div class="world_cuisine"><img src="<?php echo ABSPATH ?>public/img/1.png" alt="DOZMIANY"></div>
                        <div class="world_cuisine"><img src="<?php echo ABSPATH ?>public/img/2.png" alt="DOZMIANY"></div>
                        <div class="world_cuisine"><img src="<?php echo ABSPATH ?>public/img/3.png" alt="DOZMIANY"></div>
                        <div class="world_cuisine"><img src="<?php echo ABSPATH ?>public/img/4.png" alt="DOZMIANY"></div>
                        <div class="world_cuisine"><img src="<?php echo ABSPATH ?>public/img/5.png" alt="DOZMIANY"></div>
                        <div class="world_cuisine" id="firstClone"><img src="<?php echo ABSPATH ?>public/img/1.png" alt="DOZMIANY"></div>
                        <div class="world_cuisine"><img src="<?php echo ABSPATH ?>public/img/2.png" alt="DOZMIANY"></div>
                        <div class="world_cuisine"><img src="<?php echo ABSPATH ?>public/img/3.png" alt="DOZMIANY"></div>

                    </div>
                </div>
        </div>
        <div class="right_arrow arrow" id="nextBtn"><img src="<?php echo ABSPATH ?>themes/Default/img/arrow2-icon.svg" alt="DOZMIANY"></div>
        </section>
        <section class="last_recipes_section">
            <h2 class="section_title">Ostatnie przepisy</h2>
            <div class="last_recipes_main">
                <?php
                foreach ($data['posts'] as $post) {
                    echo '<div class="recipe flex">';
                    echo '<div class="recipe_image"><img src="'.ABSPATH.'public/img/buleczki.png" alt="buleczki"></div>';
                    echo '<div class="recipe_data">';
                    echo '<span class="recipe_date">4 styczeń, 2021</span>';
                    echo '<h3 class="recipe_title">'.$post->getTitle().'</h3>';
                    echo '</div>';
                    echo '<div class="more_button"><a class="more_button_link" href="'.ABSPATH.'przepis/'.$post->getLink().'">Więcej</a></div>';
                    echo '</div>';
                }
                ?>
            </div>
        </section>
        </div>
    </main>

    <footer>
        <div class="container">
            <?php require_once("footer.php") ?>
        </div>
    </footer>
<!--Load JavaScript-->
    <?php require_once("scripts.php") ?>
</body>
</html>