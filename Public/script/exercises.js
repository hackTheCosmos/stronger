
$(document).ready(function(){

    deleteExercise();
    updateExercise();  
                    
    function getURLParameter(url, name) {
        return (RegExp(name + '=' + '(.+?)(&|$)').exec(url)||[,null])[1];
    }

//ajax barre de recherche d'exercices

    $(".exit__icon").click(function(){
        $("#search").val("");
        $("#search").focus()
        $('.pagination').css("display", "none")

    })

    $("#search").keyup(function(){
        let keyword = $(this).val()
        $('.pagination').css("display", "none")
        $('.exit__icon').addClass('active')
        
        if(keyword != "") {
            $.ajax({
                url: "/Async/exercisesAsync.php",
                method: "POST", 
                data:{keyword:keyword},
                success: function(data){
                    if(data) {

                        $(".exercises__list__wrapper").html(data)
                        $(".exercises__list__wrapper").css("display", "grid")
                        setTimeout(function( ) {

                                deleteExercise();
                                updateExercise();  
                            }
                        ,100)
                        
                    } else {
                        $(".exercises__list__wrapper").html("<p class ='no__result'>Aucun résultat</p>")
                        $('.pagination').css("display", "none")
                    }
                }
            })
        } 
    })
    $(".refresh__button").click(function(){

        let all = true
        let url = window.location.href
        let currentPage = getURLParameter(url, 'pagination');
        $.ajax({
            url: "/Async/exercisesAsync.php",
            method: "POST", 
            data:{all:all, currentPage:currentPage},
            success: function(data){
                $(".exercises__list__wrapper").html(data)
                $(".exercises__list__wrapper").css("display", "grid")
                window.location = "index.php?page=exercises&pagination=1"

                setTimeout(function( ) {
                        deleteExercise();
                        updateExercise();  
                    }
                ,100)
            }
        })
    
    })

    function deleteExercise() {

        setTimeout(() => {
            $(".exercise__wrapper a").addClass('seen')
        },100);


        $(".trash__link").each(function(){
            
            $(this).click(function(e) {
                e.preventDefault();
                let url = $(this).attr('href')
                let id = getURLParameter(url, 'id');
                let action = getURLParameter(url, 'action');
                $.ajax({
                    url: "/Async/exercisesAsync.php",
                    method: "GET",
                    data : {id: id, action:action}, 
                    success: function(data){
                        $(".exercises__list__wrapper").html(data)

                        setTimeout(function( ) {
                        
                                
                                deleteExercise();
                                updateExercise();
                            }
                        ,100)
                    }
                })
            })
        })
    }


    function updateExercise() {


        $(".update__link").each(function(a){
            $(this).click(function(e) {
                
                e.preventDefault();
                 
                $(this).parent().toggleClass("on__update")

                $(this).parent().children(".trash__link").toggleClass("active")
                
                $(this).children().toggleClass('fa-pencil')
                $(this).children().toggleClass('fa-xmark')

            
                $(".fa-xmark").each(function() {
                    $(this).click(function(){
                        $(this).parent().parent().children('.update__exercise__wrapper').css('display', 'none')
                    })
                    
                })

                $(".fa-pencil").each(function() {
                    $(this).click(function(){
                        $(this).parent().parent().children('.update__exercise__wrapper').css('display', 'flex')
                    })
                    
                })

                let parent = $(this).parent()
                
                if(!parent.has($(".update__exercise__wrapper")).length == 1) {

                    let updateExerciseWrapper = document.createElement("div")
                    updateExerciseWrapper.setAttribute("class", "update__exercise__wrapper");

                    let nameInput = document.createElement("input");
                    nameInput.setAttribute("type", "text");
                    nameInput.setAttribute("id", "name__input");
                    nameInput.setAttribute("placeholder", "nom de l'exercice");

                    let weightInput = document.createElement("input");
                    weightInput.setAttribute("type", "text");
                    weightInput.setAttribute("id", "weight__input");
                    weightInput.setAttribute("placeholder", "charge de travail (Kg)");

                    let nbRepsInput = document.createElement("input");
                    nbRepsInput.setAttribute("type", "text");
                    nbRepsInput.setAttribute("id", "reps__input");
                    nbRepsInput.setAttribute("placeholder", "nombre de répétitions");

                    let nbSeriesInput = document.createElement("input");
                    nbSeriesInput.setAttribute("type", "text");
                    nbSeriesInput.setAttribute("id", "series__input");
                    nbSeriesInput.setAttribute("placeholder", "nombre de séries");

                    let submitButton = document.createElement("button") 
                    submitButton.setAttribute("id", "update__exercise");
                    submitButton.innerHTML ="modifier"

                    updateExerciseWrapper.appendChild(nameInput)
                    updateExerciseWrapper.appendChild(weightInput)
                    updateExerciseWrapper.appendChild(nbRepsInput)
                    updateExerciseWrapper.appendChild(nbSeriesInput)
                    updateExerciseWrapper.appendChild(submitButton)

                    $(this).parent().append(updateExerciseWrapper)
                    
                    let url = $(this).attr('href')
                    let id = getURLParameter(url, 'id');
                    let action = getURLParameter(url, 'action');
                    $("#update__exercise").click(function () {
                        $(this).toggleClass("on__update")
                        let name = $("#name__input").val()
                        let weight = $("#weight__input").val()
                        let reps = $("#reps__input").val()
                        let series = $("#series__input").val()

                        $.ajax({
                            url: "/Async/exercisesAsync.php",
                            method: "GET",
                            data : {id: id, action:action, name:name, weight:weight, reps:reps, series:series}, 
                            success: function(data){
                                $(".exercises__list__wrapper").html(data)
                                setTimeout(function( ) {
                                
                                        deleteExercise();
                                        updateExercise();  
                                    }
                                ,100)
                        
                            }
                        })
                    })  
                }
                
            })
        })
    }

})


