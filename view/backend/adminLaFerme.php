<?php $title = 'Administration La Ferme'; ?>
<?php $classLaFerme = 'active'; ?>

<?php ob_start(); ?>

<br>
<div class="row">
	<div class="col-lg-10 col-lg-offset-1">

		<div class="panneau onlyPhoto">
			<h3>Changement de la photo du bandeau</h3>
			<form method="post" action="backendRouter.php?action=addOnlyPhoto" enctype="multipart/form-data">
				<fieldset>
					<div class="form-group">
						<label for="choix_fichier">Choix de la photo du bandeau ( jpeg & 1 Mo max)</label>				
						<input type="hidden" name="sizeMax" value="1000000">				
						<input type="file" name="photo_a_envoyer">
						<input type="hidden" name="path" value="contents/images/bandeau/">
						<input type="hidden" name="height" value="800">
						<input type="hidden" name="place"  value="administrationLaFerme" />
						<input type="hidden" name="finalNamePhoto" value="ferme_bandeau">			
					</div>

					<input class="btn btn-primary" type="submit" value="Envoyer" />

				</fieldset>
			</form>
		</div>


		<hr>


		<div class="panneau">
			<h3>Présentation de la ferme</h3>
			<form method="post" action="backendRouter.php?action=addOnlyPhoto" enctype="multipart/form-data">
				<fieldset>
					<div class="form-group">
						<label for="choix_fichier">Choix de la photo de la ferme (1 Mo max)</label>				
						<input type="hidden" name="sizeMax" value="1000000">				
						<input type="file" name="photo_a_envoyer">
						<input type="hidden" name="path" value="contents/images/la_ferme/">
						<input type="hidden" name="height" value="400">
						<input type="hidden" name="place"  value="administrationLaFerme" />
						<input type="hidden" name="finalNamePhoto" value="ferme_vie">	
					</div>
					<input class="btn btn-primary" type="submit" value="Envoyer" />
				</fieldset>
			</form>
			<br>
			<br>
			<form method="post" action="backendRouter.php?action=addText" enctype="multipart/form-data">
				<fieldset>
					

					<div class="form-group">
						<label>Titre premier paragraphe</label>
						<input type="text" name="texteAccueilGras" class="form-control" placeholder="la vie de la ferme">
					</div>

					<div class="form-group">
						<label for="textarea">Texte</label>
						<textarea type="textarea" rows="10" name="texteAccueil" class="form-control" placeholder="Mettez ici votre texte"></textarea>
					</div>

					<input type="hidden" name="place"  value="administrationLaFerme" />
					<input type="hidden" name="table"  value="laferme_vie" />

					<input class="btn btn-primary" type="submit" value="Envoyer" />

				</fieldset>
			</form>
		</div>

		
		<hr>
		

		<div class="panneau">

			<h3>Modification des actualités</h3>

			<h4>Ajout d'une actualité</h4>
			<form method="post" action="backendRouter.php?action=addText" enctype="multipart/form-data">
				<fieldset>

					<div class="form-group">
						<label for="choix_fichier">Choix de la photo de l'actualité (1 Mo max)</label>				
						<input type="hidden" name="sizeMax" value="1000000">				
						<input type="file" name="photo_a_envoyer">
						<input type="hidden" name="path" value="contents/images/la_ferme/">
						<input type="hidden" name="height" value="400">				
					</div>

					<div class="form-group">
						<label>Titre de votre actualité</label>
						<input type="text" name="texteAccueilGras" class="form-control" placeholder="Mettez ici votre titre">
					</div>

					<div class="form-group">
						<label for="textarea">Texte</label>
						<textarea type="textarea" rows="10" name="texteAccueil" class="form-control" placeholder="Mettez ici votre texte"></textarea>
					</div>

					<input type="hidden" name="place"  value="administrationLaFerme" />
					<input type="hidden" name="table"  value="laferme_actualite" />
					<input type="hidden" name="idPhoto" value=<?= uniqid() ?> >

					<input class="btn btn-primary" type="submit" value="Envoyer" />

				</fieldset>
			</form>
			<br>
			<h4>Modification d'une actualité</h4>
			<form method="post" action="backendRouter.php?action=updateMultiText">
				<fieldset>
					<label for="titre">Choix de l'actu à modifier</label>
					<select name="id">
						<optgroup label="Choisissez votre actualité...">
							<?php

							$result = $results->fetchAll();


							foreach ($result as $row) {
							?>
							<option value=<?= $row['id'] ?> ><?= $row['titre'] ?></option>
							<?php } ?>
						</optgroup>
					</select>
					<br>
					<br>

					<div class="form-group">
						<label>Titre de votre actualité</label>
						<input type="text" name="texteAccueilGras" class="form-control" placeholder="Mettez ici votre titre">
					</div>

					<div class="form-group">
						<label for="textarea">Texte</label>
						<textarea type="textarea" rows="10" name="texteAccueil" class="form-control" placeholder="Mettez ici votre texte"></textarea>
					</div>
					
					<input type="hidden" name="place"  value="administrationLaFerme" />
					<input type="hidden" name="table" value="laferme_actualite">
					
					<input class="btn btn-warning" type="submit" value="Modifier">
				</fieldset>
				<br>
			</form>
			<br>
			<h4>Suppression d'une actualité</h4>
			<form method="post" action="backendRouter.php?action=deleteText">
				<fieldset>
					<label for="titre">Choix de l'actu à supprimer</label>
					<select name="idPhoto">
						<optgroup label="Choisissez votre actualité...">
							<?php
							foreach($result as $row) {
							?>
							<option value=<?= $row['id_photo'] ?> ><?= $row['titre'] ?></option>
							<?php } ?>
						</optgroup>
					</select>
					<br>
					<br>
					
					<input type="hidden" name="place"  value="administrationLaFerme" />
					<input type="hidden" name="table" value="laferme_actualite">
					
					<input class="btn btn-danger" type="submit" value="Supprimer">
				</fieldset>
				<br>
			</form>
		</div>
	</div>
</div>

<?php $adminContent= ob_get_clean(); ?>










<?php require('adminTemplate.php'); ?>