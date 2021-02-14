<!DOCTYPE HTML>
<html>
    <?php require_once("themes/user/Default/header.php") ?>

    <body>
        <?php require_once("themes/user/Default/top_bar.php") ?>
        <div class="container error_container">
            <h1 class="error_code_title">404</h1>
            <h3>Niestety strona której szukasz nie mogła zostać odnaleziona :(</h3>
            <p>Może być tymczasowo niedostępna, przeniesiona lub nie istnieć.<br>
                Sprawdź czy URL jest wpisany poprawnie i spróbuj ponownie.</p>
            <a href="<?php echo ABSPATH ?>strona-glowna">Wróć na stronę główną</a>
        </div>
        <?php require_once("themes/user/Default/footer.php") ?>
    </body>
</html>
