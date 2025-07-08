<?php
require_once 'db.php';

try {
    $pdo = connectDB();
    $stmt = $pdo->query("SHOW TABLES;");
    echo "<h1>Connexion DEV OK ✅</h1>";
    echo "<pre>";
    print_r($stmt->fetchAll());
    echo "</pre>";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
