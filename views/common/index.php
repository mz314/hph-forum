<html>
    <head>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <?php
        require_once 'js_init.inc.php';
        ?>
        <script src="<?= $root ?>static/js/jquery-1.10.2.js"></script>
        <script src="<?= $root ?>static/js/bootstrap.js"></script>
        <script src="<?= $root ?>static/js/users.js"></script>
         <title>Twoje karnisze</title>
              

     
  <link rel="stylesheet" href="<?= $root ?>static/css/main.css" />
   <!--           <link rel="stylesheet" href="<?= $root ?>static/css/menu.css" />
        <link rel="stylesheet" href="<?= $root ?>static/css/tables.css" />-->
        <link rel="stylesheet" href="<?= $root ?>static/css/bootstrap.css" />
     
        <title><?= $title ?></title>        
         <?= $head ?>
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