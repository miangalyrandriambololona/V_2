<!--connexion.php-->
<?php
$conn = mysqli_connect("localhost", "root", "", "exam");

if (!$conn) {
    die("Connexion échouée : " . mysqli_connect_error());
}
?>
