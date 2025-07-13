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
?>