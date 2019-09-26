<?php

//if(isset($_SESSION['app_id'])) {

  $isset_id = isset($_GET['id']) and is_numeric($_GET['id']) and $_GET['id'] >= 1;

  //require('core/models/class.Proveedores.php');
  //$proveedores = new Proveedores();

  switch (isset($_GET['mode']) ? $_GET['mode'] : null) {
    case 'bus':
      include(HTML_DIR . '/asistencia/buscar.php');
    break;
    case 'edit':
      //if($isset_id and array_key_exists($_GET['id'],$_categorias)) {
      if(0==0) {
        if($_POST) {
          $proveedores->Edit();
        } else {
          include(HTML_DIR . '/producto/proveedor/edit_producto.php');
        }
      } else {
        header('location: ?view=proveedores');
      }
    break;
    case 'verbus':
      include(HTML_DIR . '/asistencia/verbus.php');
    break;
    default:
     include(HTML_DIR . '/asistencia/asistencia.php');
    break;
  }
/*} else {
  header('location: ?view=index');
}
*/
?>
