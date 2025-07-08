<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des produits</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<h1>Liste des produits</h1>
<a href="ajouter.php">Ajouter un produit</a>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prix</th>
        <th>Actions</th>
    </tr>
    <?php
    $stmt = $pdo->query("SELECT * FROM produits");
    foreach ($stmt as $row) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nom']}</td>
                <td>{$row['prix']} €</td>
                <td>
                    <a href='modifier.php?id={$row['id']}'>Modifier</a> |
                    <a href='supprimer.php?id={$row['id']}'>Supprimer</a>
                </td>
              </tr>";
    }
    ?>
</table>
