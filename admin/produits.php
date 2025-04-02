<?php include 'include/nav.php'; ?>
<?php require_once 'include/database.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #ff69b4;
            --secondary: #e0b1cb;
            --background: #fff5f7;
            --text: #2d3436;
            --card-bg: #ffffff;
            --discount-bg: #ff4757;
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
        }

        .container {
            padding: 20px;
        }

        .product-table {
            background: var(--card-bg);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            margin-top: 20px;
        }

        .table {
            margin-bottom: 0;
            color: var(--text);
        }

        .table th {
            background: var(--primary);
            color: white;
            border: none;
            padding: 15px;
        }

        .table td {
            padding: 15px;
            vertical-align: middle;
            border-color: rgba(255,105,180,0.1);
        }

        .table tbody tr {
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background: rgba(255,105,180,0.1);
            transform: scale(1.01);
        }

        .discount-badge {
            background: var(--discount-bg);
            color: white;
            padding: 3px 8px;
            border-radius: 20px;
            font-size: 0.8rem;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .btn-edit, .btn-delete {
            padding: 5px 15px;
            border-radius: 20px;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-edit {
            background: var(--primary);
            color: white;
        }

        .btn-delete {
            background: #ff4757;
            color: white;
        }

        .btn-edit:hover, .btn-delete:hover {
            transform: translateY(-2px);
            opacity: 0.9;
        }

        .add-product-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: var(--primary);
            color: white;
            border: none;
            box-shadow: 0 4px 15px rgba(255,105,180,0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .add-product-btn:hover {
            transform: rotate(90deg);
            background: var(--secondary);
        }

        .theme-toggle {
            position: fixed;
            top: 60px;
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

        .page-title {
            color: var(--primary);
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.5rem;
            position: relative;
            display: inline-block;
        }

        .page-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--primary);
            border-radius: 2px;
        }

        .empty-message {
            text-align: center;
            padding: 50px;
            color: var(--text);
            font-style: italic;
        }

        .price {
            font-weight: bold;
            color: var(--primary);
        }

        .product-image {
            width: 50px;
            height: 50px;
            border-radius: 5px;
            object-fit: cover;
        }
        .description-cell {
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="page-title">Liste des Produits</h1>

        <div class="product-table">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Libellé</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Discount</th>
                        <th>Catégorie</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        $query = "SELECT p.*, c.libelle as categorie_name 
                                 FROM produits p 
                                 LEFT JOIN categorie c ON p.categorie_id = c.id 
                                 ORDER BY p.date DESC";
                        $produits = $pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
                        
                        if (empty($produits)) {
                            echo '<tr><td colspan="8" class="empty-message">Aucun produit trouvé 🌸</td></tr>';
                        } else {
                            foreach($produits as $produit) {
                                ?>
                                <tr>
                                    <td><?= $produit['id'] ?></td>
                                    <td><img src="<?= htmlspecialchars($produit['image']) ?>" alt="Image de produit" class="product-image"></td>
                                    <td><?= htmlspecialchars($produit['libelle']) ?></td>
                                    <td class="description-cell"><?= htmlspecialchars($produit['description']) ?></td>
                                    <td class="price"><?= number_format($produit['prix'], 2) ?> €</td>
                                    <td>
                                        <?php if($produit['discount'] > 0): ?>
                                            <span class="discount-badge"><?= $produit['discount'] ?>%</span>
                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                    <td><?= htmlspecialchars($produit['categorie_name']) ?></td>
                                    <td><?= date('d/m/Y H:i', strtotime($produit['date'])) ?></td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="modifier_produit.php?id=<?= $produit['id'] ?>" class="btn btn-edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="supprimer_produit.php?id=<?= $produit['id'] ?>" 
                                               class="btn btn-delete" 
                                               onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                    } catch(PDOException $e) {
                        echo '<tr><td colspan="8" class="alert alert-danger">Erreur: ' . $e->getMessage() . '</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <a href="ajouter_produit.php" class="add-product-btn" title="Ajouter un produit">
        <i class="fas fa-plus"></i>
    </a>

    <button class="theme-toggle" onclick="toggleTheme()">
        <i class="fas fa-moon"></i>
    </button>

    <script>
        function toggleTheme() {
            document.body.classList.toggle('dark-mode');
            const icon = document.querySelector('.theme-toggle i');
            if(document.body.classList.contains('dark-mode')) {
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

        createFlowers();

        setInterval(() => {
            const flowers = document.querySelectorAll('.floating-flower');
            flowers.forEach(flower => flower.remove());
            createFlowers();
        }, 30000);
    </script>
</body>
</html>