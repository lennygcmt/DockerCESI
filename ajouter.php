<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];

    $stmt = $pdo->prepare("INSERT INTO produits (nom, prix) VALUES (?, ?)");
    $stmt->execute([$nom, $prix]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un produit</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>Ajouter un produit</h1>

<form method="post">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" required>

    <label for="prix">Prix :</label>
    <input type="number" step="0.01" name="prix" id="prix" required>

    <button type="submit">Ajouter</button>
</form>

<br>
<a href="index.php">← Retour à la liste</a>

</body>
</html>
