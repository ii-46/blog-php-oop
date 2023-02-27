function disableSubmit() {
  document.getElementById("submit").disabled = true;
}

function activateButton(element) {
  if (element.checked) {
    document.getElementById("submit").disabled = false;
  } else {
    document.getElementById("submit").disabled = true;
  }
}
(function menuToggle() {
  const openBtn = document.getElementById("openIcon");
  const closeBtn = document.getElementById("closeIcon");

  openBtn.addEventListener("click", () => {
    openBtn.classList.add("display-none");
    closeBtn.classList.remove("display-none");
    document.querySelector(".searchbar").style.left = "0";
    document.querySelector(".signup").style.left = "0";
  });
  closeBtn.addEventListener("click", () => {
    closeBtn.classList.add("display-none");
    openBtn.classList.remove("display-none");
    document.querySelector(".searchbar").style.left = "-100%";
    document.querySelector(".signup").style.left = "-100%";
  });
})();
