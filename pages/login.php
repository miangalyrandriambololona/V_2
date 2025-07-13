<?php
include("../inc/connexion.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/styles/login.css">

</head>
<body>

<header></header>

<main>
    <div class="login-container shadow-sm">
        <h1 class="text-center">Login</h1>
        <form action="../traitements/traitement_login.php" method="post" novalidate>
            <div class="mb-3">
                <label for="name" class="form-label">Nom :</label>
                <input type="text" class="form-control" id="name" name="name" required />
            </div>
            <div class="mb-3">
                <label for="mail" class="form-label">Email :</label>
                <input type="email" class="form-control" id="mail" name="mail" required />
            </div>
            <div class="mb-3">
                <label for="mdp" class="form-label">Mot de passe :</label>
                <input type="password" class="form-control" id="mdp" name="mdp" required />
            </div>
            <button type="submit" class="btn btn-olive w-100">Valider</button>
        </form>
        <p class="mt-3 text-center">
            Pas encore membre ? <a href="inscription.php">Inscrivez-vous ici</a>
        </p>
    </div>
</main>

<!-- Bootstrap JS Bundle (optionnel, pour composants interactifs) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
