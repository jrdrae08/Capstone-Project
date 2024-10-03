var typed = new Typed('.element', {
    strings: ["MAJAYJAY,", "LAGUNA!"],
    typeSpeed: 125,
    backSpeed: 75,
    loop: true
  });

  var swiper = new Swiper(".mySwiper", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    loop: true,
    slidesPerView: "auto",
    initialSlide: 2, // Start with the second card (index 1)
    coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 150,
        modifier: 2.5,
        slideShadows: true,
    },
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
        reverseDirection: true,  // This makes the autoplay go in reverse
    },
    loopedSlides: 3, // Ensure this matches or exceeds the number of slides you have
});


