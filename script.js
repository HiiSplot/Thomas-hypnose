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

function checkScroll() {
    const elementsLeft = document.querySelectorAll('.hidden-left');
    const triggerOffset = window.innerHeight * 0.4;
    elementsLeft.forEach(element => {
      const elementPosition = element.getBoundingClientRect().top;
      const windowHeight = window.innerHeight;
      if (elementPosition < windowHeight - triggerOffset) {
        element.classList.add('visible');
        element.style.display = "block";
      }
    });

      const elementsRight = document.querySelectorAll('.hidden-right');
      elementsRight.forEach(element => {
        const elementPosition = element.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;
        if (elementPosition < windowHeight - triggerOffset) {
          element.classList.add('visible');
          element.style.display = "block";
        }
    });
  }

  window.addEventListener('scroll', checkScroll);
  window.addEventListener('resize', checkScroll);
  window.onload = checkScroll;


btn.addEventListener('click', () => {
    console.log("clique");
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
