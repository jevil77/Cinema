<?php ob_start(); ?>


<p class="uk-label uk-label-stripped"> Il y a <?= $requete->rowcount() ?> acteurs</p>

<table class="uk-label uk-label-warning-stripped">
    <thead>
        <tr>
            <th>Nom</th>
            
            
            
        </tr>
    </thead>
    <tbody>
        <?php
           foreach($requete->fetchAll() as $acteur) {  
                  // fetchALl : récupère les lignes restantes d'un ensemble de résultats
                  // foreach  : La structure de langage foreach fournit une façon simple de parcourir des tableaux. foreach ne fonctionne que pour les tableaux et les objets, et émettra une erreur si vous tentez de l'utiliser sur une variable de type différent ou une variable non initialisée.
      
            ?>
           
           <tr>
           
               <td><a href="index.php?action=detailActeur&id=<?= $acteur["id_acteur"]?>"><?=$acteur["nom"] ?> <?=$acteur["prenom"]?></a></td>
               
               
          
           </tr>

               


          <?php } ?>

    </tbody>

</table>

<a href="index.php?action=addActeurForm">

 <button id="add-category-btn">Ajouter un acteur/ actrice</button> 
 </a>

 
<a href="index.php?action=addCastingForm">

<button id="add-category-btn">Ajouter un rôle</button> 
</a>

<?php

$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();
require "view/template.php";



