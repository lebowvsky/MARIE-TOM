<?php $title = 'Administration Accueil'; ?>
<?php $classAccueil = 'active'; ?>

<?php ob_start(); ?>

<br>
<div class="row">
	<div class="col-lg-10 col-lg-offset-1">

		<div class="panneau onlyPhoto">
			<h3>Ajout et suppression de photos du caroussel</h3>
			
			<form method="post" action="backendRouter.php?action=addOnlyPhoto" enctype="multipart/form-data">
				<fieldset>

					<div class="form-group">
						<label for="choix_fichier">Choix de la PREMIERE photo du caroussel (jpg & 1 Mo max)</label>				
						<input type="hidden" name="sizeMax" value="1000000">				
						<input type="file" name="photo_a_envoyer">
						<input type="hidden" name="path" value="contents/images/carousel/">
						<input type="hidden" name="height" value="600">
						<input type="hidden" name="finalNamePhoto" value="1">				
					</div>

					<input type="hidden" name="place"  value="administration" />
					

					<input class="btn btn-primary" type="submit" value="Envoyer" />

				</fieldset>
			</form>

			<form method="post" action="backendRouter.php?action=addPhoto" enctype="multipart/form-data">
				<fieldset>

					<div class="form-group">
						<label for="choix_fichier">Choix des photos du caroussel (jpg & 1 Mo max)</label>				
						<input type="hidden" name="sizeMax" value="1000000">				
						<input type="file" name="photo_a_envoyer">
						<input type="hidden" name="path" value="contents/images/carousel/">
						<input type="hidden" name="height" value="600">
						<input type="hidden" name="idPhoto" value=<?= uniqid() ?> >				
					</div>

					<input type="hidden" name="place"  value="administration" />
					

					<input class="btn btn-primary" type="submit" value="Envoyer" />

				</fieldset>
			</form>

			<br>
			<br>

			

			


		</div>
		<div class="panneau">
			<h3>Choisissez la photo à supprimer</h3>
			<form class="well" method="post" action="backendRouter.php?action=deletePhoto">
				<fieldset>
					<div class="form-group col-lg-12">

								<?php
								while($photo = $photos->fetch()){
								?>
								<div class="col-lg-3" style="text-align: center; margin-top: 20px;">
								
									<div class="row" style="height: 200px; overflow: hidden; border-radius: 5px; margin-bottom: 30px;">
										<img class="col-lg-12" style="border-radius: 5px;" src=<?= $photo['photo_path'] ?> >
									</div>
									<div>
										<input  type="radio" name="idPhoto" value=<?= $photo['id_photo'] ?> >
									</div>
								</div>
								<?php } ?>
								<input type="hidden" name="place"  value="administration" />
						
					</div>
					<div style="text-align: center;">
						<input class="btn btn-danger" type="submit" value="Supprimer" />
					</div>
				</fieldset>
				
			</form>
		</div>

		<hr>

		<div class="panneau">
			<h3>Phrase d'accueil</h3>
			<form class="well" method="post" action="backendRouter.php?action=updateUniqText">
				<fieldset>

					<div class="form-group">
						<label>Titre phrase d'accueil en gras</label>
						<input type="text" name="texteAccueilGras" class="form-control">
					</div>

					<div class="form-group">
						<label for="textarea">Phrase d'accueil</label>
						<textarea type="textarea" name="texteAccueil" class="form-control" placeholder="Mettez ici votre phrase d'accueil..."></textarea>
					</div>

					<input type="hidden" name="id" value="1">
					<input type="hidden" name="place"  value="administration" />
					<input type="hidden" name="table"  value="accueilmessage" />
					<br>
					<div style="text-align: center;">
						<input class="btn btn-primary" type="submit" value="Envoyer" />
					</div>

				</fieldset>
			</form>
		</div>

	</div>

</div>


<?php $adminContent= ob_get_clean(); ?>


<?php require('adminTemplate.php'); ?>