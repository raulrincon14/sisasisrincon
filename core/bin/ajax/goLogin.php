<?php
if(!empty($_POST['user']) and !empty($_POST['pass'])) {
  $db = new Conexion();
  $data = $db->real_escape_string($_POST['user']);
  //$pass = Encrypt($_POST['pass']);
  $pass = $_POST['pass'];
  $sql = $db->query("SELECT idusuario FROM usuario WHERE u_usuario='$data' AND u_pass='$pass' LIMIT 1;");
  $sqll = $db->query("SELECT u_tipo FROM usuario WHERE u_usuario='$data' AND u_pass='$pass' LIMIT 1;");

  if($db->rows($sql) > 0) {
      $sql1 = $db->query("SELECT u_estado FROM usuario WHERE u_usuario='$data' AND u_pass='$pass' LIMIT 1;");

   if ($db->recorrer($sql1)[0]==1) {
      ini_set('session.cookie_lifetime', time() + (60*60*24));
      $_SESSION['app_id'] = $db->recorrer($sql)[0];
      $_SESSION['nivel1'] = $db->recorrer($sqll)[0];
      $_SESSION['time_online'] = time() - (60*6);
      echo 1;
    }else {
      echo '<div class="alert alert-dismissible alert-danger">
     <button type="button" class="close" data-dismiss="alert">x</button>
     <strong>ERROR:</strong> Inactivo en el sistema, comuniquese con el administrador!
   </div>';
 }
  } else {
    echo '<div class="alert alert-dismissible alert-danger">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>ERROR:</strong> Tus datos no son correctos, reviselos y vuelva a intentar.
  </div>';
  }
  $db->liberar($sql);
  $db->close();
} else {
  echo '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">x</button>
  <strong>ERROR:</strong> Ingrese sus datos de acceso porfavor!
</div>';
}

?>
