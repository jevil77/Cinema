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
