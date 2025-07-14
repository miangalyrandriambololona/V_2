<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../inc/connexion.php");
include("../inc/functions.php");

session_start();
$id_membre = $_SESSION['id_membre'] ?? 0;

$categorie = $_GET['categorie'] ?? '';
$nom_objet = $_GET['nom_objet'] ?? '';
$disponible = isset($_GET['disponible']) ? true : false;

$listeObjets = getObjetsMembreConnecte($conn, $id_membre, $categorie, $nom_objet, $disponible);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Mes objets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/styles/liste_objet.css">
<body>
<header>
    <?php include("../inc/menu.php"); ?>
</header>

<div class="container py-5">
    <h2 class="text-center">🎒 Mes objets</h2>

    <form method="get" class="row g-3 mb-5 form-section">
        <div class="col-md-4">
            <label for="categorie" class="form-label">Catégorie</label>
            <select name="categorie" id="categorie" class="form-select">
                <option value="">Toutes</option>
                <option value="1" <?= $categorie == '1' ? 'selected' : '' ?>>Électronique</option>
                <option value="2" <?= $categorie == '2' ? 'selected' : '' ?>>Mobilier</option>
                <option value="3" <?= $categorie == '3' ? 'selected' : '' ?>>Outils</option>
            </select>
        </div>

        <div class="col-md-4">
            <label for="nom_objet" class="form-label">Nom de l’objet</label>
            <input type="text" name="nom_objet" id="nom_objet" value="<?= htmlspecialchars($nom_objet) ?>" class="form-control">
        </div>

        <div class="col-md-4 d-flex align-items-end">
            <div class="form-check me-3">
                <input type="checkbox" name="disponible" id="disponible" class="form-check-input" <?= $disponible ? 'checked' : '' ?>>
                <label for="disponible" class="form-check-label">Disponible uniquement</label>
            </div>
            <button type="submit" class="btn btn-primary">🔍 Rechercher</button>
        </div>
    </form>

    <?php if (empty($listeObjets)) : ?>
        <p class="text-center text-muted">Aucun objet trouvé avec ces critères.</p>
    <?php else : ?>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            <?php foreach ($listeObjets as $index => $objet) : ?>
                <?php
                $imageNom = ($index + 1) . ".jpg";
                $cheminImage = "../images/" . $imageNom;
                $idObjet = $objet['id_objet'] ?? 0;
                ?>
                <div class="col">
                    <div class="card h-100">
                        <a href="fiche_objet.php?id=<?= $idObjet ?>">
                            <img src="<?= $cheminImage ?>" class="card-img-top" alt="Image <?= $index + 1 ?>">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($objet['nom_objet']) ?></h5>
                            <?php if (!empty($objet['date_retour'])) : ?>
                                <span class="badge badge-emprunte">📅 Emprunté jusqu'au <?= htmlspecialchars($objet['date_retour']) ?></span>
                            <?php else : ?>
                                <span class="badge badge-disponible">✅ Disponible</span>
                            <?php endif; ?>

                            <?php if (!empty($objet['description'])) : ?>
                                <div class="mt-2">
                                    <?= $objet['description'] ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
