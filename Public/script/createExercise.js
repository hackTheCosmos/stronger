//formulaire de création d'un exercice
const form = document.querySelector("form")
const nameInput = document.getElementById('name')
const errorInfo = document.querySelector(".error__info__bulle")
const successInfo = document.querySelector(".success__info__bulle")
form.addEventListener("submit", (e) => {
    if(nameInput.value == "") {
        e.preventDefault()
        errorInfo.innerHTML = "Vous devez donner un nom à votre exercice"
        errorInfo.style.display = "block"

        return
        
    } else {
        errorInfo.style.display = "none"
        successInfo.innerHTML = "Votre exercice à bien été créé"
        successInfo.style.display = "block"
    }

})