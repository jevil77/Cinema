<?php



use Controller\CinemaController;

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';

});

$ctrlCinema = new CinemaController();

use Controller\HomeController;

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';

});

$ctrlHome = new HomeController();




$id = (isset($_GET["id"])) ? $_GET["id"] : null;

if(isset($_GET["action"])){
    switch ($_GET["action"]) {


        // Main

        case "homePage" : $ctrlHome->homePage(); break;

        // list & detail
        case "listFilms" : $ctrlCinema->listFilms(); break;
        case "listActeurs" : $ctrlCinema->listActeurs(); break;
        case "detailFilm"  : $ctrlCinema->detailFilm($id) ; break;  
        case "detailActeur": $ctrlCinema->detailActeur($id) ; break;
        case "listRealisateurs":$ctrlCinema->listRealisateurs($id) ; break;
        case "detailRealisateur":$ctrlCinema->detailRealisateur($id); break;
        case "listCategories":$ctrlCinema->listCategories(); break;
        case "detailCategorie":$ctrlCinema->detailCategorie($id); break;


        // Form

        case "addCategorieForm" :$ctrlCinema->addCategorieForm(); break;
        case "addCategorie" :$ctrlCinema->addCategorie(); break;
        case "addActeurForm" :$ctrlCinema->addActeurForm(); break;
        case "addActeur" :$ctrlCinema->addActeur(); break;
        case "addCastingForm" :$ctrlCinema->addCastingForm(); break;
        case "addCasting" :$ctrlCinema->addCasting(); break;
        case "addFilmForm" :$ctrlCinema->addFilmForm(); break;
        case "addFilm" :$ctrlCinema->addFilm(); break;


        // Quand vous faites une requête dans lequel on a un élément variable (comme ici l'id de l'acteur), il faut bien faire un "prepare" (et pas un "query") pour ensuite faire un "execute"


        

        

    }
    } else {
        $ctrlHome->homePage();
    }




// Point à vérifier :
// -- index.php -> case 
//-- SELECT du controller contient bien l'id (et tous les champs nécessaires à l'affichage)
//-- lien <a> fait bien passer la bonne information (on peut utiliser le devtools "Inspecter" du navigateur pour s'en assurer)
 