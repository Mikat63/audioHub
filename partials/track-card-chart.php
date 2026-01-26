<div tabindex="0" class="flex flex-row items-center gap-6 w-full sm:w-[80%] md:w-[70%] xl:w-[60%]">
    <!-- number position -->
    <p aria-label="Numéro <?= $numberPosition ?>" class="font-main green-text w-6 text-right shrink-0"><?= $numberPosition + 1  ?></p>

    <!-- cover tracks -->
    <div class="w-12 h-12 shrink-0">
        <img src="<?= $coverSrc ?>" alt="Pochette de l'album">
    </div>

    <!-- title and artist infos -->
    <div class="flex flex-col flex-1 min-w-0">
        <p aria-label="Titre" class="font-main text-white wrap-break-word leading-tight"><?= $title ?></p>
        <p aria-label="Artiste" class="font-main text-white truncate"><?= $artist ?></p>
    </div>

    <!-- add playlist icon -->
    <button tabindex="0" aria-label="Ajouter le morceau à la playlist" class="w-6 h-6 ml-auto shrink-0" id="btn-playlist-modal" type="button">
        <img class="w-full h-full" src="assets/icons/import-icon.svg" alt="" title="ajouter à la playlist">
    </button>
</div>