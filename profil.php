    <?php
    session_start();
    require_once "utils/is-connected.php";
    require_once "utils/db_connect.php";
    require_once "utils/bootstrap.php";

    require_once "partials/head.php";


    function maskEmail($email)
    {
        $parts = explode('@', $email);
        if (count($parts) !== 2) {
            return $email;
        }

        $name = $parts[0];
        $domain = $parts[1];

        $first = substr($name, 0, 1);
        $stars = str_repeat('*', max(strlen($name) - 1, 0));

        return $first . $stars . '@' . $domain;
    }
    ?>

    <script defer src="assets/script/main.js"></script>
    <script defer src="assets/script/pagination-library.js"></script>
    <script defer src="assets/script/player.js"></script>
    <title>AudioHub - Profil</title>
    </head>

    <body class="bg-black h-svh max-h-svh flex flex-col">

        <?php
        require_once "partials/header.php"
        ?>


        <main id="main-container" class="w-full flex-1 flex flex-col items-center pb-25">
            <div class="w-[90%] flex flex-col items-center justify-center gap-8 py-12 md:w-[70%]">

                <div class="username-container w-auto h-auto flex flex-col gap-2 items-center ">
                    <div aria-label="photo de ton profil" class="w-25 h-25 green-color rounded-full font-main flex justify-center items-center font-main-profil"><?= strtoupper(mb_substr($_SESSION['user_username'], 0, 1)) ?></div>
                    <p class="font-main-profil-username  text-white"><?= $_SESSION['user_username'] ?></p>
                    <p tabindex="0" aria-label="Lien pour changer ta photo de profil" class="font-main text-white focus:scale-110 hover-green focus-green cursor-pointer">Change ta photo de profil</p>
                </div>

                <div class="w-full flex flex-col gap-4">
                    <section class="footer-grey-bg w-full h-auto flex flex-col gap-4 px-4 py-2 rounded-lg green-border">
                        <div class="flex flex-col gap-2">
                            <h2 class="font-title text-white">Tes infos</h2>
                            <p class="font-main text-white">Pseudo : . <?= $_SESSION['user_username'] ?> </p>
                            <p class="font-main text-white">Adresse email : . <?= maskEmail($_SESSION['email']) ?> </p>
                        </div>

                        <div id="filter-btn-container" class="flex justify-center">
                            <?php
                            $ariaLabel = "Bouton pour modifier tes infos personnelles";
                            $title = "Modifier";
                            $btnId = "modify-infos-user";
                            $textBtn = "Modifier";
                            require_once "partials/simple-btn.php";
                            ?>
                        </div>


                    </section>
                </div>



                </section>
            </div>
            <?php require_once "partials/sidebar.php"; ?>
        </main>

        <footer class="fixed bottom-0 w-full h-auto footer-grey-bg flex flex-col items-center">
            <?php
            require_once "partials/footer.php"; ?>
        </footer>
    </body>

    </html>