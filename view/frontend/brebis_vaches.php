<?php $title = 'Nos brebis et nos vaches'; ?>
<?php $classBrebisVaches = 'active'; ?>

<?php $imageBandeau = '/contents/images/bandeau/brebis_vaches.jpg'; ?>

<?php ob_start(); ?>
	<h1>Nos brebis<br>et nos vaches...</h1>
<?php $bandeau = ob_get_clean(); ?>



<?php ob_start(); ?>


<div id="content1" class="col-lg-12">
  <div>

  	<h2>Notre élevage</h2>

    <div class="elevage row">
      <div class="imageElevageWrapper col-lg-5 col-xs-12">
        <img class="imageElevage" src=<?= $elevageBrebis['photo_path'] ?> >
      </div>
      <div class="col-lg-7 col-xs-12">
        <p><?= $elevageBrebis['titre'] ?></p>
        <p><?= nl2br($elevageBrebis['texte']) ?></p>
      </div>
    </div>


    <div class="elevage row">
      <div class="col-lg-7 col-xs-12">
        <p><?= $elevageVaches['titre'] ?></p>
        <p><?= nl2br($elevageVaches['texte']) ?></p>
      </div>
      <div class="imageElevageWrapper col-lg-5">
        <img class="imageElevage"  src=<?= $elevageVaches['photo_path'] ?> >
      </div>
    </div>

  </div>
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