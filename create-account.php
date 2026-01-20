<?php require_once "partials/head.php" ?>
<script defer src="assets/script/auth-create.js"></script>

<title>AudioHub - Connexion</title>
</head>

<body class="bg-black h-svh max-h-svh flex flex-col">
    <?php require_once "partials/header-logo.php" ?>

    <main class="w-full flex-1 flex flex-col items-center justify-center">
        <div class="w-full flex flex-col items-center justify-center gap-4 px-2 sm:w-[70%] lg:w-[50%]">
            <h1 class=" font-title text-white text-[20px]">Crée ton compte</h1>

            <form id="form-create-account" action="" method="POST" class=" w-[70%] flex flex-col gap-4 ">
                <div class="font-main flex flex-col sm:flex-row sm:justify-between lg:[50%]">
                    <label class=" text-white text-[16px]" for="pseudo">Pseudo <span class="red-color">*</span></label>
                    <input class="font-main text-black bg-white focus:scale-110 rounded-lg" type="text" id="pseudo" name="pseudo" minlength="5" maxlength="20" placeholder="Entre ton pseudo" required autocomplete="pseudo">
                </div>
                <p id="pseudo-error" class='red-color font-main'></p>


                <div class="font-main flex flex-col sm:flex-row sm:justify-between lg:[50%]">
                    <label class=" text-white text-[16px]" for="email">Email <span class="red-color">*</span></label>
                    <input class="font-main text-black bg-white focus:scale-110 rounded-lg" type="text" id="email" name="email" minlength="10" maxlength="20" placeholder="Entre ton email" required autocomplete="email">
                </div>
                <p id="email-error" class='red-color font-main'></p>


                <div class="font-main flex flex-col sm:flex-row sm:justify-between lg:[50%]">
                    <label class=" text-white text-[16px]" for="password">Mot de passe <span class="red-color">*</span> </label>
                    <input class="font-main text-black bg-white focus:scale-110 rounded-lg" type="password" id="password" name="password" minlength="8" maxlength="20" placeholder="Entre ton mot de passe " required autocomplete="current-password">
                </div>
                <p id="password-error" class='red-color font-main'></p>


                <?php require_once "partials/green-line.php"; ?>

                <div class="flex flex-row justify-center gap-6 ">
                    <?php
                    $btnType = "submit";
                    $textBtn = "Créer";
                    $btnId = "create-account-btn";
                    require_once "partials/submit-button.php";
                    ?>

                    <?php
                    $btnId = "back-btn";
                    $hrefBtn = "connexion.php";
                    $textBtn = "Annuler";
                    require_once "partials/button.php";
                    ?>
                </div>
            </form>

            <?php
            require_once "partials/response-modal.php";
            ?>
        </div>
    </main>
</body>

</html>