<?php
require_once "includes/conexion.php"; 

try{
//realiza consulta
$query = "SELECT * FROM cosecha WHERE granjas_id=2";

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
                        <th>Cultivado</th>
                        <th>Almacenado</th>
                        <th>Semillas</th>
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
                                <td>" . $fila['cultivado'] . "</td>
                                <td>" . $fila['almacenado'] . "</td>
                                <td>" . $fila['semillas'] . "</td>
                                <td>" . $fila['fecha'] . "</td>
                                
                                <td>
                                <button onclick=\"location.href='includes/cos/update.php?id=" . $fila['id'] . "'\">Actualizar</button>
                                <button onclick=\"location.href='includes/cos/delete.php?id=" . $fila['id'] . "'\">Borrar</button>
                              
                                
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
    
    <h2>Actualizar</h2>
        <form action="includes/cos/update.php" method="POST">
            <label for="">id</label><br>
            <input type="text" name="id"><br>

            <label for="">Nombre</label><br>
            <input type="text" name="nom"><br>
            <label for="">Cultivado</label><br>
            <input type="text" name="cultivado"><br>
            <label for="">Almacenado</label><br>
            <input type="text" name="almacenado"><br>
            <label for="">Semillas</label><br>
            <input type="text" name="semillas"><br>
            <button>Actualizar</button>

        </form>
        <h2>Añadir</h2>
        <form action="includes/cos/add.php" method="POST">
            <label for="">Nombre</label><br>
            <input type="text" name="nom"><br>
            <label for="">Cultivado</label><br>
            <input type="text" name="cultivado"><br>
            <label for="">Almacenado</label><br>
            <input type="text" name="almacenado"><br>
            <label for="">Semillas</label><br>
            <input type="text" name="semillas"><br>
            <button>Agregar</button>

        </form>
        <form action="includes/cos/search.php" method="POST">
            <label for="">Filtro por nombre</label>
            <input type="text" name="nom">
        </form>
    
</body>
</html>