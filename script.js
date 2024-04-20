let prevScrollpos = window.scrollY;
let menu = document.querySelector(".desktopMenu");
let logo = document.querySelector(".logo");
const sidebar = document.getElementById("side-bar")
const content = document.querySelector(".content")
const btn = document.getElementById('btn');

window.onscroll = function() {

    let currentScrollPos = window.scrollY;

    if (currentScrollPos >= 150 && prevScrollpos > currentScrollPos) {
        menu.style.top = "0px";
    } else {
        menu.style.top = "-100px";
        logo.style.top = "-100px";
    }

    if (currentScrollPos <= 10) {
        menu.style.top = '100px';
        logo.style.top = '0px';
    }
    prevScrollpos = currentScrollPos;
}


btn.addEventListener('click', () => {
    console.log("clique");
    sidebar.classList.toggle("active");
});

content.addEventListener('click', () => {
    sidebar.classList.remove("active");
})