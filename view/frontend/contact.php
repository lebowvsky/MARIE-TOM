<?php $title = 'Contact'; ?>

<?php $imageBandeau = '/contents/images/ferme_bandeau.jpg'; ?>

<?php ob_start(); ?>
	<h1>Contactez-nous...</h1>
<?php $bandeau = ob_get_clean(); ?>



<?php ob_start(); ?>
<div id="content1" class="col-lg-12">
	<address>

		<div class="media row">
			<div class="media-left col-lg-2 col-lg-offset-3">
			    <span class="fa fa-map-marker fa-3x"></span>
			</div>
		    <div class="media-body">
		    	<h4 class="media-heading">Thomas et Marie BONIFACE</h4>
			    <p>
			    	La Louvière<br>
					61430 BERJOU<br>
				</p>
			</div>
		</div>

		<div class="media row">
			<div class="media-left col-lg-2 col-lg-offset-3">
			    <span class="fa fa-envelope fa-3x"></span>
			</div>
		    <div class="media-body">	
			    <a href="mailto:fermedelalouviere@gmail.com">fermedelalouviere@gmail.com</a><br>
				ou<br>
				<a href="mailto:contact@lalouviere.com">contact@lalouviere.com</a>
			</div>
		</div>

		<div class="media row">
			<div class="media-left col-lg-2 col-lg-offset-3">
			    <span class="fa fa-phone fa-3x"></span>
			</div>
		    <div class="media-body">	
			    <a href="tel:0676395154">06 76 39 51 54</a>
			</div>
		</div>

	</address>
	
</div>

<div class="col-lg-12">
	<hr>
</div>

<div id="content2" class="col-lg-12">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21090.24541671625!2d-0.506635774648493!3d48.85726388184861!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480a251591a12803%3A0x861ba9de408cc489!2sLa+Louvi%C3%A8re%2C+Berjou!5e0!3m2!1sfr!2sfr!4v1519239564661" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
	
</div>

<div class="col-lg-12">
	<hr>
</div>

<div id="content3" class="col-lg-8 col-lg-offset-2">

	<form id="contactMessage" method="POST" action="index.php?action=sendMessage">
		<fieldset>
			<legend>Écrivez-nous...</legend>
			<div class="form-group">
				<label>Nom</label>
				<input type="text" name="messageName" class="form-control" placeholder="Votre nom...">
			</div>
			<div class="form-group">
				<label>Prénom</label>
				<input type="text" name="messageFirstName" class="form-control" placeholder="Votre prénom...">
			</div>
			<div class="form-group">
				<label>Votre adresse email *</label>
				<input type="text" name="messageSenderEmail" class="form-control" placeholder="Votre adresse e-mail...">
				<p><em>* votre adresse ne sera ni gardée dans une base de donnée ni transmise.</em></p>
			</div>
			<br>
			<div class="form-group">
				<label>Sujet</label>
				<input type="text" name="messageSubject" class="form-control" placeholder="Sujet de votre message...">
			</div>
			<div class="form-group">
				<label>Votre message</label>
				<textarea  type="textarea" name="messageText" rows="10" cols="50" class="form-control" placeholder="Votre message..."></textarea>
			</div>
			<br>
			<div class="form-group">
				<div id="boutonEnvoyerContact">
					<button type="submit" class="btn btn-primary center-block"><span class="fa fa-telegram fa-3x"></span></button>
				</div>
			</div>
		</fieldset>
	</form>

</div>


<?php $content = ob_get_clean(); ?>




<?php require('template.php'); ?>


