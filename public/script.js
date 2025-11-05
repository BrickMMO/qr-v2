function openModal(id) {
  let modal = document.getElementById(id);

  modal.style.display = "block";

  setTimeout(function () {
    modal.style.transition = "0.5s";
    modal.style.opacity = "1";
  }, 0);
}

function closeModal(id) {
  let modal = document.getElementById(id);

  modal.style.transition = "0.5s";
  modal.style.opacity = "0";

  setTimeout(function () {
    modal.style.display = "none";
  }, 500);
}


function copy(text) {
  const textarea = document.createElement("textarea");
  textarea.value = text;
  document.body.appendChild(textarea);
  textarea.select();
  document.execCommand("copy");
  document.body.removeChild(textarea);
  return false;
}