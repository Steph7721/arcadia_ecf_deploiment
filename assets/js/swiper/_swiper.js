import Swiper from 'swiper'; 


const swiper = new Swiper (".mySwiper", {
  grabCursor: true,
  loop: true,
  centeredSlider: true,
  spaceBeteween: 30,
  pagination: {
    el: '.avis-pagination',
    clickable: true
  },
  breakpoints: {
    767: {
      slidePerview: 2
    }
  }
});