let imageInput = document.getElementById("image-input");
let imageContainer = document.getElementById("images");
let numberofImage = document.getElementById("number-of-image");

function preview() {
    imageContainer.innerHTML = "";
    numberofImage.textContent = `${imageInput.files.length} Image Selected`;

    for (i of imageInput.files) {
        let reader = new FileReader();
        let figure = document.createElement("figure");
        let figureCaption = document.createElement("figcaption");

        figureCaption.innerText = i.name;
        figure.appendChild(figureCaption);
        reader.onload = () => {
            let img = document.createElement("img");
            img.setAttribute("src", reader.result);
            figure.insertBefore(img, figureCaption);
        };

        imageContainer.appendChild(figure);
        reader.readAsDataURL(i);
    }
}
