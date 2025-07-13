<?php
session_start();
include("../inc/connexion.php");

if (!isset($_SESSION['id_membre'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom_objet = mysqli_real_escape_string($conn, $_POST['nom_objet']);
    $id_categorie = intval($_POST['id_categorie']);
    $id_membre = intval($_SESSION['id_membre']);

    // 1. Insérer l'objet dans la table "objet"
    $sql_objet = "INSERT INTO objet (nom_objet, id_categorie, id_membre) VALUES ('$nom_objet', $id_categorie, $id_membre)";
    if (mysqli_query($conn, $sql_objet)) {
        $id_objet = mysqli_insert_id($conn);
    } else {
        echo "Erreur lors de l'ajout de l'objet : " . mysqli_error($conn);
        exit;
    }

    // 2. Upload des images (si présentes)
    $upload_dir = "../uploads/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0775, true);
    }

    $fichiers = $_FILES['images'];

    for ($i = 0; $i < count($fichiers['name']); $i++) {
        $tmp_name = $fichiers['tmp_name'][$i];
        $original_name = basename($fichiers['name'][$i]);
        $ext = pathinfo($original_name, PATHINFO_EXTENSION);
        $new_name = uniqid("img_") . "." . $ext;

        if (move_uploaded_file($tmp_name, $upload_dir . $new_name)) {
            $sql_img = "INSERT INTO images_objet (id_objet, nom_image) VALUES ($id_objet, '$new_name')";
            mysqli_query($conn, $sql_img);
        }
    }

    // Redirection vers la liste
    header("Location: liste_objet.php");
    exit;
} else {
    header("Location: nouvel_objet.php");
    exit;
}
