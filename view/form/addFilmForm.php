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
  background-color: #1c1c1c; 
  border: 2px solid #600000; 
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.8);
  border-radius: 8px;
}


.btn{background-color: #1c1c1c; 
border: 2px solid #600000; }

.btn:hover {
  background-color: #800000; 
  border-color: #ff0000; 
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



<div class="form">
<form action="index.php?action=addFilm" method="POST">

    <label for="titre">Titre du film :</label>
    <input type="text" id="titre" name="titre" placeholder="Titre du film" required>
    <br>
    
     <label for="annee_sortie">Année de sortie :</label>
    <input type="number" id="annee_sortie" name="annee_sortie" placeholder="Année de sortie" required>
    <br>

    <label for="duree">Durée (en minutes) :</label>
    <input type="number" id="duree" name="duree" placeholder="Durée en minutes" required>
    <br>

    <label for="synopsis">Synopsis :</label>
    <textarea id="synopsis" name="synopsis" placeholder="Résumé du film" required></textarea>
    <br>
    
    <label for="affiche_film">URL de l'affiche :</label>
    <input type="url" id="affiche_film" name="affiche_film" placeholder="Lien de l'affiche" required>
    <br>
    
    <label for="note">Note (sur 10) :</label>
    <input type="number" id="note" name="note" placeholder="Note du film" min="0" max="10" required>
    <br>

    <label for="realisateur">Réalisateur :</label>
    <select id="realisateur" name="realisateur" required>
    <option value="">Choisir un réalisateur</option>
      <?php foreach ($requeteReal->fetchAll() as $realisateur) { ?>
            <option value="<?= $realisateur['id_realisateur'] ?>">
                <?= ($realisateur['realisateur']) ?>
            </option>
        <?php } ?> 
    </select>
    <br>
    
<h4>Sélectionnez un genre : </h4>
   <?php
        foreach($requeteGenres->fetchAll() as $genre) { ?>
            <input type="checkbox" name="genre[]" 
                    id="<?= $genre["libelle"] ?>"
                    value="<?= $genre["id_genre"] ?> ">
            <label for="<?= $genre["libelle"] ?>">
                    <?= $genre["libelle"] ?>
            </label><br>
    <?php    } ?>
   

    <button type="submit" name="submit">Ajouter le film</button>


    
</form>





















<?php
$titre = "Ajouter un film";
$titre_secondaire = "Ajouter un film";
$contenu = ob_get_clean();                 // Efface le contenu du tampon de sortie actif
require "view/template.php";
// Inclut un template (modèle) qui doit être responsable de l'affichage final de la page
