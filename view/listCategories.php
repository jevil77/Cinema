<?php ob_start(); ?>



<table class="uk-label uk-label-warning-stripped">
    <thead>
        <tr>
            <th>LIBELLE</th>
            <th>Nombre de films</th>
            
            
        </tr>
    </thead>
    <tbody>
        <?php
           foreach($requete->fetchAll() as $genre) {  
                  // fetchALl : récupère les lignes restantes d'un ensemble de résultats
                  // foreach  : La structure de langage foreach fournit une façon simple de parcourir des tableaux. foreach ne fonctionne que pour les tableaux et les objets, et émettra une erreur si vous tentez de l'utiliser sur une variable de type différent ou une variable non initialisée.
      
            ?>
           
           <tr>
           
           <td><a href="index.php?action=detailCategorie&id=<?= $genre["id_genre"]?>"><?=$genre["libelle"] ?></a></td>
               
               <td><?= $genre["nb_films"]?></td>
               
               
          
           </tr>

               


          <?php } ?>

    </tbody>
   

</table>

<br>
<br>

<a href="index.php?action=addCategorieForm">

 <button id="add-category-btn">Ajouter une Catégorie</button> 
 </a>
<?php
$titre = "Liste des catégories";
$titre_secondaire = "Liste des catégories";
$contenu = ob_get_clean();                 // Efface le contenu du tampon de sortie actif
require "view/template.php";
// Inclut un template (modèle) qui doit être responsable de l'affichage final de la page