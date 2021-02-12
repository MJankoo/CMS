<html><head>
    <title>Cheatormeat.pl | Administrator</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Strona z najlepszymi przepisami ;)">
    <meta name="keywords" content="Przepisy, jedzenie, smakołyki, mięso">
    <meta name="author" content="Michał Jankowski">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="<?php echo ABSPATH."themes/admin/Default/css/adminPanel.css"?>">
</head>
<body>
<div class="main_container flex">
    <div class="left_side">
        <div class="user_data">

        </div>
        <nav class="nav">
            <ul>
                <li class="nav_header">Administracja</li>
                <li class="nav_option"><a href="http://localhost/cheat/administrator/statistics">Statystyki</a></li>
                <li class="nav_header">Przepisy</li>
                <li class="nav_option"><a href="http://localhost/cheat/administrator/recipesPosts">Artykuły</a></li>
                <li class="nav_option"><a href="http://localhost/cheat/administrator/recipesCategories">Kategorie</a></li>
                <li class="nav_option"><a href="http://localhost/cheat/administrator/recipesTags">Tagi</a></li>
                <li class="nav_header">Blog</li>
                <li class="nav_option"><a href="blog-posts">Artykuły</a></li>
                <li class="nav_option"><a href="blog-categories">Kategorie</a></li>
                <li class="nav_option"><a href="blog-tags">Tagi</a></li>
                <li class="nav_header">Użytkownik</li>
                <li class="nav_option"><a href="http://localhost/cheat/administrator/logout">Wyloguj</a></li>
            </ul>
        </nav>
    </div>
    <div class="right_side">
            <?php
                $this->controller->index();
            ?>
    </div>
</div>

</body></html>