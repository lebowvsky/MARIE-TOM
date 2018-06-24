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
        <link href="../css/style.css" rel="stylesheet" media="screen and (min-width: 480px)"/>
        <link href="../css/style_xs.css" rel="stylesheet" media="screen and (max-width: 480px)" />
        <link href="https://fonts.googleapis.com/css?family=Quicksand:300" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Enriqueta" rel="stylesheet">
    </head>
        
    <body data-spy='scroll' data-target='.navbar'>

    	<div id="container" class="container-fluid">
    		<div id="wave">
    			<svg id="curve" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1313 219.07">
    				<path class="cls-1" d="M-9,146s165-89,273-43,120,87,217,83S614,86,726,89s120,94,271,111,258-82,306-26l1,134H-9Z" transform="translate(9 -88.93)"/>
    			</svg>
    		</div>
    		<div class="clearfix visible-xs-block" style="margin-top: 20vh; color: white;">
    			<h1><?= $title ?></h1>	
    		</div>	

			
				<div id="menu_xs_sm" class="row hidden-lg hidden-md">	
	        		<?php require('menu_xs_sm.php'); ?>
        		</div>


				<div id="left_baner" class="visible-lg-block visible-md-block">
					<div id="menu_md_lg" class="row">					
	        			<?php require('menu.php'); ?>
	        		</div>

	        		<div id="social">
	        			<hr class="hrWhite">
	        			<div class="text-center">
	        				<a href="https://www.facebook.com"><span class="fa fa-facebook fa-2x"></span></a>
	        				<a href="https://twitter.com"><span class="fa fa-twitter fa-2x"></span></a>
	        				<a href="index.php?action=contact"><span class="fa fa-envelope fa-2x"></span></a>
	        			</div>
	        		</div>
        		</div>
        	

        	<div class="row" id="site">



        		<div id="corps" class="col-lg-8 col-lg-offset-3 col-md-7 col-md-offset-4 col-xs-12">

        			<div class="row hidden-xs">
        				<div id="bandeau" style="background-image : url(<?= $imageBandeau ?>)" class="col-lg-12">
        					<?= $bandeau ?>
        				</div>
        			</div>

        			

        			<br>
        			<hr class="hidden-xs">
        			<br>
        			<div class="container-fluid">
	        			<div class="row" id="content">	
	        				<?= $content ?>
	        			</div>
        			</div>

        		</div>
				
			</div>


		</div>


		<footer id="footer" class="col-lg-12">
			<?php require('footer.php'); ?>
		</footer>
		

   






        <script src="/js/jquery.js"></script>
		<script src="/bootstrap/js/bootstrap.js"></script>
		<script src="/js/template.js"></script>

		<script type="text/javascript">

			function logadmin() {
				window.open('view/backend/adminLog.php', 'Connexion', 'width=300 , height=400');
			}

			
			
		</script>


    </body>
</html>