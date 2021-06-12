
    <div class="footer">
        <div class="footer-container container">
            <div class="copy ">
                <p>Designed by RikTa</p>
            </div>
        </div>
    </div>


    <script src="includes/node_modules/swiper/swiper-bundle.js"></script>

    <script>
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 1,
      spaceBetween: 0,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 10,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 10,
        },
      }
    });
    </script>
    
    <script>
       function myFunction() {
        document.getElementById("side-nav").classList.toggle("open");
        document.getElementById("blur").classList.toggle("blur");
     }
    </script>

    <script src="includes/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>