<?php $title = 'Nos Roulottes'; ?>
<?php $classRoulotte = 'active'; ?>

<?php $imageBandeau = '/contents/images/bandeau/roulotte.jpg'; ?>

<?php ob_start(); ?>
	<h1>Nos roulottes...</h1>
<?php $bandeau = ob_get_clean(); ?>


<?php ob_start(); ?>
<div id="content1" class="col-lg-12">

	<h2>Notre roulotte</h2>
  	
  	<?php
    $i = 0;
    while($roulotte = $roulottes->fetch()) {
      $i++;

      if($i %2 == 0) {
        ?>
        <div class="elevage row">
          <div class="imageElevageWrapper col-lg-5 col-xs-12">
            <img class="imageElevage" src=<?= $roulotte['photo_path'] ?> >
          </div>
          <div class="col-lg-7 col-xs-12">
            <p><?= $roulotte['titre'] ?></p>
            <p><?= nl2br($roulotte['texte']) ?></p>
          </div>
        </div>
        <?php
      }
      else {
        ?>
        <div class="elevage row">
          <div class="col-lg-7 col-xs-12">
            <p><?= $roulotte['titre'] ?></p>
            <p><?= nl2br($roulotte['texte']) ?></p>
          </div>
          <div class="imageElevageWrapper col-lg-5 col-xs-12">
            <img class="imageElevage" src=<?= $roulotte['photo_path'] ?> >
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
	<div class="row">
		<div class="textContent col-lg-12">
			<h2><?= $introPrestations['titre'] ?></h2>
			<p><?= nl2br($introPrestations['texte']) ?></p>
		</div>
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