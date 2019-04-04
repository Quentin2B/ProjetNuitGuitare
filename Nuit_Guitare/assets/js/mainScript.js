function fillTbody(){
  var tbody = document.getElementById("filledTbody");

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       tbody.innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "../assets/phpFunctions/getCourses.php", true);
  xhttp.send();
}

function getConsultChoice(){

}


//dont touch pls
document.onreadystatechange = function () {
  if (document.readyState === 'interactive') {
    fillTbody();
  }
}
