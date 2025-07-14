<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../inc/connexion.php");
include("../inc/functions.php");

session_start();
$listeObjets = getObjetsMembreConnecte($conn);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Mes objets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <header>
        <?php
        include("../inc/menu.php");
        ?>
    </header>

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Mes objets</h2>
        <a href="nouvel_objet.php" class="btn btn-success">➕ Ajouter un objet</a>
    </div>

    <?php if (empty($listeObjets)) : ?>
        <p class="text-center text-muted">Aucun objet trouvé.</p>
    <?php else : ?>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($listeObjets as $index => $objet) : ?>
                <?php
                $imageNom = ($index + 1) . ".jpg";
                $cheminImage = "../images/" . $imageNom;

                $idObjet = $objet['id_objet'] ?? 0;
                ?>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <a href="fiche_objet.php?id=<?= $idObjet ?>">
                            <img src="<?= $cheminImage ?>" class="card-img-top" alt="Image <?= $index + 1 ?>">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($objet['nom_objet']) ?></h5>
                            <?php if (!empty($objet['date_retour'])) : ?>
                                <p class="card-text">Emprunté jusqu'au : <strong><?= htmlspecialchars($objet['date_retour']) ?></strong></p>
                            <?php else : ?>
                                <p class="card-text text-success">✅ Disponible</p>
                                <a href="emprunt.php">Emprunter</a>
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
