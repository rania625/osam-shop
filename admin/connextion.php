

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    
    <style>
.theme-toggle {
    position: fixed;
    top: 60px;  /* Ajuste selon ta préférence */
    right: 20px; /* Positionne le bouton à gauche */
    z-index: 1000; /* Pour que le bouton soit au-dessus des autres éléments */
}
    </style>
</head>


<body>
    <div class="background-flowers"></div>
    
    <button class="theme-toggle" onclick="toggleTheme()">
        <i class="fas fa-moon"></i>
    </button>
    <?php include 'include/nav.php'; ?>
    <div class="container py-4">
        <div class="form-container">
            <h4>
                <i class="fas fa-user-circle"></i>
                Connexion
            </h4>

            <?php
        if (isset($_POST['connexion'])) {
            $login = htmlspecialchars($_POST['login']);
            $pwd = htmlspecialchars($_POST['password']);
    
            if (!empty($login) && !empty($pwd)) {
                require_once 'include/database.php';
                try {
                    $sqlstate = $pdo->prepare('SELECT * FROM utilisateur WHERE login=? AND password=?');
                    $sqlstate->execute([$login, $pwd]);

                    if ($sqlstate->rowCount() >= 1) {
                        $_SESSION['utilisateur'] = $sqlstate->fetch();
                        header('location: admine.php');
                    } else {
                        echo '<div class="alert alert-danger">Login ou mot de passe incorrect</div>';
                    }
                } catch (PDOException $e) {
                    echo '<div class="alert alert-danger">Erreur de connexion à la base de données</div>';
                }
            } else {
                echo '<div class="alert alert-warning">Veuillez remplir tous les champs</div>';
            }
        }
        ?> 

            <form method="POST">
                <div class="mb-4">
                    <label class="form-label">
                        <i class="fas fa-user"></i> Login
                    </label>
                    <input type="text" class="form-control" name="login" 
                           placeholder="Entrez votre login" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">
                        <i class="fas fa-lock"></i> Password
                    </label>
                    <input type="password" class="form-control" name="password" 
                           placeholder="Entrez votre mot de passe" required>
                </div>

                <button type="submit" class="btn btn-primary" name="connexion">
                    <i class="fas fa-sign-in-alt"></i> Connexion
                </button>
            </form>
        </div>
    </div>

    <script>
        // Script pour le toggle du thème
        function toggleTheme() {
            document.body.classList.toggle('dark-mode');
            const icon = document.querySelector('.theme-toggle i');
            if(document.body.classList.contains('dark-mode')) {
                icon.classList.replace('fa-moon', 'fa-sun');
            } else {
                icon.classList.replace('fa-sun', 'fa-moon');
            }
        }

        // Script pour les animations de fond
        function createFlowerParticles() {
            const container = document.querySelector('.background-flowers');
            const numberOfParticles = 50;

            for(let i = 0; i < numberOfParticles; i++) {
                const particle = document.createElement('div');
                particle.classList.add('flower-particle');
                
                particle.style.left = `${Math.random() * 100}vw`;
                particle.style.opacity = Math.random() * 0.5;
                particle.style.animationDuration = `${Math.random() * 10 + 5}s`;
                particle.style.animationDelay = `${Math.random() * 5}s`;
                
                container.appendChild(particle);
            }
        }

        // Initialisation
        createFlowerParticles();
    </script>
</body>
</html>