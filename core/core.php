<?php
session_start();
date_default_timezone_set('America/Lima');
//Constantes de Coneccion
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','asistenciars');
//nucleo de la aplicacion
define('HTML_DIR','html');
define('APP_TITLE','SIRSP');
define('APP_COPY','© '. date('Y',time()).' Sistema de Información Roque Saenz Peña | Desarrollado por');
define('APP_URL','http://localhost/proyectoasistencia/');

require('core/models/class.Conexion.php');
require('core/models/conexion.php');

//Estructua
//require('core/models/class.Conexion.php');
//require('core/bin/ajax/alumnos.php');
//require('core/bin/functions/Encrypt.php');
//require('core/bin/functions/cod.php');
/*require('core/bin/functions/numerotexto.php');


$users=users();
$_categorias = Categorias();
$_marcas = Marcas();
$_unidades = Unidades();
$_tipos = Tipos();
$_productos = Productos();
$_proveedores = Proveedores();
$_puntosd = Puntosd();
$_clientes = Clientes();
$_usuarios = Usuarios();*/
 ?>
