const mesiToggle = document.getElementById("mesiToggle");
const mesiMenu = document.getElementById("mesiMenu");

mesiToggle.addEventListener("click", function (e) {
  if (window.innerWidth <= 600) {
    e.preventDefault(); // evita il comportamento del link
    mesiMenu.classList.toggle("show");
  }
  console.log("PREMUTO");
});


const hamburgerBtn = document.getElementById("hamburgerBtn");
const navMenu = document.getElementById("navMenu");

hamburgerBtn.addEventListener("click", function () {
  navMenu.classList.toggle("show");
});