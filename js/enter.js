const enterToggle = document.getElementById('enter-toggle');
const enterMenu = document.getElementById('enter');
let isShown = false;

function getMenu() {
    if (!isShown) {
        enterMenu.classList.add('show');
        isShown = true;
        console.log('show')
    } else {
        enterMenu.classList.remove('show');
        console.log('hide');
        isShown = false;
    }
}

enterToggle.addEventListener('click', getMenu);