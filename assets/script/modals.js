const responseModal = document.querySelector("#response-modal");
const resetModal = document.querySelector("#reset-modal");
const backBtn = document.querySelector("#back-btn");
const LostPassword = document.querySelector("#lost-password");

function openClosedModal(modalId, e) {
  e?.stopPropagation();
  modalId.classList.toggle("hidden");
}

LostPassword.addEventListener("click", (e) => {
  openClosedModal(resetModal, e);
});

backBtn.addEventListener("click", (e) => {
  openClosedModal(resetModal, e);
});
