<div id="media-player" abindex="0" class="z-10 flex flex-row items-center gap-6 w-full bg-black px-2 py-4 hidden">

    <!-- cover tracks -->
    <div class="w-12 h-12 shrink-0">
        <img id="player-track-img" src="<?= $coverSrc ?>" alt="Pochette de l'album de <?= $album ?>">
    </div>

    <!-- title and artist infos -->
    <div class="flex flex-col flex-1 min-w-0">
        <p id="player-track-title" aria-label="Titre" class="font-main text-white wrap-break-word leading-tight"></p>
        <p id="player-track-artist" aria-label="Artiste" class="font-main text-white truncate"></p>
    </div>

    <div class="player-btn-container w-auto h-auto flex items-center gap-2">
        <div tabindex="0" id="prev-btn" class=" w-8 h-auto  cursor-pointer  focus:brightness-150 focus:green-color focus:scale-120">
            <img src="assets/icons/prev-button.svg" alt="Bouton play ou pause" class="w-full h-auto hover:brightness-150 hover-green-color hover:scale-120">
        </div>
        <div tabindex="0" id="play-pause-btn" class=" w-10 h-auto cursor-pointer focus:brightness-150 focus:green-color focus:scale-120">
            <img id="play-pause-img" src="assets/icons/pause-button.svg" alt="Bouton play ou pause" class="w-full h-auto hover:brightness-150 hover-green-color hover:scale-120">
        </div>
        <div tabindex="0" id="next-btn" class=" w-8 h-auto  cursor-pointer focus:brightness-150 focus:green-color focus:scale-120">
            <img src="assets/icons/next-button.svg" alt="Bouton play ou pause" class="w-full h-auto hover:brightness-150 hover-green-color hover:scale-120">
        </div>
    </div>

    <audio id="player-track-audio" src=""></audio>
</div>