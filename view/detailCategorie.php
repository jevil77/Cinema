<?php ob_start(); 

// Enclenche la temporisation de sortie

   // fetch : récupère la ligne suivante d'un jeu de résultats PDO
                              // Cette méthode récupère toutes les lignes d'un jeu de résultats
//var_dump($film);

// Je crée une variable film, je récupère la variable requête du controle, j'utilise la fonction fetch car je récupère qu'un seul enregistrement
?>






    <table class="uk-table uk-table-striped">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Année de sortie</th>
                <th>Affiche</th>
            </tr>
        </thead>
        <tbody>
            
<?php foreach($requeteFilms->fetchAll() as $film){  ?>

                
                <tr>

                <td><a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><?= $film["titre"] ?></a></td>
                    <td><?=$film["annee_sortie"] ?></td>
                    <td>
                        
                       <img src="public\img\img_film\<?= $film["affiche_film"]?>" alt="Affiche de <?= $film["titre"] ?>" width="100">
                        
                    </td>

</tr>


<?php } ?>




<?php
$titre = "Détails de la catégorie  ";
$titre_secondaire = "Détails dans la catégorie ";
$contenu = ob_get_clean();
require "view/template.php";
?>
















