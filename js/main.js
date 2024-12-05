const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-container")
// const navMenu = document.querySelector(".nav-menu");
// const navLogin = document.querySelector(".login-button");


hamburger.addEventListener("click", () => {
    navMenu.classList.toggle("active")
    hamburger.classList.toggle("active");
})

document.querySelectorAll(".nav-link").forEach(n => n.addEventListener("click", () =>{
    hamburger.classList.remove("active");
    navMenu.classList.remove("active");

}))



