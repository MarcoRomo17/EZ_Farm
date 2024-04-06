<?php
require_once "../conexion.php"; 


if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $nom= $_POST['nom'];

try{
//realiza consulta
$query = "SELECT * FROM reportes WHERE nombre=:nom AND id_granjas=1";

//prepara la consulta
$stm = $pdo->prepare($query);

$stm->bindParam(':nom', $nom);
//ejecuta la consulta
$stm->execute();

//recoje todos los resultados en un arreglo asociado(atributo -> valor)
$resultados1= $stm->fetchAll(PDO::FETCH_ASSOC);

$pdo = null;
$stm= null;
if (!empty($resultados1)) {
    echo "<table>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Appat</th>
                <th>Asunto</th>
                <th>Descripcion</th>
                <th>Fecha</th>
                <th>   </th>
            </tr>";

            /*
            Ciclo donde tomamos la posicion del arreglo en cada vuelta
            y la mostramos (debe de ir acompañada del nombre de la columna de la base de datos)
             */
            foreach ($resultados1 as $fila) {
                echo "<tr>
                        <td>" . $fila['id'] . "</td>
                        <td>" . $fila['nombre'] . "</td>
                        <td>" . $fila['appat'] . "</td>
                        <td>" . $fila['asunto'] . "</td>
                        <td>" . $fila['descripcion'] . "</td>
                        <td>" . $fila['fecha'] . "</td>
                        </tr>";
            }
    
            echo "</table>";
            
        } else {
            echo "No hay registros para mostrar.";
        }
} catch (PDOException $e) {
    echo "Error al actualizar el registro: " . $e->getMessage();
}
}else{
    header("../../reportes.php");
}