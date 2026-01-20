// general variables
const LostPassword = document.querySelector("#lost-password");
const resetModal = document.querySelector("#reset-modal");
const backBtn = document.querySelector("#back-btn");
const responseModal = document.querySelector("#response-modal");

const formConnexionUser = document.querySelector("#form-connexion-user");
const pseudoError = document.querySelector("#pseudo-error");
const emailError = document.querySelector("#email-error");
const imgResponse = document.querySelector("#img-response");
const responseText = document.querySelector("#response-text");

// functions

// functions for show modals with validate status or failed
function showResponseModal(imgSrc, message, addColorText) {
  responseModal.classList.toggle("hidden");
  imgResponse.src = imgSrc;
  responseText.classList.remove("red-color", "green-color-text");
  responseText.classList.add(addColorText);
  responseText.textContent = message;
  setTimeout(() => {
    responseModal.classList.toggle("hidden");
  }, 2000);
}

// function for show error message in the good p
function errorMessage(data) {
  console.log(data);
  pseudoError.textContent = "";
  emailError.textContent = "";

  if (data.status === "pseudo-error") {
    pseudoError.textContent = data.message;
  }

  if (data.status === "email-error") {
    emailError.textContent = data.message;
  }

  if (data.status === "success") {
    showResponseModal(
      "assets/icons/success-icon.png",
      data.message,
      "green-color-text",
    );
  }

  if (
    data.status === "error-method" ||
    data.status === "error-server" ||
    data.status === "error-pseudo-exist" ||
    data.status === "error-email-exist"
  ) {
    showResponseModal(
      "assets/icons/failed-icon.png",
      data.message,
      "red-color",
    );
  }
}

// function to fetch in process
function formConnexionUser(form) {
  form.addEventListener("submit", (e) => {
    e.preventDefault();
    const pseudoValue = form.querySelector("#pseudo").value;
    const emailValue = form.querySelector("#email").value;

    fetch("process/connexion-auth.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({
        pseudo: pseudoValue,
        email: emailValue,
        password: passwordValue,
      }),
    })
      .then((response) => response.json())
      .then((data) => {
        errorMessage(data);
      })
      .catch((error) => {
        console.error("Erreur réseau :", error);
        showResponseModal(
          "assets/icons/failed-icon.png",
          "La création du compte n'a pas aboutie",
          "red-color",
        );
      });
  });
}

createAccountForm(formCreateAccount);


// reset modal
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
