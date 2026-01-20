// general variables
const formCreateAccount = document.querySelector("#form-create-account");
const pseudoError = document.querySelector("#pseudo-error");
const emailError = document.querySelector("#email-error");
const passwordError = document.querySelector("#password-error");
const responseModal = document.querySelector("#response-modal");
const imgResponse = document.querySelector("#img-response");
const responseText = document.querySelector("#response-text");

// functions

// functions for show modals with validate status or failed
function showResponseModal(imgSrc, message) {
  responseModal.classList.toggle("hidden");
  imgResponse.src = imgSrc;
  responseText.textContent = message;
  setTimeout(() => {
    responseModal.classList.toggle("hidden");
  }, 3000);
}

// function for show error message in the good p
function errorMessage(data) {
  pseudoError.textContent = "";
  emailError.textContent = "";
  passwordError.textContent = "";

  if (data.status === "pseudo-error") {
    pseudoError.textContent = data.message;
  }

  if (data.status === "email-error") {
    emailError.textContent = data.message;
  }

  if (data.status === "password-error") {
    passwordError.textContent = data.message;
  }

  if (data.status === "success") {
    showResponseModal("icons/success-icon.png", "Compte créé avec succès");
  }
}

// function to fetch in process
function createAccountForm(form) {
  form.addEventListener("submit", (e) => {
    e.preventDefault();
    const pseudoValue = form.querySelector("#pseudo").value;
    const emailValue = form.querySelector("#email").value;
    const passwordValue = form.querySelector("#password").value;

    fetch("process/create-auth.php", {
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
          "icons/failed-icon.png",
          "La création du compte n'a pas abouti",
        );
      });
  });
}

createAccountForm(formCreateAccount);
