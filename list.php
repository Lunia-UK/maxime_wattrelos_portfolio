<?php include 'src/php/get_list_'. $_GET['category'] .'.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="src/css/reset.css">
    <link rel="stylesheet" href="src/css/style.css">
    <title>Works</title>
</head>
<body>
    <header>
        <nav class="navList">  
            <!-- <div class="logo"></div> -->
            <a href="index.html#home">accueil</a>
            <a href="categorie.html">projets</a>
            <a href="index.html#contact">contact</a>
        </nav>
    </header>
    <main>
        <div class="gallery">
        <?php 
        foreach ($list as $cle => $element){
        $idLink = $element['id'] - 1;
        $idLink3D = $element['id'];
            if($_GET['category'] === '3d'){
            echo '
                <figure class="gallery__item gallery__item--3D--'. $element['id'].'">
                <a href="works3d.php?category=' . $_GET['category'] . '&id='. $idLink3D .'">';
            } else if ($_GET['category'] === 'painting'){
                  echo '
                  <figure class="gallery__item gallery__item--'. $element['id'].'">
                  <a href="works.php?category=' . $_GET['category'] . '&id='. $idLink .'">';
            } else {
                echo '
                  <figure class="gallery__item gallery__item--mood--'. $element['id'].'">
                  <a href="works.php?category=' . $_GET['category'] . '&id='. $idLink .'">';
            };
                echo'
                    <img src="src/img/'. $element['img'].'" class="gallery__img" alt="'. $element['name'].'">
                </a>
            </figure>
            ';
        }?>
            
        </div>

    </main>
    <script src="src/js/menuList.js"></script>
</body>
</html>