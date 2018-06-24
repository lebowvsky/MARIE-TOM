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

    	<div class="row">
    		<div class="adminWrapper">
    			<h2>Connexion</h2>
    			<br>
    			<hr>
    			<br>
	    		<form method="post" action="backendRouter.php?action=verifAdmin">
	    			<fieldset>
	    				<div class="form-group">
	    					<label>Entrez votre login</label>
	    					<input type="text" name="login" placeholder="login...">
	    				</div>
	    				<div class="form-group">
	    					<label>Votre mot de passe</label>
	    					<input type="password" name="password" placeholder="Mot de passe...">
	    				</div>

	    				<input type="submit" value="Connexion">
	    			</fieldset>
	    		</form>
	    		<br>
	    		<hr>
    		</div>
    	</div>


    	
		

   






        <script src="/js/jquery.js"></script>
		<script src="/bootstrap/js/bootstrap.js"></script>
		<script src="/js/template.js"></script>

		<script type="text/javascript">

			
			
		</script>


    </body>
</html>