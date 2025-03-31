<?php
include 'include/nav.php';
require_once 'include/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $categorie = $pdo->prepare('SELECT * FROM categorie WHERE id = ?');
    $categorie->execute([$id]);
    $categorie = $categorie->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['modifier'])) {
    $libelle = $_POST['libelle'];
    $description = $_POST['link'];
    $description = $_POST['type'];

    $sql = 'UPDATE categorie SET libelle = ?, link = ?, type = ? WHERE id = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$libelle, $link, $type, $id]);
    header('Location: categories.php'); // Rediriger vers la liste
}
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

    <title>Modifier Catégorie</title>
    <style>
        :root {
            --primary: #ff69b4;
            --background: #fff5f7;
            --text: #2d3436;
        }

        body {
            background: var(--background);
            min-height: 100vh;
            color: var(--text);
            position: relative;
            overflow: hidden;
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

        .dark-mode {
            --background: #1a1a1a;
            --text: #ffffff;
        }

        .btn-primary {
            background: var(--primary);
            border: none;
        }

        .btn-primary:hover {
            background: #ff45a0;
        }

        .theme-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.8);
            border: 2px solid var(--primary);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }
    </style>
</head>
<body>
    <button class="theme-toggle" onclick="toggleTheme()">
        <i class="fas fa-moon"></i>
    </button>

    <div class="container">
        <h1>Modifier Catégories</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="libelle" class="form-label">Libellé</label>
                <input type="text" class="form-control" name="libelle" value="<?php echo htmlspecialchars($categorie['libelle']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">link</label>
                <textarea class="form-control" name="link" required><?php echo htmlspecialchars($categorie['link']); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">type</label>
                <textarea class="form-control" name="type" required><?php echo htmlspecialchars($categorie['type']); ?></textarea>
            </div>
            <button type="submit" name="modifier" class="btn btn-primary">Modifier</button>
        </form>
    </div>

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