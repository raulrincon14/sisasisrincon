<?php

   //conexión a la base de datos
require_once("../../models/conexion.php");
require_once("../../bin/functions/cod.php");
   class Alumno extends Conectar{



       public function get_filas_alumno(){

         $conectar= parent::conexion();

             $sql="select * from alumno";

             $sql=$conectar->prepare($sql);

             $sql->execute();

             $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);

             return $sql->rowCount();

        }


      //método para seleccionar registros

   	   public function get_alumnos(){

   	   	  $conectar=parent::conexion();
   	   	  parent::set_names();

   	   	  $sql="select * from alumno";

   	   	  $sql=$conectar->prepare($sql);
   	   	  $sql->execute();

   	   	  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
   	   }

   	    //método para insertar registros

        public function registrar_alumno($idalumno,$apellido,$nombre,$dni,$fn,$nivel,$grado,$seccion,$duplicado,$estado){

           $conectar= parent::conexion();
           parent::set_names();

           $id="idalumno";$tbl="alumno";$cro="000000";$nu="6";
           $cg=codigo($id,$tbl,$cro,$nu);

           $sql="insert into alumno
           values(?,?,?,?,?,?,?,?,?,null,?);";


            $sql=$conectar->prepare($sql);

            $sql->bindValue(1, $cg);
            $sql->bindValue(2, $_POST["apellido"]);
            $sql->bindValue(3, $_POST["nombre"]);
            $sql->bindValue(4, $_POST["dni"]);
            $sql->bindValue(5, $_POST["fn"]);
            $sql->bindValue(6, $_POST["nivel"]);
            $sql->bindValue(7, $_POST["grado"]);
            $sql->bindValue(8, $_POST["seccion"]);
            $sql->bindValue(9, $_POST["duplicado"]);
            $sql->bindValue(10, $_POST["estado"]);
            $sql->execute();



        }

        //método para mostrar los datos de un registro a modificar
        public function get_alumno_por_id($cedula){


              $conectar= parent::conexion();
              parent::set_names();

              $sql="select * from alumno where a_dni=?";

              $sql=$conectar->prepare($sql);

              $sql->bindValue(1, $cedula);
              $sql->execute();
              return $resultado=$sql->fetchAll();
          }


         //este metodo es para validar el id del proveedor(luego llamamos el metodo de editar_estado())
        //el id_proveedor se envia por ajax cuando se editar el boton cambiar estado y que se ejecuta el evento onclick y llama la funcion de javascript
        public function get_proveedor_por_id($id_proveedor){

          $conectar= parent::conexion();

          //$output = array();

          $sql="select * from proveedor where id_proveedor=?";

                $sql=$conectar->prepare($sql);

                $sql->bindValue(1, $id_proveedor);
                $sql->execute();

                return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);


        }



        /*metodo que valida si hay registros activos*/
        public function get_proveedor_por_id_estado($id_proveedor,$estado){

         $conectar= parent::conexion();

         //declaramos que el estado esté activo, igual a 1

         $estado=1;


        $sql="select * from proveedor where id_proveedor=? and estado=?";

              $sql=$conectar->prepare($sql);

              $sql->bindValue(1, $id_proveedor);
               $sql->bindValue(2, $estado);
              $sql->execute();

              return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);


         }


         public function editar_alumno($idalumno,$apellido,$nombre,$dni,$fn,$nivel,$grado,$seccion,$duplicado,$estado){

              	$conectar=parent::conexion();
              	parent::set_names();
               require_once("class.Alumnos.php");
               $alumno = new Alumno();
                 //si la cedula del proveedor NO tiene registros asociados en las tablas compras y detalle_compras entonces se puede editar el proveedor completo


                //si el proveedor tiene registros asociados en compras y detalle_compras entonces no se edita el la cedula del proveedor y la razon social

                 $sql="update alumno set

                     a_apellido=?,
                     a_nombre=?,
                     a_fn=?,
                     a_nivel=?,
                     a_grado=?,
                     a_seccion=?,
                     a_duplicado=?,
                     a_estado=?
                     where
                     a_dni=?
                        ";

                      $sql=$conectar->prepare($sql);


                       $sql->bindValue(1, $_POST["apellido"]);
                       $sql->bindValue(2, $_POST["nombre"]);
                       $sql->bindValue(3, $_POST["fn"]);
                       $sql->bindValue(4, $_POST["nivel"]);
                       $sql->bindValue(5, $_POST["grado"]);
                       $sql->bindValue(6, $_POST["seccion"]);
                       $sql->bindValue(7, $_POST["duplicado"]);
                       $sql->bindValue(8, $_POST["estado"]);
                       $sql->bindValue(9, $_POST["idalumno"]);
                       $sql->execute();

              }



         //método si el proveedor existe en la base de datos
        //valida si existe la cedula, proveedor o correo, si existe entonces se hace el registro del proveedor
        public function get_datos_alumno($dni){

           $conectar=parent::conexion();

          $sql="select * from alumno where a_dnia=?";

           //echo $sql; exit();

           $sql=$conectar->prepare($sql);

            $sql->bindValue(1, $dni);
            $sql->execute();

           //print_r($email); exit();

           return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }


          //método para activar Y/0 desactivar el estado del proveedor

        public function editar_estado($id_proveedor,$estado){

        	 $conectar=parent::conexion();

        	 //si el estado es igual a 0 entonces el estado cambia a 1
        	 //el parametro est se envia por via ajax
        	 if($_POST["est"]=="0"){

        	   $estado=1;

        	 } else {

        	 	 $estado=0;
        	 }

        	 $sql="update proveedor set

              estado=?
              where
              id_proveedor=?

        	 ";

        	 $sql=$conectar->prepare($sql);

        	 $sql->bindValue(1,$estado);
        	 $sql->bindValue(2,$id_proveedor);
        	 $sql->execute();
        }


         public function eliminar_proveedor($id_proveedor){

              $conectar=parent::conexion();

              $sql="delete from proveedor where id_proveedor=?";

              $sql=$conectar->prepare($sql);

              $sql->bindValue(1, $id_proveedor);
              $sql->execute();

              return $resultado=$sql->fetch(PDO::FETCH_ASSOC);
      }


        public function get_proveedor_por_id_usuario($id_usuario){

           $conectar= parent::conexion();


           $sql="select * from proveedor where id_usuario=?";

            $sql=$conectar->prepare($sql);

            $sql->bindValue(1, $id_usuario);
            $sql->execute();

            return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);


      }


        //consulta si la cedula del proveedor tiene una compra asociada
       public function get_proveedor_por_cedula_compras($cedula_proveedor){


             $conectar=parent::conexion();
             parent::set_names();


          $sql="select p.cedula,c.cedula_proveedor

           from proveedor p

              INNER JOIN compras c ON p.cedula=c.cedula_proveedor


              where p.cedula=?

              ";

             $sql=$conectar->prepare($sql);
             $sql->bindValue(1,$cedula_proveedor);
             $sql->execute();

             return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

    }


      //consulta si la cedula del proveedor tiene un detalle_compra asociado
      public function get_proveedor_por_cedula_detalle_compras($cedula_proveedor){

            $conectar=parent::conexion();
             parent::set_names();


           $sql="select p.cedula,d.cedula_proveedor
           from producto p

              INNER JOIN detalle_compras c ON p.cedula=d.cedula_proveedor


              where p.cedula=?

              ";

             $sql=$conectar->prepare($sql);
             $sql->bindValue(1,$cedula_proveedor);
             $sql->execute();

             return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);


       }





}


?>
