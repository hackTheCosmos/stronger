//login form

signinForm = document.getElementById("login");
signinForm.addEventListener("submit", (e) => {
    e.preventDefault()
    let data = new FormData(document.getElementById("login"))

    let xhr = new XMLHttpRequest()
    xhr.onreadystatechange = function () {

        if(this.readyState == 4 && this.status == 200) {
            
            let result = this.response
          
            if(result.success) {
                window.location.href = "index.php?page=planning"
            } else {
                document.querySelector(".error__info__bulle").style.display = "block"
                document.querySelector(".error__info__bulle").innerHTML = result.message
            }
        } else if(this.readyState == 4) {
            alert("une erreur est survenue")
        }
    }

    xhr.open("POST", "/Async/loginAsync.php", true)
    xhr.responseType = "json"
    xhr.send(data)
    return false
})