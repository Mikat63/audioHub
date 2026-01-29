    <?php
    session_start();
    require_once "utils/is-connected.php";
    require_once "utils/db_connect.php";
    require_once "utils/bootstrap.php";

    require_once "partials/head.php";
    ?>


    <script defer src="assets/script/main.js"></script>
    <script defer src="assets/script/pagination-library.js"></script>
    <title>AudioHub - Import track</title>
    </head>

    <body class="bg-black h-svh max-h-svh flex flex-col">

        <?php
        require_once "partials/header.php"
        ?>


        <main id="main-container" class="w-full flex-1 flex flex-col items-center pb-9">
            <div class="w-[90%] flex flex-col items-center justify-center gap-8 py-12 md:w-[80%] lg:w-[60%]">

                <div class="flex flex-col items-center justify-center gap-2">
                    <h2 class="font-title text-white">Importe tes Tracks</h2>
                    <p class="font-main text-white">Partage votre musique avec la communauté AudioHub</p>
                </div>

                <form id="import-form" action="" class="flex flex-col items-center justify-center gap-4 footer-grey-bg green-border rounded-lg w-full h-auto p-4">
                    <!-- music upload  -->

                    <div class="w-full flex flex-col items-center justify-center gap-4 sm:flex-row">
                        <label class="w-auto h-auto font-main text-white flex flex-col items-center justify-center gap-4" for="input-music" enctype="multipart/form-data">
                            <div class="w-full h-auto flex flex-row justify-center gap-2">
                                <div class="w-6 h-6">
                                    <img src="assets/icons/music-note-icon.svg" alt="note de musique" class="w-full h(full">
                                </div>
                                Fichier Audio <span class="red-color">*</span>
                            </div>

                            <div class="flex flex-col items-center justify-center gap-2 p-4 rounded-lg green-border cursor-pointer">
                                <div class="w-5 h-5">
                                    <img src="assets/icons/import-white-icon.svg" alt="icone d'image w-full h-full">
                                </div>
                                <p class="font-main text-white">imprte un fichier audio</p>
                                <p class="font-main-small text-white text-center opacity-50">mp3,flac,wav (max 50MB)</p>
                                <input id="input-music" name="input-music" type="file" class="hidden" required>
                            </div>
                        </label>
                        <p id="music-error" class='red-color font-main'></p>


                        <!-- image upload -->
                        <label class=" w-auto font-main text-white flex flex-col items-center justify-center gap-4" for="input-image" enctype="multipart/form-data">
                            <div class="w-full h-auto flex flex-row justify-center gap-2">
                                <div class="w-6 h-6">
                                    <img src="assets/icons/image-icon.svg" alt="icone d'image" class="w-full h-full">
                                </div>
                                Fichier Audio <span class="red-color">*</span>
                            </div>

                            <div class="flex flex-col items-center justify-center gap-2 p-4 rounded-lg green-border cursor-pointer">
                                <div class="w-5 h-5">
                                    <img src="assets/icons/import-white-icon.svg" alt="icone d'image">
                                </div>
                                <p class="font-main text-white">imprte une cover/p>
                                <p class="font-main-small text-white text-center opacity-50">jpeg,png,webp (recommandé 600x600)</p>
                                <input id="input-image" name="input-image" type="file" class="hidden" required>
                            </div>
                        </label>
                        <p id="img-error" class='red-color font-main'></p>
                    </div>

                    <div class="flex flex-col gap-4 items-center justify-center">
                        <div class="flex flex-col gap-4 sm:flex-row">
                            <div class="font-main flex flex-col sm:flex-row sm:justify-between gap-2 lg:[50%]">
                                <label class=" text-white text-[16px]" for="title">Titre <span class="red-color">*</span></label>
                                <input class="font-main text-white footer-grey-bg green-border focus:scale-110 rounded-lg px-2" type="text" id="title" name="title" minlength="1" maxlength="50" placeholder="Entre le titre" required autocomplete="title">
                            </div>
                            <p id="title-error" class='red-color font-main'></p>


                            <div class="font-main flex flex-col sm:flex-row sm:justify-between gap-2 lg:[50%]">
                                <label class=" text-white text-[16px]" for="artist">Artiste <span class="red-color">*</span></label>
                                <input class="font-main text-white footer-grey-bg green-border focus:scale-110 rounded-lg px-2" type="text" id="artist" name="artist" minlength="2" maxlength="50" placeholder="Entre l'artiste" required autocomplete="artist">
                            </div>
                            <p id="artist-error" class='red-color font-main'></p>
                        </div>

                        <div class="flex flex-col gap-4 sm:flex-row">
                            <div class="font-main flex flex-col sm:flex-row sm:justify-between gap-2 lg:[50%]">
                                <label class=" text-white text-[16px]" for="album">Album</label>
                                <input class="font-main text-white footer-grey-bg green-border focus:scale-110 rounded-lg px-2" type="text" id="album" name="album" minlength="2" maxlength="50" placeholder="Entre l'album" autocomplete="album">
                            </div>
                            <p id="album-error" class='red-color font-main'></p>

                            <div class="font-main flex flex-col sm:flex-row sm:justify-between gap-2 lg:[50%]">
                                <label class=" text-white text-[16px]" for="genre">Genre <span class="red-color">*</span> </label>
                                <input class="font-main text-white footer-grey-bg green-border focus:scale-110 rounded-lg px-2" type="text" id="genre" name="genre" minlength="2" maxlength="50" placeholder="Entre le genre" required autocomplete="genre">
                            </div>
                            <p id="genre-error" class='red-color font-main'></p>
                        </div>
                    </div>
                    <?php
                    $title = "Importer";
                    $btnId = "import-submit-btn";
                    $imgSrc = "assets/icons/import-black-icon.svg";
                    $imgAlt = "icone d'import";
                    $textBtn = "Importer";
                    require_once "partials/submit-btn-with-img.php";                        ?>

                </form>
            </div>

            <?php require_once "partials/sidebar.php"; ?>
        </main>

        <footer class="fixed bottom-0 w-full h-auto footer-grey-bg flex flex-col items-center">
            <?php
            require_once "partials/footer.php"; ?>
        </footer>
    </body>

    </html>