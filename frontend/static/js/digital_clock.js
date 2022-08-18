
// js-project Digital Clock rightSide
function startTime() {
  const now = new Date();
  let h = now.getHours(); // 0 - 23
  let m = now.getMinutes(); // 0 - 59
  let s = now.getSeconds(); // 0 - 59
  let session = "am";

  if (h == 0) {
      h = 12;
  }

  if (h > 12) {
      h = h - 12;
      session = "pm";
  }
  m = (m < 10) ? "0" + m : m;

  const time = h + ":" + m + ":" + s + " " + session;
  document.querySelector('#clock').innerHTML = time;

  setTimeout(startTime, 500);

}
startTime();
