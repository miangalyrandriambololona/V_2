<?php
include("connexion.php");
session_start();
$id_membre = $_GET['id'] ?? $_SESSION['id_membre'];

$emprunts = getEmpruntsParMembre($conn, $id_membre);
?>

<h2>Mes emprunts</h2>
<table border="1">
    <tr>
        <th>Objet</th>
        <th>Date emprunt</th>
        <th>Date retour</th>
        <th>Action</th>
    </tr>
    <?php foreach ($emprunts as $e): ?>
    <tr>
        <td><?= htmlspecialchars($e['nom_objet']) ?></td>
        <td><?= $e['date_emprunt'] ?></td>
        <td><?= $e['date_retour'] ?? 'Non retourné' ?></td>
        <td>
            <?php if (!$e['date_retour']): ?>
                <form action="retour_objet.php" method="post">
                    <input type="hidden" name="id_emprunt" value="<?= $e['id_emprunt'] ?>">
                    <select name="etat_objet">
                        <option value="ok">OK</option>
                        <option value="abime">Abîmé</option>
                    </select>
                    <button type="submit">Retour</button>
                </form>
            <?php else: ?>
                Déjà retourné
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
