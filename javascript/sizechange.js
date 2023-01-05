function changeSize(size){
    img = document.getElementById("jigsaw-image");
    img.src = "img/jigsaw-" + size + ".svg";

    document.getElementById("sizeSpan").innerHTML = size;

    price = document.getElementById("price");

    switch(size){
        case "Small":
            price.innerHTML = "19,99€";
            break;
        case "Medium":
            price.innerHTML = "29,99€";
            break;
        case "Large":
            price.innerHTML = "39,99€"
    }
}