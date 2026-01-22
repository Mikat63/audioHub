    <?php
    session_start();
    require_once "utils/is-connected.php";
    require_once "utils/db_connect.php";
    require_once "utils/bootstrap.php";

    require_once "partials/head.php";
    ?>
    <script defer src="assets/script/main.js"></script>
    <title>AudioHub - Home</title>
    </head>

    <body class="bg-black h-svh max-h-svh flex flex-col">

        <?php
        require_once "partials/header.php"
        ?>


        <main class="w-full flex-1 flex flex-col items-center justify-center">
            <div class="w-full flex flex-col items-center justify-center gap-4 px-2 sm:w-[70%] lg:w-[50%]">

            </div>

            <div id="sidebar" class="z-20 fixed top-0 left-0 w-50 h-full footer-grey-bg flex flex-col p-4 -translate-x-full transition-transform duration-300 justify-between">
                <nav class="w-full h-auto flex flex-col gap-4">
                    <a aria-label="Revenir à l'accueil" href="home.php" class="focus:scale-120 focus-green">
                        <div class="flex flex-row gap-4 items-center">
                            <img class="w-8 h-auto" src="assets/icons/home-icon.png" alt="Aller à l'accueil">
                            <p class="font-main text-white focus-green-child hover-green hover:scale-110">Accueil</p>
                        </div>
                    </a>

                    <a aria-label="Chercher une track" href="search.php">
                        <div class="flex flex-row gap-4 items-center">
                            <img class="w-8 h-auto" src="assets/icons/search-icon.png" alt="Chercher une track">
                            <p class="font-main text-white focus-green-child hover-green">Rechercher</p>
                        </div>
                    </a>

                    <a aria-label="Importer une track" href="import-track.php">
                        <div class="flex flex-row gap-4 items-center">
                            <img class="w-8 h-auto" src="assets/icons/import-icon.png" alt="Importer une track">
                            <p class="font-main text-white focus-green-child hover-green">Importer</p>
                        </div>
                    </a>


                    <a aria-label="Consulter ta librairie" href="library.php">
                        <div class="flex flex-row gap-4 items-center">
                            <img class="w-8 h-auto" src="assets/icons/library-icon.png" alt="Consulter ta librairie">
                            <p class="font-main text-white focus-green-child hover-green">bibliothèque</p>
                        </div>
                    </a>


                    <a aria-label="Aller au paramètres" href="settings.php">
                        <div class="flex flex-row gap-4 items-center">
                            <img class="w-8 h-auto" src="assets/icons/settings-icon.png" alt="Aller au paramètres">
                            <p class="font-main text-white focus-green-child hover-green">Paramètres</p>
                        </div>
                    </a>
                </nav>

                <div class="w-full h-auto flex flex-row justify-center gap-2">
                    <div title="Aller sur Facebook" class="w-6 h-6">
                        <a class="block w-full h-full hover:scale-125 focus:scale-125 transition-transform cursor-pointer " target="_blank" href="https://www.facebook.com/?locale=fr_FR">
                            <img class=" w-full h-full flex flex-col items-center " src="assets/icons/facebook.png" alt="Aller vers Instagram">
                        </a>
                    </div>

                    <div title="Aller sur Instagram" class="w-6 h-6">
                        <a class="block w-full h-full hover:scale-125 focus:scale-125 transition-transform cursor-pointer" target="_blank" href="https://www.instagram.com/">
                            <img class="w-full h-full flex flex-col items-center" src="assets/icons/instagram.png" alt="Aller vers facebook">
                        </a>
                    </div>
                </div>
        </main>

        <?php
        require_once "partials/footer.php"; ?>
    </body>

    </html>