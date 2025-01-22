<?php ob_start(); 

// Enclenche la temporisation de sortie


$acteur = $requete->fetch();    // fetch : récupère la ligne suivante d'un jeu de résultats PDO
                             // Cette méthode récupère toutes les lignes d'un jeu de résultats
//var_dump($acteur);

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
           
               <td><?=$acteur["nom"] ?>&nbsp;</td>
               <td><?=$acteur["prenom"] ?>&nbsp;</td>
               <td><?=$acteur["sexe"] ?>&nbsp;</td>
               <td><?=$acteur["date_naissance"] ?>&nbsp;</td>
               

           </tr>

               


        

    </tbody>

</table>

<h2>Filmographie</h2>


         
<?php foreach($filmographieActeur->fetchAll() as $filmDetail){  ?>


    
    

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
               <td><?=$filmDetail["titre"] ?></td>
               <td><?=$filmDetail["annee_sortie"] ?></td>
               <td><img src="public\img\img_film\<?=$filmDetail["affiche_film"] ?>" alt="Affiche du film" style="max-width: 200px; height: auto;"></td>
               

           </tr> 

               


        

    </tbody>

</table> 

<?php } ?>

<h2>Rôle</h2>


<?php foreach($roleActeur->fetchAll() as $roleDetail) { ?>
    


    <table class="uk-label uk-label-warning-stripped">
    <thead>
        <tr>
            <th>Nom du personnage</th>
            
            
            
        </tr>
    </thead>
    <tbody>
        
   
           
           <tr>
           
               <td><?=$roleDetail["role"] ?></td>
               

           </tr>

               


        

    </tbody>

</table>








   










<?php }











$titre = "Détails acteur";
$titre_secondaire = "Détails acteur";
$contenu = ob_get_clean();                 // Efface le contenu du tampon de sortie actif
require "view/template.php";
// Inclut un template (modèle) qui doit être responsable de l'affichage final de la page

