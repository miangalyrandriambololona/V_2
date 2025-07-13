<!--traitement_login.php-->
<?php

error_reporting(E_ALL); // Rapporte toutes les erreurs
ini_set('display_errors', 1); // Affiche les erreurs

session_start();
include('../inc/connexion.php');

$nom=$_POST['name'];
$mail = $_POST['mail'];
$mdp = $_POST['mdp'];



// raha mi existe ny utilisateur anaty base
$sql = sprintf("SELECT id_membre, nom, date_de_naissance, genre, email, ville, mdp, image_profil 
                FROM exam_membre 
                WHERE email='%s' AND mdp='%s'", $mail, $mdp);

$resultat = mysqli_query($conn, $sql);

if (mysqli_num_rows($resultat) == 0) {
    // raha tsy miexiste,
    header('Location: inscription.php');
    exit;
}

$donnees = mysqli_fetch_assoc($resultat);
$_SESSION['id_membre'] = $donnees['id_membre'];
$_SESSION['Nom'] = $donnees['nom'];
$_SESSION['Email'] = $donnees['email'];

header('Location: ../pages/liste_objet.php');
exit;
?>
