<?php
require_once "includes/conexion.php"; 


try{
//realiza consulta
$query = "SELECT * FROM granjas WHERE id=1";
$upd= "UPDATE granjas SET animales = (SELECT COUNT(*) FROM animales WHERE granjas_id=1) WHERE id=1";

//prepara la consulta
$recanim="SELECT * FROM animales
WHERE fecha >= CURDATE() - INTERVAL 1 DAY and granjas_id=1";
$recose="SELECT * FROM cosecha
WHERE fecha >= CURDATE() - INTERVAL 1 DAY and granjas_id=1";
$recemp="SELECT * FROM empleados
WHERE fecha >= CURDATE() - INTERVAL 1 DAY and granjas_id=1";
$recher="SELECT * FROM herramientas
WHERE fecha >= CURDATE() - INTERVAL 1 DAY and granjas_id=1";
$recvehi="SELECT * FROM vehiculos
WHERE fecha >= CURDATE() - INTERVAL 1 DAY and granjas_id=1 ";
$recrep="SELECT * FROM reportes
WHERE fecha >= CURDATE() - INTERVAL 1 DAY and id_granjas=1 ";


//prepara la consulta
$stm = $pdo->prepare($query);
$rec1= $pdo->prepare($recanim);
$rec2= $pdo->prepare($recose);
$rec3= $pdo->prepare($recemp);
$rec4= $pdo->prepare($recher);
$rec5= $pdo->prepare($recvehi);
$rec6= $pdo->prepare($recrep);
$stmt1 = $pdo->prepare($upd);


//ejecuta la consulta
$stm->execute();
$rec1->execute();
$rec2->execute();
$rec3->execute();
$rec4->execute();
$rec5->execute();
$rec6->execute();
$stmt1->execute();
//recoje todos los resultados en un arreglo asociado
$resultados= $stm->fetchAll(PDO::FETCH_ASSOC);
$animales= $rec1->fetchAll(PDO::FETCH_ASSOC);
$cosecha= $rec2->fetchAll(PDO::FETCH_ASSOC);
$empleados= $rec3->fetchAll(PDO::FETCH_ASSOC);
$herramientas= $rec4->fetchAll(PDO::FETCH_ASSOC);
$vehiculos= $rec5->fetchAll(PDO::FETCH_ASSOC);
$reportes= $rec6->fetchAll(PDO::FETCH_ASSOC);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


</head>
<body>

<table>
    <tr>
        <td> <a href="animales.php">Animales</a></td>
    </tr>
    <tr>
        <td><a href="cosecha.php">Cosecha</a></td>
    </tr>
    <tr>
        <td><a href="empleados.php">Empleados</a></td>
    </tr>
    <tr>
        <td><a href="herramientas.php">Herramientas</a></td>
    </tr>
    <tr>
        <td><a href="vehiculos.php">Vehiculos</a></td>
    </tr>
    <tr>
        <td><a href="Reportes.php">Reportes</a></td>
    </tr>
   
</table>

<?php 
   // Mostrar los datos en una tabla
        //fachada
        if (!empty($resultados)) {
            echo "<table>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Encargado</th>
                        <th>Ubicacion</th>
                        <th>Empleados</th>
                        <th>Animales</th>
                        <th>cosecha</th>
                        <th>Vehiculos</th>
                        <th>Herramientas</th>
                    </tr>";
        
                    /*
                    Ciclo donde tomamos la posicion del arreglo en cada vuelta
                    y la mostramos (debe de ir acompañada del nombre de la columna de la base de datos)
                     */
                    foreach ($resultados as $fila) {
                        echo "<tr>
                                
                                <td>" . $fila['id'] . "</td>
                                <td>" . $fila['nombre'] . "</td>
                                <td>" . $fila['encargado'] . "</td>
                                <td>" . $fila['ubicacion'] . "</td>
                                <td>" . $fila['empleados'] . "</td>
                                <td>" . $fila['animales'] . "</td>
                                <td>" . $fila['cosecha'] . "</td>
                                <td>" . $fila['vehiculos'] . "</td>
                                <td>" . $fila['herramientas'] . "</td>
                                
                              </tr>";
                    }
            
                    echo "</table>";
                } else {
                    echo "No hay registros para mostrar.";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            echo "<table>
            <tr>
            <th>Granjas</th>
                <th>Id</th>
                <th>Tipo</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Sexo</th>
                <th>Fecha</th>
                <th>Caso_especial</th>
                <th>   </th>
            </tr>";


            foreach ($animales as $fila) {
                echo "<tr>
                        <td>" . $fila['granjas_id'] . "</td>
                        <td>" . $fila['id'] . "</td>
                        <td>" . $fila['tipo'] . "</td>
                        <td>" . $fila['nombre'] . "</td>
                        <td>" . $fila['edad'] . "</td>
                        <td>" . $fila['sexo'] . "</td>
                        <td>" . $fila['fecha'] . "</td>
                        <td>" . $fila['caso_especial'] . "</td>
                        <td>
                        
                      </tr>";
                     }
                     echo "</table>";

    
                     echo "<table>
                     <tr>
                         <th>Granjas</th>
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
                     foreach ($cosecha as $fila) {
                         echo "<tr>
                                 <td>" . $fila['granjas_id'] . "</td>
                                 <td>" . $fila['id'] . "</td>
                                 <td>" . $fila['nombre'] . "</td>
                                 <td>" . $fila['cultivado'] . "</td>
                                 <td>" . $fila['almacenado'] . "</td>
                                 <td>" . $fila['semillas'] . "</td>
                                 <td>" . $fila['fecha'] . "</td>

                                 
                               </tr>";
                                 
                     }
             
                     echo "</table>";
                     echo "<table>
                     <tr>
                          <th>Granjas</th>
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
                     foreach ($empleados as $fila) {
                         echo "<tr>
                               <td>" . $fila['granjas_id'] . "</td>
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
                     echo "<table>
                     <tr>
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
                     foreach ($herramientas as $fila) {
                         echo "<tr>
                                 <td>" . $fila['granjas_id'] . "</td>
                                 <td>" . $fila['id'] . "</td>
                                 <td>" . $fila['nombre'] . "</td>
                                 <td>" . $fila['marca'] . "</td>
                                 <td>" . $fila['cantidad'] . "</td>
                                 <td>" . $fila['fecha'] . "</td>
                                 
                               </tr>";
                     }
             
                     echo "</table>";
                     echo "<table>
                     <tr>
                         <th>Granjas</th>
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
                     foreach ($reportes as $fila) {
                         echo "<tr>
                                  <td>" . $fila['id_granjas'] . "</td>
                                 <td>" . $fila['id'] . "</td>
                                 <td>" . $fila['nombre'] . "</td>
                                 <td>" . $fila['appat'] . "</td>
                                 <td>" . $fila['asunto'] . "</td>
                                 <td>" . $fila['descripcion'] . "</td>
                                 <td>" . $fila['fecha'] . "</td>
                                 </tr>";
                     }
             
                     echo "</table>";
                     echo "<table>
                     <tr>
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
                     foreach ($vehiculos as $fila) {
                         echo "<tr>
                                <td>" . $fila['granjas_id'] . "</td>
                                 <td>" . $fila['id'] . "</td>
                                 <td>" . $fila['nombre'] . "</td>
                                 <td>" . $fila['marca'] . "</td>
                                 <td>" . $fila['cantidad'] . "</td>
                                 <td>" . $fila['fecha'] . "</td>
                            
                               </tr>";
                     }
             
                     echo "</table>";



?>

    
</body>
</html>