<?php
include 'include/nav.php';
require_once 'include/database.php';

$categories = $pdo->query('SELECT * FROM categorie ORDER BY date_creation DESC')->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Liste des Catégories</title>
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
            position: relative;
            overflow-x: hidden;
        }

        .container {
            padding: 20px;
            position: relative;
            z-index: 1;
        }

        .category-table {
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
            font-weight: 600;
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

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .btn-edit, .btn-delete {
            padding: 8px 15px;
            border-radius: 20px;
            border: none;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s ease;
        }

        .btn-edit {
            background: var(--primary);
        }

        .btn-delete {
            background: #ff4757;
        }

        .btn-edit:hover, .btn-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            color: white;
        }

        .add-category-btn {
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
            text-decoration: none;
        }

        .add-category-btn:hover {
            transform: rotate(90deg);
            background: var(--secondary);
            color: white;
        }

        .page-title {
            color: var(--primary);
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.5rem;
            position: relative;
            display: inline-block;
            left: 50%;
            transform: translateX(-50%);
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

        .empty-message {
            text-align: center;
            padding: 50px;
            color: var(--text);
            font-style: italic;
        }

        .category-count {
            background: var(--primary);
            color: white;
            padding: 3px 8px;
            border-radius: 20px;
            font-size: 0.8rem;
            margin-left: 10px;
        }

        .description-cell {
            max-width: 300px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .floating-flower {
            position: absolute;
            pointer-events: none;
            animation: float 10s linear infinite;
            opacity: 0.6;
            top: -50px;
        }

        @keyframes float {
            0% {
                transform: translateY(0) rotate(0deg);
            }
            100% {
                transform: translateY(100vh) rotate(360deg);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="page-title">
            Liste des Catégories
            <span class="category-count"><?= count($categories) ?></span>
        </h1>

        <div class="category-table">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Libellé</th>
                        <th>Description</th>
                        <th>Date de Création</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (empty($categories)) {
                        echo '<tr><td colspan="5" class="empty-message">Aucune catégorie trouvée 🌸</td></tr>';
                    } else {
                        foreach($categories as $categorie): ?>
                            <tr>
                                <td><?= $categorie['id'] ?></td>
                                <td><?= htmlspecialchars($categorie['libelle']) ?></td>
                                <td class="description-cell"><?= htmlspecialchars($categorie['description']) ?></td>
                                <td><?= date('d/m/Y H:i', strtotime($categorie['date_creation'])) ?></td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="modifier_categorie.php?id=<?= $categorie['id'] ?>" class="btn-edit">
                                            <i class="fas fa-edit"></i>
                                            Modifier
                                        </a>
                                        <a href="supprimer_categorie.php?id=<?= $categorie['id'] ?>" 
                                           class="btn-delete" 
                                           onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">
                                            <i class="fas fa-trash-alt"></i>
                                            Supprimer
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <a href="ajouter_categorie.php" class="add-category-btn" title="Ajouter une catégorie">
        <i class="fas fa-plus"></i>
    </a>

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
            const container = document.body;
            const flowerEmojis = ['🌸', '🌺', '🌹', '🌷', '💐'];
            const numberOfFlowers = 20;

            for (let i = 0; i < numberOfFlowers; i++) {
                const flower = document.createElement('div');
                flower.classList.add('floating-flower');
                flower.textContent = flowerEmojis[Math.floor(Math.random() * flowerEmojis.length)];
                
                flower.style.left = `${Math.random() * 100}vw`;
                flower.style.fontSize = `${Math.random() * 20 + 10}px`;
                flower.style.animationDuration = `${Math.random() * 5 + 5}s`;
                flower.style.animationDelay = `${Math.random() * 5}s`;

                container.appendChild(flower);
            }
        }

        createFlowers();
    </script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>