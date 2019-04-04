function actionDelete(id){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       refresh();
    }
  };
  xhttp.open("GET", "php/supprimer" + whatpage() + "?Action=Suppression&id=" + id, true);
  xhttp.send();

}

function whatpage(){

  return (location.pathname.substring(location.pathname.lastIndexOf("/") + 1)).replace("modif", "");
}

function refresh(){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       document.body.innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", window.location, true);
  xhttp.send();
}
