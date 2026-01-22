  <header class="w-full h-auto flex flex-row p-4 justify-between green-color-border-bottom">
      <a tabindex="0" title="Profil" aria-label="accéder au profil" class="focus:scale-125 hover:scale-125  cursor-pointer" href="profil.php">
          <div class="username-container w-auto h-auto flex gap-2 ">
              <div class="w-6 h-6 green-color rounded-full font-main flex justify-center items-center"><?= strtoupper(mb_substr($_SESSION['user_username'], 0, 1)) ?></div>
              <p class="hover-green font-main text-white"><?= $_SESSION['user_username'] ?></p>
          </div>
      </a>

      <div class="social-container w-auto h-auto flex flex-row gap-2 items-center">
          <div title="Aller sur Facebook" class="w-6 h-6 sm:hidden ">
              <a class="block w-full h-full hover:scale-125 focus:scale-125 transition-transform cursor-pointer " target="_blank" href="https://www.facebook.com/?locale=fr_FR">
                  <img class=" w-full h-full flex flex-col items-center " src="assets/icons/facebook.png" alt="Aller vers Instagram">
              </a>
          </div>

          <div title="Aller sur Instagram" class="w-6 h-6 sm:hidden">
              <a class="block w-full h-full hover:scale-125 focus:scale-125 transition-transform cursor-pointer" target="_blank" href="https://www.instagram.com/">
                  <img class="w-full h-full flex flex-col items-center" src="assets/icons/instagram.png" alt="Aller vers facebook">
              </a>
          </div>

          <div id="sidebar-btn" tabindex="0" aria-label="Ouvrir le menu" title="Menu" class="w-8 h-8 hidden sm:block">
              <img class="w-full h-full flex flex-col items-center hover:scale-125 focus:scale-125 cursor-pointer" src="assets/icons/menu-icon.png" alt="Aller vers facebook">
          </div>
      </div>
  </header>