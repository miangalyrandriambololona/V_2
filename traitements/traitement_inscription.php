<?php
include("../inc/connexion.php");
?>
<?php
session_start(); // Démarre la session
include('../inc/connexion.php');

$mail = $_POST['mail'];
$mdp = $_POST['mdp'];
$nom = $_POST['anarana'];
$jour = $_POST['jour'];
$mois = $_POST['mois'];
$annee = $_POST['annee'];

$dateNaissance = "$annee-$mois-$jour";

// Inserer le nouvel utilisateur dans la base de données
$sql = "INSERT INTO Membres (Email, MotdePasse, Nom, DateNaissance) VALUES ('$mail', '$mdp', '$nom', '$dateNaissance')";
mysqli_query($bdd, $sql);

// id an'i nanao inscription farany
$last_id = mysqli_insert_id($bdd);

// Initialiser la session
$_SESSION['IdMembre'] = $last_id;

header('Location: ../pages/login.php');
exit; 
?>