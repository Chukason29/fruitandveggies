"use strict"
//Changing fruits code
const subFruitBox = document.querySelectorAll(".sub-fruit-boxes-item");
const subFruitBoxArray = Array.from(subFruitBox);
const singleBroccoli = document.getElementById("single-broccoli");
const singleStrawberry = document.getElementById("single-strawberry");
const singleCashew = document.getElementById("single-cashew");
const mainFruit = document.querySelector("#main-fruit-box > img");
const menuBar = document.querySelector("#menu-bar");
const menuIcon = document.getElementById("fa-bars");
const menuCloseIcon = document.getElementById("fa-x");

const showMobileMenu = () => {
    menuBar.id = "shownMenu";
    menuCloseIcon.style.display = "block";
    menuCloseIcon.style.color="#ffffff"
}
const hideMobileMenu = () => {
    menuBar.id = "menu-bar";
    menuCloseIcon.style.display = "none";
}
menuIcon.addEventListener("click", () => {
    showMobileMenu();
})
menuCloseIcon.addEventListener("click", () => {
    hideMobileMenu();
})
menuCloseIcon.addEventListener("click", () => {

})
const removeBorder = () => {
    subFruitBoxArray.forEach(item => {
        item.classList.remove("bordered");
    })
}
const fruitChange = (e) =>{
    removeBorder();
    e.classList.add("bordered");
    mainFruit.src = "https://i.ibb.co/k48hpzn/single-broccoli.png"
}