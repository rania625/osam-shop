<?php
session_start();
$connextion = isset($_SESSION['utilisateur']);
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">OSAM ROSE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="margin-bottom: 10px;">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="inedix.php">Ajouter utilisateur</a>
        </li>
        <?php if ($connextion) { ?>
          <li class="nav-item">
            <a class="nav-link" href="categories.php">Liste des catégories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="produits.php">Liste des produits</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Ajouter_categorie.php">Ajouter catégorie</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Ajouter_produit.php">Ajouter produit</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Déconnexion</a>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="connextion.php">Connexion</a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>

<!-- Assurez-vous d'ajouter Bootstrap JS si ce n'est pas déjà fait -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
