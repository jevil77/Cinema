<?php ob_start(); ?>

<p class="uk-label uk-label-stripped">  <?= $requete->rowcount() ?> films d'horreur à découvrir !</p>

<table class="uk-label uk-label-warning-stripped">
    <thead>
        <tr>
            <th>TITRE</th>
            <th>ANNEE SORTIE</th>
            <th>AFFICHE DE</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
           foreach($requete->fetchAll() as $film) {  
                  // fetchALl : récupère les lignes restantes d'un ensemble de résultats
                  // foreach  : La structure de langage foreach fournit une façon simple de parcourir des tableaux. foreach ne fonctionne que pour les tableaux et les objets, et émettra une erreur si vous tentez de l'utiliser sur une variable de type différent ou une variable non initialisée.
      
            ?>
           
           <tr>
           
               <td><a href="index.php?action=detailFilm&id=<?= $film["id_film"]?>"><?=$film["titre"] ?></a></td>
               <td><?=$film["annee_sortie"] ?></td>
               <td><img src="public\img\img_film\<?=$film["affiche_film"] ?>" alt="Affiche du film" style="max-width: 200px; height: auto;"></td>
               
          
           </tr>

               


          <?php } ?>

    </tbody>

</table>

<?php

$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean();
require "view/template.php";
