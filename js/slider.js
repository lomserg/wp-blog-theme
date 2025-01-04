document.addEventListener("DOMContentLoaded", function () {
  console.log("swiper load");
  const swiper = new Swiper(".swiper", {
    // loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
});
