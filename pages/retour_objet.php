<?php
include("connexion.php"); // Ce fichier doit créer une connexion mysqli ($conn)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_emprunt = $_POST['id_emprunt'];
    $etat = $_POST['etat_objet'];
    $date_retour = date('Y-m-d');

    // 1. Mettre à jour la date de retour dans exam_emprunt
    $sql1 = "UPDATE exam_emprunt SET date_retour = ? WHERE id_emprunt = ?";
    $stmt1 = mysqli_prepare($conn, $sql1);
    mysqli_stmt_bind_param($stmt1, "si", $date_retour, $id_emprunt);
    mysqli_stmt_execute($stmt1);
    mysqli_stmt_close($stmt1);

    // 2. Insérer l’état de l’objet retourné dans exam_retour
    $sql2 = "INSERT INTO exam_retour (id_emprunt, etat_objet, date_retour) VALUES (?, ?, ?)";
    $stmt2 = mysqli_prepare($conn, $sql2);
    mysqli_stmt_bind_param($stmt2, "iss", $id_emprunt, $etat, $date_retour);
    mysqli_stmt_execute($stmt2);
    mysqli_stmt_close($stmt2);

    // Redirection vers la fiche
    header("Location: fiche_membre.php");
    exit();
}
?>
