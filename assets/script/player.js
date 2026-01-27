const tracks = document.querySelectorAll(".track");
const mainContainer = document.querySelector("#main-container");
let trackIndex = 0;

// Player variable :
const mediaPLayer = document.querySelector("#media-player");
const playerTrackImg = document.querySelector("#player-track-img");
const playerTrackTitle = document.querySelector("#player-track-title");
const playerTrackArtist = document.querySelector("#player-track-artist");
const playerTrackAudio = document.querySelector("#player-track-audio");
const prevBtn = document.querySelector("#prev-btn");
const playPauseBtn = document.querySelector("#play-pause-btn");
const playPauseImg = document.querySelector("#play-pause-img");
const nextBtn = document.querySelector("#next-btn");

// show track informations and play automaticly
function showPlayerInfos(track) {
  const trackId = track.dataset.id;

  tracks.forEach((track, index) => {
    if (trackId === track.dataset.id) {
      trackIndex = index;
    }
  });

  playerTrackImg.src = track.dataset.cover;
  playerTrackTitle.textContent = track.dataset.title;
  playerTrackArtist.textContent = track.dataset.artist;
  playerTrackAudio.src = track.dataset.audiosrc;

  playerTrackAudio.play();
}

// function for play and pause btn
function playPause() {
  playPauseBtn.addEventListener("click", () => {
    if (playerTrackAudio.paused === true) {
      playerTrackAudio.play();
      playPauseImg.src = "assets/icons/pause-button.svg";
    } else {
      playerTrackAudio.pause();
      playPauseImg.src = "assets/icons/play-button.svg";
    }
  });
}

// function to past to the previous track
function prevTrack() {
  prevBtn.addEventListener("click", () => {
    trackIndex -= 1;
    if (trackIndex < 0) {
      trackIndex = tracks.length - 1;
      showPlayerInfos(tracks[trackIndex]);
    }
    showPlayerInfos(tracks[trackIndex]);
  });
}

// function to past to the next track
function nextTrack() {
  nextBtn.addEventListener("click", () => {
    trackIndex += 1;
    if (trackIndex > tracks.length - 1) {
      trackIndex = 0;
      showPlayerInfos(tracks[trackIndex]);
    } else {
      showPlayerInfos(tracks[trackIndex]);
    }
  });
}

// function for count the numbers of click by track
function counterClick(track) {
  fetch("process/counter-click.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({
      trackId: track.dataset.id,
      counterValue: parseInt(1),
    }),
  })
  .then((response) => response.json())
  .then((data) => console.log("Retour PHP:", data))
  .catch((error) => {console.log(error)})
}

playPause();
prevTrack();
nextTrack();

tracks.forEach((track) => {
  track.addEventListener("click", () => {
    mediaPLayer.classList.remove("hidden");
    mainContainer.classList.remove("pb-25");
    mainContainer.classList.add("pb-40");
    showPlayerInfos(track);
    counterClick(track);
  });
});
