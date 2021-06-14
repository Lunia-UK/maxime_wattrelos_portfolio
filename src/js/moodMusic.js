let players = document.querySelectorAll('.player');
let moodImages = document.querySelectorAll('.moodImage');

let audio = [moodImages, players];
audio.forEach(el => {
    el.forEach(element => {
        element.addEventListener('mouseover', () => {
            players.forEach(el => {
                el.style.opacity = 1;
            })
            });
                
            element.addEventListener('mouseout', () => {
                players.forEach(el => {
                    el.style.opacity = 0;
                })
            })
    });
})



