<?php 

namespace Controller;
use Model\Connect;

class CinemaController {


    public function listFilms() {
        // Méthode pour afficher la liste des films

         $pdo = Connect::seConnecter();
         // Connexion bd
         $requete = $pdo->query("
         SELECT id_film,titre, annee_sortie, affiche_film
         FROM film
         ");
         // Exécution de la requête pour récupérer les films avec id, titre et année de sortie
        require "view/listFilms.php";
        //Inclut le fichier pour afficher la liste des films et récupère les données
        // query : prépare et exécute une requête sql 

    }



    public function detailFilm($id) {
        //affiche détail d'un film avec le casting

        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT duree, synopsis, affiche_film, note
        FROM film 
        WHERE id_film = :id");
        $requete->execute(["id"=> $id]);
        // exécution de la requête avec le paramètre id du film



        

        // preparation de la requête pour récupérer les acteurs du film
        $castingRequete = $pdo->prepare("
        
        SELECT DISTINCT p.nom, p.prenom, p.sexe, p.date_naissance, a.id_acteur
        FROM personne p
        INNER JOIN acteur a ON a.id_personne = p.id_personne
        INNER JOIN casting c ON c.id_acteur = a.id_acteur
        INNER JOIN film f ON f.id_film = c.id_film
        WHERE f.id_film =  :id
        ");

        $castingRequete->execute(["id"=>$id]);
        // exécution requête pour récupérer les acteurs du film
        

        require "view/detailFilm.php";
        // Inclut le fichier pour afficher détails film et casting







    }


    public function listActeurs() {


        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT *
        FROM personne
        INNER JOIN acteur ON acteur.id_personne = personne.id_personne
        ORDER BY nom ASC
        ");


        require "view/listActeurs.php";




    }


    public function detailActeur($id) {

        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare ("
        SELECT nom, prenom, sexe, 
         DATE_FORMAT(date_naissance, '%d-%m-%Y') AS date_naissance
        FROM personne
        INNER JOIN acteur ON acteur.id_personne = personne.id_personne
        WHERE id_acteur = :id");
        $requete->execute(["id"=> $id]);


        


        $filmographieActeur = $pdo->prepare("
        SELECT DISTINCT f.titre, f.annee_sortie, f.id_film, f.affiche_film
        FROM film f
        INNER JOIN casting c ON f.id_film = c.id_film
        INNER JOIN acteur a ON a.id_acteur = c.id_acteur
        WHERE a.id_acteur = :id
        ORDER BY f.annee_sortie DESC
        ");
        $filmographieActeur->execute(["id"=>$id]);


        

    
        $roleActeur = $pdo->prepare("
        SELECT DISTINCT p.nom AS acteur_nom, 
               p.prenom AS acteur_prenom, 
               pj.nom_personnage AS role
        FROM personne p
        INNER JOIN acteur a ON p.id_personne = a.id_personne
        INNER JOIN casting c ON a.id_acteur = c.id_acteur
        INNER JOIN personnage pj ON c.id_personnage = pj.id_personnage
        WHERE a.id_acteur = :id");
        $roleActeur->execute(["id" => $id]);
    

        require "view/detailActeur.php";


         }




         public function listRealisateurs() {

            $pdo = Connect::seConnecter();
            $requete = $pdo->query ("
             SELECT *
             FROM personne
             INNER JOIN realisateur ON realisateur.id_personne = personne.id_personne
             ORDER BY nom ASC");
            

            require "view/listRealisateurs.php";

            }



        public function detailRealisateur($id) {
            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare ("
            SELECT nom, prenom, sexe, 
            DATE_FORMAT(date_naissance, '%d-%m-%Y') AS date_naissance
            FROM personne
            INNER JOIN realisateur ON realisateur.id_personne = personne.id_personne
            WHERE id_realisateur = :id");
            $requete->execute(["id"=> $id]);



            $filmographieRealisateur = $pdo->prepare("
            SELECT f.titre, f.annee_sortie, f.id_film, f.affiche_film
            FROM film f
            INNER JOIN realisateur r ON r.id_realisateur = f.id_realisateur
            WHERE r.id_realisateur = :id
            ORDER BY f.annee_sortie DESC;");
            $filmographieRealisateur->execute(["id"=>$id]);






            
            require "view/detailRealisateur.php";

        
        
        
        }


       
        public function listCategories() {
            $pdo = Connect::seConnecter();
            $requete = $pdo->query("
                SELECT 
                    g.id_genre, 
                    g.libelle, 
                    COUNT(a.id_film) AS nb_films
                    FROM genre g
                    LEFT JOIN appartenir a ON g.id_genre = a.id_genre
                    GROUP BY g.id_genre, g.libelle
                    ORDER BY g.libelle ASC;");
        
            require "view/listCategories.php";
        }



        public function detailCategorie($id) {
            $pdo = Connect::seConnecter();
            
            // Récupérer les informations sur le genre
            $requeteGenre = $pdo->prepare("
                SELECT libelle
                FROM genre
                WHERE id_genre = :id
            ");
            $requeteGenre->execute(["id" => $id]);
            $genre = $requeteGenre->fetch();
            
            // Récupérer les films associés à ce genre
            $requeteFilms = $pdo->prepare("
                SELECT f.id_film, f.titre, f.annee_sortie, f.affiche_film
                FROM film f
                INNER JOIN appartenir a ON f.id_film = a.id_film
                WHERE a.id_genre = :id
                ORDER BY f.annee_sortie DESC
            ");
            $requeteFilms->execute(["id" => $id]);
            
            
            // Inclure la vue pour afficher les détails du genre et des films
            require "view/detailCategorie.php";
        }




        


            public function addCategorieForm() {

            require "view/form/addCategorieForm.php";
            
            }


            public function addCategorie(){

               // Vérifie si le formulaire a été soumis
                if(isset($_POST['submit'])){
               // Récupère et filtre le nom de la catégorie
                $addCategorie = filter_input(INPUT_POST, "newGenre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                if($addCategorie){

                    // Prépare la requête
                    $pdo = Connect::seConnecter();
                    $requete = $pdo->prepare("
                     INSERT INTO genre (libelle)
                     VALUES(:newGenre)
                    ");
                    
                    // Exécute la requête
                    $requete->execute(["newGenre"=>$addCategorie]);  
                    header("Location: index.php?action=listCategories");
                    exit;
                }
                            
                   
            }

        

        }


        public function addActeurForm() {

            require "view/form/addActeurForm.php";
            
            }


        public function addActeur() {

            if(isset($_POST['submit'])){

                $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $sexe = filter_input(INPUT_POST, "sexe", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $date_naissance = filter_input(INPUT_POST, "date_naissance", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

             if ($nom && $prenom && $sexe && $date_naissance) {

                    // Prépare la requête
                    $pdo = Connect::seConnecter();
                    $requetePersonne = $pdo->prepare("
                    INSERT INTO personne (nom, prenom, sexe, date_naissance)
                    VALUES (:nom, :prenom, :sexe, :date_naissance);

                    

                    
                    ");
                    
                    // Exécute la requête
                    $requetePersonne->execute([
                        "nom" => $nom,
                        "prenom" => $prenom,
                        "sexe" => $sexe,
                        "date_naissance" => $date_naissance

                    ]);

                     $newPersonneId = $pdo->lastInsertId();

                    //Insérer dans la table `acteur`
                     $requeteActeur = $pdo->prepare("
                        INSERT INTO acteur (id_personne)
                        VALUES (:id_personne)
                     ");
                     $requeteActeur->execute(["id_personne" => $newPersonneId]);
        

                    header("Location: index.php?action=listActeurs");

                   
        


                    exit;
                }



            }
        


        }



        public function addCastingForm() {

            $pdo = Connect::seConnecter();


            $requetePersonnage = $pdo->query("
            SELECT personnage.id_personnage, personnage.nom_personnage
            FROM personnage
            ORDER BY personnage.nom_personnage
        ");
    
            $requeteActeur = $pdo->query("
            SELECT acteur.id_acteur, acteur.id_personne,
            CONCAT(personne.prenom, ' ', personne.nom) AS nom_acteur
            FROM acteur
            INNER JOIN personne ON acteur.id_personne = personne.id_personne
            ORDER BY personne.nom
        ");
    
            $requeteFilm = $pdo->query("
            SELECT film.id_film, film.titre
            FROM film
            ORDER BY film.titre
        ");

        require "view/form/addCastingForm.php";

        }



        
        
        
        
            public function addCasting() {
                $pdo = Connect::seConnecter();
            
                // Récupérer les informations nécessaires pour le formulaire
                $requetePersonnage = $pdo->query("
                    SELECT personnage.id_personnage, personnage.nom_personnage
                    FROM personnage
                    ORDER BY personnage.nom_personnage
                ");
            
                $requeteActeur = $pdo->query("
                    SELECT acteur.id_acteur, acteur.id_personne,
                    CONCAT(personne.prenom, ' ', personne.nom) AS nom_acteur
                    FROM acteur
                    INNER JOIN personne ON acteur.id_personne = personne.id_personne
                    ORDER BY personne.nom
                ");
            
                $requeteFilm = $pdo->query("
                    SELECT film.id_film, film.titre
                    FROM film
                    ORDER BY film.titre
                ");
            
                // Traiter les données du formulaire
                if (isset($_POST["submit"])) {
                    // Récupérer et assainir les données
                    $personnages = filter_input(INPUT_POST, "personnages", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $acteurs = filter_input(INPUT_POST, "acteurs", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $films = filter_input(INPUT_POST, "films", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
                    // Vérifier que toutes les données sont présentes
                    if ($personnages && $acteurs && $films) {
                        // Préparer la requête
                        $requeteAddCasting = $pdo->prepare("
                            INSERT INTO casting (id_personnage, id_acteur, id_film)
                            VALUES (:personnages, :acteurs, :films)
                        ");
            
                        // Exécuter la requête
                        $requeteAddCasting->execute([
                            "personnages" => $personnages,
                            "acteurs" => $acteurs,
                            "films" => $films,
                        ]);
            
                        // Redirection après succès
                        header("Location: index.php?action=listActeurs");
                        exit;
                    }
                }
                require "view/casting/addCastingForm.php";

               
            }


            


            /*public function addFilmForm(){

                $pdo = Connect::seConnecter();

                $requeteReal = $pdo->query("
                SELECT realisateur.id_realisateur, 
                    CONCAT(personne.prenom, ' ', personne.nom) 
                        AS realisateur
            FROM realisateur
                INNER JOIN personne ON realisateur.id_personne = personne.id_personne 
            ORDER BY realisateur ASC 
                
                ");


                $requetteGenre = $pdo->query("
                 SELECT genre.id_genre, genre.libelle
            FROM genre
            ORDER BY genre.libelle ASC

                ");


                require "view/form/addFilmForm.php";


         }


          
         public function addFilm(){

            $pdo = Connect::seConnecter();

                $requeteReal = $pdo->query("
                SELECT realisateur.id_realisateur, 
                    CONCAT(personne.prenom, ' ', personne.nom) 
                        AS realisateur
            FROM realisateur
                INNER JOIN personne ON realisateur.id_personne = personne.id_personne 
            ORDER BY realisateur ASC 
                
                ");


                $requetteGenre = $pdo->query("
                 SELECT genre.id_genre, genre.libelle
            FROM genre
            ORDER BY genre.libelle ASC

                ");



            if(isset($_POST["submit"])){


                $titre = filter_input(INPUT_POST,"titre",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $annee_sortie = filter_input(INPUT_POST,"annee_sortie",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $duree = filter_input(INPUT_POST,"duree",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $synopsis = filter_input(INPUT_POST,"sysnopsis",FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
                $affiche_film = filter_input(INPUT_POST,"affiche_film",FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
                $note = filter_input(INPUT_POST,"note",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $realisateur = filter_input(INPUT_POST,"realisateur",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $genre = filter_input(INPUT_POST,"genre",FILTER_SANITIZE_FULL_SPECIAL_CHARS);


                if($titre && $annee_sortie && $duree && $synopsis &&  $affiche_film
                $note && $realisateur && $genre)


                $requeteFilm = prepare("

                INSERT INTO film (titre, annee_sortie, duree, synopsis,
                                 affiche_film, note, id_realisateur)

                VALUES ( :titre, :annee_sortie, :duree, :synopsis, '',
                         : note, :realisateur) ");


                $requeteFilm->execute([

                        ":titre" => $titre,
                        ":annee_sortie" => $annee_sortie,
                        ":duree" => $duree,
                        ":synopsis" => $synopsis,
                        ":note" => $note,
                        ":realisateur" => $realisateur
                    ]);

                $id_film = $pdo->lastInsertId(); 









                
                        
                
                
                
                
                
                






                





         }

        }*/
}
        
            
        
        
        
           




               
 




       



          
