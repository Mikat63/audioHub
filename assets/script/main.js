const sidebar = document.querySelector("#sidebar");
const sidebarBtn = document.querySelector("#sidebar-btn");

// sidebar menu
sidebarBtn.addEventListener("click", () => {
  sidebar.classList.toggle("-translate-x-full");
  sidebar.classList.toggle("translate-x-0");
});
