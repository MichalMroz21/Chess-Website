const max_slides_per_slider_for_each_html = [[1], [9,4,4,6,5,7], [1,6,4,6,4], [1,5,9,6,5], [126]];

let i; let max_slides; let button_red; let button_green; let current_slides=[]; let is_counter_created=[];

function goForwardOrBack(){
    
    let n = this.getAttribute("class") == "czerwony" ? Array.prototype.indexOf.call(button_red, this) : Array.prototype.indexOf.call(button_green, this);
    let max_s = max_slides[n];
    let imagee = this.parentElement.parentElement.firstElementChild;

    if(!(is_counter_created[n])){

        let counter = document.createElement("p");
        counter.setAttribute("id", ("counter"+n));
        counter.style.textAlign = "center";
        counter.style.fontSize = "24px";
        counter.style.color = "#0f84f7";
        this.parentElement.parentElement.parentElement.querySelector(".tekst").style.marginBottom = (80 + 77 + "px");
        this.parentElement.parentElement.appendChild(counter);
        is_counter_created[n] = 1;
    }   

    if(this.getAttribute("class")=="czerwony") {if(current_slides[n]==1) current_slides[n]=max_s;
        else current_slides[n]--;}

    if(this.getAttribute("class")=="zielony") {if(current_slides[n]==max_s) current_slides[n]=1;
        else current_slides[n]++;}

    if(is_counter_created[n]){
        document.querySelector(("#counter"+n)).innerHTML = "Slajd " + current_slides[n] + "/" + max_s;
    }

    imagee.setAttribute("src", imagee.getAttribute("src").replace(RegExp("(.*)([a-zA-Z_]{1})([0123456789]*)(.png)"),("$1$2" + current_slides[n] + "$4")));
}

document.addEventListener("DOMContentLoaded", function(){

    i = document.querySelector("body").id;
    max_slides = max_slides_per_slider_for_each_html[i];

    button_red = document.querySelectorAll(".obraz > svg > .czerwony");
    button_green = document.querySelectorAll(".obraz > svg > .zielony");

    for(let j=0; j<max_slides.length; j++){

        current_slides.push('1');
        is_counter_created.push(0);

        button_red[j].addEventListener("click", goForwardOrBack);
        button_green[j].addEventListener("click", goForwardOrBack);
    }

} 
);