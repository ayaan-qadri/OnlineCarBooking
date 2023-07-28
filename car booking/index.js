const menu = document.querySelector(".menu");
menu.addEventListener("click",()=>{
    
    const menus = document.querySelector(".menu-btns");
    menus.classList.toggle("toggleMenu");
    document.body.classList.toggle("active")
})