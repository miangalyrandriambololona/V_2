<!--connexion.php-->
<?php
$conn = mysqli_connect("172.60.0.15", "ETU004230", "9vhOPtJB", "db_s2_ETU004230");

if (!$conn) {
    die("Connexion échouée : " . mysqli_connect_error());
}
?>
