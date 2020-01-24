const scrollFixed = () => {
  window.addEventListener("scroll", () => {
    const nav = document.querySelector(".navigation");

    if (window.scrollY > 10) {
      nav.classList.add("fixed");
    } else {
      nav.classList.remove("fixed");
    }
  });
};
scrollFixed();

const topNav = () => {
  const showTopMenu = document.querySelector("#showTopMenu");
  const navTopMenu = document.querySelector("#navTopMenu");
  showTopMenu.addEventListener("click", () => {
    navTopMenu.classList.toggle("hide-top_menu");
  });
};
topNav();
