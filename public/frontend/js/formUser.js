const FormSignInElement = document.querySelector('.form-sign-in')
const signInCloseButton = document.querySelector('.sign-in-close-button')
const buttonSignIn = document.querySelector('.button-sign-in')


const FormSignUpElement = document.querySelector('.form-sign-up')
const signUpCloseButton = document.querySelector('.sign-up-close-button')
const buttonSignUp = document.querySelector('.button-sign-up')

const userIconRes = document.querySelector('.user-icon-mobile')
const userIcon = document.querySelector('.header__navbar-item-user')

function showFormSignIn() {
    FormSignInElement.classList.add('active');
}
function hideFormSignIn() {
    FormSignInElement.classList.remove('active');
}
function showFormSignUp() {
    FormSignUpElement.classList.add('active');
}
function hideFormSignUp() {
    FormSignUpElement.classList.remove('active');
}

// function showFormLogged() {
//     formLoggedOverlay.style.display = 'block'
//     formLogged.style.display = 'block';
// }
// function hideFormLogged() {
//     formLoggedOverlay.style.display = 'none'
//     formLogged.style.display = 'none';
// }


    userIcon.addEventListener('click', showFormSignIn);
    userIconRes.addEventListener('click', showFormSignIn);

    // userIcon.addEventListener('click', showFormLogged)
    // formLoggedOverlay.addEventListener('click', hideFormLogged)

    signUpCloseButton.addEventListener('click', hideFormSignUp);
    signInCloseButton.addEventListener('click', hideFormSignIn);

    buttonSignIn.addEventListener('click', showFormSignIn);
    buttonSignIn.addEventListener('click', hideFormSignUp);
    buttonSignUp.addEventListener('click', showFormSignUp);
    buttonSignUp.addEventListener('click', hideFormSignIn);
