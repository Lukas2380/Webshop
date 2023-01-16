function add_to_cart(id, size) {
    switch (size){
        case "Small": size = 1; break;
        case "Medium": size = 2; break;
        case "Large": size = 3; break;
        case "small": size = 1; break;
        case "medium": size = 2; break;
        case "large": size = 3; break;
    }

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            update_cart_items();
            displayCart();
            displayOrderItems();
        }
    };

    xmlhttp.open("GET", "php/add_to_cart.php?id=" + id + "&size=" + size, true);
    xmlhttp.send();
}

function remove_from_cart(id, size) {
    switch (size){
        case "Small": size = 1; break;
        case "Medium": size = 2; break;
        case "Large": size = 3; break;
        case "small": size = 1; break;
        case "medium": size = 2; break;
        case "large": size = 3; break;
    }

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            update_cart_items();
            displayCart();
            displayOrderItems();
        }
    };

    xmlhttp.open("GET", "php/remove_from_cart.php?id=" + id + "&size=" + size, true);
    xmlhttp.send();
}

function update_cart_items(){
    var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.open("GET", "php/update_cart_items.php", true);
    xmlhttp.send();
    
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("cart-count").innerHTML = this.responseText;
            if(this.responseText != ""){
                if(!document.getElementById("cart-count").classList.contains("cart-count")){
                    document.getElementById("cart-count").classList.add("cart-count");
                }
            }
            else{
                if(document.getElementById("cart-count").classList.contains("cart-count")){
                    document.getElementById("cart-count").classList.remove("cart-count");
                }
            }
        }
    };
}

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

function loadProducts(q){
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("row").innerHTML = "";
            document.getElementById("row").innerHTML = this.responseText;
        }
    };

    xmlhttp.open("GET", "php/loadProducts.php?q=" + q, true);
    xmlhttp.send();
}

function displayCart(){
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("cartItems").innerHTML = "";
            document.getElementById("cartItems").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "php/displayCart.php", true);
    xmlhttp.send();
}

function checkSubmit(){
    alert (getElementById('totalprice').value);
    alert ("hi");
    if(getElementById('totalprice').value == ''){

    }
}

function deleteCartItems(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "php/deleteCartItems.php", true);
    xmlhttp.send();
}

function addComment(product_id, user_id){
    var xmlhttp = new XMLHttpRequest();
    
    comment = document.getElementById('comment').value;
    document.getElementById('comment').value = "";

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            displayComments(product_id);
        }
    };

    xmlhttp.open("GET", "php/addComment.php?c=" + comment + "&p=" + product_id + "&u=" + user_id, true);
    xmlhttp.send();
}

function displayComments(product_id, sort){
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("comments").innerHTML = "";
            document.getElementById("comments").innerHTML = this.responseText;
        }
    };

    xmlhttp.open("GET", "php/displayComments.php?p=" + product_id + "&sortBy=" + sort, true);
    xmlhttp.send();
}

function adminLoadCategories(){
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("categories").innerHTML = "";
            document.getElementById("categories").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "php/adminLoadCategories.php", true);
    xmlhttp.send();
}

function adminLoadProducts(){
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("products").innerHTML = "";
            document.getElementById("products").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "php/adminLoadProducts.php", true);
    xmlhttp.send();
}

function displayOrderItems(){
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("orderItems").innerHTML = "";
            document.getElementById("orderItems").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "displayOrderItems.php", true);
    xmlhttp.send();
}

function rateComment(prodid, id, rating){
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("rating").innerHTML = "";
            document.getElementById("rating").innerHTML = this.responseText;
            displayComments(prodid);
        }
    };
    xmlhttp.open("GET", "php/rateComment.php?c=" + id + "&r=" + rating, true);
    alert("php/rateComment.php?c=" + id + "&r=" + rating);
    xmlhttp.send();
}