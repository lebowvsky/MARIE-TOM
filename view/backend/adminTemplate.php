<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="bootstrap/css/bootstrap-social/bootstrap-social.css" rel="stylesheet">
		<link href="bootstrap/css/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
        <title><?= $title ?></title>
        <link href="../css/styleAdmin.css" rel="stylesheet" media="screen and (min-width: 480px)"/>
        <link href="../css/style_xs.css" rel="stylesheet" media="screen and (max-width: 480px)" />
        <link href="https://fonts.googleapis.com/css?family=Quicksand:300" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Enriqueta" rel="stylesheet">
    </head>

    <body>

        <div id="container" class="container-fluid">

            <div class="menu row">
                <?php require('adminMenu.php'); ?>
            </div>

            <div class="title row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2><?= $title ?></h2>
                </div>
            </div>

            <div class="row">
                <?= $adminContent ?>
            </div>

        </div>

        
        <script src="/js/jquery.js"></script>
        <script src="/bootstrap/js/bootstrap.js"></script>
        <script src="/js/adminTemplate.js"></script>

        <script type="text/javascript">
        
                
                
        </script>
    </body>

    

</html>
