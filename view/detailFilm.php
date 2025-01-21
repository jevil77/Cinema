<?php ob_start(); 

// Enclenche la temporisation de sortie


$film = $requete->fetch();    // fetch : récupère la ligne suivante d'un jeu de résultats PDO
                              // Cette méthode récupère toutes les lignes d'un jeu de résultats
//var_dump($film);

// Je crée une variable film, je récupère la variable requête du controle, j'utilise la fonction fetch car je récupère qu'un seul enregistrement
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>



<table class="uk-label uk-label-warning-stripped">
    <thead>
        <tr>
            <th>Durée</th>
            <th>Synopsis</th>
            <th>Affiche</th>
            <th>Note</th>
        </tr>
    </thead>
    <tbody>
        
   
           
           <tr>
           
               <td><?=$film["duree"] ?></td>
               <td><?=$film["synopsis"] ?></td>
               <td><img src="public\img\img_film\<?=$film["affiche_film"] ?>" alt="Affiche du film" style="max-width: 200px; height: auto;"></td>
               <td><?=$film["note"] ?></td>

           </tr>

               


        

    </tbody>

</table>

<h2>Casting</h2>

        

         
<?php foreach($castingRequete->fetchAll() as $personne) { ?>
    

    <table class="uk-label uk-label-warning-stripped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Sexe</th>
            <th>Date de naissance</th>
        </tr>
    </thead>
    <tbody>
        
   
           
           <tr>
           
               <td><?=$personne["nom"] ?></td>
               <td><?=$personne["prenom"] ?></td>
               <td><?=$personne["sexe"] ?></td>
               <td> <?=date("d-m-Y", strtotime($personne["date_naissance"]))?></td>

           </tr>

               


        

    </tbody>

</table>














<?php }

$titre = "Détails des films";
$titre_secondaire = "Détails des films";
$contenu = ob_get_clean();                 // Efface le contenu du tampon de sortie actif
require "view/template.php";
// Inclut un template (modèle) qui doit être responsable de l'affichage final de la page
