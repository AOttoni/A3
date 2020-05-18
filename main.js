/* --------------------------------------------------
 *               CHANGING NAV HEADER
 *--------------------------------------------------*/
function updateH(x) {
    if(x==0)
        document.getElementById("subtitle").innerHTML = "About Us";
    if(x==1)
        document.getElementById("subtitle").innerHTML = "Go to our Catalogue";
    if(x==2)
        document.getElementById("subtitle").innerHTML = "Check out your Profile";
    if(x==3)
        document.getElementById("subtitle").innerHTML = "View your cart";
}
  
//RESET HEADER CONTENT TO DEFAULT TITLE
function revertH() {
    document.getElementById("subtitle").innerHTML = "Please Select an Option Below";
}