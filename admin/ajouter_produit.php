<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <title>Ajout Produit</title>
    <style>
        :root {
            --primary: #ff69b4;
            --secondary: #e0b1cb;
            --background: #fff5f7;
            --text: #2d3436;
            --card-bg: #ffffff;
        }

        .dark-mode {
            --primary: #ff69b4;
            --secondary: #9b6b9e;
            --background: #1a1a1a;
            --text: #ffffff;
            --card-bg: #2d2d2d;
        }

        * {
            transition: all 0.3s ease;
        }

        body {
            background: var(--background);
            color: var(--text);
            min-height: 100vh;
            padding-bottom: 50px;
        }

        .container {
            background: var(--card-bg);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-top: 20px;
        }

        .form-control {
            background: var(--background);
            border: 2px solid var(--primary);
            color: var(--text);
            border-radius: 10px;
            padding: 12px;
            margin-bottom: 15px;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(255,105,180,0.25);
            border-color: var(--primary);
            background: var(--background);
            color: var(--text);
        }

        .form-label {
            font-size: 1rem; /* Taille de police augmentée pour le label */
            font-weight: bold; /* Texte en gras */
            margin-bottom: 8px; /* Espacement sous le label */
        }

        .btn-primary {
            background: var(--primary);
            border: none;
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 600;
        }

        .btn-primary:hover {
            background: var(--secondary);
            transform: translateY(-2px);
        }

        .theme-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            background: var(--card-bg);
            border: none;
            border-radius: 50%;
            width: 45px;
            height: 45px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            z-index: 1000;
        }

        .theme-toggle i {
            color: var(--primary);
        }

        .floating-flower {
            position: fixed;
            pointer-events: none;
            animation: float linear infinite;
            opacity: 0.3;
            z-index: 0;
        }

        @keyframes float {
            0% {
                transform: translateY(-100vh) rotate(0deg);
            }
            100% {
                transform: translateY(100vh) rotate(360deg);
            }
        }
    </style>
</head>
<body>

<?php include 'include/nav.php'; ?>

<div class="container">
    <h2 class="mb-4" style="color: var(--primary);">Ajouter un produit</h2>
    
    <?php
    require_once 'include/database.php';
    
    if (isset($_POST['ajouter'])) {
        $libelle = htmlspecialchars($_POST['libelle']);
        $prix = !empty($_POST['prix']) ? floatval($_POST['prix']) : 0;
        $discount = !empty($_POST['discount']) ? intval($_POST['discount']) : 0;
        $categorie_id = intval($_POST['categorie_id']);
        $description = htmlspecialchars($_POST['description']); // Ajout de la description
        $date = date('Y-m-d H:i:s'); 

        // Traitement de l'image
        $image = $_FILES['image'];
        $imagePath = 'uploads/' . basename($image['name']);
        $imageFileType = strtolower(pathinfo($imagePath, PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (!empty($libelle) && !empty($categorie_id) && in_array($imageFileType, $allowedExtensions) && move_uploaded_file($image['tmp_name'], $imagePath)) {
            try {
                $sqlstate = $pdo->prepare('INSERT INTO produits(libelle, prix, discount, categorie_id, description, date, image) VALUES (?, ?, ?, ?, ?, ?, ?)');
                $success = $sqlstate->execute([$libelle, $prix, $discount, $categorie_id, $description, $date, $imagePath]);

                if ($success) {
                    echo '<div class="alert alert-success">
                            <i class="fas fa-check-circle me-2"></i>
                            Le produit a été ajouté avec succès
                          </div>';
                }
            } catch (PDOException $e) {
                echo '<div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        Erreur lors de l\'ajout du produit: ' . $e->getMessage() . '
                      </div>';
            }
        } else {
            echo '<div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    Veuillez remplir tous les champs obligatoires et télécharger une image valide
                  </div>';
        }
    }
    ?>

    <form method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Libelle </label>
            <input type="text" class="form-control" name="libelle" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Prix </label>
            <input type="number" class="form-control" name="prix" min="0" step="0.01" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Discount</label>
            <input type="number" class="form-control" name="discount" min="0" max="100" value="0">
        </div>

        <div class="mb-3">
            <label class="form-label">Catégorie </label>
            <select name="categorie_id" class="form-control" required>
                <option value="">Sélectionnez une catégorie</option>
                <?php
                try {
                    $categories = $pdo->query('SELECT * FROM categorie ORDER BY libelle')->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($categories as $categorie) {
                        echo '<option value="' . $categorie['id'] . '">' . htmlspecialchars($categorie['libelle']) . '</option>';
                    }
                } catch (PDOException $e) {
                    echo '<option value="">Erreur de chargement des catégories</option>';
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Image du produit</label>
            <input type="file" class="form-control" name="image" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-primary" name="ajouter">
            <i class="fas fa-plus-circle me-2"></i>Ajouter produit
        </button>
    </form>
</div>

<button class="theme-toggle" onclick="toggleTheme()">
    <i class="fas fa-moon"></i>
</button>

<script>
    function toggleTheme() {
        document.body.classList.toggle('dark-mode');
        const icon = document.querySelector('.theme-toggle i');
        if (document.body.classList.contains('dark-mode')) {
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
        } else {
            icon.classList.remove('fa-sun');
            icon.classList.add('fa-moon');
        }
    }

    function createFlowers() {
        const flowerEmojis = ['🌸', '🌺', '🌹', '🌷', '💐'];
        const numberOfFlowers = 15;

        for(let i = 0; i < numberOfFlowers; i++) {
            const flower = document.createElement('div');
            flower.classList.add('floating-flower');
            flower.textContent = flowerEmojis[Math.floor(Math.random() * flowerEmojis.length)];
            
            flower.style.left = `${Math.random() * 100}vw`;
            flower.style.fontSize = `${Math.random() * 20 + 10}px`;
            flower.style.animationDuration = `${Math.random() * 10 + 10}s`;
            flower.style.animationDelay = `${Math.random() * 5}s`;
            
            document.body.appendChild(flower);
        }
    }

    // Form validation
    (function () {
        'use strict'
        const forms = document.querySelectorAll('.needs-validation')
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })()

    createFlowers();

    setInterval(() => {
        const flowers = document.querySelectorAll('.floating-flower');
        flowers.forEach(flower => flower.remove());
        createFlowers();
    }, 30000);
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>