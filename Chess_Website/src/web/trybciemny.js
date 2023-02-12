let currentState = 0;

function setDark(i=1){

                $("body").css("background-color", "#262421");
                $("#nagłówek").css("background-color","#5db3db");
                $("#nawigacja").css("background-color", "#7ead0e");
                $("ul > #rozwijane").css("background-color", "#6f9b08");
                $("ul > li").css("background-color", "#6f9b08"); 
                $("#stopka").css("background-color", "#344949");
                $("#darktheme").fadeOut(0);
                $("#darktheme").attr("src", ("img/darktheme" + (3+i) + ".png"));
                $("#darktheme").fadeIn(350*i);
}

function setLight(){

                $("body").css("background-color", "#7e7d7d"); 
                $("#nagłówek").css("background-color", "#6dcefc"); 
                $("#nawigacja").css("background-color", "#9ad411");
                $("ul > #rozwijane").css("background-color", "#88be0a");
                $("ul > li").css("background-color", "#88be0a");
                $("#stopka").css("background-color", "#89bdbd");
                $("#darktheme").fadeOut(0);
                $("#darktheme").attr("src", ("img/darktheme" + 2 + ".png"));
                $("#darktheme").fadeIn(350);
}

$(document).ready(function(){

    if(sessionStorage.getItem("themeState")=="true") {
        setDark(0);
        currentState = 1;
    }

    const $img = $("#darktheme");
    $img.hover(function(){
        $(this).css("cursor", "pointer");
        $(this).attr("src", ("img/darktheme"+((currentState) ? 4 : 2) + ".png"));
    },
    function(){
        $(this).css("cursor", "auto");
        $(this).attr("src", ("img/darktheme"+((currentState) ? 3 : 1) + ".png"));
    });

    $img.on("click", function(){

        if(!($("#darktheme").is(":animated"))){

            currentState = !currentState;

            sessionStorage.setItem("themeState", (currentState));

            if(currentState){
                setDark();
            }
            else{
                setLight();
            }

        }

    });

});















