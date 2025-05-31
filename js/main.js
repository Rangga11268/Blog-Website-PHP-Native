const navItems = document.querySelector(".nav-items");
const navOpen = document.querySelector("#open-nav-btn");
const navClose = document.querySelector("#close-nav-btn");

const openNav = () => {
  navItems.style.display = "flex";
  navOpen.style.display = "none";
  navClose.style.display = "inline-block";
};

const closeNav = () => {
  navItems.style.display = "none";
  navOpen.style.display = "inline-block";
  navClose.style.display = "none";
};

navOpen.addEventListener("click", openNav);
navClose.addEventListener("click", closeNav);

const sidebar = document.querySelector("aside");
const showSidebarBtn = document.querySelector("#show-sidebar-btn");
const hideSidebarBtn = document.querySelector("#hide-sidebar-btn");

// change navbar style on scroll

window.addEventListener("scroll", () => {
  document
    .querySelector("nav")
    .classList.toggle("window-scroll", window.scrollY > 0);
});

// show sidebar
const showSidebar = () => {
  sidebar.style.left = "0";
  showSidebarBtn.style.display = "none";
  hideSidebarBtn.style.display = "inline-block";
};
// hide sidebar
const hideSidebar = () => {
  sidebar.style.left = "-100%";
  showSidebarBtn.style.display = "inline-block";
  hideSidebarBtn.style.display = "none";
};

showSidebarBtn.addEventListener("click", showSidebar);
hideSidebarBtn.addEventListener("click", hideSidebar);
