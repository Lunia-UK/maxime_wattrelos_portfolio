let player = document.querySelector('.player');
let moodImage = document.querySelector('.moodImage');
let play = document.querySelector('.play');
let pause = document.querySelector('.pause');

let photoAndControle = [play, pause, moodImage];

photoAndControle.forEach(el => {
    el.addEventListener('click', playAudio);
    function playAudio() {
    if(player.paused) {
        player.play();
        play.style.display = 'none';
        pause.style.display = 'block';
    } else {
        player.pause();
        play.style.display = 'block';
        pause.style.display = 'none';
    }
}
    el.addEventListener('mouseover', () => {
        pause.style.opacity = .8;
        play.style.opacity = .8;
    });
    
    el.addEventListener('mouseout', () => {
        pause.style.opacity = 0;
        play.style.opacity = 0;
    })
})