<?php require_once "partials/head.php" ?>
<script defer src="modals.php"></script>

<title>AudioHub - Connexion</title>
</head>

<body class="bg-black h-svh max-h-svh flex flex-col">
    <?php require_once "partials/header-logo.php" ?>

    <main class="w-full flex-1 flex flex-col items-center justify-center">
        <div class="w-full flex flex-col items-center justify-center gap-4 px-2 sm:w-[70%] lg:w-[50%]">
            <h1 class=" font-title text-white text-[20px]">Crée ton compte</h1>

            <form action="" method="POST" class=" w-[70%] flex flex-col gap-4 ">
                <div class="font-main flex flex-col sm:flex-row sm:justify-between lg:[50%]">
                    <label class=" text-white text-[16px]" for="pseudo">Pseudo</label>
                    <input class="font-main text-black bg-white focus:scale-110" type="text" id="pseudo" name="pseudo" minlength="10" maxlength="35" placeholder="Entre ton email" require>
                </div>


                <div class="font-main flex flex-col sm:flex-row sm:justify-between lg:[50%]">
                    <label class=" text-white text-[16px]" for="email">Email</label>
                    <input class="font-main text-black bg-white focus:scale-110" type="text" id="email" name="email" minlength="10" maxlength="35" placeholder="Entre ton email" require>
                </div>

                <div class="font-main flex flex-col sm:flex-row sm:justify-between lg:[50%]">
                    <label class=" text-white text-[16px]" for="password">Mot de passe</label>
                    <input class="font-main text-black bg-white focus:scale-110" type="password" id="password" name="password" minlength="8" maxlength="35" placeholder="Entre ton mot de passe " require>
                </div>

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
        </div>
    </main>
</body>

</html>