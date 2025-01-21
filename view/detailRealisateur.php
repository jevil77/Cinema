<?php ob_start(); 

// Enclenche la temporisation de sortie


$realisateur = $requete->fetch();    // fetch : récupère la ligne suivante d'un jeu de résultats PDO
                              // Cette méthode récupère toutes les lignes d'un jeu de résultats
//var_dump($realisateur);

// Je crée une variable film, je récupère la variable requête du controle, j'utilise la fonction fetch car je récupère qu'un seul enregistrement
?>



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
           
               <td><?=$realisateur["nom"] ?></td>
               <td><?=$realisateur["prenom"] ?></td>
               <td><?=$realisateur["sexe"] ?></td>
               <td><?=$realisateur["date_naissance"] ?></td>

           </tr>

               


        

    </tbody>

</table>

<h2>Filmographie</h2>

<?php foreach($filmographieRealisateur->fetchAll() as $filmo) { ?>

   
    <table class="uk-label uk-label-warning-stripped">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Année de sortie</th>
            <th>Affiche de</th>
            
            
        </tr>
    </thead>
    <tbody>
        
   
           
           <tr>
           
               <td><?=$filmo["titre"] ?>&nbsp;</td>
               <td><?=$filmo["annee_sortie"] ?></td>
               <td><img src="public\img\img_film\<?=$filmo["affiche_film"] ?>" alt="Affiche du film" style="max-width: 200px; height: auto;"></td>


           </tr>

               


        

    </tbody>

</table>


<?php }





$titre = "Détails réalisateur";
$titre_secondaire = "Détails réalisateur";
$contenu = ob_get_clean();                 // Efface le contenu du tampon de sortie actif
require "view/template.php";
// Inclut un template (modèle) qui doit être responsable de l'affichage final de la page

