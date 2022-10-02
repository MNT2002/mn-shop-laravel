const navbar = document.querySelector('.header-menu-wrap');
const header = document.querySelector('.header');

    let navPos = navbar.getBoundingClientRect().top;

         window.addEventListener("scroll", e => {
             let scrollPos = window.scrollY;
             if (scrollPos > navPos) {
                 navbar.classList.add('sticky');
                 header.classList.add('header-sticky')
             } else {
                 navbar.classList.remove('sticky');
                 header.classList.remove('header-sticky');
             }
         });