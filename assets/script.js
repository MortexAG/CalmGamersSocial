function popup() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
  setTimeout(() => {  popup.classList.remove("show");popup.classList.add("hide"); }, 5000);
}

function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}