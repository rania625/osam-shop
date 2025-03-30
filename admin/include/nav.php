<?php
session_start();
$connextion = false;
if(isset($_SESSION['utilisateur'])){
  $connextion = true;
}

?>


<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"> OSAM ROSE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="inedix.php">Ajouter utilisateur </a>
          <?php
          if($connextion){
            
            ?>
            </li>
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="categories.php">liste des catégories </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="produits.php">liste des produits </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="Ajouter_categorie.php">Ajouter catégorie </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="Ajouter_produit.php">Ajouter produit </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Déconnexion</a>
            </li>
            <?php
          }else{
            ?>
  <li class="nav-item">
          <a class="nav-link" href="connextion.php">connextion</a>
        </li>
            <?php
          }
          ?>

       
      
      
      </ul>
    </div>
  </div>
</nav>
       

