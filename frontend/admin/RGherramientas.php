<?php
require_once "includes/conexion.php"; 

try{
//realiza consulta
$query = "SELECT * FROM herramientas ";

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
    <link rel="stylesheet" type="text/css" href="estilos.css" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de herramientas actuales</title>
</head>
<body>
<h1>Registro de herramientas actuales</h1>
    <?php
   // Muestra los datos en una tabla
        //fachada
        if (!empty($resultados)) {
            echo "<table class='TablaDeReporte'>
                    <tr >
                        <th>Granjas</th>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>marca</th>
                        <th>Cantidad</th>
                        <th>Fecha</th>
                    </tr>";
        
                    /*
                    Ciclo donde tomamos la posicion del arreglo en cada vuelta
                    y la mostramos (debe de ir acompañada del nombre de la columna de la base de datos)
                     */
                    foreach ($resultados as $fila) {
                        echo "<tr>
                                <td>" . $fila['granjas_id'] . "</td>
                                <td>" . $fila['id'] . "</td>
                                <td>" . $fila['nombre'] . "</td>
                                <td>" . $fila['marca'] . "</td>
                                <td>" . $fila['cantidad'] . "</td>
                                <td>" . $fila['fecha'] . "</td>
                                <td>
                                <button onclick=\"location.href='includes/anim/update.php?id=" . $fila['id'] . "'\">Actualizar</button>
                                <button onclick=\"location.href='includes/herr/delete.php?id=" . $fila['id'] . "'\">Borrar</button>
                              
                                
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