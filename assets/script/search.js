const inputFormSearch = document.querySelector("#input-form-search");
const tracksContainer = document.querySelector(".tracks-container");
let debounceTimer;

// fetch for each keyup listener
function searchByKeyUp(keyValue) {
  console.log(keyValue);
  fetch("./process/search-track-artist.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({
      status: "keyup touch",
      value: keyValue,
    }),
  })
    .then((response) => response.json())
    .then(showTracks)
    .catch((error) => {
      console.log(error);
    });
}

// track card for each track
function trackCard(idTrack, coverSrc, album, title, artist, audioSrc) {
  const safeCover =
    coverSrc && coverSrc !== "null" && coverSrc !== ""
      ? coverSrc
      : "assets/icons/default-album.svg";
  const safeTitle = title ?? "";
  const safeArtist = artist ?? "";
  return `
      <div data-id="${idTrack}" 
       data-cover="${safeCover}" 
       data-album="${album}" 
       data-title="${safeTitle}" 
       data-artist="${safeArtist}" 
       data-audiosrc="${audioSrc}" 
       tabindex="0" class="track flex flex-row items-center gap-6 w-full sm:w-[80%] md:w-[70%] xl:w-[60%] hover:scale-105 focus:scale-105">
        <!-- cover tracks -->
        <div class="w-12 h-12 shrink-0">
          <img src="${safeCover}" alt="Pochette de l'album de ${album}" loading="lazy">
        </div>
        <!-- title and artist infos -->
        <div class="flex flex-col flex-1 min-w-0">
          <p aria-label="Titre" class="font-main text-white ">${safeTitle}</p>
          <p aria-label="Artiste" class="font-main text-white ">${safeArtist}</p>
        </div>
        <!-- add playlist icon -->
        <button tabindex="0" aria-label="Ajouter le morceau à la playlist" class="w-6 h-6 ml-auto shrink-0 hover:scale-110 focus:scale-110" id="add-playlist-btn" type="button">
          <img class="w-full h-full" src="assets/icons/import-icon.svg" alt="" title="ajouter à la playlist">
        </button>
      </div>
      `;
}

// show each track result
function showTracks(response) {
  tracksContainer.innerHTML = "";

  if (!response.tracks || response.tracks.length === 0) {
    tracksContainer.innerHTML =
      "<p class='text-white'>Aucun résultat trouvé</p>";
    return;
  }

  response.tracks.forEach((track) => {
    tracksContainer.innerHTML += trackCard(
      track.idTrack,
      track.coverSrc,
      track.album,
      track.title,
      track.artist,
      track.audioSrc,
    );
  });
}

inputFormSearch.addEventListener("keyup", () => {
  clearTimeout(debounceTimer);

  debounceTimer = setTimeout(() => {
    if (inputFormSearch.value.trim() === "") {
      tracksContainer.innerHTML = "";
      return;
    }

    searchByKeyUp(inputFormSearch.value);
  }, 200);
});
