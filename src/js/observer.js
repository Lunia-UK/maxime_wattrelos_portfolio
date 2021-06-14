const target = document.getElementById("target");
let allTarget = document.querySelectorAll(".target");

function handler(entries, observer) {
  for (entry of entries) {
    // console.log(entry);
    
    let ratio = entry.intersectionRatio;

    // statusText.textContent = ratio;

    if (ratio >= 1) {
      entry.target.style.opacity = 1;
      entry.target.classList.add('targetActif');
    //   statusBox.className = "yes";
    } else if (ratio <= 0) {
    //   statusBox.className = "no";
      entry.target.style.opacity = 0;
      entry.target.classList.remove('targetActif');
    } else {
    //   statusBox.className = "partial";
      entry.target.style.opacity = 1;
      entry.target.classList.add('targetActif');
    }
  }
}

/* This custom threshold invokes the handler whenever:
   1. The target begins entering the viewport (0 < ratio < 1).
   2. The target fully enters the viewport (ratio >= 1).
   3. The target begins leaving the viewport (1 > ratio > 0).
   4. The target fully leaves the viewport (ratio <= 0).
   Try adding additional thresholds! */
let observer = new IntersectionObserver(handler, {
  threshold: [0, 1]
});

allTarget.forEach(element => observer.observe(element));