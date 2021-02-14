const dropContainer = document.getElementById("dropContainer");
const fileInput = document.getElementById("imagesInput");

dropContainer.ondragover = dropContainer.ondragenter = function(evt) {
    evt.preventDefault();
};

dropContainer.ondrop = function(evt) {
    evt.preventDefault();
    fileInput.files = evt.dataTransfer.files;

    console.log(fileInput.files);
};