let prevScrollpos = window.scrollY;
let menu = document.querySelector(".desktopMenu");
let logo = document.querySelector(".logo");
const sidebar = document.getElementById("side-bar")
const content = document.querySelector(".content")
const btn = document.getElementById('btn');
const cards = document.querySelectorAll(".card");


window.onscroll = function() {

    let currentScrollPos = window.scrollY;
    

    if (currentScrollPos >= 150 && prevScrollpos > currentScrollPos) {
      menu.style.top = "0px"; // Afficher le menu
  } else if (currentScrollPos > 150) {
      menu.style.top = "-100px"; // Cacher le menu
      logo.style.top = "-100px"; // Cacher le logo
  } else {
      menu.style.top = '100px'; // Cacher le menu à la réactualisation
      logo.style.top = '0px'; // Maintenir le logo visible
  }

    prevScrollpos = currentScrollPos;
}

function checkScroll() {
    const elementsLeft = document.querySelectorAll('.hidden-left');
    const triggerOffset = window.innerHeight * 0.4;
    elementsLeft.forEach(element => {
      const elementPosition = element.getBoundingClientRect().top;
      const windowHeight = window.innerHeight;
      if (elementPosition < windowHeight - triggerOffset) {
        element.classList.add('visible');
      }
    });

      const elementsRight = document.querySelectorAll('.hidden-right');
      elementsRight.forEach(element => {
        const elementPosition = element.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;
        if (elementPosition < windowHeight - triggerOffset) {
          element.classList.add('visible');
        }
    });
  }

  window.addEventListener('scroll', checkScroll);
  window.addEventListener('resize', checkScroll);
  window.onload = checkScroll;


btn.addEventListener('click', () => {
    sidebar.classList.toggle("active");
});

content.addEventListener('click', () => {
    sidebar.classList.remove("active");
})

cards.forEach(card => {
  card.addEventListener("click", function() {
      this.classList.toggle("flipped");
  });
});
