<?php require_once "partials/head.php"; ?>

<script defer src="assets/script/loader.js"></script>
<title>AudioHub - Accueil</title>
</head>


<body class="bg-black min-h-svh flex flex-col">
    <main class="w-full h-svh max-h-svh flex flex-col items-center justify-center">
        <h1 class="sr-only">Bienvenue sur Audiohub, vous allez être redirigé vers la page de connexion</h1>
        <div class="w-[80%] flex flex-col items-center justify-center gap-8">
            <img class="w-full flex flex-row items-center justify-center audiohub-logo-anim" src="assets/img/audioHub_logo.webp" alt="audioHub logo">
            <div class="loaderf-vinyl mt-4" style="border-color:#1db954; box-shadow:0 0 24px 0 #1db95480, 0 0 0 8px #191414;">
                <div class="loaderf-vinyl-groove groove1" style="border-color:#1db95480;"></div>
                <div class="loaderf-vinyl-groove groove2" style="border-color:#1db95440;"></div>
                <div class="loaderf-vinyl-groove groove3" style="border-color:#1db95420;"></div>
                <div class="loaderf-vinyl-center" style="box-shadow:0 0 0 4px #1db954;"></div>
            </div>
        </div>
    </main>
    <?php require_once "partials/footer.php"; ?>
</body>

</html>