console.log("small");
const toggleBtn = document.querySelector(".toggle-btn");
const burgerContainer = document.querySelector(".burger__container");
toggleBtn.addEventListener("click", () => {
  toggleBtn.classList.toggle("active");
  burgerContainer.classList.toggle("active");
});

// const products = document.querySelectorAll(".product__wrapper");
// const productsSmall = document.querySelectorAll("[data-product=small]");
// console.log(productsSmall);
// const tabs = document.querySelectorAll(".tab__btn");
// const allContent = document.querySelectorAll(".content_tab");
// console.log(allContent);
// tabs.forEach((tab, index) => {
//   tab.addEventListener("click", (e) => {
//     tabs.forEach((tab) => tab.classList.remove("active"));
//     tab.classList.add("active");
//     const line = document.querySelector(".line");
//     line.style.width = e.target.offsetWidth + "px";
//     line.style.left = e.target.offsetLeft + "px";
//     allContent.forEach((content) => content.classList.remove("active"));
//     allContent[index].classList.add("active");
//   });
// });
document.addEventListener("DOMContentLoaded", function () {
  const menuItems = document.querySelectorAll(".menu-item-has-children > a");

  menuItems.forEach((item) => {
    item.addEventListener("click", function (event) {
      event.preventDefault(); // Prevent default link behavior

      let parent = this.parentElement;
      let submenu = parent.querySelector(".sub-menu");

      if (submenu) {
        submenu.style.display =
          submenu.style.display === "block" ? "none" : "block";
        parent.classList.toggle("active"); // Add active class for styling
      }
    });
  });
});
