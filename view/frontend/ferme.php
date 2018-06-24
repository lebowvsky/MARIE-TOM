<?php $title = 'La Ferme'; ?>
<?php $classLaFerme = 'active'; ?>

<?php $imageBandeau = '/contents/images/bandeau/ferme_bandeau.jpg'; ?>



<?php ob_start(); ?>
	<h1>La Ferme</h1>
<?php $bandeau = ob_get_clean(); ?>



<?php ob_start(); ?>


<div id="content1" class="col-lg-12">
	<h2><?= $lavie['titre'] ?></h2>
  	<div class="elevage row">
	    <div class="imageElevageWrapper col-lg-5 col-xs-12">
	      <img class="imageElevage" src="contents/images/la_ferme/ferme_vie.jpg" >
	    </div>
	    <div class="col-lg-7 col-xs-12">
	      <p><?= nl2br($lavie['texte']) ?></p>
	    </div>
  	</div>
</div>

<div class="col-lg-12">
	<hr>
</div>

<div id="content2" class="col-lg-12">
	<?php
		while($actualite = $actualites->fetch()) {
	?>

	<div class="actualite row">
		<div class="col-lg-12">
			<div class="actualiteImageWrapper col-lg-6 col-xs-12">
	    		<img class="imageActu" src=<?= $actualite['photo_path'] ?> >
		  	</div>
		  	<div class="col-lg-6">
		    	<h4><?= $actualite['titre'] ?></h4><p> <?= $actualite['date'] ?></p>
		    	<p><?= nl2br($actualite['texte']) ?></p>
		  	</div>	
		</div>
	</div>

	<br>
	<?php } ?>
</div>


<?php $content = ob_get_clean(); ?>




<?php require('template.php'); ?>