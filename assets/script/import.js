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

// modal response
const responseModal = document.querySelector("#response-modal");
const imgResponse = document.querySelector("#img-response");
const responseText = document.querySelector("#response-text");

// function to fetch in process
function importTrack(data) {
  const formData = new FormData(importForm);

  fetch("process/import.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);
      messages(data);
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

// show cover if upload
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

// functions
function showResponseModal(imgSrc, imgAlt, message, addColorText) {
  responseModal.classList.toggle("hidden");
  imgResponse.src = imgSrc;
  responseText.classList.remove("red-color", "green-color-text");
  responseText.classList.add(addColorText);
  responseText.textContent = message;
  setTimeout(() => {
    responseModal.classList.toggle("hidden");
  }, 2000);
}

function messages(data) {
  musicError.textContent = "";
  imgError.textContent = "";
  titleError.textContent = "";
  artistError.textContent = "";
  genreError.textContent = "";
  albumError.textContent = "";

  switch (data.status) {
    case "success":
      showResponseModal(
        "assets/icons/success-icon.svg",
        "Icone de succès",
        data.message,
        "green-color-text",
      );
      break;

    case "title-not-exist-or-empty":
      titleError.textContent = data.message;
      break;

    case "artist-not-exist-or-empty":
      artistError.textContent = data.message;
      break;

    case "genre-not-exist-or-empty":
      genreError.textContent = data.message;
      break;

    case "error-title-length":
      titleError.textContent = data.message;
      break;

    case "error-artist-length":
      artistError.textContent = data.message;
      break;

    case "error-genre-length":
      genreError.textContent = data.message;
      break;

    case "error-album-length":
      albumError.textContent = data.message;
      break;

    case "error-music-not-exist":
      musicError.textContent = data.message;
      break;

    case "error-image-not-exist":
      imgError.textContent = data.message;
      break;

    case "error-music-too-big":
      musicError.textContent = data.message;
      break;

    case "error-image-too-big":
      imgError.textContent = data.message;
      break;

    case "error-music-format":
      musicError.textContent = data.message;
      break;

    case "error-image-format":
      imgError.textContent = data.message;
      break;

    case "error-music-mime":
      musicError.textContent = data.message;
      break;

    case "error-image-mime":
      imgError.textContent = data.message;
      break;

    default:
      showResponseModal(
        "assets/icons/failed-icon.svg",
        "Icone d'erreur",
        data.message,
        "red-color",
      );
      break;
  }
}
