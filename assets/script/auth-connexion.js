// general variables
const LostPassword = document.querySelector("#lost-password");
const resetModal = document.querySelector("#reset-modal");
const backBtn = document.querySelector("#back-btn");
const responseModal = document.querySelector("#response-modal");

const formConnexionUser = document.querySelector("#form-connexion-user");
const passwordError = document.querySelector("#password-error");
const emailError = document.querySelector("#email-error");
const imgResponse = document.querySelector("#img-response");
const responseText = document.querySelector("#response-text");

// functions

// functions for show modals with validate status or failed
function showResponseModal(imgSrc,imgAlt, message, addColorText) {
  responseModal.classList.toggle("hidden");
  imgResponse.src = imgSrc;
  imgResponse.alt = imgAlt;
  responseText.classList.remove("red-color", "green-color-text");
  responseText.classList.add(addColorText);
  responseText.textContent = message;
  setTimeout(() => {
    responseModal.classList.toggle("hidden");
  }, 2000);
}

// function for show error message in the good p
function errorMessage(data) {
  emailError.textContent = "";
  passwordError.textContent = "";

  if (data.status === "email-error") {
    emailError.textContent = data.message;
  }

  if (data.status === "bad-password") {
    passwordError.textContent = data.message;
  }

  if (data.status === "ok") {
    window.location.href = "home.php";
  }

  if (
    data.status === "error-method" ||
    data.status === "error-server" ||
    data.status === "error-pseudo-exist" ||
    data.status === "error-email-exist" ||
    data.status === "no-account"
  ) {
    showResponseModal(
      "assets/icons/failed-icon.png",
      "Icone d'erreur",
      data.message,
      "red-color",
    );
  }
}

// function to fetch in process
function formConnexion(form) {
  form.addEventListener("submit", (e) => {
    e.preventDefault();
    const emailValue = form.querySelector("#email").value;
    const passwordValue = form.querySelector("#password").value;
    const rememberMe = form.querySelector("#remember-me").checked ? true : false;

    fetch("process/connexion-auth.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({
        email: emailValue,
        password: passwordValue,
        remember_me: rememberMe,
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
          "Icone d'erreur",
          "Une erreur s'est produite",
          "red-color",
        );
      });
  });
}

formConnexion(formConnexionUser);

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
