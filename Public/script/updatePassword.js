//update password
const updatePasswordButton = document.getElementById('update__password__button')

updatePasswordButton.addEventListener("click", (e) => {
    e.preventDefault()
    updatePasswordForm.classList.toggle('active')
    if(updatePasswordButton.innerHTML ==  "modifier") {
        updatePasswordButton.innerHTML = '<i class="fa-solid fa-xmark"></i>'
    } else if(updatePasswordButton.innerHTML == '<i class="fa-solid fa-xmark"></i>') {
        updatePasswordButton.innerHTML = "modifier"
    }
})

updatePasswordForm = document.querySelector('.update__password__form')
updatePasswordForm.addEventListener("submit", (e) => {
    e.preventDefault()
    let data = new FormData(document.querySelector('.update__password__form'))


    let xhr = new XMLHttpRequest()
    xhr.onreadystatechange = function () {

        if(this.readyState == 4 && this.status == 200) {  
            let result = this.response
          
            if(result.success) {
                document.querySelector(".pass__error").style.display = "none"
                document.querySelector(".pass__success").style.display = "block"
                document.querySelector(".pass__success").innerHTML = result.message
                setTimeout(function(){
                    window.location.href = "index.php?page=accompt"
                },3000)
            } else {
                document.querySelector(".pass__error").style.display = "block"
                document.querySelector(".pass__error").innerHTML = result.message
            }
        } else if(this.readyState == 4) {
            alert("une erreur est survenue")
        }
    }

    xhr.open("POST", "/Async/updatePassAsync.php", true)
    xhr.responseType = "json"
    xhr.send(data)
    return false
})
