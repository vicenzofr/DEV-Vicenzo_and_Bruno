let btnMenu = document.getElementById('btn-menu');
let menu = document.getElementById('menu-mobile');
let overlay = document.getElementById('overlay-menu');

btnMenu.addEventListener('click', function () {
    menu.classList.add('abrir-menu');
})

menu.addEventListener('click', () => {
    menu.classList.remove('abrir-menu');
})

overlay.addEventListener('click', () => {
    menu.classList.remove('abrir-menu');
})
function loading() {
    setTimeout(() => {
        let body = document.querySelector('#body');
        body.style.display = 'block';
        let blocoLoading = document.querySelector('.bloco');
        blocoLoading.style.display = 'none';
    }, 3000);

}

