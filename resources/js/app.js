require('./bootstrap');

const mainMenu = document.querySelector(".main-header__menu");
const hamburgerMenu = document.querySelector(".main-header__burger");
const closeMenuButton = document.querySelector(".main-header__close");
const icons = document.querySelectorAll(".fa-custom")


hamburgerMenu.addEventListener("click", () =>
{
    mainMenu.classList.add("mobile");
    closeMenuButton.style.display = "block";
    icons.forEach(icon => icon.style.display = "none");
});

closeMenuButton.addEventListener("click", (e) =>
{
    mainMenu.classList.remove("mobile");
    closeMenuButton.style.display = "none";
    icons.forEach(icon => icon.style.display = "block");
});




