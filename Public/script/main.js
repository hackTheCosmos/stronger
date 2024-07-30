//burger menu

const openBurgerMenuIcon = document.querySelector('.burger__menu__icon__wrapper i')
const closeBurgerMenuIcon = document.querySelector('.close')
const mobileNav = document.querySelector(".mobile__nav__wrapper")
const logo = document.querySelector(".app__title__wrapper img")
const title = document.querySelector(".app__title__wrapper h1")
openBurgerMenuIcon.addEventListener("click", () => {
    mobileNav.classList.toggle('active')
    document.querySelector('main').classList.toggle("dark")
    document.querySelector('footer').classList.toggle("dark")
    openBurgerMenuIcon.classList.toggle('translate')
    logo.classList.toggle('translate')
    title.classList.toggle('translate')
})

closeBurgerMenuIcon.addEventListener("click", () => {
    mobileNav.classList.toggle('active')
    document.querySelector('main').classList.toggle("dark")
    document.querySelector('footer').classList.toggle("dark")
    openBurgerMenuIcon.classList.toggle('translate')
    logo.classList.toggle('translate')
    title.classList.toggle('translate')
})

//animation big header
const homeLink = document.querySelector('.big__header .app__title__wrapper a')
const bigHeaderTitle = document.querySelector('.big__header .app__title__wrapper h1')
const bigHeaderLogo = document.querySelector('.big__header .app__title__wrapper img')

homeLink.addEventListener('click', (e) => {
    e.preventDefault();
    bigHeaderTitle.classList.toggle('translate')
    bigHeaderLogo.classList.toggle('translate')

    setTimeout(function(){
        bigHeaderTitle.classList.toggle('translate')
        bigHeaderLogo.classList.toggle('translate')
     

        setTimeout(function(){
            window.location = "index.php"
        },500)
    },500)
})

const smallHomeLink = document.querySelector('.small__header .app__title__wrapper a')
const smallHeaderTitle = document.querySelector('.small__header .app__title__wrapper h1')
const smallHeaderLogo = document.querySelector('.small__header .app__title__wrapper img')

smallHomeLink.addEventListener('click', (e) => {
    e.preventDefault();
    smallHeaderTitle.classList.toggle('translate')
    smallHeaderLogo.classList.toggle('translate')

    setTimeout(function(){
        smallHeaderTitle.classList.toggle('translate')
        smallHeaderLogo.classList.toggle('translate')
     

        setTimeout(function(){
            window.location = "index.php"
        },500)
    },500)
})


//FORMULAIRES---------------------------------------------------------------------------

    // Inputs de type password
    // Affichage / masquage des mots de passe

    eyeIcons = document.querySelectorAll(".password__input__wrapper i");
    passwordInputs = document.querySelectorAll("input[type = 'password']");

    // change le type de l'input soit en "password", soit en "text"
    function changeType (input) {
        if (input.type === "password"){
            input.type = "text";
        } else {
            input.type = "password";
        }
    }

    // change l'icone
    function changeIcon (icon) {
        let eyeIconClass = icon.classList;
        eyeIconClass.toggle("fa-eye");
        eyeIconClass.toggle("fa-eye-slash");
    }

    // script qui gère la visibilité des mots de passe    
    eyeIcons.forEach ((eyeIcon) => {
        eyeIcon.addEventListener("click", () => {
            changeIcon(eyeIcon);
            changeType(eyeIcon.previousSibling.previousSibling);  
        })
    })

   