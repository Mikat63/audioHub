    <?php
    session_start();
    require_once "utils/is-connected.php";
    require_once "utils/db_connect.php";
    require_once "utils/bootstrap.php";

    require_once "partials/head.php";

    // query for show 10 best listened tracks
    $request = $db->prepare('SELECT
                                tracks.*,
                                artists.name,
                                albums.title AS title_album
                            FROM
                                tracks
                            JOIN artists on artists.id = tracks.artist_id
                            JOIN albums on albums.id = tracks.album_id
                            ORDER BY
                                listen_click DESC
                            LIMIT 
                                10');
    $request->execute();
    $tracksCharts = $request->fetchAll(PDO::FETCH_ASSOC);

    // query for show how tracks there are
    $request = $db->prepare('SELECT
                                COUNT(id) AS count
                            FROM
                                tracks');
    $request->execute();

    $numberTracks = $request->fetch(PDO::FETCH_ASSOC);

    // query for show how members there are
    $request = $db->prepare('SELECT
                              count(id) AS count
                            FROM
                                users
                            ');
    $request->execute();

    $numberMembers = $request->fetch(PDO::FETCH_ASSOC);
    ?>

    <script defer src="assets/script/main.js"></script>
    <script defer src="assets/script/player.js"></script>
    <title>AudioHub - Home</title>
    </head>

    <body class="bg-black h-svh max-h-svh flex flex-col">

        <?php
        require_once "partials/header.php"
        ?>


        <main id="main-container" class="w-full flex-1 flex flex-col items-center pb-25">
            <div class="w-[90%] flex flex-col  gap-4 p-2 sm:w-[70%] lg:w-[50%]">
                <section class="w-full h-auto linear-black-green p-4 flex flex-col gap-4 ">
                    <h2 class="font-title text-white">Bienvenue sur <span class="green-text">AudioHub</span></h2>
                    <p class="text-white font-main">Découvrez et écoutez vos artistes préférés en toute simplicité</p>
                    <?php
                    $btnId = "explorer-btn";
                    $hrefBtn = "explorer.php";
                    $textBtn = "Explorer";
                    $imgBtnSrc = "assets/icons/explorer-icon.svg";
                    $imgBtnSrcAlt = "icone du bouton explorer";
                    $ariaLabel = "Bouton pour aller à la bibliothèque de tracks";
                    $title = "Explorer";
                    require_once "partials/button-with-img";
                    ?>
                    </a>
                </section>

                <section class="flex flex-row justify-center gap-4">
                    <div class="footer-grey-bg green-border w-24 h-20 flex flex-col items-center justify-center gap-1 p-2 rounded-sm">
                        <p class="font-int-stats text-center" aria-live="polite"><?= $numberTracks['count'] ?></p>
                        <p class="font-main text-white text-center">Tracks</p>
                    </div>

                    <div class="footer-grey-bg green-border w-24 h-20 flex flex-col items-center justify-center gap-1 p-2 rounded-sm">
                        <p class="font-int-stats text-center" aria-live="polite"><?= $numberMembers['count'] ?></p>
                        <p class="font-main text-white text-center">Membres</p>
                    </div>
                </section>

                <section class="w-auto flex flex-col gap-4">
                    <h2 class="font-title text-white">Top 10 : </h2>

                    <div class="tracks-container w-full flex flex-col items-center justify-center gap-2 py-4">
                        <?php
                        foreach ($tracksCharts as $key => $tracksChart) {
                            $numberPosition = $key;
                            $idTrack = $tracksChart['id'];
                            $coverSrc = $tracksChart['img_path_small'];
                            $album = $tracksChart['title_album'];
                            $title = $tracksChart['title'];
                            $artist = $tracksChart['name'];
                            $audioSrc = $tracksChart['track_path'];
                            require "partials/track-card-chart.php";
                        };
                        ?>
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