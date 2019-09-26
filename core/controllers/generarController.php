<?php

//if(isset($_SESSION['app_id'])) {
if(0==0) {

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
    case 'reporteasistencia':
      if($isset_id) {
        //$marcas->Delete();
      } else {
        include(HTML_DIR . '/reporte/asistencia.php');
      }
    break;
    case 'reporte':
      if($isset_id) {
        //$marcas->Delete();
      } else {
        include(HTML_DIR . '/reporte/prueba.php');
      }
    break;
    default:
     include(HTML_DIR . '/reportespdf/carnet.php');
    break;
  }
} else {
  header('location: ?view=index');
}

?>
