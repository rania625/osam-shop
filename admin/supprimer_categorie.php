<?php
session_start();
require_once 'include/database.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Delete the category
    $query = $pdo->prepare('DELETE FROM categorie WHERE id = ?');
    $result = $query->execute([$id]);
    
    if($result) {
        $_SESSION['success'] = "Catégorie supprimée avec succès";
    } else {
        $_SESSION['error'] = "Erreur lors de la suppression de la catégorie";
    }
}

header('Location: categories.php');
exit();
?>