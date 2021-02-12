<!DOCTYPE HTML>
<html>
    <head>
        <title><?php echo(PAGE_NAME)." | Administrator"  ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="description" content="Strona z najlepszymi przepisami ;)"/>
        <meta name="keywords" content="Przepisy, jedzenie, smakołyki, mięso"/>
        <meta name="author" content="Michał Jankowski"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css2?family=Montserra&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="images/favicon.ico"/>
        <link rel="stylesheet" type="text/css"  href='<?php echo ABSPATH."app/admin/themes/Default/" ?>css/login.css'/>
    </head>
<body>
    <h1 class="title">CHEATORMEAT.PL</h1>
    <span>ADMIN PANELa </span>
    <div class="container">
        <form method="post">
            <input name="username" type="text" placeholder="Login">
            <input name="password" type="password" placeholder="Hasło">
            <input type="submit" value="Zaloguj">
        </form>
    </div>
</body>
</html>