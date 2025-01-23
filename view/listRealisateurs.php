<?php ob_start(); ?>


<p class="uk-label uk-label-stripped"> Il y a <?= $requete->rowcount() ?> réalisateurs</p>

<table class="uk-label uk-label-warning-stripped">
    <thead>
        <tr>
            <th>Nom</th>
            
            
            
        </tr>
    </thead>
    <tbody>
        <?php
           foreach($requete->fetchAll() as $realisateur) {  
                  // fetchALl : récupère les lignes restantes d'un ensemble de résultats
                  // foreach  : La structure de langage foreach fournit une façon simple de parcourir des tableaux. foreach ne fonctionne que pour les tableaux et les objets, et émettra une erreur si vous tentez de l'utiliser sur une variable de type différent ou une variable non initialisée.
      
            ?>
           
           <tr>
           
               <td><a href="index.php?action=detailRealisateur&id=<?= $realisateur["id_realisateur"]?>"><?=$realisateur["nom"] ?> <?=$realisateur["prenom"]?></a></td>
               
               
          
           </tr>

               


          <?php } ?>

    </tbody>

</table>


<a href="index.php?action=addRealisateurForm">

<button id="add-category-btn">Ajouter un réalisateur</button> 
</a>






<?php

$titre = "Liste des réalisateurs";
$titre_secondaire = "Liste des réalisateurs";
$contenu = ob_get_clean();
require "view/template.php";



