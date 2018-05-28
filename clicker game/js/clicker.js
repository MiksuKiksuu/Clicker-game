// var clicks = 0;
// var kerroin = 1;
// var kahvi = 20;
// var kahviplus = 5;
var timerId;
// var ps = false;
//var timerPS = 100;
// var kahvi_1 = true;
// var kahvi_2 = false;
// var kahvi_3 = false;
// var kahvi_4 = false;
var kahvi_1MIN = true;
var kahvi_2MIN = 800;
var kahvi_3MIN = 600;
var kahvi_4MIN = 100;


// var output_clicks =  document.getElementById("output_clicks");
// var output_kahviplus =  document.getElementById("output_kahviplus");
// var output_kerroin =  document.getElementById("output_kerroin");

// output_kerroin.innerHTML = JsonObj.kerroin;
// output_kahviplus.innerHTML = JsonObj.kahviplus;
// output_clicks.innerHTML = JsonObj.clicks;


var JsonObj = {
        "kahvi_2": false,
        "kahvi_3": false,
        "kahvi_4": false,
        "ps": false,
        "clicks": 0,
        "kerroin": 1,
        "kahviplus": 5,
        "kahvi": 20,
        "timerPS": 100
      
  }

  var clicks_output = document.getElementById("clicks_output");
  var kerroin_output = document.getElementById("kerroin_output");
  var kahviplus_output = document.getElementById("kahviplus_output");
  var kahvi_output = document.getElementById("kahvi_output");
  var timerPS_output = document.getElementById("timerPS_output");



//Klikkerin funktio
function klikkaus() {
    JsonObj.clicks = JsonObj.clicks + JsonObj.kerroin;
    tulosta();
}

//
function purut() {
    if(JsonObj.clicks > JsonObj.kahvi){
        JsonObj.clicks = JsonObj.clicks - JsonObj.kahvi;
        JsonObj.kerroin =  JsonObj.kerroin + 1;
        JsonObj.kahvi = JsonObj.kahvi + JsonObj.kahviplus;

        tulosta();
    }
}

function tulosta(){
    // document.getElementById("clicks").innerHTML = clicks;

    // document.getElementById("kahvi").innerHTML = kahvi;
    // document.getElementById("kerroin").innerHTML = kerroin;
    // document.getElementById("timerPS").innerHTML = timerPS;
    clicks_output.innerHTML = JsonObj.clicks;
    kerroin_output.innerHTML = JsonObj.kerroin;
    kahviplus_output.innerHTML = JsonObj.kahviplus;
    kahvi_output.innerHTML = JsonObj.kahvi;
    timerPS_output.innerHTML = JsonObj.timerPS;
}

//kuvan luonti koodi
/*
function kuva(){
    if(kerroin > 10){
        var x = document.createElement("IMG");
        x.setAttribute("src", "h3h3.gif");
        x.setAttribute("width", "304");
        x.setAttribute("height", "228");
        x.setAttribute("alt", "The Pulpit Rock");
        document.body.appendChild(x);
        console.log("Miksi");
    }
}
*/
function kahviPS() {
    if(JsonObj.ps == true){
        JsonObj.clicks =  JsonObj.clicks + 1;
        tulosta(); 
    }
}

function aloita(){
    if(JsonObj.clicks > JsonObj.timerPS){
        JsonObj.clicks = JsonObj.clicks - JsonObj.timerPS;
        JsonObj.ps = true;
        JsonObj.ps = true;
        timerId = setInterval(JsonObj.kahviPS, 1000);
        JsonObj.timerPS = JsonObj.timerPS + 50;
    }
    tulosta(); 

}



//clicker image shop
function kahvi1(){
    if(JsonObj.kahvi_1 == true){
        document.getElementById('kliker').src='image/kahvi_1.png';
    }
}

function kahvi3(){
    if(JsonObj.kahvi_3 == true){
        document.getElementById('kliker').src='image/kahvi_3.png';
        //JsonObj.kahvi_3 = true;
    }
}

function kahvi2(){
    if(JsonObj.kahvi_2 == true){
        document.getElementById('kliker').src='image/kahvi_2.png';
        //JsonObj.kahvi_2 = true;

    }
}

function kahvi4(){
    if(JsonObj.kahvi_4 == true){
        document.getElementById('kliker').src='image/kahvi_5.png';
        //JsonObj.kahvi_4 = true;


    }
}


function kahvi__3(){
    if(JsonObj.clicks > kahvi_3MIN)
    {
        if (JsonObj.kahvi_3 == false){
        JsonObj.clicks = JsonObj.clicks - kahvi_3MIN;
        }
        if(kahvi_3 - kahvi_3MIN){
            JsonObj.kahvi_3 = true;
        }
    }
    else
    if(JsonObj.kahvi_3 == true){
        kahvi3();
    }
    tulosta();
}


function kahvi__1(){
    if(JsonObj.clicks > kahvi_1MIN)
    {
        if (kahvi_1 == false){
            JsonObj.clicks = JsonObj.clicks - kahvi_1MIN;
        }
        if(kahvi_1 - kahvi_1MIN){
            kahvi_1 = true;
        }
    }
    else
    if(kahvi_1 == true){
        kahvi1();
    }
    tulosta();
}

function kahvi__2(){
    if(JsonObj.clicks > kahvi_2MIN)
    {
        if (JsonObj.kahvi_2 == false){
            JsonObj.clicks = JsonObj.clicks - kahvi_2MIN;
        }
        if(JsonObj.kahvi_2 - kahvi_2MIN){
            JsonObj.kahvi_2 = true;
        }
    }
    else
    if(JsonObj.kahvi_2 == true){
        kahvi2();
    }
    tulosta();
}

function kahvi__4(){
    if(JsonObj.clicks > kahvi_4MIN)
    {
        if (JsonObj.kahvi_4 == false){
            JsonObj.clicks = JsonObj.clicks - kahvi_4MIN;
        }
        if(JsonObj.kahvi_4 - kahvi_4MIN){
            JsonObj.kahvi_4 = true;
        }
    }
    else
    if(JsonObj.kahvi_4 == true){
        kahvi4();
    }
            tulosta();
}




//ajax
document.getElementById("send_json").addEventListener("click", get_stuff);
document.getElementById("save_json_to_db").addEventListener("click", save_json_to_db);
/*
get_stuff() - Hakee kannasta JSON-objektissa määritetyt tiedot ja näyttää ne 
*/
function get_stuff(){

    dbParam = JSON.stringify(this.responseText);
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {


            var myObj =  JSON.parse(this.responseText);
            document.getElementById("").JSON = clicks;
            tulosta();
        }
    };
    xmlhttp.open("POST", "json_post_esim.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=" + dbParam);    
}

/*
save_json_to_db() - Tallentaa lomakkeen tiedot tietokantaan
*/
function save_json_to_db(){
    dbParam = JSON.stringify(JsonObj);
    //console.log(dbParam);
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // myObj = JSON.parse(this.responseText);
            // console.log(myObj);
            document.getElementById("demo").innerHTML = this.responseText;
            
        }
    };
    xmlhttp.open("POST", "json_post_esim_2.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=" + dbParam);    
    
}
