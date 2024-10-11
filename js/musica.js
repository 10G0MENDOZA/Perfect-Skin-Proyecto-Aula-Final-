const playPauseBtn = document.getElementById('playPauseBtn');
const backgroundMusic = document.getElementById('backgroundMusic');
const icon = document.getElementById('icon');

playPauseBtn.addEventListener('click', function() {
  if (backgroundMusic.paused) {
    backgroundMusic.play();
    icon.innerHTML = '&#10074;&#10074;';
  } else {
    backgroundMusic.pause();
    icon.innerHTML = '&#9654;';
  }
});