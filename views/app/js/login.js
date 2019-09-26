function goLogin() {
  var connect, form, response, result, user, pass, sesion;
  user = __('usuarior').value;
  pass = __('passr').value;
  form = 'user=' + user + '&pass=' + pass;
  connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
  connect.onreadystatechange = function() {
    if(connect.readyState == 4 && connect.status == 200) {
      if(connect.responseText == 1) {
        result = '<div class="alert alert-dismissible alert-success">';
        result += '<strong>Conectado: </strong> Estamos redireccionandote...';
        result += '</div>';
        __('_AJAX_LOGIN_').innerHTML = result;
        window.location.href = '?view=adm';
        //location.reload();
      } else {
        __('_AJAX_LOGIN_').innerHTML = connect.responseText;
      }
    } else if(connect.readyState != 4) {
      result = '<div class="alert alert-dismissible alert-danger">';
      result = '<button type="button" class="close" data-dismiss="alert">x</button>'
      result = '<strong>Procesando... </strong> Estamos intentando iniciar sesion'
      result = '</div>';
      __('_AJAX_LOGIN_').innerHTML = result;
    }
  }
  connect.open('POST','ajax.php?mode=login',true);
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  connect.send(form);
}

function runScriptLogin(e) {
  if(e.keyCode == 13) {
    goLogin();
  }
}
