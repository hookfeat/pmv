// Lib Swiper JS
const swiper = new Swiper(".swiper", {
  direction: "horizontal",
  loop: true,
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  breakpoints: {
    468: {
      slidesPerView: 2,
      spaceBetween: 20,
    },

    640: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 4,
      spaceBetween: 40,
    },
    1024: {
      slidesPerView: 5,
      spaceBetween: 50,
    },
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
})

// Lib AOS (Animate on Scroll)
AOS.init()
