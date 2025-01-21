<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=home" />
    
    <title>Cinema</title>
</head>
<body>

<main>
    <header>
    <nav class="navbar">
    <div class="navbar-container">
    
            <a href="index.php?action=homePage"><span class="material-symbols-outlined">home</span></a>
            <a href="index.php?action=listFilms">Films</a>
            <a href="index.php?action=listActeurs">Acteurs</a>
            <a href="index.php?action=listRealisateurs">Réalisateurs</a>
            <a href="index.php?action=listCategories">Catégories</a>
            
    </div>
    <div id="contenu">
        <h1 class="uk-heading-divider">Horror Movies</h1>
        </nav>
        <h2 class="uk-heading-bullet"><?= $titre_secondaire ?></h2>
        
      
    </div>
       

        <?= $contenu ?>


        
    
</header>

</main>

    
</body>
</html>