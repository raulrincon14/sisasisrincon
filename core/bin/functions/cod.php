<?php
function codigo($id,$tabla,$ceros,$num){
  define('DB_HOST','localhost');
  define('DB_USER','root');
  define('DB_PASS','987654321');
  define('DB_NAME','asistenciars');
  require_once("../../models/class.Conexion.php");
  $db = new Conexion();
    $sql = $db->query("SELECT MAX(".$id.") from ".$tabla.";");
    $cod=$db->recorrer($sql)[0];
    $cod=$cod+1;
    $cod2=$ceros.$cod;
    $cod3=substr($cod2,-$num);
    return $cod3;
    $db->liberar($sql);
    $db->close();
  }
  function consultarpunto($nume,$idem){
    $db = new Conexion();
    $sql = $db->query("SELECT * FROM permiso_punto where empleado_idempleado='$idem'");
    while($data = $db->recorrer($sql)) {
      if( $data['punto_idpunto']==$nume){
      echo "checked";
      }
    }
    $db->liberar($sql);
    $db->close();
  }
  function consultaproductop($nume,$idem){
    $db = new Conexion();
    $respuesta=false;
    $sql = $db->query("select * from producto_punto where producto_idproducto='$nume' and punto_idpunto='$idem'");
    $resp=$db->rows($sql);
    if($resp<1){
      $respuesta=false;
    }else {
      $respuesta=true;
    }
    $db->liberar($sql);
    $db->close();
    return $respuesta;
  }
    function consultarpunto1($nume,$idem){
    $db = new Conexion();
    $sql = $db->query("SELECT * FROM permiso_punto where empleado_idempleado='$idem'");
    while($data = $db->recorrer($sql)) {
      if( $data['punto_idpunto']==$nume){
      echo "Asignale Permisos >>";
      }
    }
    $db->liberar($sql);
    $db->close();
  }
  function consultaper($nump,$idem,$pun){
    $db = new Conexion();
    $sql = $db->query("SELECT * FROM permisos WHERE punto_idpunto='$pun' AND empleado_idempleado='$idem'");
    while($data = $db->recorrer($sql)) {
      if( $data['menu_idmenu']==$nump){
      echo "checked";
      }
    }
    $db->liberar($sql);
    $db->close();
  }
    function consultaperch($nump,$idem,$pun){
      $db = new Conexion();
      $sql = $db->query("SELECT * from permisos WHERE punto_idpunto='$pun' AND empleado_idempleado='$idem'");
      while($data = $db->recorrer($sql)) {
        if( $data['menu_idmenu']==$nump){
        echo "<span class='fa fa-unlock-alt'>";
        }
      }
      $db->liberar($sql);
      $db->close();
  }
  function formato($valor){
		return number_format($valor,2,",",".");
	}
  function formato1($valor){
      return number_format($valor,2,".",".");
  }

  function canactual($id){
    $db = new Conexion();
        $sql = $db->query("SELECT cantidad FROM producto where idproducto='$id'");
        $db = new Conexion();
             $rowc = $db->recorrer($sql);
       $can=$rowc['cantidad'];
  return $can;
  }
  function canactuald($r1,$t){
    $db = new Conexion();
      $can=0;
      $sql="SELECT cantidadpp from producto_punto where producto_idproducto='$r1' and punto_idpunto='$t'";
      $result=$db->query($sql);
      if($row=$db->recorrer($result)){
          $can=$row['cantidadpp'];
          return $can;
      }
  return $can;
  }
  function distrip($r1,$t){
    $db = new Conexion();
      $can=false;
      $sql="SELECT * from producto_punto where producto_idproducto='$r1' and punto_idpunto='$t'";
      $sql1=$db->query($sql);
            if($row=$db->recorrer($sql1)){
          $can=true;
          return $can;
      }
  return $can;
  }
  function LimpiarCompra(){
    unset($_SESSION['carrito']);
    unset($_SESSION['Datos']);
    unset($_SESSION['ten']);
    echo "<script>location.href='?view=compra';</script>";
  }
  function limpiarDistri(){
    unset($_SESSION['distri']);
    echo "<script>location.href='?view=distribucion';</script>";
  }
  function limpiartraspaso(){
    unset($_SESSION['carritotra']);
    echo "<script>location.href='?view=traspaso';</script>";
  }
  function limpiarvc(){
    unset($_SESSION['carritovca']);
    echo "<script>location.href='?view=campo';</script>";
  }
  function limpiartras(){
    unset($_SESSION['carritotra']);
    echo "<script>location.href='?view=traspaso';</script>";
  }
  function LimpiarVenta(){
    unset($_SESSION['carritov']);
    unset($_SESSION['Datoscvc']);
    unset($_SESSION['ntotaldesvc']);
    echo "<script>location.href='?view=contado';</script>";
  }
  function LimpiarVentac(){
    unset($_SESSION['carritovc']);
    unset($_SESSION['Datosc']);
    unset($_SESSION['ntotaldes']);
    echo "<script>location.href='?view=credito';</script>";
  }
  function codigov($idp,$con){
    $db = new Conexion();
      $sql="";
          if ($con=="Nota de Venta") {
          $sql="select max(ncomprov)from venta where punto_idpunto=".$idp." and comprov='Nota de Venta'";
      }else{
  $sql="select max(ncomprov)from venta where punto_idpunto=".$idp." and comprov='Ticket Boleta' or comprov='Ticket Factura'";
      }

          $result=$db->query($sql);
           $row = $db->recorrer($result);
       $cod=$row[0]+1;
  $cod2="0000000000".$cod;
  $cod3=substr($cod2,-10);
  return $cod3;
  }
  function lahora(){
      $fecha = time ();
      $hora=date( "H:i:s" , $fecha);
      return $hora;
  }
  function lafecha(){
      $fecha = time ();
      $fecha=date ( "Y-m-d",$fecha );
      return $fecha;
  }
  function estadocaja($b){
    $db = new Conexion();
    $can=false;
    $sql="SELECT * FROM cajar where fechaca='".lafecha()."' and punto_idpunto='$b'";
    $sql1=$db->query($sql);
          if($row=$db->recorrer($sql1)){
        $can=true;
        return $can;
    }
return $can;
  }
  function estadocaja1($b){
    $db = new Conexion();
    $can=false;
    $sql="SELECT * FROM cajar where fechaca='".lafecha()."' and punto_idpunto='$b'";
    $sql1=$db->query($sql);
    $row=$db->recorrer($sql1);
          if($row['estadoca']=="Abierto"){
        $can=true;
        return $can;
    }
return $can;
  }

  function abriocaja($t){
    $db = new Conexion();
      $can=0;
      $sql="SELECT idempleado,apeem,nomem FROM empleado where idempleado='$t';";
      $result=$db->query($sql);
      if($row=$db->recorrer($result)){
          $can=$row['apeem']." ".$row['nomem'];
          return $can;
      }
  return $can;
  }
  function reportarganancia($fech,$pun,$tipo){
  $db = new Conexion();
      $can=0;
      $sql="SELECT sum(importe) FROM venta where fechav='$fech' and punto_idpunto='$pun' and tipo='$tipo'";
      $result=$db->query($sql);
      $row=$db->recorrer($result);
      $can=$row[0];
          return $can;
  }
  function qpunto($tipo){
  $db = new Conexion();
      $can=0;
      $sql="select * from punto where idpunto='$tipo'";
      $result=$db->query($sql);
      $row=$db->recorrer($result);
      $can=$row['ciudadpun'];
          return $can;
  }
  function venderono($b){
    $db = new Conexion();
    $can=false;
    if (estadocaja($b)){
        if (estadocaja1($b)){
          $can=true;
          return $can;
        }else{
          $can=false;
          return $can;
        }
    }else{
      $can=false;
      return $can;
    }
return $can;
  }
  function diaspasados($fechaque){
      $fecha1 = new DateTime(lafecha());
      $dano="año"; $dmes="mes";$ddia="dia";
      $fecha2 = new DateTime($fechaque);
  $fecha = $fecha1->diff($fecha2);
  if (($fecha->y)>1) { $dano="años";   }
  if (($fecha->m)>1) { $dmes="meses";   }
  if (($fecha->d)>1) { $ddia="dias";   }

      if(($fecha->y)<1){
          if(($fecha->m)<1){
          if(($fecha->d)<1){return $tiempo="Realizado Hoy. ";
                           }else{
      return $tiempo=$fecha->d." ".$ddia.".";
          }
              }
          if(($fecha->d)<1){
              return $tiempo=$fecha->m." ".$dmes.".";
          }else{
      return $tiempo=$fecha->m." ".$dmes." con ".$fecha->d." ".$ddia.".";
          }

      }else{
          if(($fecha->m)<1){
          return $tiempo="".$fecha->y." ".$dano.", con ".$fecha->d." días.";
      }else{
              if(($fecha->d)<1){
      return $tiempo="".$fecha->y." ".$dano.", ".$fecha->m." ".$dmes.".";    }else{
      return $tiempo="".$fecha->y." ".$dano.", ".$fecha->m." ".$dmes." con ".$fecha->d." ".$ddia.".";          }
      }}
  }
 ?>
