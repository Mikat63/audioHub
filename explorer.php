    <?php
    session_start();
    require_once "utils/is-connected.php";
    require_once "utils/db_connect.php";
    require_once "utils/bootstrap.php";

    require_once "partials/head.php";
    ?>

    <script defer src="assets/script/main.js"></script>
    <script defer src="assets/script/player.js"></script>
    <title>AudioHub - Rechercher</title>
    </head>

    <body class="bg-black h-svh max-h-svh flex flex-col">

        <?php
        require_once "partials/header.php"
        ?>


        <main id="main-container" class="w-full flex-1 flex flex-col items-center pb-25">
            <div class="w-[90%] flex flex-col items-center justify-center py-12 sm:w-[80%] xl:w-[60%]">
                <section class="w-full h-auto flex flex-col gap-8">
                    <h2 class="w-auto font-title text-white flex justify-center">trouve ton style en explorant la bibliothèque !</h2>

                    <div class="filter-btn-container">
                        <?php
                        $ariaLabel = "Bouton pour filtrer";
                        $title = "Filtrer";
                        $btnId = "filter-btn";
                        $textBtn = "Filtrer";
                        require_once "partials/filter-btn.php";
                        ?>
                    </div>

                    <div class="tracks-container w-full flex flex-col items-center justify-center gap-2 py-4">

                    </div>
                </section>
            </div>
            <?php require_once "partials/sidebar.php"; ?>
        </main>

        <footer class="fixed bottom-0 w-full h-auto footer-grey-bg flex flex-col items-center">
            <?php
            require_once "partials/media-player.php";
            require_once "partials/footer.php"; ?>
        </footer>
    </body>

    </html>