
// Start now fullScreen javaScript
var elem = document.documentElement;

function openFullscreen() {
  if (elem.requestFullscreen) {
      elem.requestFullscreen();
  } else if (elem.webkitRequestFullscreen) {
      // / Safari /
      elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) {
      // / IE11 /
      elem.msRequestFullscreen();
  }
}

function closeFullscreen() {
  if (document.exitFullscreen) {
      document.exitFullscreen();
  } else if (document.webkitExitFullscreen) {
      // / Safari /
      document.webkitExitFullscreen();
  } else if (document.msExitFullscreen) {
      // / IE11 /
      document.msExitFullscreen();
  }
}

document.getElementById('fullScreen').onclick = function() {
  this.classList.toggle('fullScreen_active');
}

