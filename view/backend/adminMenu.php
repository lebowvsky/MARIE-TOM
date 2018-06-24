<div class="navbar navbar-default navbar-fixed-top">
  <p class="member">Bonjour <?= $_SESSION['nom'] ?></p>
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">ADMINISTRATION</a>
      <button type="button" data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class=<?= $classAccueil ?>><a href="backendRouter.php?action=administration">Accueil</a></li>
        <li class=<?= $classLaFerme ?> ><a href="backendRouter.php?action=administrationLaFerme">la Ferme</a></li>
        <li class=<?= $classBrebisVaches ?> ><a href="backendRouter.php?action=administrationBrebisVaches">Brebis et Vaches</a></li>
        <li class=<?= $classPorcs ?> ><a href="backendRouter.php?action=administrationPorcs">Porcs</a></li>
        <li class=<?= $classJusConfitures ?> ><a href="backendRouter.php?action=administrationJusConfitures">Jus & Confitures</a></li>
        <li class=<?= $classTraction ?> ><a href="backendRouter.php?action=administrationTraction">Traction Animale</a></li>
        <li class=<?= $classRoulotte ?> ><a href="backendRouter.php?action=administrationRoulotte">Roulotte</a></li>
        <li class=<?= $classContact ?> ><a href="backendRouter.php?action=administration">Contact</a></li>
      </ul>
    </div>
  </div>
</div>