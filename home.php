    <?php
    session_start();
    require_once "utils/is-connected.php";
    require_once "utils/db_connect.php";
    require_once "utils/bootstrap.php";

    require_once "partials/head.php";
    ?>

    <title>AudioHub - Home</title>
    </head>

    <body class="bg-black h-svh max-h-svh flex flex-col">

        <?php
        require_once "partials/header.php"
        ?>


        <main class="w-full flex-1 flex flex-col items-center justify-center">
            <div class="w-full flex flex-col items-center justify-center gap-4 px-2 sm:w-[70%] lg:w-[50%]">

            </div>
        </main>

        <footer class="w-full h-auto footer-grey-bg flex flex-row p-4 justify-between items-center green-color-border-top">
            <a aria-label="Revenir à l'accueil" href="home.php">
                <div class="flex flex-col items-center">
                    <img class="w-6 h-auto" src="assets/icons/home-icon.png" alt="Aller à l'accueil">

                </div>
            </a>

            <a aria-label="Chercher une track" href="home.php">
                <div class="flex flex-col items-center">
                    <img class="w-6 h-auto" src="assets/icons/search-icon.png" alt="Chercher une track">

                </div>
            </a>

            <a aria-label="Importer une track" href="home.php">
                <div class="flex flex-col items-center">
                    <img class="w-8 h-auto" src="assets/icons/import-icon.png" alt="Importer une track">

                </div>
            </a>

            <a aria-label="Consulter ta librairie" href="home.php">
                <div class="flex flex-col items-center">
                    <img class="w-6 h-auto" src="assets/icons/library-icon.png" alt="Consulter ta librairie">
                </div>
            </a>

            <a aria-label="Aller au paramètres" href="home.php">
                <div class="flex flex-col items-center">
                    <img class="w-6 h-auto" src="assets/icons/settings-icon.png" alt="Aller au paramètres">

                </div>
            </a>
        </footer>
    </body>

    </html>