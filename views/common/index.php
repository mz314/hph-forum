<html>
    <head>
       <?php
        require_once 'js_init.inc.php';
        ?>
        <script src="<?= $root ?>static/js/jquery-1.10.2.js"></script>
        <script src="<?= $root ?>static/js/jquery-ui-1.10.4.js"></script>
        <script src="<?= $root ?>static/js/boards.js"></script>
        <link rel="stylesheet" href="<?= $root ?>static/css/ui-lightness/jquery-ui-1.10.4.css" />
        <title><?= $title ?></title>        
        <?= $head ?>
    </head>
    <body>
        <div id="top-menu">
          
        </div>
        <?= $body_html ?>
    </body>
</html>