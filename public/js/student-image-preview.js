var imagePreview = function (event) {
    var image_output = document.getElementById("image_output");
    image_output.src = URL.createObjectURL(event.target.files[0]);
};
