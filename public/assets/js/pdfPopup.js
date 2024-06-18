function openPdfPopup(pdfUrl) {
  var popupOverlay = document.getElementById("popupOverlay");
  var pdfEmbed = document.getElementById("pdfEmbed");
  pdfEmbed.src = pdfUrl; // Set PDF source
  popupOverlay.style.display = "block";
  // Add event listener to close popup when clicking outside of content
  popupOverlay.addEventListener("click", closeIfOutside);
}

function closePdfPopup() {
  var popupOverlay = document.getElementById("popupOverlay");
  popupOverlay.style.display = "none";
  // Remove event listener when popup is closed
  popupOverlay.removeEventListener("click", closeIfOutside);
}

function closeIfOutside(event) {
  var popupContent = document.querySelector(".popup-content");
  // Check if click target is not inside popup content
  if (!popupContent.contains(event.target)) {
    closePdfPopup();
  }
}
