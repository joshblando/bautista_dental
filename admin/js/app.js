const burger = document.querySelector(".burger");
const closeNav = document.querySelector(".close-nav");
const sideNav = document.querySelector(".sidenav");

burger.addEventListener("click", () => {
  sideNav.classList.add("show-nav");
});

closeNav.addEventListener("click", () => {
  sideNav.classList.remove("show-nav");
});
