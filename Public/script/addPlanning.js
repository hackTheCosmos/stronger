
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

    let url = window.location.href
    let day = getURLParameter(url, 'day')
    
    if(keyword != "") {
        $.ajax({
            url: "/Async/addPlanningAsync.php",
            method: "POST", 
            data:{keyword:keyword, day:day},
            success: function(data){
                if(data) {

                    $(".add__planning__exercises__wrapper").html(data)
                    $(".add__planning__exercises__wrapper").css("display", "grid")
                    setTimeout(function( ) {

                        addExercise()
                        }
                    ,100)
                    
                } else {
                    $(".add__planning__exercises__wrapper").html("<p class ='no__result'>Aucun résultat</p>")
                    $('.pagination').css("display", "none")
                }
            }
        })
    } 
})
$(".refresh__button").click(function(){

    let all = true
    let url = window.location.href
    let day = getURLParameter(url, 'day');
    $.ajax({
        url: "/Async/addPlanningAsync.php",
        method: "POST", 
        data:{all:all, day:day},
        success: function(data){
            $(".add__planning__exercises__wrapper").html(data)
            $(".add__planning__exercises__wrapper").css("display", "grid")
            window.location = "index.php?page=addPlanning&pagination=1&day=1"

            setTimeout(function( ) {
                addExercise()
                 
                }
            ,100)
        }
    })

})


//add exercise
function addExercise(){ 

    $(".add__exercise__button").each(function(a){
        if(!$(this).hasClass('seen')) {

            $(this).addClass('seen')
            $(this).click(function() {
                

                let url = window.location.href
                let day = getURLParameter(url, 'day')

                let exerciseId = $(this).attr("id")
                let exerciseName = $(this).attr('data-name')

                $.ajax({
                    url: "/Async/addPlanningAsync.php",
                    method: "GET",
                    data : {day: day, exerciseId : exerciseId, exerciseName : exerciseName}, 
                    success: function(){
                        $("#"+exerciseId).parent().append("<i class='fa-solid fa-check'></i>")
                    
                    }
                })
                
            })
        }
    })
}

addExercise()




