<?php
require_once "includes/conexion.php"; 

try{
//realiza consulta
$query = "SELECT * FROM granjas";
$anm= "UPDATE granjas SET animales = (SELECT COUNT(*) FROM animales WHERE granjas_id=1) WHERE id=1";
$anm2= "UPDATE granjas SET animales = (SELECT COUNT(*) FROM animales WHERE granjas_id=2) WHERE id=2";
$anm3= "UPDATE granjas SET animales = (SELECT COUNT(*) FROM animales WHERE granjas_id=3) WHERE id=3";
$cos= "UPDATE granjas SET cosecha = (SELECT COUNT(*) FROM cosecha WHERE granjas_id=1) WHERE id=1";
$cos2= "UPDATE granjas SET cosecha = (SELECT COUNT(*) FROM cosecha WHERE granjas_id=2) WHERE id=2";
$cos3= "UPDATE granjas SET cosecha = (SELECT COUNT(*) FROM cosecha WHERE granjas_id=3) WHERE id=3";
$herr= "UPDATE granjas SET herramientas = (SELECT COUNT(*) FROM herramientas WHERE granjas_id=1) WHERE id=1";
$herr2= "UPDATE granjas SET herramientas = (SELECT COUNT(*) FROM herramientas WHERE granjas_id=2) WHERE id=2";
$herr3= "UPDATE granjas SET herramientas = (SELECT COUNT(*) FROM herramientas WHERE granjas_id=3) WHERE id=3";
$emp= "UPDATE granjas SET empleados = (SELECT COUNT(*) FROM empleados WHERE granjas_id=1) WHERE id=1";
$emp2= "UPDATE granjas SET empleados = (SELECT COUNT(*) FROM empleados WHERE granjas_id=2) WHERE id=2";
$emp3= "UPDATE granjas SET empleados = (SELECT COUNT(*) FROM empleados WHERE granjas_id=3) WHERE id=3";
$veh= "UPDATE granjas SET vehiculos = (SELECT COUNT(*) FROM vehiculos WHERE granjas_id=1) WHERE id=1";
$veh2= "UPDATE granjas SET vehiculos = (SELECT COUNT(*) FROM vehiculos WHERE granjas_id=2) WHERE id=2";
$veh3= "UPDATE granjas SET vehiculos = (SELECT COUNT(*) FROM vehiculos WHERE granjas_id=3) WHERE id=3";

$recanim="SELECT * FROM animales
WHERE fecha >= CURDATE() - INTERVAL 1 DAY;";
$recose="SELECT * FROM cosecha
WHERE fecha >= CURDATE() - INTERVAL 1 DAY;";
$recemp="SELECT * FROM empleados
WHERE fecha >= CURDATE() - INTERVAL 1 DAY;";
$recher="SELECT * FROM herramientas
WHERE fecha >= CURDATE() - INTERVAL 1 DAY;";
$recvehi="SELECT * FROM vehiculos
WHERE fecha >= CURDATE() - INTERVAL 1 DAY;";
$recrep="SELECT * FROM reportes
WHERE fecha >= CURDATE() - INTERVAL 1 DAY;";


//prepara la consulta
$stm = $pdo->prepare($query);
$anim1 = $pdo->prepare($anm);
$anim2 = $pdo->prepare($anm2);
$anim3 = $pdo->prepare($anm3);
$cos1 = $pdo->prepare($cos);
$cos2 = $pdo->prepare($cos2);
$cos3 = $pdo->prepare($cos3);
$herr1 = $pdo->prepare($herr);
$herr2 = $pdo->prepare($herr2);
$herr3 = $pdo->prepare($herr3);
$emp1 = $pdo->prepare($emp);
$emp2 = $pdo->prepare($emp2);
$emp3 = $pdo->prepare($emp3);
$veh1 = $pdo->prepare($veh);
$veh2 = $pdo->prepare($veh2);
$veh3 = $pdo->prepare($veh3);
$rec1= $pdo->prepare($recanim);
$rec2= $pdo->prepare($recose);
$rec3= $pdo->prepare($recemp);
$rec4= $pdo->prepare($recher);
$rec5= $pdo->prepare($recvehi);
$rec6= $pdo->prepare($recrep);


//ejecuta la consulta
$stm->execute();
$anim1->execute();
$anim2  ->execute();
$anim3 ->execute(); 
$cos1 ->execute(); 
$cos2 ->execute(); 
$cos3  ->execute();
$herr1 ->execute(); 
$herr2  ->execute();
$herr3  ->execute();
$emp1 ->execute();
$emp2  ->execute();
$emp3  ->execute();
$veh1  ->execute();
$veh2  ->execute();
$veh3  ->execute();

$rec1->execute();
$rec2->execute();
$rec3->execute();
$rec4->execute();
$rec5->execute();
$rec6->execute();


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