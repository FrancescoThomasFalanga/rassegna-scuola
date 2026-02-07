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
const overlay = document.getElementById("overlay");

hamburgerBtn.addEventListener("click", function () {
  navMenu.classList.toggle("show");
  overlay.classList.toggle("show");

  // Cambia icona ☰ <-> ✖
  if (navMenu.classList.contains("show")) {
    hamburgerBtn.textContent = "✖";
  } else {
    hamburgerBtn.textContent = "☰";
  }
});

// Chiudi menu cliccando sull'overlay
overlay.addEventListener("click", closeMenu);

function closeMenu() {
  navMenu.classList.remove("show");
  overlay.classList.remove("show");
  hamburgerBtn.textContent = "☰";
}