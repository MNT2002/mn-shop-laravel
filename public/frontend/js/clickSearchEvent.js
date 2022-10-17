const search = document.querySelector(".form-mini-search");
const searchButtonIcon = document.querySelector(".search-button-icon");
const searchButtonLink = document.querySelector(".search-button-link");
const closeButton = document.querySelector(".js-close-button");

function showMiniSearch() {
    searchButtonIcon.style.display = 'none'
    searchButtonLink.style.display = 'flex'
    search.classList.add("active");
    search.style.width = `${header.getBoundingClientRect().width}px`;
}

function hideMiniSearch() {
    searchButtonIcon.style.display = 'flex'
    searchButtonLink.style.display = 'none'
    search.classList.remove("active");
    search.style.width = "100%";
}
searchButtonIcon.addEventListener("click", showMiniSearch);
closeButton.addEventListener("click", hideMiniSearch);
