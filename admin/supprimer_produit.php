<?php
include 'include/nav.php';
require_once 'include/database.php';

// Get product ID from URL
$id = $_GET['id'] ?? null;

if ($id) {
    $deleteStmt = $pdo->prepare("DELETE FROM produits WHERE id = :id");
    $deleteStmt->execute([':id' => $id]);
}

// Redirect back to the product list
header("Location: produits.php");
exit;
?>