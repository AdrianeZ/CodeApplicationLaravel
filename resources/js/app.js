require('./bootstrap');

const mainMenu = document.querySelector(".main-header__menu");
const hamburgerMenu = document.querySelector(".main-header__burger");
const closeMenuButton = document.querySelector(".main-header__close");


hamburgerMenu.addEventListener("click", () =>
{
    mainMenu.classList.add("mobile");
    closeMenuButton.style.display = "block";
});

closeMenuButton.addEventListener("click", (e) =>
{
    mainMenu.classList.remove("mobile");
    closeMenuButton.style.display = "none";
});




