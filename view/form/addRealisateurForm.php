<?php ob_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Document</title>
</head>
<body>

<style>



.form {
  width: 90%;
  margin: 20px auto;
  padding: 10px;
  border-collapse: collapse;
  background-color: #1c1c1c; /* Fond sombre des tableaux */
  border: 2px solid #600000; /* Bordures rouges foncées */
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.8);
  border-radius: 8px;
}


.btn{background-color: #1c1c1c; /* Fond sombre des tableaux */
border: 2px solid #600000; /* Bordures rouges foncées */}

.btn:hover {
  background-color: #800000; /* Rouge plus vif */
  border-color: #ff0000; /* Bordure plus vive */
}





</style>
    
</body>
</html>

<div class="form">
<form action="index.php?action=addRealisateur" method="POST" class="categorie-form">
    <label for="nom">Nom</label>
    <input name="nom" id="nom" type="text" placeholder="Nom du réalisateur" required>
    
    <label for="prenom">Prénom</label>
    <input name="prenom" id="prenom" type="text" placeholder="Prénom du réalisateur" required>
    
    <label for="sexe">Sexe</label>
    <input name="sexe" id="sexe" type="text" placeholder="" required>

    <label for="date_naissance">Date de naissance</label>
    <input name="date_naissance" id="date_naissance" type="date" placeholder="Date de naissance" required>
    <input type="submit" name="submit" value="Envoyer" class="btn">
</form>




























<?php
$titre = "Ajouter un réalisateur";
$titre_secondaire = "Ajouter un réalisateur";
$contenu = ob_get_clean();                 // Efface le contenu du tampon de sortie actif
require "view/template.php";
// Inclut un template (modèle) qui doit être responsable de l'affichage final de la page
