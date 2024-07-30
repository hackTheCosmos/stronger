//delete accompt
const deleteAccomptButton = document.getElementById('delete__accompt__button')

deleteAccomptButton.addEventListener("click", (e) => {
    e.preventDefault()
  
    let choice = confirm("êtes vous sur de vouloir supprimmer votre compte ? Cette action est irréversible");

    if(choice == true) {
        $.ajax({
                url: "/Async/deleteAccomptAsync.php",
                method: "POST", 
            })
        location.href = "index.php"
    }
})
