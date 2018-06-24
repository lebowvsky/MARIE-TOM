<?php $title = 'Traction Animale'; ?>
<?php $classTraction = 'active'; ?>

<?php $imageBandeau = '/contents/images/bandeau/traction.jpg'; ?>

<?php ob_start(); ?>
	<h1>Traction animale...</h1>
<?php $bandeau = ob_get_clean(); ?>


<?php ob_start(); ?>
<div id="content1" class="col-lg-12">

	<h2>Nos chevaux</h2>
  	
  	<?php
    $i = 0;
    while($cheval = $chevaux->fetch()) {
      $i++;

      if($i %2 == 0) {
        ?>
        <div class="elevage row">
          <div class="imageElevageWrapper col-lg-5 col-xs-12">
            <img class="imageElevage" src=<?= $cheval['photo_path'] ?> >
          </div>
          <div class="col-lg-7 col-xs-12">
            <p><?= $cheval['titre'] ?></p>
            <p><?= nl2br($cheval['texte']) ?></p>
          </div>
        </div>
        <?php
      }
      else {
        ?>
        <div class="elevage row">
          <div class="col-lg-7 col-xs-12">
            <p><?= $cheval['titre'] ?></p>
            <p><?= nl2br($cheval['texte']) ?></p>
          </div>
          <div class="imageElevageWrapper col-lg-5 col-xs-12">
            <img class="imageElevage" src=<?= $cheval['photo_path'] ?> >
          </div>
        </div>
        <?php
      }
    }
    ?>
</div>

<div class="col-lg-12">
	<hr>
</div>

<div id="content2" class="col-lg-12">

	<div class="textContent col-lg-12">
		<h2><?= $introPrestations['titre'] ?></h2>
		<p><?= nl2br($introPrestations['texte']) ?></p>
	</div>

  	<?php
 	 while($prestation = $prestations->fetch()) {
  	?>
  	<div class="elevage row">
			<div class="imageElevageWrapper col-lg-6">
	    		<img class="imageElevage" src=<?= $prestation['photo_path'] ?> >
		  	</div>
		  	<div class="col-lg-6">
		    	<h4><?= $prestation['titre'] ?></h4>
		    	<p><?= nl2br($prestation['texte']) ?></p>
		  	</div>	
	</div>
  	<?php } ?>

</div>


<?php $content = ob_get_clean(); ?>



<?php require('template.php'); ?>