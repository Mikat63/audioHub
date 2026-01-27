document.addEventListener("DOMContentLoaded", () => {
  const dots = document.getElementById("loaderf-dots");
  let dotCount = 0;
  setInterval(() => {
    dotCount = (dotCount + 1) % 4;
    dots.textContent = ".".repeat(dotCount === 0 ? 3 : dotCount);
  }, 500);

  setTimeout(() => {
    window.location = "connexion.php";
  }, 5000);
});
