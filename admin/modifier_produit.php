<?php
include 'include/nav.php';
require_once 'include/database.php';

// Get product ID from URL
$id = $_GET['id'] ?? null;

if ($id) {
    // Fetch product details
    $stmt = $pdo->prepare("SELECT * FROM produits WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $produit = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$produit) {
        die("Produit non trouvé");
    }
} else {
    die("ID de produit manquant");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process form data (add form validation here)
    $libelle = $_POST['libelle'];
    $prix = $_POST['prix'];
    $discount = $_POST['discount'];
    $categorie_id = $_POST['categorie'];

    $updateStmt = $pdo->prepare("UPDATE produits SET libelle = :libelle, prix = :prix, discount = :discount, categorie_id = :categorie_id WHERE id = :id");
    $updateStmt->execute([
        ':libelle' => $libelle,
        ':prix' => $prix,
        ':discount' => $discount,
        ':categorie_id' => $categorie_id,
        ':id' => $id
    ]);

    header("Location: produits.php");
    exit;
}

// Get categories for dropdown
$categories = $pdo->query("SELECT * FROM categorie")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

    <style>
:root {
    --primary: #ff69b4; /* Rose */
    --background: #fff5f7; /* Blanc cassé */
    --text: #2d3436; /* Gris foncé */
}

body {
    background: var(--background);
    min-height: 100vh;
    color: var(--text);
    position: relative;
    overflow: hidden;
    transition: background-color 0.3s ease; /* Transition pour le mode sombre */
    font-family: sans-serif;
}

.dark-mode {
    background: #1a1a1a; /* Gris foncé */
    color: white;
}

.dark-mode .btn-primary {
    background-color: #ff45a0; /* Rose plus foncé */
}

.floating-flower {
    position: absolute;
    pointer-events: none;
    animation: float 10s linear infinite;
    opacity: 0.6;
    top: -50px;
    z-index: -1;
    color: #ff69b4; /* Rose */
}

@keyframes float {
    0% { transform: translateY(0) rotate(0deg); }
    100% { transform: translateY(100vh) rotate(360deg); }
}

.btn-primary {
    background-color: var(--primary);
    border: none;
    color: white;
}

.btn-primary:hover {
    background-color: #ff45a0;
}

.theme-toggle {
    position: fixed;
    top: 60px;  /* Ajuste selon ta préférence */
    right: 20px; /* Positionne le bouton à gauche */
    z-index: 1000; /* Pour que le bouton soit au-dessus des autres éléments */
}

.theme-toggle i {
    font-size: 1.2em;
}

.page-title {
    text-align: center;
    margin-bottom: 20px;
}


    </style>
</head>
<body>
    <button class="theme-toggle" onclick="toggleTheme()">
        <i class="fas fa-moon"></i>
    </button>
    <div class="container">
        <h1 class="page-title">Modifier Produit</h1>

        <form method="POST">
    <div class="mb-3">
        <label for="libelle" class="form-label">Libellé</label>
        <input type="text" name="libelle" id="libelle" class="form-control" value="<?= htmlspecialchars($produit['libelle']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="prix" class="form-label">Prix</label>
        <input type="number" name="prix" id="prix" class="form-control" value="<?= htmlspecialchars($produit['prix']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="discount" class="form-label">Discount (%)</label>
        <input type="number" name="discount" id="discount" class="form-control" value="<?= htmlspecialchars($produit['discount']) ?>">
    </div>
    <div class="mb-3">
        <label for="categorie" class="form-label">Catégorie</label>
        <select name="categorie" id="categorie" class="form-select" required>
            <?php foreach ($categories as $categorie): ?>
                <option value="<?= $categorie['id'] ?>" <?= $produit['categorie_id'] == $categorie['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($categorie['libelle']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Modifier</button>
</form>
    </div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>