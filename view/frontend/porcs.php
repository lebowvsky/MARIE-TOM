<?php $title = 'Nos porcs plein-air'; ?>
<?php $classPorcs = 'active'; ?>

<?php $imageBandeau = '/contents/images/bandeau/porcs.jpg'; ?>

<?php ob_start(); ?>
	<h1>Nos porcs<br>plein-air...</h1>
<?php $bandeau = ob_get_clean(); ?>





<?php ob_start(); ?>

<div id="content1" class="col-lg-12">

	<h2>Notre élevage</h2>

    <?php
    $i = 0;
    while($resultElevagePorcs = $resultsElevagePorcs->fetch()) {
      $i++;

      if($i %2 == 0) {
        ?>
        <div class="elevage row">
          <div class="imageElevageWrapper col-lg-5 col-xs-12">
            <img class="imageElevage" src=<?= $resultElevagePorcs['photo_path'] ?> >
          </div>
          <div class="col-lg-7 col-xs-12">
            <p><?= $resultElevagePorcs['titre'] ?></p>
            <p><?= nl2br($resultElevagePorcs['texte']) ?></p>
          </div>
        </div>
        <?php
      }
      else {
        ?>
        <div class="elevage row">
          <div class="col-lg-7 col-xs-12">
            <p><?= $resultElevagePorcs['titre'] ?></p>
            <p><?= nl2br($resultElevagePorcs['texte']) ?></p>
          </div>
          <div class="imageElevageWrapper col-lg-5 col-xs-12">
            <img class="imageElevage" src=<?= $resultElevagePorcs['photo_path'] ?> >
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
		<h2><?= $introProduits['titre'] ?></h2>
		<p><?= nl2br($introProduits['texte']) ?></p>
	</div>

  <?php
  while ($produit = $produits->fetch()) {
  ?>

	<div class="produit col-lg-6 col-xs-12">
      
    <img class="imageProduit" style="height: 200px" src=<?= $produit['photo_path'] ?> >
      
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <h4><?= $produit['titre'] ?></h4>
        <p><?= nl2br($produit['texte']) ?></p>
      </div>
    </div>  
  </div>

  <?php } ?>






</div>





<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>