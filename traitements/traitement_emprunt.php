<?php
include("../inc/connexion.php");
include("../inc/functions.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_objet = $_POST['id_objet'];
    $nb_jours = $_POST['nb_jours'];

    if ($id_objet != "" && $nb_jours != "") {

        $ok = emprunterObjet($conn, $id_objet, $nb_jours);
        if ($ok) {
            header("Location: ../pages/liste_objet.php?success=1");
            exit();
        } else {
            echo "Il y a eu un problème.";
        }

    } else {
        echo "Merci de remplir tous les champs.";
    }
}


?>
