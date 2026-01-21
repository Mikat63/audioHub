<?php require_once "partials/head.php" ?>

<script defer src="assets/script/auth-connexion.js"></script>
<title>AudioHub - Connexion</title>
</head>

<body class="bg-black h-svh max-h-svh flex flex-col">
    <?php require_once "partials/header-logo.php" ?>

    <main class="w-full flex-1 flex flex-col items-center justify-center">
        <div class="w-full flex flex-col items-center justify-center gap-4 px-2 sm:w-[70%] lg:w-[50%]">
            <h1 class=" font-title text-white text-[20px]">Connecte-toi</h1>

            <form id="form-connexion-user" action="" method="POST" class=" w-[70%] flex flex-col gap-4 ">
                <div class="font-main flex flex-col sm:flex-row sm:justify-between lg:[50%]">
                    <label class=" text-white text-[16px]" for="email">Adresse email <span class="red-color">*</span></label>
                    <input class="font-main text-black bg-white focus:scale-110 rounded-lg" type="text" id="email" name="email" minlength="10" maxlength="35" placeholder="Entre ton email" required autocomplete="password">
                </div>
                <p id="email-error" class='red-color font-main'></p>

                <div class="font-main flex flex-col sm:flex-row sm:justify-between lg:[50%]">
                    <label class=" text-white text-[16px]" for="password">Mot de passe <span class="red-color">*</span></label>
                    <input class="font-main text-black bg-white focus:scale-110 rounded-lg" type="password" id="password" name="password" minlength="8" maxlength="35" placeholder="Entre ton mot de passe " required autocomplete="current-password">
                </div>
                <p id="password-error" class='red-color font-main'></p>


                <div>
                    <input class=" bg-white focus:scale-110" type="checkbox" id="remember-me" name="remember-me">
                    <label for="remember-me" class="text-white font-main cursor-pointer hover-green hover:brightness-150 focus:brightness-80 focus:scale-110">Se souvenir de moi</label>
                </div>

                <?php
                $textBtn = "Connexion";
                $btnId = "Connexion-btn";
                require_once "partials/submit-button.php";
                ?>
            </form>

            <div class="w-full flex justify-end">
                <a id="lost-password" tabindex=0 class="text-white font-main focus:scale-110 hover-green focus-green cursor-pointer">Mot de passe oublié ? </a>
            </div>

            <?php require_once "partials/green-line.php"; ?>

            <div class="font-main flex -flex-col items-center">
                <p class="text-white font-main">Pas encore inscrit ? <a href="create-account.php" class="text-white font-main focus:scale-110 hover-green focus-green cursor-pointer">Créé ton compte</a></p>
            </div>
        </div>


        <?php
        require_once "partials/reset-password-modal.php";
        ?>

        <?php
        require_once "partials/response-modal.php";
        ?>
    </main>
</body>

</html>