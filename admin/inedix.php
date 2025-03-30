<?php

include 'include/nav.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Utilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="background-flowers"></div>
    
    <button class="theme-toggle" onclick="toggleTheme()">
        <i class="fas fa-moon"></i>
    </button>

    <div class="container py-4">
        <div class="form-container">
            <h4>
                <i class="fas fa-user-plus"></i>
                Inscription
            </h4>

            <?php
            if (isset($_POST['ajouter'])) {
                $login = $_POST['login'];
                $pwd = $_POST['password'];

                if (!empty($login) && !empty($pwd)) {
                    require_once 'include/database.php';
                    $date = date('Y-m-d');
                
                    try {
                        $sqlstate = $pdo->prepare('INSERT INTO utilisateur VALUES(null,?,?,?)');
                        $sqlstate->execute([$login, $pwd, $date]);

                        echo '<div class="alert alert-success" role="alert">
                                <i class="fas fa-check-circle me-2"></i>
                                Inscription réussie ! Bienvenue parmi nous.
                              </div>';

                    } catch(PDOException $e) {
                        echo '<div class="alert alert-danger" role="alert">
                                <i class="fas fa-exclamation-circle me-2"></i>
                                Erreur lors de l\'inscription. Veuillez réessayer.
                              </div>';
                    }

                } else {
                    echo '<div class="alert alert-warning" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            Veuillez remplir tous les champs obligatoires.
                          </div>';
                }
            }
            ?>

            <form method="POST" class="needs-validation" novalidate>
                <div class="mb-4">
                    <label class="form-label">
                        <i class="fas fa-user"></i> Login
                    </label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-at"></i>
                        </span>
                        <input type="text" 
                               class="form-control" 
                               name="login" 
                               placeholder="Choisissez votre login"
                               required>
                    </div>
                    <div class="form-text text-muted">
                        <i class="fas fa-info-circle"></i>
                        Votre login doit être unique
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">
                        <i class="fas fa-lock"></i> Mot de passe
                    </label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-key"></i>
                        </span>
                        <input type="password" 
                               class="form-control" 
                               name="password" 
                               placeholder="Créez votre mot de passe"
                               required>
                        <button class="btn btn-outline-secondary" 
                                type="button" 
                                onclick="togglePassword(this)">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div class="form-text text-muted">
                        <i class="fas fa-shield-alt"></i>
                        Utilisez un mot de passe fort
                    </div>
                </div>

                <button type="submit" 
                        class="btn btn-primary btn-lg w-100" 
                        name="ajouter">
                    <i class="fas fa-user-plus me-2"></i>
                    Créer mon compte
                </button>

                <div class="text-center mt-4">
                    <p class="text-muted">
                        Déjà inscrit ? 
                        <a href="connextion.php" class="text-primary">
                            Connectez-vous ici
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Toggle du thème sombre/clair
        function toggleTheme() {
            document.body.classList.toggle('dark-mode');
            const icon = document.querySelector('.theme-toggle i');
            if(document.body.classList.contains('dark-mode')) {
                icon.classList.replace('fa-moon', 'fa-sun');
            } else {
                icon.classList.replace('fa-sun', 'fa-moon');
            }
        }

        // Afficher/Masquer le mot de passe
        function togglePassword(button) {
            const input = button.previousElementSibling;
            const icon = button.querySelector('i');
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }

        // Animation de fond avec particules
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

        // Validation du formulaire
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('.needs-validation');
            
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });

            
            createFlowerParticles();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>