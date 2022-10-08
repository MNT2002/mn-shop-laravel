const menuIconWrap = document.querySelector('.header__bar-icon')
const menuIcon = document.querySelector('.header__navbar-item-bar')
const closeButtonMobile = document.querySelector('.nav__mobile-close')

const navOverlay = document.querySelector('.nav-overlay')
const navMobile = document.querySelector('.nav__mobile')

function openEvent() {
    menuIconWrap.style.zIndex = '50';
    navOverlay.style.display = 'block'
    navMobile.style.transform = 'translateX(0)'
}
function closeEvent() {
    menuIconWrap.style.zIndex = '';
    navOverlay.style.display = 'none'
    navMobile.style.transform = 'translateX(-100%)'
}


closeButtonMobile.addEventListener('click', closeEvent);
menuIcon.addEventListener('click', openEvent);


const userIconMobile = document.querySelector('.user-icon-mobile')

userIconMobile.addEventListener('click', openEvent)

const linkInfoMobile = document.querySelector('.custom-link-item__info')
const linkSupportMobile = document.querySelector('.custom-link-item__supp')
const signoutBtn = document.querySelector('.signout-mobile-btn')