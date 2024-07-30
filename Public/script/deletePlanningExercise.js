

    function deletePlanningExercise() {

        
        function getURLParameter(url, name) {
            return (RegExp(name + '=' + '(.+?)(&|$)').exec(url)||[,null])[1];
        }


        $(".delete__link").each(function(){

            $(this).click(function(e) {

                e.preventDefault();

                let url = $(this).attr('href')
                let id = getURLParameter(url, 'id');
                let day = getURLParameter(url, 'day');
                let action = getURLParameter(url, 'action');
                $.ajax({
                    url: "/Async/planningExercisesAsync.php",
                    method: "GET",
                    data : {id: id, day : day, action:action}, 
                    success: function(data){
                        $(".days__list__wrapper").html(data)
                        deletePlanningExercise()
                    }
                })
                
            })
        })
    }

    deletePlanningExercise()
