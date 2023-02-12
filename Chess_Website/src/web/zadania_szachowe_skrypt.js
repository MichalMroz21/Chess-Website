let difficulty; let nick; let quantity; let max_mistakes; let tile_color; let positions; let answers; let mistakes=0; let user_answers = []; 
let obecny_etap=0; let zaswiecone_pola=0; let score=0; let czy_ma_byc_obramowanie;
let easy = [[[1,2,1,2,1,2,1,20], [2,1,2,1,2,1,2,1], [1,2,1,2,1,2,1,2], [2,1,2,1,2,1,2,1], [1,2,1,2,21,2,1,2], [2,1,2,25,2,1,2,1], [1,24,1,2,5,2,1,2], [2,1,2,1,2,1,2,1]],   
[[15,2,1,2,1,2,1,2], [2,1,2,1,2,1,2,1], [1,2,1,2,1,2,1,2], [2,1,2,1,2,1,2,1], [1,2,1,2,1,2,1,2], [2,1,2,1,2,23,2,1], [1,2,1,2,1,2,1,6], [2,1,2,1,2,1,26,1]], 
[[25,2,1,2,1,2,1,2], [2,5,24,1,2,1,2,1], [1,2,1,2,1,2,1,2], [2,1,2,1,2,1,2,1], [1,2,1,2,1,2,1,2], [2,1,2,1,2,1,2,19], [1,2,1,2,1,2,1,2], [2,1,2,1,2,1,2,1]], 
[[1,2,1,2,1,2,17,2], [6,1,16,1,2,1,2,1], [1,2,1,2,1,6,25,2], [2,1,2,1,2,1,4,1], [1,2,1,2,1,4,23,2], [2,1,2,1,18,1,2,1], [1,2,1,2,1,2,1,2], [2,1,2,1,2,1,2,1]],
[[1,2,1,2,25,2,1,2], [2,1,2,1,2,1,2,1], [1,2,1,2,23,2,1,2], [2,1,2,1,2,1,2,1], [1,2,1,2,1,2,1,2], [2,1,2,1,2,1,2,1], [15,2,1,2,1,2,1,2], [2,1,2,1,2,1,2,1]]];

let easy_answers = [[[0,7], [5, 2]], [[0,0], [7,0]], [[5,7], [5,0]], [[4,5], [3,5]], [[6,0], [0,0]]];

let medium = [[[17,2,13,2,1,20,17,2], [2,1,2,5,2,1,2,25], [5,6,21,2,1,2,1,6], [2,1,2,1,2,3,2,1], [1,2,1,2,1,2,1,2], [2,1,2,1,2,1,2,1], [3,12,1,2,1,2,3,4], [2,1,2,1,2,15,24,1]],   
[[17,2,1,2,1,2,1,18], [2,13,2,5,2,1,26,1], [5,6,1,2,1,16,1,6], [2,1,2,1,2,1,2,1], [1,2,1,2,19,2,1,2], [12,1,2,1,2,1,2,1], [3,2,1,2,1,2,3,4], [2,1,2,1,2,1,24,1]], 
[[1,2,1,2,1,2,1,2], [2,1,2,1,2,1,2,1], [1,2,1,2,1,2,1,6], [2,1,2,1,2,23,2,25], [1,2,1,2,1,2,1,18], [2,1,2,1,2,1,2,15], [1,2,1,2,1,2,3,2], [2,1,2,1,2,1,2,1]], 
[[1,2,1,2,1,2,1,2], [2,1,2,1,2,1,2,1], [1,2,1,2,1,2,1,2], [2,1,2,1,2,1,2,1], [1,2,1,2,1,2,1,2], [2,1,2,1,2,1,2,1], [1,2,1,2,1,24,1,6], [2,1,2,1,2,7,2,25]],
[[1,2,1,2,25,2,1,2], [2,7,2,9,10,1,2,1], [1,2,1,2,7,2,1,24], [2,1,2,1,2,1,2,1], [1,2,1,2,1,2,1,2], [2,1,2,1,2,1,2,1], [15,2,1,2,1,2,1,2], [2,1,2,1,2,1,2,1]]];

let medium_answers = [[[0,5], [1,5]], [[4,4], [2,6]], [[6,6], [4,6]], [[7,5], [5,6]], [[1,1], [2,3]]];

let hard = [[[1,24,1,2,1,2,1,2], [2,3,2,1,2,1,2,1], [3,2,1,2,1,22,1,2], [2,1,2,3,20,1,2,1], [1,2,1,4,1,2,5,2], [2,5,2,5,2,1,2,1], [5,2,5,2,1,2,1,2], [2,25,14,1,16,1,2,1]],   
[[15,2,23,2,1,2,1,16], [8,1,2,19,2,1,4,11], [17,2,3,2,1,4,1,4], [2,1,14,3,4,1,2,1], [1,2,1,2,1,2,5,10], [2,5,2,5,6,1,2,5], [1,2,5,2,25,6,13,2], [18,1,2,1,2,1,2,1]], 
[[15,2,11,2,1,2,23,2], [4,3,2,7,2,3,4,3], [1,2,3,16,1,2,1,2], [2,1,2,1,2,9,2,1], [1,2,1,2,1,2,1,2], [2,1,2,1,2,1,2,1], [5,6,1,2,1,2,19,6], [26,1,2,1,18,1,10,17]], 
[[1,26,1,2,1,2,1,2], [2,5,2,1,2,1,6,5], [1,4,5,2,1,6,21,2], [2,1,12,1,18,1,2,1], [1,4,1,2,1,2,1,2], [2,1,2,1,2,1,2,3], [1,2,1,18,1,2,3,19], [2,1,2,1,2,15,24,1]],
[[15,2,15,2,23,2,1,2], [4,3,2,1,2,1,2,1], [1,8,1,2,1,22,1,2], [2,1,2,1,2,9,2,1], [1,12,1,2,5,2,5,2], [2,5,2,19,2,5,2,1], [5,4,17,2,1,2,1,6], [2,25,2,1,2,1,2,17]]];

let hard_answers = [[[2,5], [3,4]], [[2,0], [1,0]], [[7,4], [0,4]], [[6,7], [3,4]], [[3,5], [1,6]]];

function zatwierdz(){
    let answers_converted_to_id = [];
    for(let i=0; i<2; i++){
        let sum=0;
        for(let j=0; j<2; j++) {
            if(j==0) sum+=answers[obecny_etap][i][j]*8;
            else sum+=answers[obecny_etap][i][j]+1;
        }
        answers_converted_to_id.push(sum);
    } 

    if((answers_converted_to_id[0]==user_answers[0]&&answers_converted_to_id[1]==user_answers[1])||(answers_converted_to_id[0]==user_answers[1]&&answers_converted_to_id[1]==user_answers[0])){
        let congrats = document.createElement("p"); congrats.style.color = "#9ad411"; congrats.style.fontSize = "18px"; congrats.innerHTML = "Dobrze!";
        document.getElementById("content").appendChild(congrats);
        score++;
    }
    else{
        let notcongrats = document.createElement("p"); notcongrats.style.color = "#ff1c42"; notcongrats.style.fontSize = "18px"; notcongrats.innerHTML = "Źle!";
        mistakes++;
        document.getElementById("content").appendChild(notcongrats);
    }

    if(mistakes==max_mistakes) {setTimeout(wyczyscStrone, 2000); setTimeout(GameOver, 2000); return;}

    user_answers.splice(0, 2);
    obecny_etap++;
    zaswiecone_pola = 0;

    if((obecny_etap)==quantity) {setTimeout(wyczyscStrone, 2000); setTimeout(KoniecGry, 2000); return;}

    setTimeout(rozegrajEtap, 2000);
    setTimeout(wyczyscStrone, 2000);
}


function wyczyscStrone(){
    $("#obraz").remove();
    $("#content").remove();
}

function zaznacz(id){

        if(zaswiecone_pola==2){
            if(document.getElementById("tile"+ id).style.opacity!=1.0) return;
        }

        if(document.getElementById("tile" + id).style.opacity==0.8) {document.getElementById("tile" + id).style.opacity=1.0; zaswiecone_pola++;}
        else {document.getElementById("tile" + id).style.opacity = 0.8; zaswiecone_pola--;}

        let does_id_exist_in_answers = 0;

        for(let i=0; i<user_answers.length; i++) if(user_answers[i]==id) does_id_exist_in_answers = 1;

        if(!does_id_exist_in_answers&&user_answers.length<2) user_answers.push(id);

        else {

            let i = user_answers.indexOf(id);
            if(i!=(-1)) user_answers.splice(i, 1);
        }   
}

function rozegrajEtap(){

    let stage = obecny_etap;
    let obraz = document.createElement("div"); obraz.setAttribute("id", "obraz");
    let content = document.createElement("div"); content.setAttribute("id", "content"); content.style.textAlign = "center"; content.style.color = "#ffffff";
    for(let i=0; i<8; i++) {
        let tiles = document.createElement("div"); tiles.setAttribute("class", ("tiles")); tiles.style.height = "40px";
        if(czy_ma_byc_obramowanie){
            if(i==0) tiles.style.borderTop = "2px black solid"; if(i==7) tiles.style.borderBottom = "2px black solid";
            tiles.style.borderLeft = "2px black solid"; tiles.style.borderRight = "2px black solid";
        }
        for(let j=0; j<8; j++) {
            let n = (j+1)+((i)*8);
            let obrazek = document.createElement("img"); obrazek.setAttribute("class", "tile"); obrazek.setAttribute("id", ("tile"+(n))); obrazek.style.opacity = 0.8;
            obrazek.setAttribute("onclick", ("zaznacz("+n+")"));
            let number = positions[stage][i][j];
            let nazwa = "img-zadania_szachowe/" + number + ".png";
            obrazek.setAttribute("src", nazwa);
            tiles.appendChild(obrazek);
        }
        obraz.appendChild(tiles);
    }

    let bledy = document.createElement("p"); bledy.setAttribute("class", "bledy"); 
    bledy.innerHTML = ("Błędy: " + mistakes + "/" + max_mistakes);
    content.appendChild(bledy);

    let przycisk = document.createElement("button"); przycisk.type = "button"; przycisk.setAttribute("id", "clickb"); przycisk.style.width = "100px";
    przycisk.style.height = "30px"; przycisk.innerHTML = "Sprawdź!"; przycisk.style.backgroundColor = tile_color;
    przycisk.setAttribute("onclick", "zatwierdz()");
    content.appendChild(przycisk);

    let progressbar = document.createElement("div"); progressbar.id="progressbar"; progressbar.style.marginTop = "15px";
    content.appendChild(progressbar);

    document.querySelector(".sekcja").appendChild(obraz);
    document.querySelector(".sekcja").appendChild(content);

    $(document).ready(function(){

        $("#progressbar").progressbar({
            value: (stage),
            max: quantity
            });
    });
}

function GameOver(){

    let content = document.createElement("div"); content.setAttribute("id", "content"); content.style.textAlign = "center"; content.style.color = "#ffffff";
    let youlost = document.createElement("p"); youlost.style.color="#ff1c42"; youlost.style.fontSize = "24px"; youlost.innerHTML="Przegrałeś!";
    let scoree = document.createElement("p"); scoree.style.color="#3e44f0"; scoree.style.fontSize = "24px"; scoree.innerHTML=("Twój wynik to: "+score);
    let tryagain = document.createElement("a"); tryagain.href="zadania_szachowe.php"; tryagain.style.textDecoration = "none"; 
    tryagain.innerHTML="Spróbuj jeszcze raz!"; tryagain.color = "white";
    content.appendChild(youlost);
    content.appendChild(scoree);
    content.appendChild(tryagain);
    document.querySelector(".sekcja").appendChild(content);

    zarzadzanieStoragem();
}

function KoniecGry(){

    let content = document.createElement("div"); content.setAttribute("id", "content"); content.style.textAlign = "center"; content.style.color = "#ffffff";
    let youwon = document.createElement("p"); youwon.style.color="#9ad411"; youwon.style.fontSize = "24px"; youwon.innerHTML="Wygrałeś!";
    let scoree = document.createElement("p"); scoree.style.color="#3e44f0"; scoree.style.fontSize = "24px"; scoree.innerHTML=("Twój wynik to: "+score);
    let tryagain = document.createElement("a"); tryagain.href="zadania_szachowe.php"; tryagain.style.textDecoration = "none"; 
    tryagain.innerHTML="Zagraj jeszcze raz!"; tryagain.color = "white";
    content.appendChild(youwon);
    content.appendChild(scoree);
    content.appendChild(tryagain);
    document.querySelector(".sekcja").appendChild(content);

    zarzadzanieStoragem();
}

function zarzadzanieStoragem(){

    let dontAdd = 0;

    for(let i=0; i<localStorage.length; i++){
        let str = localStorage.getItem(i); let n; let str2;
        for(let i=0; i<str.length; i++){
            if (str.charAt(i)==' ') {str2 = str.substr(0, i); n = str.substr((i+1),(str.length-1-i));}
        }
        if(str2==nick){
            if(score>n) {
                localStorage.removeItem(i); localStorage.setItem((i), (nick+" "+score)); dontAdd=1;
            }
            else{
                dontAdd = 1;
            }
        }
    }
    if(!(dontAdd)) localStorage.setItem((0+localStorage.length), (nick+" "+score));
}

function resetStorage(){
    let size = localStorage.length;
    for(let i=0; i<size; i++) localStorage.removeItem(i);
    location.reload();
}

function submitForm(that){
    difficulty = that.tryb_trudności.value;
    nick = that.nick.value;
    quantity = that.ilość_zadań.value;
    max_mistakes = that.ilość_złych_odp.value;
    tile_color = that.kolor_podświetlenia.value;
    czy_ma_byc_obramowanie = that.obramowanie.checked;
    if((!(difficulty=="Łatwe"||difficulty=="Średnie"||difficulty=="Trudne"))||nick.length==0||quantity=="") {alert("Wypełnij wszystkie pola formularza!"); location.reload();}
    if(nick.length>16) nick = nick.substr(0, 16);

    positions = difficulty=="Łatwe"?easy:difficulty=="Średnie"?medium:hard;
    answers = difficulty=="Łatwe"?easy_answers:difficulty=="Średnie"?medium_answers:hard_answers;

        $(".tekst").remove();

        rozegrajEtap();
}

$(document).ready(function(){

    $("#info").on("click", function(){

        $("#dialog").html("Zadania Szachowe polegają na znajdowaniu najlepszych ruchów wygrywających materiał lub uzyskujących przewagę."
        +" Łącznie strona zawiera 15 pozycji (po 5 na każdy tryb trudności). Najlepszy wynik jest zapisywany.");

        if(sessionStorage.getItem("themeState")=="true") $("#dialog").css("backgroundColor", "#262421");
        else $("#dialog").css("backgroundColor", "#7e7d7d");
        
        $("#dialog").css("color", "white");

        $("#dialog").dialog({
            title: "Informacje",
            width: 200,
            height: 300,
            resizable: true,
            draggable: true
        });
            
    });

    $("main").submit(function(event){
        event.preventDefault();
    });

    if(localStorage.length>0){
        for(let i=0; i<localStorage.length; i++){
            let el = document.createElement("p"); 
            el.innerHTML = localStorage.getItem(i);
            document.getElementById("najlepszewyniki").appendChild(el);
        }
        let el = document.createElement("p"); el.setAttribute("id", "resetwynikow");
        el.innerHTML = "Reset wyników"; el.style.color="red"; el.addEventListener("click", resetStorage);
        document.getElementById("najlepszewyniki").appendChild(el);
    }

});