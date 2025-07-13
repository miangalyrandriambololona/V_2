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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
       
    </style>
</head>
<body>

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2> Mes objets</h2>
        <a href="nouvel_objet.php" class="btn btn-olive">➕ Ajouter un objet</a>
    </div>

    <?php if (empty($listeObjets)) : ?>
        <p class="text-center text-muted">Aucun objet trouvé.</p>
    <?php else : ?>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($listeObjets as $objet) : ?>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <?php
                        $image = $objet['image_principale'] ?? 'default.jpg';
                        ?>
                        <img src="../uploads/<?= htmlspecialchars($image) ?>" class="card-img-top" alt="<?= htmlspecialchars($objet['nom_objet']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($objet['nom_objet']) ?></h5>
                            <p class="card-text">
                                <?= $objet['date_retour'] ? 'Emprunté jusqu\'au : <strong>' . htmlspecialchars($objet['date_retour']) . '</strong>' : '<span class="text-success">✅ Disponible</span>' ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
