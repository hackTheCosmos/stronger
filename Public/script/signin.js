 //signin form

signinForm = document.getElementById("signin");
signinForm.addEventListener("submit", (e) => {
    e.preventDefault()
    let data = new FormData(document.getElementById("signin"))

    let xhr = new XMLHttpRequest()
    xhr.onreadystatechange = function () {

        if(this.readyState == 4 && this.status == 200) {
            
            let result = this.response
            if(result.success) {
                document.querySelector(".error__info__bulle").style.display = "none"
                document.querySelector(".success__info__bulle").style.display = "block"
                document.querySelector(".success__info__bulle").innerHTML = result.message
                setTimeout(() => {
                    window.location.href = "index.php?page=login"
                },"3000")
            } else {
                document.querySelector(".error__info__bulle").style.display = "block"
                document.querySelector(".error__info__bulle").innerHTML = result.message
            }
        } else if(this.readyState == 4) {
            alert("une erreur est survenue")
        }
    }

    xhr.open("POST", "/Async/signinAsync.php", true)
    xhr.responseType = "json"
    xhr.send(data)
    return false
})