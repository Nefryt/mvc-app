<!DOCTYPE html>
<html lang="pl">
    <head>
        <title>MVC - ABC</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="http://mvc.pl/js/Alertify/themes/alertify.core.css" />
        <link rel="stylesheet" href="http://mvc.pl/js/Alertify/themes/alertify.bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/3.0.2/normalize.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="http://mvc.pl/styles/style.css">
    </head>

    <body>

    <?php if (isset ($_SESSION['login'] )) { ?>
    <nav>
        <ul class="nav nav-pills">
            <li role="presentation"><a href="<?php echo Url::getUrl( 'car', 'add') ?>">Dodaj samochód</a></li>
            <li role="presentation"><a href="<?php echo Url::getUrl( 'car', 'list') ?>">Pokaż listę samochodów</a></li>
            <li role="presentation"><a href="<?php echo Url::getUrl( 'category', 'add') ?>">Dodaj markę</a></li>
            <li role="presentation"><a href="<?php echo Url::getUrl( 'category', 'list') ?>">Pokaż listę marek</a></li>
            <li role="presentation"><a href="<?php echo Url::getUrl('login', 'logout'); ?>">Wyloguj się</a></li>
        </ul>
    </nav>
    <?php } ?>
        <?php echo $content; ?>

        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="http://mvc.pl/js/Alertify/lib/alertify.min.js"></script>
        <script type="text/javascript" src="http://mvc.pl/js/alerts_table.js"></script>

    <?php
        $status = @$_GET['status'];

        switch($status) {
            case 1: ?><script>getAlert(1)</script><?php
                break;
            case 2: ?><script>getAlert(2)</script><?php
                break;
            case 3: ?><script>getAlert(3)</script><?php
                break;
            case 4: ?><script>getAlert(4)</script><?php
                break;
            case 5: ?><script>getAlert(5)</script><?php
                break;
            case 6: ?><script>getAlert(6)</script><?php
                break;
            case 7: ?><script>getAlert(7)</script><?php
                break;
            case 8: ?><script>getAlert(8)</script><?php
                break;
            case 9: ?><script>getAlert(9)</script><?php
                break;
            case 10: ?><script>getAlert(10)</script><?php
                break;
            default:
                break;
        }
    ?>
    </body>

</html>