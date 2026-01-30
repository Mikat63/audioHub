document.addEventListener("DOMContentLoaded", () => {
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

  // show track informations and play automatically
  function showPlayerInfos(track) {
    console.log(track.dataset.cover);
    console.log(playerTrackImg);

    const allTracks = document.querySelectorAll(".track");
    const trackId = track.dataset.id;
    allTracks.forEach((t, index) => {
      if (trackId === t.dataset.id) {
        trackIndex = index;
      }
    });
    playerTrackImg.src = track.dataset.cover;
    console.log(playerTrackImg);

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
      const allTracks = document.querySelectorAll(".track");
      trackIndex -= 1;
      if (trackIndex < 0) {
        trackIndex = allTracks.length - 1;
        showPlayerInfos(allTracks[trackIndex]);
      } else {
        showPlayerInfos(allTracks[trackIndex]);
      }
    });
  }

  // function to past to the next track
  function nextTrack() {
    nextBtn.addEventListener("click", () => {
      const allTracks = document.querySelectorAll(".track");
      trackIndex += 1;
      if (trackIndex > allTracks.length - 1) {
        trackIndex = 0;
        showPlayerInfos(allTracks[trackIndex]);
      } else {
        showPlayerInfos(allTracks[trackIndex]);
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
      .catch((error) => {
        console.log(error);
      });
  }

  playPause();
  prevTrack();
  nextTrack();

  const tracksContainer = document.querySelector(".tracks-container");
  if (tracksContainer) {
    console.log(playerTrackImg);

    tracksContainer.addEventListener("click", (event) => {
      const track = event.target.closest(".track");
      if (track) {
        mediaPLayer.classList.remove("hidden");
        mainContainer.classList.remove("pb-25");
        mainContainer.classList.add("pb-40");
        showPlayerInfos(track);
        counterClick(track);
      }
    });
  }

  playerTrackAudio.addEventListener("ended", () => {
    const allTracks = document.querySelectorAll(".track");
    trackIndex += 1;
    if (trackIndex > allTracks.length - 1) {
      trackIndex = 0;
    }
    showPlayerInfos(allTracks[trackIndex]);
    counterClick(allTracks[trackIndex]);
  });
});
