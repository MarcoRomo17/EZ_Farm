<?php
require_once "../conexion.php"; 


if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $nom= $_POST['nom'];

try{
//realiza consulta
$query = "SELECT * FROM empleados WHERE nombre=:nom AND granjas_id=1";

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
                <th>Edad</th>
                <th>Sexo</th>
                <th>Puesto</th>
                <th>Salario</th>
                <th>Fecha</th>
                <th>Email</th>
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
                        <td>" . $fila['edad'] . "</td>
                        <td>" . $fila['sexo'] . "</td>
                        <td>" . $fila['puesto'] . "</td>
                        <td>" . $fila['salario'] . "</td>
                        <td>" . $fila['email'] . "</td>
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
    header("../../empleados.php");
}