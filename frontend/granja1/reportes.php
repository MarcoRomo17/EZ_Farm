<?php
require_once "includes/conexion.php"; 


try{
//realiza consulta
$query = "SELECT * FROM reportes WHERE id_granjas=1";

//prepara la consulta
$stm = $pdo->prepare($query);

//ejecuta la consulta
$stm->execute();

//recoje todos los resultados en un arreglo asociado(atributo -> valor)
$resultados= $stm->fetchAll(PDO::FETCH_ASSOC);

$pdo = null;
$stm= null;
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
                        <th>Appat</th>
                        <th>Asunto</th>
                        <th>Descripcion</th>
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
                                <td>" . $fila['asunto'] . "</td>
                                <td>" . $fila['descripcion'] . "</td>
                                <td>" . $fila['fecha'] . "</td>
                                <td>
                                <button onclick=\"location.href='includes/anim/update.php?id=" . $fila['id'] . "'\">Actualizar</button>
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


        </form>
        <h2>Añadir</h2>
        <form action="includes/rep/add.php" method="POST">
            <label for="">Nombre</label><br>
            <input type="text" name="nom"><br>
            <label for="">Appat</label><br>
            <input type="text" name="appat"><br>
            <label for="">Asunto</label><br>
            <input type="text" name="asunto"><br>
            <label for="">Descripcion</label><br>
            <input type="text" name="desc"><br>
            <button>Agregar</button>

        </form>
        <form action="includes/rep/search.php" method="POST">
            <label for="">Filtro por nombre</label>
            <input type="text" name="nom">
        </form>
    
</body>
</html>