const menuBtn = document.getElementById('menu-toggle');
const hamburger = document.querySelector('.menu-btn__burger');
const navbar = document.getElementById('navigation');

let showMenu = false;

menuBtn.addEventListener('click', toggleMenu);

function toggleMenu() {
    if (!showMenu) {
        navbar.classList.add('open');

        showMenu = true;
    } else {
        navbar.classList.remove('open');

        showMenu = false;
    }
}