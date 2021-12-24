<nav class="navbar navbar-expand-md navbar-light bg-secondary">
  <div class="container justify-content-center"> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar3">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-center justify-content-center" id="navbar3">
      <ul class="navbar-nav">

        <li class="nav-item mx-2"> <a style="color:white" class="nav-link navbar-brand mr-0 text-primary" href="#">
            <b style="color:white"> Montre2Luxe</b></a> </li>
        <li class="nav-item mx-2"> <a style="color:white" class="nav-link" href="index.php">Accueil</a> </li>

        <!-- Example single danger button -->
        <div class="btn-group">
          <a href="pannier.php" type="button" class="btn btn-danger dropdown-toggle">
            Panier (<span id="pannierCount"></span>)
          </a>


        </div>

        <?php
        if (!isset($_SESSION['loggin'])) {
        ?>
          <li class="nav-item mx-2"> <a style="color:white" class="nav-link" href="login.php">Connexion</a> </li>
          <li class="nav-item mx-2"> <a style="color:white" class="nav-link" href="register.php">inscription</a> </li>
        <?php
        } else {
        ?>
          <li class="nav-item mx-2"> <a style="color:white" class="nav-link" href="mon-compte.php">Mon compte</a> </li>
          <li class="nav-item mx-2"> <a style="color:white" class="nav-link" href="commandes.php">Commandes</a> </li>
          <li class="nav-item mx-2"> <a style="color:white" class="nav-link" href="?logout=true">Deconnexion (<?= $_SESSION['loggin']['prenom'] ?> <?= $_SESSION['loggin']['nom'] ?>)</a> </li>
        <?php
        }
        ?>

      </ul>
    </div>
  </div>
</nav>