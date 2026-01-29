const importForm = document.querySelector("#import-form");

// submit btn
const importSubmitBtn = importForm.querySelector("#import-submit-btn");

// input form error message
const musicError = importForm.querySelector("#music-error");
const imgError = importForm.querySelector("#img-error");
const titleError = importForm.querySelector("#title-error");
const artistError = importForm.querySelector("#artist-error");
const albumError = importForm.querySelector("#album-error");
const genreError = importForm.querySelector("#genre-error");

// function to fetch in process
function importTrack() {
  const formData = new FormData(importForm);

  fetch("process/import-track.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .catch((error) => {
      console.log(error);
    });
}

importSubmitBtn.addEventListener("click", (event) => {
  event.preventDefault();
  importTrack();
});
