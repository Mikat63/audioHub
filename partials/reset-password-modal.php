      <dialog id="reset-modal" class="hidden z-10 grey-color w-50 h-50 sm:w-96  rounded-lg fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 flex flex-col items-center justify-center gap-10 ">
          <form action="" method="POST" class="flex flex-col gap-6">
              <h2 class="font-title"> Entrez votre adresse mail</h2>

              <div class="font-main flex flex-col items-center">
                  <input class="font-main text-black  bg-white focus:scale-110" type="text" id="reset-email" name="email" minlength="10" maxlength="35" placeholder="Entre ton email" require>
              </div>

              <div class="flex flex-row justify-center gap-6 ">
                  <?php
                    $btnId = "reset-password";
                    $textBtn = "Réinitialiser";
                    require_once "submit-button.php";
                    ?>

                  <?php
                    $textBtn = "Annuler";
                    $btnId = "back-btn";
                    $hrefBtn = "#";
                    require_once "button.php";
                    ?>
              </div>
      </dialog>