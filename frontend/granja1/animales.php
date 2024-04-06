<?php
require_once "includes/conexion.php"; 


try{
//realiza consulta
$query = "SELECT * FROM animales WHERE granjas_id=1";

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
                        <th>Tipo</th>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Sexo</th>
                        <th>Fecha</th>
                        <th>Caso_especial</th>
                        <th>   </th>
                    </tr>";
        
                    /*
                    Ciclo donde tomamos la posicion del arreglo en cada vuelta
                    y la mostramos (debe de ir acompañada del nombre de la columna de la base de datos)
                     */
                    foreach ($resultados as $fila) {
                        echo "<tr>
                                <td>" . $fila['id'] . "</td>
                                <td>" . $fila['tipo'] . "</td>
                                <td>" . $fila['nombre'] . "</td>
                                <td>" . $fila['edad'] . "</td>
                                <td>" . $fila['sexo'] . "</td>
                                <td>" . $fila['fecha'] . "</td>
                                <td>" . $fila['caso_especial'] . "</td>
                                <td>
                                <button onclick=\"location.href='includes/anim/update.php?id=" . $fila['id'] . "'\">Actualizar</button>
                                <button onclick=\"location.href='includes/anim/delete.php?id=" . $fila['id'] . "'\">Borrar</button>
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
        <form action="includes/anim/update.php" method="POST">
            <label for="">id</label><br>
            <input type="text" name="id"><br>
            <label for="">Tipo</label><br>
            <input type="text" name="tipo"><br>
            <label for="">Nombre</label><br>
            <input type="text" name="nom"><br>
            <label for="">Edad</label><br>
            <input type="text" name="edad"><br>
            <label for="">Sexo</label><br>
            <input type="text" name="sex"><br>
            <label for="">Caso especial</label><br>
            <input type="text" name="ce"><br>
            <button>Actualizar</button>

        </form>
        <h2>Añadir</h2>
        <form action="includes/anim/add.php" method="POST">
            <label for="">Tipo</label><br>
            <input type="text" name="tipo"><br>
            <label for="">Nombre</label><br>
            <input type="text" name="nom"><br>
            <label for="">Edad</label><br>
            <input type="text" name="edad"><br>
            <label for="">Sexo</label><br>
            <input type="text" name="sex"><br>
            <label for="">Caso especial</label><br>
            <input type="text" name="ce"><br>
            <button>Agregar</button>

        </form>
        <form action="includes/anim/search.php" method="POST">
            <label for="">Filtro por nombre</label>
            <input type="text" name="nom">
        </form>
    
</body>
</html>