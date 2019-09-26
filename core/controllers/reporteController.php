<?php

//if(isset($_SESSION['app_id'])) {

  $isset_id = isset($_GET['id']) and is_numeric($_GET['id']) and $_GET['id'] >= 1;

  //require('core/models/class.Proveedores.php');
  //$proveedores = new Proveedores();

  switch (isset($_GET['mode']) ? $_GET['mode'] : null) {
    case 'add':
          if($_POST) {
        $proveedores->Add();
        } else {
        include(HTML_DIR . '/producto/proveedor/add_producto.php');
      }
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
    case 'hoy':
      if($isset_id) {
        //$marcas->Delete();
      } else {
        include(HTML_DIR . '/reportes/hoy.php');
      }
    break;
    case 'hoypdf':
      if($isset_id) {
        //$marcas->Delete();
      } else {
        include(HTML_DIR . '/reportespdf/reportehoy.php');
      }
    break;
    case 'fechaspdf':
      if($isset_id) {
        //$marcas->Delete();
      } else {
        include(HTML_DIR . '/reportespdf/reportefechas.php');
      }
    break;
    default:
     include(HTML_DIR . '/reportes/asistencia.php');
    break;
  }
/*} else {
  header('location: ?view=index');
}*/

?>
