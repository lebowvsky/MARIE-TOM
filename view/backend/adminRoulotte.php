 <?php $title = 'Administration Roulotte'; ?>
 <?php $classRoulotte = 'active'; ?>

<?php ob_start(); ?>

<br>
<div class="row">
	<div class="col-lg-10 col-lg-offset-1">

		<div class="panneau onlyPhoto">
			<h3>Changement de la photo du bandeau</h3>
			<form method="post" action="backendRouter.php?action=addOnlyPhoto" enctype="multipart/form-data">
				<fieldset>
					<div class="form-group">
						<label for="choix_fichier">Choix de la photo du bandeau (jpeg & 1 Mo max)</label>				
						<input type="hidden" name="sizeMax" value="1000000">				
						<input type="file" name="photo_a_envoyer">
						<input type="hidden" name="path" value="contents/images/bandeau/">
						<input type="hidden" name="height" value="800">
						<input type="hidden" name="place"  value="administrationLaFerme" />
						<input type="hidden" name="finalNamePhoto" value="roulotte">		
					</div>

					<input  class="btn btn-primary" type="submit" value="Envoyer" />

				</fieldset>
			</form>
		</div>


		<hr>


		<div class="panneau">
			<h3>Notre roulotte</h3>
			<form method="post" action="backendRouter.php?action=addText" enctype="multipart/form-data">	
				<fieldset>
					<div class="form-group">
						<label for="choix_fichier">Choix de la photo de la roulotte (1 Mo max)</label>				
						<input type="hidden" name="sizeMax" value="1000000">				
						<input type="file" name="photo_a_envoyer">
						<input type="hidden" name="path" value="contents/images/roulotte/">
						<input type="hidden" name="height" value="500">	
					</div>

					<div class="form-group">
						<label>Titre</label>
						<input type="text" name="texteAccueilGras" class="form-control" placeholder="Mettez ici votre titre">
					</div>
					<div class="form-group">
						<label for="textarea">Texte présentant la roulotte</label>
						<textarea type="textarea" rows="10" name="texteAccueil" class="form-control" placeholder="Mettez ici votre texte..."></textarea>
					</div>

					<input type="hidden" name="place"  value="administrationRoulotte" />
					<input type="hidden" name="table"  value="roulotte" />
					<input type="hidden" name="idPhoto" value=<?= uniqid() ?> >

					<input  class="btn btn-primary" type="submit" value="Envoyer" />

				</fieldset>
			</form>

			<form method="post" action="backendRouter.php?action=deleteText">
				<h4>Suppression d'un texte et de sa photo</h4>
				<fieldset>
					<label for="titre">Choix du texte à supprimer</label>
					<select name="idPhoto">
						<optgroup label="Choisissez votre produit...">
							<?php
							foreach($resultsRoulottes as $row) {
							?>
							<option value=<?= $row['id_photo'] ?> ><?= $row['titre'] ?></option>
							<?php } ?>
						</optgroup>
					</select>
					<br>
					<br>
					
					<input type="hidden" name="place"  value="administrationRoulotte" />
					<input type="hidden" name="table" value="roulotte">
					
					<input class="btn btn-danger" type="submit" value="Supprimer">
				</fieldset>
				<br>
			</form>

		</div>

	</div>
</div>


<hr>


<div class="row">
	<div class="col-lg-10 col-lg-offset-1">

		<div class="panneau">

			<h3>Nos prestations</h3>
			<form method="post" action="backendRouter.php?action=addText">
				<fieldset>
					<div class="form-group">
						<label for="textarea">Titre intro des prestations</label>
						<input type="text" name="texteAccueilGras" class="form-control" placeholder="Mettez ici votre titre...">
					</div>
					<div class="form-group">
						<label for="textarea">Texte intro des prestations</label>
						<textarea type="textarea" rows="2" name="texteAccueil" class="form-control" placeholder="Mettez ici votre texte..."></textarea>
					</div>
					<input type="hidden" name="idPhoto"  value="0" />
					<input type="hidden" name="place"  value="administrationRoulotte" />
					<input type="hidden" name="table"  value="roulotte_intro_prestations" />

					<input type="submit" value="Envoyer" />
				</fieldset>
			</form>
			<br>
			<h4>Création d'une prestation</h4>
			<form method="post" action="backendRouter.php?action=addText" enctype="multipart/form-data">
				<fieldset>
					<div class="form-group">
						<label for="choix_fichier">Choix de la photo ou de l'image de la prestation (1 Mo max)</label>				
						<input type="hidden" name="sizeMax" value="1000000">				
						<input type="file" name="photo_a_envoyer">
						<input type="hidden" name="path" value="contents/images/roulotte/produits/">
						<input type="hidden" name="height" value="500">	
					</div>
					<div class="form-group">
						<label for="textarea">Titre de la prestation</label>
						<input type="text" name="texteAccueilGras" class="form-control" placeholder="Mettez ici votre texte...">
					</div>
					<div class="form-group">
						<label for="textarea">Texte de la prestation</label>
						<textarea type="textarea" rows="2" name="texteAccueil" class="form-control" placeholder="Mettez ici votre texte..."></textarea>
					</div>
					<input type="hidden" name="place"  value="administrationRoulotte" />
					<input type="hidden" name="table"  value="roulotte_prestations" />
					<input type="hidden" name="idPhoto" value=<?= uniqid() ?> >

					<input class="btn btn-primary" type="submit" value="Envoyer" />
				</fieldset>
			</form>`
			<br>
			<h4>Modification d'une prestation</h4>
			<form method="post" action="backendRouter.php?action=updateMultiText">
				<fieldset>
					<label for="titre">Choix de la prestation à modifier</label>
					<select name="id">
						<optgroup label="Choisissez votre prestation...">
							<?php

							$resultPrestation = $resultsPrestations->fetchAll();


							foreach ($resultPrestation as $row) {
							?>
							<option value=<?= $row['id'] ?> ><?= $row['titre'] ?></option>
							<?php } ?>
						</optgroup>
					</select>
					<br>
					<br>

					<div class="form-group">
						<label>Titre de la prestation</label>
						<input type="text" name="texteAccueilGras" class="form-control" placeholder="Mettez ici votre titre">
					</div>

					<div class="form-group">
						<label for="textarea">Texte de la prestation</label>
						<textarea type="textarea" rows="10" name="texteAccueil" class="form-control" placeholder="Mettez ici votre texte"></textarea>
					</div>
					
					<input type="hidden" name="place"  value="administrationRoulotte" />
					<input type="hidden" name="table" value="roulotte_prestations">
					
					<input class="btn btn-warning" type="submit" value="Modifier">
				</fieldset>
				<br>
			</form>
			<br>
			<h4>Suppression d'une prestation</h4>
			<form method="post" action="backendRouter.php?action=deleteText">
				<fieldset>
					<label for="titre">Choix de la prestation à supprimer</label>
					<select name="idPhoto">
						<optgroup label="Choisissez votre produit...">
							<?php
							foreach($resultPrestation as $row) {
							?>
							<option value=<?= $row['id_photo'] ?> ><?= $row['titre'] ?></option>
							<?php } ?>
						</optgroup>
					</select>
					<br>
					<br>
					
					<input type="hidden" name="place"  value="administrationRoulotte" />
					<input type="hidden" name="table" value="roulotte_prestations">
					
					<input class="btn btn-danger" type="submit" value="Supprimer">
				</fieldset>
				<br>
			</form>
		</div>
		
	</div>
</div>






<?php $adminContent= ob_get_clean(); ?>


<?php require('adminTemplate.php'); ?>