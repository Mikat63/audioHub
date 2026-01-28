    <?php
    session_start();
    require_once "utils/is-connected.php";
    require_once "utils/db_connect.php";
    require_once "utils/bootstrap.php";

    require_once "partials/head.php";

    // query for show all tracks with an offset with 50 tracks by page
    $trackByPage = 50;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;

    if ($page < 1) {
        $page = 1;
    }

    $offset = ($page - 1) * $trackByPage;

    $request = $db->prepare('SELECT
                                tracks.*,
                                artists.name,
                                albums.title AS title_album
                            FROM
                                tracks
                            LEFT JOIN artists ON artists.id = tracks.artist_id
                            LEFT JOIN albums ON albums.id = tracks.album_id
                            ORDER BY
                                tracks.title ASC
                            LIMIT
                                :byPage
                            OFFSET
                                :offset
                            ');

    $request->bindValue('byPage', $trackByPage, PDO::PARAM_INT);
    $request->bindValue('offset', $offset, PDO::PARAM_INT);
    $request->execute();
    $tracks = $request->fetchAll(PDO::FETCH_ASSOC);

    // query for count how page need
    $totalTracks = $db->prepare('SELECT 
                                          count(*)
                                      FROM
                                          tracks');

    $totalTracks->execute();
    $total = $totalTracks->fetchColumn();

    $numberOfPages = ceil($total / $trackByPage);

    ?>

    <script defer src="assets/script/main.js"></script>
    <script defer src="assets/script/pagination.js"></script>
    <script defer src="assets/script/player.js"></script>
    <title>AudioHub - Bibliothèque</title>
    </head>

    <body class="bg-black h-svh max-h-svh flex flex-col">

        <?php
        require_once "partials/header.php"
        ?>


        <main id="main-container" class="w-full flex-1 flex flex-col items-center pb-25">
            <div class="w-[90%] flex flex-col items-center justify-center py-12">
                <section class="w-full h-auto flex flex-col gap-8">
                    <h2 class="w-auto font-title text-white flex justify-center">trouve ton style en explorant la bibliothèque !</h2>

                    <div class="filter-btn-container">
                        <?php
                        $ariaLabel = "Bouton pour filtrer";
                        $title = "Filtrer";
                        $btnId = "filter-btn";
                        $textBtn = "Filtrer";
                        require_once "partials/simple-btn.php";
                        ?>
                    </div>

                    <div class="tracks-container w-full flex flex-col items-center justify-center gap-2 py-4 sm:flex-row sm:flex-wrap">
                        <?php
                        foreach ($tracks as $track) {
                            $idTrack = $track['id'];
                            $coverSrc = $track['img_path_small'] ?? '';
                            if (!$coverSrc) $coverSrc = 'assets/icons/default-album.svg';
                            $album = $track['title_album'];
                            $title = $track['title'];
                            $artist = $track['name'];
                            $audioSrc = $track['track_path'];
                            require "partials/track-card.php";
                        } ?>
                    </div>

                    <div class="Pagination-container flex justify-center gap-2">
                        <?php for ($i = 1; $i <= $numberOfPages; $i++) {
                        ?>
                            <a aria-label="Aller à la page <?= $i ?>" data-page="<?= $i ?>" class="pagination-link font-main text-white focus-green hover-green focus:scale-150 hover:scale-150" href=""><?= $i ?></a>
                        <?php
                        }
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