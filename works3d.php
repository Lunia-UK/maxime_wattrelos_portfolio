<?php include 'src/php/get_project.php';?>
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
        <nav>  
            <!-- <div class="logo"></div> -->
            <a href="index.html#home">accueil</a>
            <a href="categorie.html">projets</a>
            <a href="index.html#contact">contact</a>
        </nav>
    </header>
    <main>
        <article class="artile3D">
            <h3><?= $project[0][1]?></h3>
            <?php if($project[0][0] == 7 || $project[0][0] == 8){
                echo '<p class="alfred3Ddetails">Turn personnage</p>';
            }else {
                echo '<p class="alfred3Ddetails">Look development</p>';
            };
            ?>
            <p></p>
            <?php if($project[0][8] == null){
                echo '<img src="src/img/'. $project[0][6] .'" width="50%"/>';
            }else {
                echo '<video controls src="src/video/'. $project[0][8] .'.mp4" width="50%"></video>';
            };
            $idPrev = $project[0][0] - 1 ;
            $idNext = $project[0][0] + 1 ;
            if($idPrev > 0){
                echo '
                <a href="works3d.php?category=3d&id='. $idPrev .'" class="arrow prev">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
		                <g stroke-linejoin="round" stroke-linecap="round" stroke="white" fill="transparent" stroke-width="8px">
			                <polyline points="60 25, 30 50, 60 75" ></polyline>
		                </g>
                    </svg>
                </a>
                ';
            };
            if($project[0][0] < 10){
                echo '
                <a href="works3d.php?category=3d&id=' . $idNext .'" class="arrow next">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
		                <g stroke-linejoin="round" stroke-linecap="round" stroke="white" fill="transparent" stroke-width="8px">
			                <polyline points="40 25, 70 50, 40 75" ></polyline>
		                </g>
	                </svg>
                </a>
                ';
            };
            ?>
            
            
        </article>        
    </main>
    <script src="src/js/menu.js"></script>
</body>
</html>