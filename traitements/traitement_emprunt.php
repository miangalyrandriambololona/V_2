<?php
include("../inc/connexion.php");
include("../inc/functions.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_objet = $_POST['id_objet'] ?? '';
    $nb_jours = $_POST['nb_jours'] ?? '';

    if ($id_objet !== '' && $nb_jours !== '') {
        if (emprunterObjet($conn, $id_objet, $nb_jours)) {
            header("Location: ../pages/liste_objet.php?success=1");
            exit();
        } else {
            echo "Erreur lors de l'enregistrement.";
        }
    } else {
        echo "Formulaire incomplet.";
    }
}
?>
