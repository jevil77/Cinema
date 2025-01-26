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

.form {
    width: 100%;
    max-width: 600px; 
    margin: 30px auto;
    padding: 20px;
    background-color: #2c2c2c; 
    border-radius: 10px; 
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
}


.form label {
    font-size: 1rem;
    font-weight: bold;
    color: #f1f1f1; 
    margin-bottom: 8px;
    display: block;
}


.form input[type="text"],
.form input[type="date"],
.form input[type="email"] {
    width: 95%; 
    padding: 12px;
    margin-bottom: 15px;
    border: 2px solid #333; 
    border-radius: 5px;
    background-color: #fff; 
    font-size: 1rem;
    color: #333; 
}


.btn {
    background-color: #600000; 
    color: white; 
    padding: 12px 20px; 
    border: 2px solid #800000; 
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer; 
    transition: all 0.3s ease; 
}


.btn:hover {
    background-color: #800000; 
    border-color: #ff0000; 
    box-shadow: 0 2px 6px rgba(255, 0, 0, 0.6); 
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
