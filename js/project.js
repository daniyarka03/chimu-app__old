// Swiper Slider

const swiper_plugin = (count_slides) => {
    var swiper = new Swiper(".mySwiper", {
    slidesPerView: count_slides,   
    spaceBetween: 30,
    loop: false,
    pagination: {
    el: ".swiper-pagination",
    clickable: true,
    },
    navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
    },
});
}

if (window.innerWidth > 1179) {
    swiper_plugin(3)
}

if (window.innerWidth <= 1179) {
    swiper_plugin(2)
}

if (window.innerWidth < 897) {
    swiper_plugin(1)
} 

// Check fill input
$('#file_upload').on('change', function() {
    $(".modal__edit_image").css({"visibility": "visible",
    "opacity": "1"});
    // document.location.href="#demo-modal";setInterval(function(){$('iframe').attr('src',$('iframe').href='')},100)
  });

$('.modal__close').on('click', function(){
    $(".modal__edit_image").css({"visibility": "hidden",
    "opacity": "0"});
});
  
