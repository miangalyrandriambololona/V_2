<?php
session_start();
include("../inc/connexion.php");

if (!isset($_SESSION['id_membre'])) {
    header("Location: login.php");
    exit;
}

// Récupérer les catégories
$categories = [];
$res = mysqli_query($conn, "SELECT * FROM exam_categorie_objet");
while ($row = mysqli_fetch_assoc($res)) {
    $categories[] = $row;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un objet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/styles/login.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2>Ajouter un nouvel objet</h2>

    <form method="post" action="traitement_upload.php" enctype="multipart/form-data" class="mt-4">
        <div class="mb-3">
            <label for="nom_objet" class="form-label">Nom de l'objet</label>
            <input type="text" name="nom_objet" id="nom_objet" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="id_categorie" class="form-label">Catégorie</label>
            <select name="id_categorie" id="id_categorie" class="form-select" required>
                <option value="">-- Choisir une catégorie --</option>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?= $cat['id_categorie'] ?>"><?= htmlspecialchars($cat['nom_categorie']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="images" class="form-label">Ajouter une ou plusieurs images</label>
            <input type="file" name="images[]" id="images" class="form-control" accept="image/*" multiple>
            <div class="form-text">La première image sera l’image principale</div>
        </div>

        <button type="submit" class="btn btn-success">Ajouter l’objet</button>
        <a href="liste_objet.php" class="btn btn-secondary">Retour à la liste</a>
    </form>
</div>

</body>
</html>
