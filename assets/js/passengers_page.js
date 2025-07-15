new Swiper(".swiper", {
  slidesPerView: 3,
  spaceBetween: 10,
  slidesOffsetBefore: 100,
  slidesOffsetAfter: 0,

  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  loop: false,

  centeredSlides: true,
  centeredSlidesBounds: true,

  breakpoints: {
    400: {
      slidesOffsetBefore: 0,
      slidesOffsetAfter: 50,
    },
    600: {
      slidesOffsetBefore: 0,
      slidesOffsetAfter: 1200,
    },
    1000: {
      slidesOffsetAfter: 100,
    },
  },
});
