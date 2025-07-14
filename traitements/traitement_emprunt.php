<?php
$id_objet = $_POST['id_objet'];
$nb_jours = $_POST['nb_jours'];

if (emprunterObjet($conn, $id_objet, $nb_jours)) {
    echo "Emprunt enregistré !";
} else {
    echo "Une erreur est survenue.";
}
?>