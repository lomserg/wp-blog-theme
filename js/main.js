// console.log("small");

// const products = document.querySelectorAll(".product__wrapper");
// const productsSmall = document.querySelectorAll("[data-product=small]");
// console.log(productsSmall);
const tabs = document.querySelectorAll(".tab__btn");
const allContent = document.querySelectorAll(".content_tab");
console.log(allContent);
tabs.forEach((tab, index) => {
  tab.addEventListener("click", (e) => {
    tabs.forEach((tab) => tab.classList.remove("active"));
    tab.classList.add("active");
    const line = document.querySelector(".line");
    line.style.width = e.target.offsetWidth + "px";
    line.style.left = e.target.offsetLeft + "px";
    allContent.forEach((content) => content.classList.remove("active"));
    allContent[index].classList.add("active");
  });
});
