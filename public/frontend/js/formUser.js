const formLoggedOverlay = document.querySelector(".form-logged-overlay");
const formLogged = document.querySelector(".form-logged");

const userIcon = document.querySelector(".header__navbar-item-user");
const userLink = document.querySelector(".header__navbar-item-user-link");

function showFormLogged(event) {
    formLoggedOverlay.style.display = "block";
    formLogged.style.display = "block";
    event.preventDefault();
}
function hideFormLogged() {
    formLoggedOverlay.style.display = "none";
    formLogged.style.display = "none";
}

if(userLink) {
    userLink.addEventListener("click", showFormLogged);
}
formLoggedOverlay.addEventListener("click", hideFormLogged);
