<?php
function getObjetsMembreConnecte($conn) {

    
    if (!isset($_SESSION['id_membre'])) {
        return []; // Aucun membre connecté
    }

    $id_membre = intval($_SESSION['id_membre']);
    $sql = "SELECT nom_objet, date_retour 
            FROM v_objets_membres_emprunt_en_cours 
            WHERE id_membre = $id_membre";
    
    $result = mysqli_query($conn, $sql);

    $objets = [];
    
    while ($row = mysqli_fetch_assoc($result)) {
        $objets[] = $row;
    }

    return $objets;
}

function getDetailsObjetComplet($conn, $id_objet) {
    $id_objet = intval($id_objet);

    $sql = "SELECT * 
            FROM v_fiche_objet_complet 
            WHERE id_objet = $id_objet";

    $result = mysqli_query($conn, $sql);
    
    $infos = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $infos[] = $row;
    }

    return $infos;
}


function getImagePrincipale($conn, $id_objet) {
    $sql = "SELECT nom_image FROM exam_images_objet 
            WHERE id_objet = $id_objet 
            ORDER BY id_image ASC LIMIT 1";

    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        return $row['nom_image'];
    } else {
        return "default.jpg"; // Image par défaut si aucune image
    }
}

function getToutesImagesObjet($conn, $id_objet) {
    $sql = "SELECT id_image, nom_image FROM exam_images_objet 
            WHERE id_objet = $id_objet 
            ORDER BY id_image ASC";

    $result = mysqli_query($conn, $sql);
    $images = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $images[] = $row;
    }
    return $images;
}
?>