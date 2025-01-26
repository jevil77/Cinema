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

<?php 
// Récupérez tous les résultats avant d'utiliser fetchAll()



?>

<div class="form">
<form action="index.php?action=addCasting" method="POST">

<label for="personnages">Personnage :</label>
        <select name="personnages" id="personnages" required>
            
            <?php foreach ($requetePersonnage->fetchAll() as $personnage) { ?>
                <option value="<?=($personnage["id_personnage"]) ?>">
                    <?= ($personnage["nom_personnage"]) ?>
                </option>
                <?php } ?>
              


        </select>
        <br><br>



        <label for="acteurs">Acteur :</label>
        <select name="acteurs" id="acteurs" required>
            
            <?php foreach ($requeteActeur->fetchAll() as $acteur) {?>
                <option value="<?=($acteur["id_acteur"]) ?>">
                    <?=($acteur["nom_acteur"]) ?>
                </option>
                <?php } ?>

        </select>
        <br><br>



        <label for="films">Film :</label>
        <select name="films" id="films" required>
            
            <?php foreach ($requeteFilm->fetchAll()as $film){ ?>
                <option value="<?=($film["id_film"]) ?>">
                    <?=($film["titre"]) ?>
                </option>
                <?php } ?>

        </select>
        <br><br>



        <button type="submit" name="submit">Ajouter le casting</button>
    </form>
</div>
</body>
</html>




























<?php
$titre = "Ajouter un rôle";
$titre_secondaire = "Ajouter un rôle";
$contenu = ob_get_clean();                 // Efface le contenu du tampon de sortie actif
require "view/template.php";
// Inclut un template (modèle) qui doit être responsable de l'affichage final de la page
