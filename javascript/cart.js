function add_to_cart(id, size) {

    switch (size){
        case "Small": size = 1; break;
        case "Medium": size = 2; break;
        case "Large": size = 3; break;
    }

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            update_cart_items();
        }
    };

    xmlhttp.open("GET", "php/add_to_cart.php?id=" + id + "&size=" + size, true);
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