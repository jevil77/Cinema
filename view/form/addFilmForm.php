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
$titre = "Ajouter un film";
$titre_secondaire = "Ajouter un film";
$contenu = ob_get_clean();                 // Efface le contenu du tampon de sortie actif
require "view/template.php";
// Inclut un template (modèle) qui doit être responsable de l'affichage final de la page
