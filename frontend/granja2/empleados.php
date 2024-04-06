<?php
require_once "includes/conexion.php"; 

try{
//realiza consulta
$query = "SELECT * FROM empleados WHERE granjas_id=2";

//prepara la consulta
$stm = $pdo->prepare($query);

//ejecuta la consulta
$stm->execute();

//recoje todos los resultados en un arreglo asociado
$resultados= $stm->fetchAll(PDO::FETCH_ASSOC);
  ?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
   // Muestra los datos en una tabla
        //fachada
        if (!empty($resultados)) {
            echo "<table>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>APPAT</th>
                        <th>APMAT</th>
                        <th>Edad</th>
                        <th>Sexo</th>
                        <th>Puesto</th>
                        <th>Salario</th>
                        <th>Email</th>
                        <th>Fecha</th>
                    </tr>";
        
                    /*
                    Ciclo donde tomamos la posicion del arreglo en cada vuelta
                    y la mostramos (debe de ir acompañada del nombre de la columna de la base de datos)
                     */
                    foreach ($resultados as $fila) {
                        echo "<tr>
                                <td>" . $fila['id'] . "</td>
                                <td>" . $fila['nombre'] . "</td>
                                <td>" . $fila['appat'] . "</td>
                                <td>" . $fila['apmat'] . "</td>
                                <td>" . $fila['edad'] . "</td>
                                <td>" . $fila['sexo'] . "</td>
                                <td>" . $fila['puesto'] . "</td>
                                <td>" . $fila['salario'] . "</td>
                                <td>" . $fila['email'] . "</td>
                                <td>" . $fila['fecha'] . "</td>

                                
                              </tr>";
                    }
            
                    echo "</table>";
                } else {
                    echo "No hay registros para mostrar.";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
    ?>

        <form action="includes/emp/search.php" method="POST">
            <label for="">Filtro por nombre</label>
            <input type="text" name="nom">
        </form>
    
</body>
</html>