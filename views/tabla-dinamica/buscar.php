<?php
	$servername = "localhost";
    $username = "root";
  	$password = "987654321";
  	$dbname = "prueba";

	$conn = new mysqli($servername, $username, $password, $dbname);
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }

    $salida = "";

    $query = "SELECT * FROM jugadores WHERE Name NOT LIKE '' ORDER By Id_no LIMIT 25";

    if (isset($_POST['consulta'])) {
    	$q = $conn->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM jugadores WHERE Id_no LIKE '%$q%' OR Name LIKE '%$q%' OR ClubName LIKE '%$q%' OR Rtg_Nat LIKE '%$q%' OR Title LIKE '$q' ";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {
    	$salida.="<table border=1 class='tabla_datos'>
    			<thead>
    				<tr id='titulo'>
    					<td>ID</td>
    					<td>JUGADOR</td>
    					<td>CLUB NAME</td>
    					<td>RATING NACIONAL</td>
    					<td>TITULO</td>
    				</tr>

    			</thead>


    	<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {
    		$salida.="<tr>
    					<td>".$fila['Id_no']."</td>
    					<td>".$fila['Name']."</td>
    					<td>".$fila['ClubName']."</td>
    					<td>".$fila['Rtg_Nat']."</td>
    					<td>".$fila['Title']."</td>
    				</tr>";

    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="NO HAY DATOS :(";
    }


    echo $salida;

    $conn->close();



?>
