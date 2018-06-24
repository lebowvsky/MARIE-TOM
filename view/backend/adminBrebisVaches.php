<?php $title = 'Administration Brebis & Vaches'; ?>
<?php $classBrebisVaches = 'active'; ?>

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
						<input type="hidden" name="finalNamePhoto" value="brebis_vaches">			
					</div>

					<input class="btn btn-primary" type="submit" value="Envoyer" />

				</fieldset>
			</form>
		</div>


		<hr>


		<div class="panneau">

			<h3>Notre élevage</h3>

			<form method="post" action="backendRouter.php?action=addText" enctype="multipart/form-data">
				<h4>Création de l'article "Brebis"</h4>
				<fieldset>
					<div class="form-group">
						<label for="choix_fichier">Choix de la photo de Brebis (1 Mo max)</label>				
						<input type="hidden" name="sizeMax" value="1000000">				
						<input type="file" name="photo_a_envoyer">
						<input type="hidden" name="path" value="contents/images/brebis_vaches/">
						<input type="hidden" name="height" value="400">	
					</div>

					<div class="form-group">
						<label>Titre</label>
						<input type="text" name="texteAccueilGras" class="form-control" placeholder="Mettez ici votre titre">
					</div>
					<div class="form-group">
						<label for="textarea">Texte présentant les brebis</label>
						<textarea type="textarea" rows="10" name="texteAccueil" class="form-control" placeholder="Mettez ici votre texte..."></textarea>
					</div>

					<input type="hidden" name="place"  value="administrationBrebisVaches" />
					<input type="hidden" name="table"  value="brebisvaches_brebis" />
					<input type="hidden" name="idPhoto" value=<?= uniqid() ?> >

					<input class="btn btn-primary" type="submit" value="Envoyer" />
				</fieldset>
			</form>




			<div class="onlyPhoto">
				<form method="post" action="backendRouter.php?action=updateAPhoto" enctype="multipart/form-data">
					<h4>Modification de la photo de brebis</h4>
					<fieldset>
						<div class="form-group">
							<label for="choix_fichier">Choix de la photo de Brebis (1 Mo max)</label>				
							<input type="hidden" name="sizeMax" value="1000000">				
							<input type="file" name="photo_a_envoyer">
							<input type="hidden" name="path" value="contents/images/brebis_vaches/">
							<input type="hidden" name="height" value="400">
							<input type="hidden" name="place"  value="administrationBrebisVaches" />
							<input type="hidden" name="table"  value="brebisvaches_brebis" />
							<?php
							$resultBrebisPhoto = $resultsBrebisPhoto->fetchAll();

							foreach ($resultBrebisPhoto as $row) {
							?>
							<input type="hidden" name="idPhoto" value=<?= $row['id_photo'] ?> >
							<?php } ?>
						</div>
						<input class="btn btn-warning" type="submit" value="Envoyer" />	
					</fieldset>
				</form>
			</div>

			<div class="onlyPhoto">
				
				<form method="post" action="backendRouter.php?action=deleteText">
					<h4>Suppression des anciens articles des brebis</h4>
					<fieldset>
						<select name="idPhoto">
							<?php
							$resultBrebisTexts = $resultsBrebisTexts->fetchAll();

							foreach($resultBrebisTexts as $row) {
							?>
							<option value=<?= $row['id_photo'] ?> > <?= $row['titre'] ?> </option>
							<?php
							}
							?>
						</select>
						<br>
						<br>
						<input type="hidden" name="table" value="brebisvaches_brebis">
						<input type="hidden" name="place"  value="administrationBrebisVaches" />
						<input class="btn btn-danger" type="submit" value="Supprimer" />
					</fieldset>
				</form>
			</div>

		</div>


		<div class="panneau">

			<form method="post" action="backendRouter.php?action=addText" enctype="multipart/form-data">
				<h4>Les Vaches</h4>
				<fieldset>
					<div class="form-group">
						<label for="choix_fichier">Choix de la photo de Vache (1 Mo max)</label>				
						<input type="hidden" name="sizeMax" value="1000000">				
						<input type="file" name="photo_a_envoyer">
						<input type="hidden" name="path" value="contents/images/brebis_vaches/">
						<input type="hidden" name="height" value="400">	
					</div>

					<div class="form-group">
						<label>Titre</label>
						<input type="text" name="texteAccueilGras" class="form-control" placeholder="Mettez ici votre titre">
					</div>
					<div class="form-group">
						<label for="textarea">Texte présentant les vaches</label>
						<textarea type="textarea" rows="10" name="texteAccueil" class="form-control" placeholder="Mettez ici votre texte..."></textarea>
					</div>

					<input type="hidden" name="place"  value="administrationBrebisVaches" />
					<input type="hidden" name="table"  value="brebisvaches_vaches" />
					<input type="hidden" name="idPhoto" value=<?= uniqid() ?> >

					<input class="btn btn-primary" type="submit" value="Envoyer" />

				</fieldset>
			</form>

			<div class="onlyPhoto">
				<form method="post" action="backendRouter.php?action=updateAPhoto" enctype="multipart/form-data">
					<h4>Modification de la photo de vaches</h4>
					<fieldset>
						<div class="form-group">
							<label for="choix_fichier">Choix de la photo de Vaches (1 Mo max)</label>				
							<input type="hidden" name="sizeMax" value="1000000">				
							<input type="file" name="photo_a_envoyer">
							<input type="hidden" name="path" value="contents/images/brebis_vaches/">
							<input type="hidden" name="height" value="400">
							<input type="hidden" name="place"  value="administrationBrebisVaches" />
							<input type="hidden" name="table"  value="brebisvaches_vaches" />
							<?php
							$resultVachesPhoto = $resultsVachesPhoto->fetchAll();

							foreach ($resultVachesPhoto as $row) {
							?>
							<input type="hidden" name="idPhoto" value=<?= $row['id_photo'] ?> >
							<?php } ?>
						</div>
						<input class="btn btn-warning" type="submit" value="Envoyer" />	
					</fieldset>
				</form>
			</div>
			
			<div class="onlyPhoto">	
				<form method="post" action="backendRouter.php?action=deleteText">
					<h4>Suppression des anciens articles des vaches</h4>
					<fieldset>
						<select name="idPhoto">
							<?php
							$resultVachesTexts = $resultsVachesTexts->fetchAll();

							foreach($resultVachesTexts as $row) {
							?>
							<option value=<?= $row['id_photo'] ?> > <?= $row['titre'] ?> </option>
							<?php
							}
							?>
						</select>
						<br>
						<br>
						<input type="hidden" name="table" value="brebisvaches_vaches">
						<input type="hidden" name="place"  value="administrationBrebisVaches" />
						<input class="btn btn-danger" type="submit" value="Supprimer" />
					</fieldset>
				</form>
			</div>



		</div>

	</div>
</div>


<hr>


<div class="row">
	<div class="col-lg-10 col-lg-offset-1">

		<div class="panneau">

			<h3>Nos produits</h3>
			<form method="post" action="backendRouter.php?action=addText">
				<h4>Introduction aux produits</h4>
				<fieldset>
					<div class="form-group">
						<label for="textarea">Titre intro des produits</label>
						<input type="text" name="texteAccueilGras" class="form-control" placeholder="Mettez ici votre titre...">
					</div>
					<div class="form-group">
						<label for="textarea">Texte intro des produits</label>
						<textarea type="textarea" rows="2" name="texteAccueil" class="form-control" placeholder="Mettez ici votre texte..."></textarea>
					</div>
					<input type="hidden" name="idPhoto"  value="0" />
					<input type="hidden" name="place"  value="administrationBrebisVaches" />
					<input type="hidden" name="table"  value="brebisvaches_intro_produits" />

					<input type="submit" value="Envoyer" />
				</fieldset>
			</form>
			<br>
			
			<form method="post" action="backendRouter.php?action=addText" enctype="multipart/form-data">
				<h4>Création d'un produit</h4>
				<fieldset>
					<div class="form-group">
						<label for="choix_fichier">Choix de la photo du produit (1 Mo max)</label>				
						<input type="hidden" name="sizeMax" value="1000000">				
						<input type="file" name="photo_a_envoyer">
						<input type="hidden" name="path" value="contents/images/brebis_vaches/produits/">
						<input type="hidden" name="height" value="200">	
					</div>
					<div class="form-group">
						<label for="textarea">Titre du produit</label>
						<input type="text" name="texteAccueilGras" class="form-control" placeholder="Mettez ici votre texte...">
					</div>
					<div class="form-group">
						<label for="textarea">Texte du produit</label>
						<textarea type="textarea" rows="2" name="texteAccueil" class="form-control" placeholder="Mettez ici votre texte..."></textarea>
					</div>
					<input type="hidden" name="place"  value="administrationBrebisVaches" />
					<input type="hidden" name="table"  value="brebisvaches_produits" />
					<input type="hidden" name="idPhoto" value=<?= uniqid() ?> >

					<input class="btn btn-primary" type="submit" value="Envoyer" />
				</fieldset>
			</form>`
			<br>
			<form method="post" action="backendRouter.php?action=updateMultiText">
				<h4>Modification d'un produit</h4>
				<fieldset>
					<label for="titre">Choix du produit à modifier</label>
					<select name="id">
						<optgroup label="Choisissez votre produit...">
							<?php

							$resultProduit = $resultsProduits->fetchAll();


							foreach ($resultProduit as $row) {
							?>
							<option value=<?= $row['id'] ?> ><?= $row['titre'] ?></option>
							<?php } ?>
						</optgroup>
					</select>
					<br>
					<br>

					<div class="form-group">
						<label>Titre de votre produit</label>
						<input type="text" name="texteAccueilGras" class="form-control" placeholder="Mettez ici votre titre">
					</div>

					<div class="form-group">
						<label for="textarea">Texte</label>
						<textarea type="textarea" rows="10" name="texteAccueil" class="form-control" placeholder="Mettez ici votre texte"></textarea>
					</div>
					
					<input type="hidden" name="place"  value="administrationBrebisVaches" />
					<input type="hidden" name="table" value="brebisvaches_produits">
					
					<input class="btn btn-warning" type="submit" value="Modifier">
				</fieldset>
				<br>
			</form>

			<br>

			<div class="onlyPhoto">
				<form method="post" action="backendRouter.php?action=deleteText">
					<h4>Suppression d'un produit</h4>
					<fieldset>
						<label for="titre">Choix du produit à supprimer</label>
						<select name="idPhoto">
							<optgroup label="Choisissez votre produit...">
								<?php
								foreach($resultProduit as $row) {
								?>
								<option value=<?= $row['id_photo'] ?> ><?= $row['titre'] ?></option>
								<?php } ?>
							</optgroup>
						</select>
						<br>
						<br>
						
						<input type="hidden" name="place"  value="administrationBrebisVaches" />
						<input type="hidden" name="table" value="brebisvaches_produits">
						
						<input class="btn btn-danger" type="submit" value="Supprimer">
					</fieldset>
					<br>
				</form>
			</div>
		</div>
		
	</div>
</div>






<?php $adminContent= ob_get_clean(); ?>


<?php require('adminTemplate.php'); ?>