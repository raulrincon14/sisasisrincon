<?php
ini_set('date.timezone','America/Lima');
 function Conectarse(){
  if (!($link=mysqli_connect("localhost","root","","asistenciars")))
  {echo "Error conectando a la base de datos.";
   exit();
  }
  return $link;
  mysql_close($link);
 }
 function limpiar($tags){
  $tags = strip_tags($tags);
  return $tags;
 }
?>
