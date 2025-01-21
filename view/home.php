<?php ob_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Wiki Movies Home</title>
</head>
</html>

<body>

    <style>


    .btn-container {
        text-align: center;
    }


        h1{
            text-align:center;
        }
        .movie-gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .movie {
            text-align: center;
            max-width: 150px;
        }
        .movie img {
            width: 100%;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .movie-title {
            margin-top: 10px;
            font-size: 1rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Bienvenue dans vos pires cauchemars !</h1>
    <br>
    <br>


    <div class="movie-gallery">
        <div class="movie">
            <img src="public\img\img_film\halloween.jpg" alt="Movie 1">
            <p class="movie-title">Halloween</p>
        </div>
        <div class="movie">
            <img src="public\img\img_film\talk_to_me.jpg" alt="Movie 2">
            <p class="movie-title">Talk To Me</p>
        </div>
        <div class="movie">
            <img src="public\img\img_film\the_conjuring.jpg" alt="Movie 3">
            <p class="movie-title">The Conjuring</p>
        </div>
        <div class="movie">
            <img src="public\img\img_film\scream.jpg" alt="Movie 4">
            <p class="movie-title">Scream</p>
        </div>
        
    </div>
    
    <div class="movie-gallery">
        <div class="movie">
            <img src="public\img\img_film\midsommar.jpg" alt="Movie 1">
            <p class="movie-title">Midsommar</p>
        </div>
        <div class="movie">
            <img src="public\img\img_film\the_black_phone.jpg" alt="Movie 2">
            <p class="movie-title">The Black Phone</p>
        </div>
        <div class="movie">
            <img src="public\img\img_film\a_quiet_place.jpg" alt="Movie 3">
            <p class="movie-title">A Quiet Place</p>
        </div>
        <div class="movie">
            <img src="public\img\img_film\barbarian.jpg" alt="Movie 4">
            <p class="movie-title">Barbarian</p>
        </div>
        
    </div>


    <br>
    <br>

   <div class="btn-container">
    <a href="index.php?action=listFilms" class="btn1">Découvrez notre liste !</a>
    </div>
</body>
<?php 




    


$titre = "Home";
$titre_secondaire = "Home";
$contenu = ob_get_clean();
require "view/template.php";
?>