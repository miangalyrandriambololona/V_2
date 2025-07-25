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
        return "default.jpg"; 
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


function emprunterObjet($conn, $id_objet, $nb_jours) {
    $date_emprunt = date('Y-m-d');

    $date_retour = date('Y-m-d', strtotime("+$nb_jours days"));

    $sql = "INSERT INTO exam_emprunt (id_objet, date_emprunt, date_retour)
            VALUES ('$id_objet', '$date_emprunt', '$date_retour')";

    return mysqli_query($conn, $sql);
}

function getEmpruntsParMembre($conn, $id_membre) {
    $sql = "SELECT e.id_emprunt, o.nom_objet, e.date_emprunt, e.date_retour
            FROM exam_emprunt e
            JOIN exam_objet o ON e.id_objet = o.id_objet
            WHERE e.id_membre = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_membre]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


?>