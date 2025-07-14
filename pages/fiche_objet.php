<?php
include("../inc/connexion.php");
include("../inc/functions.php");

$id = intval($_GET['id']);
$infos = getDetailsObjetComplet($conn, $id);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Fiche objet</title>
</head>
<body>

<?php if (!empty($infos)) : ?>
    <h1><?= $infos[0]['nom_objet'] ?></h1>
    <p><?= $infos[0]['description'] ?></p>
    <img src="../uploads/<?= $infos[0]['image_principale'] ?>" width="300">

    <h2>Autres images</h2>
    <?php foreach ($infos as $item) : ?>
        <?php if (!empty($item['image_secondaire'])) : ?>
            <img src="../uploads/<?= $item['image_secondaire'] ?>" width="150">
        <?php endif; ?>
    <?php endforeach; ?>

    <h2>Historique des emprunts</h2>
    <?php foreach ($infos as $item) : ?>
        <?php if (!empty($item['date_emprunt'])) : ?>
            <p>
                Emprunté le <?= $item['date_emprunt'] ?> → Retour le 
                <?= $item['date_retour'] ?: 'non retourné' ?>
            </p>
        <?php endif; ?>
    <?php endforeach; ?>

<?php else : ?>
    <p>Objet introuvable</p>
<?php endif; ?>

</body>
</html>
