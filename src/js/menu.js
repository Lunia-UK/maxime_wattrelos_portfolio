let prevScrollpos = window.pageYOffset;
window.onscroll = function() {
let currentScrollPos = window.pageYOffset;
  if (currentScrollPos <= 0) {
    document.querySelector("nav").style.background = "transparent";
    document.querySelector("nav").style.boxShadow = "none";
    document.querySelectorAll("nav a").forEach(el => {
        el.classList.remove('navLinkScroll');
    })
  } else {
    document.querySelector("nav").style.background = "#F8FAFB";
    document.querySelector("nav").style.boxShadow = " 0px 3px 12px rgba(0, 0, 0, 0.109)";
    document.querySelectorAll("nav a").forEach(el => {
        el.classList.add('navLinkScroll');
    })
  }
}