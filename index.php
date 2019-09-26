<?php

/*
  1- En class.Categorias.php borrar los temas también, asociados a el foro que se borra cuando se borra una categoría.
  2- En class.ConfigForos.php borrar los temas asociados al foro que se borra
*/
require('core/core.php');
//OnlineUsers();
if(isset($_GET['view'])) {
  if(file_exists('core/controllers/' . strtolower($_GET['view']) . 'Controller.php')) {
    include('core/controllers/' . strtolower($_GET['view']) . 'Controller.php');
  } else {
    include('core/controllers/errorController.php');
  }
} else {
  include('core/controllers/indexController.php');
}
//echo memory_get_usage()/1024;
?>
