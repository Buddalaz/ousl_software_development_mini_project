console.log("worked!!!");

let submitBtn = document.getElementsByClassName('con-btn');
var hamburger = document.querySelector(".hamburger");

hamburger.addEventListener("click", function(){
    console.log('clicked');
    document.querySelector("body").classList.toggle("active");
})

function clickConBtn() {
    console.log("clicked!!");
}