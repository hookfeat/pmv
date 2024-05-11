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

//Menu mobile
// - Elements
const closeMenuButton = document.querySelector(".btn-mobile-close")
const openMenuButton = document.querySelector(".btn-mobile-open")
const mobilesLinks = document.querySelectorAll(".menu-mobile ul li a")
const menu = document.querySelector(".menu-mobile")

// - Functions
const closeMenu = () => menu.classList.add("close")
const openMenu = () => menu.classList.remove("close")

// - Events
closeMenuButton.addEventListener("click", () => {
  closeMenu()
})

openMenuButton.addEventListener("click", () => {
  openMenu()
})

mobilesLinks.forEach((menuItem) =>
  menuItem.addEventListener("click", () => closeMenu())
)
