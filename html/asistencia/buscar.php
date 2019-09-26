<?php
$db = new Conexion();
//74887172
$salida="";
//$q = $conn->real_escape_string($_POST['consulta']);

if (isset($_POST['consulta'])) {
  $q = $_POST['consulta'];
  $q=trim($q);
  $q1=strlen($q);
  $fecha = time ();
  $hora=date( "H:i:s" , $fecha);
  $fecha=date( "Y-m-d",$fecha );
    //VER SI ASISTIO
$estado="bien";

  $pa=$db->query("SELECT * FROM alumno WHERE idalumno='$q';");
                      $row=$db->recorrer($pa);

                      $idalum=$row['idalumno'];
                      $idalum;
                      $asis=$db->query("SELECT * FROM asistencia_alumno where a_fecha='$fecha' and alumno_idalumno='$idalum';");
                      if ($db->recorrer($asis)) {
                      $salida="<h5><img src='views/images/check.png' width='2'> asistencia registrada</h5>";
                    }else {
                    $db->query("INSERT INTO asistencia_alumno value ('$fecha','$hora','$estado','$idalum')");

                      $salida="<h5><img src='views/images/check.png'> asistencia registrada</h5>";
                    }

                      $salida.="<center>";
                      if (is_file('views/images/alumnosfoto/'.$q.'.jpg')) {
                        $salida.='<img src="views/images/alumnosfoto/'.$q.'.jpg" border="0" width="50%">';
                      } else {
                        $salida.='<img src="views/images/alumnosfoto/sinfoto.png" border="0" width="50">';
                      }
                      $salida.="</center><h5>ALUMNO</h5>";
                      $salida.=$row['a_apellido']." ".$row['a_nombre'];
                      $salida.="<h5>".$row['a_grado'].' "'.$row['a_seccion'].'" de '.$row['a_nivel'].'</h5>';
}else {
  $salida="No hay datos";// code...
}

echo $salida;
 ?>
