function myFunction() {
    document.getElementById("myDIV").classList.toggle("active");
    document.getElementById("myDIV").classList.toggle("bg-dark");
    document.getElementById("main").classList.toggle("ml-my");
}

function static() {
    document.getElementById("myDIV").classList.remove("active");
    document.getElementById("myDIV").classList.remove("bg-dark");
    document.getElementById("main").classList.remove("ml-my");

}