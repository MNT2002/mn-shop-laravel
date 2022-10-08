const activeImage = document.querySelector(".product-image .active");
const productImages = document.querySelectorAll(".image-list img");

function changeImage(e) {
  activeImage.src = e.target.src;
  productImages.forEach(element => {
    if(element.classList.contains("active")) {
      element.classList.remove("active")
    }
  });
  e.target.classList.add("active")
}

productImages.forEach(image => image.addEventListener("click", changeImage));




