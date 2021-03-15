/*More Description*/
function readDescription(){
    var x=document.getElementById("moreinfo");

    if(x.style.display ==="none"){
        x.style.display="block";
    }
    else{
        x.style.display="none";
    }
}

/*Add to cart function */
//Just outputting an alert to test the button
//We use php to add the rest of functionality

function addItem(){
    alert("Item added to the cart.");
}

/*Price according to Quantity*/
function modPrice(){
    var price = document.getElementById("fixedP").innerHTML;
    var quantity = document.getElementById("quantity").value;
    var t=total.toFixed(2);
    console.log(quantity);

   document.getElementById("price").innerHTML = t;
}




