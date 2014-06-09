<html>
    <head>
       <?php
        require_once 'js_init.inc.php';
        ?>
        <script src="<?= $root ?>static/js/jquery-1.10.2.js"></script>
        <script src="<?= $root ?>static/js/jquery-ui-1.10.4.js"></script>
         <?= $head ?>

        <link rel="stylesheet" href="<?= $root ?>static/css/ui-lightness/jquery-ui-1.10.4.css" />
  <link rel="stylesheet" href="<?= $root ?>static/css/main.css" />
   <!--           <link rel="stylesheet" href="<?= $root ?>static/css/menu.css" />
        <link rel="stylesheet" href="<?= $root ?>static/css/tables.css" />-->
        <link rel="stylesheet" href="<?= $root ?>static/css/bootstrap.css" />
        <link rel="stylesheet" href="<?= $root ?>static/js/bootstrap.js" />
        <title><?= $title ?></title>        
       
    </head>
    <body>
        <div id="top-menu">
            <?php require "menu.inc.php" ?>
        </div>
        <div id="body">
            <?= $body_html ?>
        </div>
    </body>
</html>