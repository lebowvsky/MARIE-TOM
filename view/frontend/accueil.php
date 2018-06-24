<?php $title = 'Accueil'; ?>

<?php $classAccueil = 'active'; ?>


<?php ob_start(); ?>
	<div id="carousel" class="carousel slide hidden-xs" data-ride="carousel">
		
		<div class="carousel-inner">
		    <div class="item active"> <div class="image-carousel" style="background-image: url(/contents/images/carousel/1.jpg); background-size: cover;"></div></div>
		    <?php
		    	$nPhoto = 0;
		    	while($photo = $photos->fetch()) {
		    		$nPhoto++;
		    ?>
		    	<div class="item"> <div class="image-carousel" style="background-image: url(<?= $photo['photo_path'] ?>); background-size: cover;"></div></div>
		    <?php
		    	}
		    ?>

		    <!-- Left and right controls -->
		    <a class="left carousel-control" href="#carousel" data-slide="prev">
		    	<span class="glyphicon glyphicon-chevron-left"></span>
		    	<span class="sr-only">Previous</span>
		    </a>
		    <a class="right carousel-control" href="#carousel" data-slide="next">
		    	<span class="glyphicon glyphicon-chevron-right"></span>
		    	<span class="sr-only">Next</span>
		    </a>
		</div>
		<ol class="carousel-indicators">
		    <li data-target="#carousel" data-slide-to="0" class="active"></li>
		    <?php
		    for($i=1; $i<=$nPhoto; $i++) {
		    ?>
		    <li data-target="#carousel" data-slide-to=<?= $i ?>></li>
			<?php } ?>
		</ol>
	</div>
<?php $bandeau = ob_get_clean(); ?>




<?php ob_start(); ?>
<div id="content1" class="col-lg-12">
	<article id="accueil" class="textContent">
		<h2><?= $result['titre']; ?></h2>
		<p><?= nl2br($result['texte']); ?></p>
	</article>
</div>

<?php $content = ob_get_clean(); ?>





<?php require('template.php'); ?>