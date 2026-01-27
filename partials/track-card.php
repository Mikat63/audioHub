<div tabindex="0" class="track flex flex-row items-center p-2 gap-6 w-full hover:scale-105 focus:scale-105  sm:w-[40%] lg:w-[30%]" data-id="<?= htmlspecialchars(strip_tags($idTrack)) ?>" data-cover="<?= htmlspecialchars(strip_tags($coverSrc)) ?>" data-album="<?= htmlspecialchars(strip_tags($album)) ?>" data-title="<?= htmlspecialchars(strip_tags($title)) ?>" data-artist="<?= htmlspecialchars(strip_tags($artist)) ?>" data-audiosrc="<?= htmlspecialchars(strip_tags($audioSrc)) ?>">

    <!-- cover tracks -->
    <div class="w-12 h-12 shrink-0">
        <img src="<?= htmlspecialchars(strip_tags($coverSrc)) ?>" alt="Pochette de l'album de <?= htmlspecialchars(strip_tags($album)) ?>" loading="lazy">
    </div>

    <!-- title and artist infos -->
    <div class="flex flex-col flex-1 min-w-0 gap-2 ">
        <p aria-label="Titre" class="font-main text-white flex "><?= htmlspecialchars(strip_tags($title)) ?></p>
        <p aria-label="Artiste" class="font-main text-white flex "><?= htmlspecialchars(strip_tags($artist)) ?></p>
    </div>

    <!-- add playlist icon -->
    <button tabindex="0" aria-label="Ajouter le morceau à la playlist" class="w-6 h-6 ml-auto  sm:ml-0" id="add-playlist-btn" type="button">
        <img class="w-full h-full flex items-center" src="assets/icons/import-icon.svg" alt="" title="ajouter à la playlist">
    </button>
</div>