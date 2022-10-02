const search = document.querySelector(".form-mini-search");
const searchButton = document.querySelector(".search-button");
const closeButton = document.querySelector(".js-close-button");

function showMiniSearch() {
    search.classList.add("active");
    search.style.width = `${header.getBoundingClientRect().width}px`;
}

function hideMiniSearch() {
    search.classList.remove("active");
    search.style.width = "100%";
}
searchButton.addEventListener("click", showMiniSearch);
closeButton.addEventListener("click", hideMiniSearch);
