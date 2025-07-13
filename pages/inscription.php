<?php
include("../inc/connexion.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Inscription</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/styles/inscription.css">
</head>
<body>

<div class="inscription-container shadow-sm">
    <h1>Formulaire d'inscription</h1>
    <form action="../traitements/traitement_inscription.php" method="post" novalidate>
        <div class="mb-3">
            <label for="name" class="form-label">Nom :</label>
            <input type="text" class="form-control" id="name" name="name" required />
        </div>
        
        <div class="mb-3">
            <label for="genre" class="form-label">Genre :</label>
            <input type="text" class="form-control" id="genre" name="genre" placeholder="F ou M" maxlength="1" required />
        </div>
        
        <div class="mb-3">
            <label for="mail" class="form-label">Email :</label>
            <input type="email" class="form-control" id="mail" name="mail" required />
        </div>
        
        <div class="mb-3">
            <label for="ville" class="form-label">Ville :</label>
            <input type="text" class="form-control" id="ville" name="ville" required />
        </div>
        
        <div class="mb-3">
            <label for="mdp" class="form-label">Mot de passe :</label>
            <input type="password" class="form-control" id="mdp" name="mdp" required />
        </div>
        
        <div class="mb-3">
            <span class="date-label">Date de naissance :</span>
            <select name="jour" class="form-select" required>
                <option value="" disabled selected>Jour</option>
                <?php for($i=1; $i<=31; $i++) echo "<option value='$i'>$i</option>"; ?>
            </select>
            <select name="mois" class="form-select" required>
                <option value="" disabled selected>Mois</option>
                <?php for($i=1; $i<=12; $i++) echo "<option value='$i'>$i</option>"; ?>
            </select>
            <select name="annee" class="form-select" required>
                <option value="" disabled selected>Année</option>
                <?php for($i=1900; $i<=2020; $i++) echo "<option value='$i'>$i</option>"; ?>
            </select>
        </div>
        
        <button type="submit" class="btn btn-olive w-100">Valider</button>
    </form>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
