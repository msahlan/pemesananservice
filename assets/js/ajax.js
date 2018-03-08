var ajaxku=buatajax();
function ajaxmotor(id){
  var url="http://localhost/pemesananservice/customer/getmotor/"+id;
  console.log(url);
  ajaxku.onreadystatechange=stateChanged;
  ajaxku.open("GET",url,true);
  ajaxku.send(null);
}

function buatajax(){
  if (window.XMLHttpRequest){
    return new XMLHttpRequest();
  }
  if (window.ActiveXObject){
    return new ActiveXObject("Microsoft.XMLHTTP");
  }
  return null;
}
function stateChanged(){
  var data;
  if (ajaxku.readyState==4){
    data=ajaxku.responseText;
    if(data.length>=0){
      document.getElementById("cmbPlatNomor").innerHTML = data;
    }else{
      document.getElementById("cmbPlatNomor").value = "<option selected>Pilih Motor</option>";
    }
  }
}
