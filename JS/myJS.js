import Swiper from '../node_modules/swiper/swiper-bundle';
// import Swiper styles
var swiper = new Swiper('.swiper-container', {
    slidesPerView: 3,
    spaceBetween: 30,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
});;

function myFunction() {
    document.getElementById("myDIV").classList.toggle("active");
    document.getElementById("myDIV").classList.toggle("bg-dark");
    document.getElementById("main").classList.toggle("ml-my");
}

