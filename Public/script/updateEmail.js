//update email
const updateEmailButton = document.getElementById('update__email__button')

updateEmailButton.addEventListener("click", (e) => {
    e.preventDefault()
    updateEmailForm.classList.toggle('active')
    if(updateEmailButton.innerHTML ==  "modifier") {
        updateEmailButton.innerHTML = '<i class="fa-solid fa-xmark"></i>'
    } else if(updateEmailButton.innerHTML == '<i class="fa-solid fa-xmark"></i>') {
        updateEmailButton.innerHTML = "modifier"
    }
})

updateEmailForm = document.querySelector('.update__email__form')
updateEmailForm.addEventListener("submit", (e) => {
    e.preventDefault()
    let data = new FormData(document.querySelector('.update__email__form'))

    let xhr = new XMLHttpRequest()
    xhr.onreadystatechange = function () {

        if(this.readyState == 4 && this.status == 200) {
            
            let result = this.response
          
            if(result.success) {
                document.querySelector(".email__error").style.display = "none"
                document.querySelector(".email__success").style.display = "block"
                document.querySelector(".email__success").innerHTML = result.message
                setTimeout(function(){
                    window.location.href = "index.php?page=accompt"
                },3000)
            } else {
                document.querySelector(".email__error").style.display = "block"
                document.querySelector(".email__error").innerHTML = result.message
            }
        } else if(this.readyState == 4) {
            alert("une erreur est survenue")
        }
    }

    xhr.open("POST", "/Async/updateEmailAsync.php", true)
    xhr.responseType = "json"
    xhr.send(data)
    return false
})



