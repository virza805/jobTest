// Start Sidebar On Off javaScript
function backendSidebarOnOffFunction() {
  var sampleElem = document.getElementById("backendWrapper");
  if (sampleElem.className === "left_sidebar_show") {
      sampleElem.className = "left_sidebar_hide";
  } else {
      sampleElem.className = "left_sidebar_show";
  }
}
