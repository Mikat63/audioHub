const tracksContainer = document.querySelector(".tracks-container");
const paginationLinks = document.querySelectorAll(".pagination-link");

function paginationTracks(paginationLink) {
  fetch("process/pagination.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({
      status: "next-page",
      page: parseInt(paginationLink.dataset.page),
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
  return `
    <div data-id="${idTrack}" 
     data-cover="${safeCover}" 
     data-album="${album}" 
     data-title="${title}" 
     data-artist="${artist}" 
     data-audiosrc="${audioSrc}" 
    tabindex="0" class="track flex flex-row items-center gap-6 w-full sm:w-1/2 md:w-1/3 xl:w-1/4 hover:scale-105 focus:scale-105">
      <!-- cover tracks -->
      <div class="w-12 h-12 shrink-0">
        <img src="${safeCover}" alt="Pochette de l'album de ${album}" loading="lazy">
      </div>
      <!-- title and artist infos -->
      <div class="flex flex-col flex-1 min-w-0 gap-1">
        <p aria-label="Titre" class="font-main text-white ">${title}</p>
        <p aria-label="Artiste" class="font-main text-white ">${artist}</p>
      </div>
      <!-- add playlist icon -->
      <button tabindex="0" aria-label="Ajouter le morceau à la playlist" class="w-6 h-6 ml-auto shrink-0 hover:scale-110 focus:scale-110" id="add-playlist-btn" type="button">
        <img class="w-full h-full" src="assets/icons/import-icon.svg" alt="" title="ajouter à la playlist">
      </button>
    </div>
    `;
}

function showTracks(response) {
  tracksContainer.innerHTML = "";
  // Réapplique les classes responsives du container (pour explorer.php)
  tracksContainer.className =
    "tracks-container w-full flex flex-row flex-wrap items-center justify-center gap-2 py-4";
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

paginationLinks.forEach((paginationLink) => {
  paginationLink.addEventListener("click", (event) => {
    event.preventDefault();
    paginationTracks(paginationLink);
  });
});
