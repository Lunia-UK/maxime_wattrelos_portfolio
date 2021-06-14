<?php include 'src/php/get_list_'. $_GET['category'] .'.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="src/css/reset.css">
    <link rel="stylesheet" href="src/css/style.css">
    <link rel="stylesheet" href="src/css/slide.css">
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
      <div class="wrapper">
        <div class="slider">
          <?php 
            foreach ($list as $cle => $element){
              echo '<div class="slide" style="background: url(src/img/'. $element['img'].')no-repeat center center / cover;">
              <div class="backgroundBlur"> 
                <div class="worksPhoto mood">
                  <img class="moodImage" src="src/img/'. $element['img'].'" alt="'. $element['name'].'" />';
                  if($_GET['category'] == 'mood') {
                    echo '
                  <audio controls controlsList="nodownload" class="player audioControles">
                  <source src="src/music/'. $element['music'].'" type="audio/mpeg">
                  Your browser does not support the audio element.
                  </audio>
                  ';
                  };
                echo '
                </div>
                <div class="worksPresentation">';
                if($element['category'] != null) {
                  echo '<p class="categorie">'. $element['category'].'</p> ';
                } else {
                  echo '<p class="categorie">'. $_GET['category'].'</p> ';
                };
                echo '
                <h3>'. $element['name'].'</h3>
                <div class="pWorksPresentation">
                  <p>'. $element['summary'].'</p>
                  <p>'. $element['description'].'</p>
                  <p>'. $element['tech'].'</p>
                </div>
                </div>
              </div>
              </div>';
            }?>
        </div>
        <a id="prev" class=" prev">
          <svg id="leftArrow" class="arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
		        <g stroke-linejoin="round" stroke-linecap="round" >
			        <polyline points="60 25, 30 50, 60 75" ></polyline>
		        </g>
          </svg>
        </a>
        <a id="next" class=" next">
        <svg id="rightArrow" class="arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
		      <g stroke-linejoin="round" stroke-linecap="round">
			      <polyline points="40 25, 70 50, 40 75" ></polyline>
		      </g>
	      </svg>
        </a>
      </div>
    </main>
    <script>
      const slider = document.querySelector('.slider');
    let slides = document.querySelectorAll('.slide');
const prev = document.querySelector('.prev');
const next = document.querySelector('.next');
let activeSlide = 0;

let oldSlide = 0;
slider.style.width = (slides.length * 100) +'%'
window.addEventListener('load', ()=>{
  <?php  if(isset($_GET['id'])) {
    $idSlide = $_GET['id'];
  } else {
    $idSlide = 0;
  }; ?>
  activeSlide = <?php echo $idSlide;?>;
  slider.style.transform = `translateX(${-100/slides.length * activeSlide}%)`;
});


function slideAnim(e){
  activeSlide = e.deltaY > 0 ? (activeSlide += 1) :(activeSlide -= 1);
  activeSlide = activeSlide < 0 ? 0 : activeSlide;
  activeSlide = activeSlide > slides.length - 1 ? slides.length - 1 : activeSlide;
  slider.style.transform = `translateX(${-100/slides.length * activeSlide}%)`;
}

window.addEventListener("wheel", slideAnim);

next.addEventListener('click', (e)=> {
  activeSlide = activeSlide += 1;
  activeSlide = activeSlide > slides.length - 1 ? slides.length - 1 : activeSlide;
  slider.style.transform = `translateX(${-100/slides.length * activeSlide}%)`;
});

prev.addEventListener('click', (e)=> {
  activeSlide = activeSlide -= 1;
  activeSlide = activeSlide < 0 ? 0 : activeSlide;
  slider.style.transform = `translateX(${-100/slides.length * activeSlide}%)`;
});

let x, x1, drag;
document.addEventListener('mousedown', (e)=>{
  if(e.type == 'touchstart'){
    x = e.touches[0].clientX;
  }else {
    x = e.clientX;
  }
})

document.addEventListener('mouseup', (e)=>{
  if(e.type == 'touchmove'){
     x1 = e.touches[0].clientX;
  } else {
    x1 = e.clientX;
  };
  drag = x === x1 ? drag = false : true;
  pos = x1 - x;
  console.log( drag)
  if  (pos < 0 && drag == true ){
      activeSlide = activeSlide += 1;
      activeSlide = activeSlide > slides.length - 1 ? slides.length - 1 : activeSlide;
      slider.style.transform = `translateX(${-100/slides.length * activeSlide}%)`;
      
    } else if (pos > 0 && drag == true) {
      activeSlide = activeSlide -= 1;
      activeSlide = activeSlide < 0 ? 0 : activeSlide;
      slider.style.transform = `translateX(${-100/slides.length * activeSlide}%)`;
    }
});

    </script>
    <script src="src/js/menu.js"></script>
    <script src="src/js/moodMusic.js"></script>
</body>
</html>