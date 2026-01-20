const LostPassword = document.querySelector("#lost-password");
const resetModal = document.querySelector("#reset-modal");
const backBtn = document.querySelector("#back-btn");
const responseModal = document.querySelector("#response-modal");


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
