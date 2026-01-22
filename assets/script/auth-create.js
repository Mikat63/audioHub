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

// function for show error message in the good p
function errorMessage(data) {
  console.log(data);
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
    showResponseModal(
      "assets/icons/success-icon.png",
      "Icone de succès",
      data.message,
      "green-color-text",
    );
  }

  if (
    data.status === "error-method" ||
    data.status === "error-server" ||
    data.status === "error-account-exist" ||
    data.status === "error-pseudo-exist" ||
    data.status === "error-email-exist"
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
          "assets/icons/failed-icon.png",
          "Icone d'erreur",
          "La création du compte a échoué",
          "red-color",
        );
      });
  });
}

createAccountForm(formCreateAccount);
