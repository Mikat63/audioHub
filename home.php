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


        <main class="w-full flex-1 flex flex-col items-center">
            <div class="w-[80%] flex flex-col  gap-4 p-2 sm:w-[70%] lg:w-[50%]">
                <section class="w-full h-auto linear-black-green p-4 flex flex-col gap-4 ">
                    <h2 class="font-title text-white">Bienvenue sur <span class="green-text">AudioHub</span></h2>
                    <p class="text-white font-main">Découvrez et écoutez vos artistes préférés en toute simplicité</p>
                    <?php
                    $btnId = "explorer-btn";
                    $hrefBtn = "explorer.php";
                    $textBtn = "Explorer";
                    require_once "partials/button-with-img";
                    ?>
                    </a>
                </section>

                <section class="flex flex-row justify-center gap-4">
                    <div class="footer-grey-bg green-border w-auto h-auto flax-flex-col gap-4 p-2 rounded-sm">
                        <p class="font-int-stats"></p>
                        <p class="font-main text-white">Tracks</p>
                    </div>

                    <div class="footer-grey-bg green-border w-auto h-auto flax-flex-col gap-4 p-2 rounded-sm">
                        <p class="font-int-stats"></p>
                        <p class="font-main text-white">Membres</p>
                    </div>
                </section>

                <section class="flex flex-col flex-start">
                    <h2 class="font-title text-white">Top 10 : </h2>
                    <div class="tracks-container w-full h-auto flex flex-col">

                    </div>
                </section>

            </div>

            <?php require_once "partials/sidebar.php"; ?>
        </main>

        <?php
        require_once "partials/footer.php"; ?>
    </body>

    </html>