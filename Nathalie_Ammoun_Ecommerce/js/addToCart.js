window.onload = function(){
var bag = document.getElementsByClassName("icon_bag_alt");
var inc=0;
var cart = document.getElementById("amount");
var cart2 = document.getElementById("amount2");

function addToCart(){
    inc +=1;
        cart.innerText= inc;
        cart2.innerText= inc;
}

for(let i=1; i<bag.length; i++){
    bag[i].addEventListener("click", addToCart);
}
}



