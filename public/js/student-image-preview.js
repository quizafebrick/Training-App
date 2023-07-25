var imagePreview = function (event) {
    var image_output = document.getElementById("image_output");
    var default_image = image_output.dataset.defaultImage;

    if (event.target.files.length > 0) {
        // * A FILE IS SELECTED, SO DISPLAY THE SELECTED IMAGE * //
        image_output.src = URL.createObjectURL(event.target.files[0]);
    } else {
        // * NO FILE SELECTED, DISPLAY THE DEFAULT IMAGE * //
        image_output.src = default_image;
    }
};
