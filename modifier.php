<?php
include 'config.php';
$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM produits WHERE id = ?");
$stmt->execute([$id]);
$produit = $stmt->fetch();

if (!$produit) {
    die("Produit non trouvé");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];

    $stmt = $pdo->prepare("UPDATE produits SET nom = ?, prix = ? WHERE id = ?");
    $stmt->execute([$nom, $prix, $id]);

    header("Location: index.php");
    exit;
}
?>

<h1>Modifier le produit</h1>
<form method="post">
    Nom : <input type="text" name="nom" value="<?= htmlspecialchars($produit['nom']) ?>" required><br>
    Prix : <input type="number" step="0.01" name="prix" value="<?= $produit['prix'] ?>" required><br>
    <button type="submit">Modifier</button>
</form>
