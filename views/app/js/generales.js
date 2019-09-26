function __(id) {
  return document.getElementById(id);
}

function DeleteItem(contenido,url) {
  var action = window.confirm(contenido);
  if (action) {
      window.location = url;
  }
}
function verificar(ajam){
  alert(ajam);
}
function Focus(dato)
{
     document.getElementById(dato).focus();
}
