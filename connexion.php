<?php require_once "partials/head.php" ?>

<script defer src="modals.js"></script>
<title>AudioHub - Connexion</title>
</head>

<body class="bg-black h-svh max-h-svh flex flex-col">
    <?php require_once "partials/header-logo.php" ?>

    <main class="w-full flex-1 flex flex-col items-center justify-center">
        <div class="w-full flex flex-col items-center justify-center gap-4 px-2 sm:w-[70%] lg:w-[50%]">
            <h1 class=" font-title text-white text-[20px]">Connecte-toi</h1>

            <form action="" method="POST" class=" w-[70%] flex flex-col gap-4 ">
                <div class="font-main flex flex-col sm:flex-row sm:justify-between lg:[50%]">
                    <label class=" text-white text-[16px]" for="email">Adresse email</label>
                    <input class="font-main text-black bg-white focus:scale-110" type="text" id="email" name="email" minlength="10" maxlength="35" placeholder="Entre ton email" require>
                </div>

                <div class="font-main flex flex-col sm:flex-row sm:justify-between lg:[50%]">
                    <label class=" text-white text-[16px]" for="password">Mot de passe</label>
                    <input class="font-main text-black bg-white focus:scale-110" type="password" id="password" name="password" minlength="8" maxlength="35" placeholder="Entre ton mot de passe " require>
                </div>

                <div>
                    <input class=" bg-white focus:scale-110" type="checkbox" id="remember_me" name="remember_me">
                    <label for="remember_me" class="text-white font-main cursor-pointer">Se souvenir de moi</label>
                </div>

                <?php
                $textBtn = "Connexion";
                $btnId = "Connexion-btn";
                require_once "partials/submit-button.php";
                ?>
            </form>

            <div  id="lost-password" class="w-full flex justify-end">
                <a tabindex=0 class="text-white font-main focus:scale-110 hover-green cursor-pointer">Mot de passe oublié ? </a>
            </div>

            <?php require_once "partials/green-line.php"; ?>

            <div class="font-main flex -flex-col items-center">
                <p class="text-white font-main">Pas encore inscrit ? <a href="create-account.php" class="text-white font-main focus:scale-110 hover-green cursor-pointer">Créé ton compte</a></p>
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