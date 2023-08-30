let btnMenu= document.getElementById('btn-menu')
let Menu=document.getElementById('menu-mobile')
let Overlay=document.getElementById('overlay-menu')

btnMenu.addEventListener('click',()=>{
    Menu.classList.add('abrir-menu')
})

Menu.addEventListener('click',()=>{
    Menu.classList.remove('abrir-menu')
})

Overlay.addEventListener('click',()=>{
    Menu.classList.remove('abrir-menu')
})

