<?php

if(isset($_SESSION['app_id'])) {

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
    case 'reporte':
      if($isset_id) {
        //$marcas->Delete();
      } else {
        include(HTML_DIR . '/reporte/prueba.php');
      }
    break;
    default:
     include(HTML_DIR . '/public/admin.php');
    break;
  }
} else {
  header('location: ?view=index');
}

?>
