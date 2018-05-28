 
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            var response = JSON.stringify(xhttp.responseText);
            var output = '';
            for(var i = 0;i < tiedot.length;i++){
              output += '<p>'+tiedot[i].kahvi_1+'</p>';
            }
            document.getElementById("tiedot").innerHTML = tiedot;
          }
      };
      xhttp.open("GET", "js/clicker.js", true);
      xhttp.send();


      
        function postJSON(){
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    json = JSON.stringify(this.responseText);
                    document.getElementById("post").innerHTML = json;
            }
        };
      xmlhttp.open("POST", "test1.php", true);
      xmlhttp.send("x=" + json);
      //xmlhttp.send("x=");
    }