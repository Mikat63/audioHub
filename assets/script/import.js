const importForm = document.querySelector("#import-form");

// inputs
const inputMusic = document.querySelector("#input-music");
const inputImage = document.querySelector("#input-image");
const imageIcon = document.querySelector("#image-icon");

// text to hidden or show
const importMusicText = document.querySelector("#import-music-text");
const formatMusicText = document.querySelector("#format-music-text");
const nameUploadMusic = document.querySelector("#name-upload-music");
const inputContainer = document.querySelector("#input-container");
const LabelContainer = document.querySelector("#label-container");
const importCoverText = document.querySelector("#import-cover-text");
const formatCoverText = document.querySelector("#format-cover-text");
const imageUpload = document.querySelector("#image-upload");

// submit btn
const importSubmitBtn = importForm.querySelector("#import-submit-btn");

// p form error message
const musicError = importForm.querySelector("#music-error");
const imgError = importForm.querySelector("#img-error");
const titleError = importForm.querySelector("#title-error");
const artistError = importForm.querySelector("#artist-error");
const albumError = importForm.querySelector("#album-error");
const genreError = importForm.querySelector("#genre-error");

// function to fetch in process
function importTrack() {
  const formData = new FormData(importForm);

  fetch("process/import.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);
    })
    .catch((error) => {
      console.log(error);
    });
}

// listeners
importForm.addEventListener("submit", (event) => {
  event.preventDefault();
  importTrack();
});

// show music name if upload
inputMusic.addEventListener("change", () => {
  if (inputMusic.files.length > 0) {
    nameUploadMusic.classList.remove("hidden");
    nameUploadMusic.textContent = inputMusic.files[0].name;
    importMusicText.classList.add("hidden");
    formatMusicText.classList.add("hidden");
  }
});

inputImage.addEventListener("change", () => {
  if (inputImage.files.length > 0) {
    const file = inputImage.files[0];
    const previewUrl = URL.createObjectURL(file);

    inputContainer.classList.add("hidden");
    LabelContainer.classList.add("hidden");
    importCoverText.classList.add("hidden");
    formatCoverText.classList.add("hidden");
    imageIcon.classList.add("hidden");

    imageUpload.classList.remove("hidden");
    imageUpload.src = previewUrl;
  }
});
