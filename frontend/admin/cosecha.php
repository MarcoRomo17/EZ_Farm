<?php
require_once "includes/conexion.php"; 

try{
//realiza consulta
$query = "SELECT * FROM cosecha";

//prepara la consulta
$stm = $pdo->prepare($query);

//ejecuta la consulta
$stm->execute();

//recoje todos los resultados en un arreglo asociado
$resultados= $stm->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
  ?>
  
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registra cosecha</title>
</head>
<body>

<button onclick="MEB('registro')" class="boto1">Registrar una nueva cosecha</button>
    <button onclick="MEB('actualizar')" class="boto2">Actualizar informacion de una cosecha</button>
    <button onclick="MEB('borrar')" class="boto3">Borrar el registro de una cosecha</button>


<div id='agregar' style="visibility: visible;" > 
    <div class="regispersonal"> 
        <form action="includes/cos/add.php" method="POST">
            <label for="Nombre" class="letrapersona2">¿De qué es la cosecha?</label>
            <input type="text" name="nom">
            <br><br>
            <label for="Cultivado" class="letrapersona2">¿Cuánto se cosechó?</label>       
            <input type="number" name="cultivado">
            <br><br>
            <label for="Almacenado" class="letrapersona2">Lugar de almacenamineto:</label>
            <input type="number" name="almacenado">
            <br><br>
            <label for="Granja" name="granja" class="letrapersona2">¿A que granja pertenece?</label>
            <input type="text">
            <br><br>
            <label for="Semillas" class="letrapersona2">Número de semillas:</label>
            <input type="number" name="semillas">
        </div>
        </form></div>
      
    
<div id='actualiza' style="visibility: visible;">
<div class="actpersonal">
   

    <label for="" class="letrapersona2">Id de la cosecha/label>
    <input type="text" name="id" method="POST">


    <br><br>
    <h6 class="letrapersona2">Aspectos que puedes actualizar/cambiar:</h6>
    <br>
    <form action="includes/cos/update.php" method="POST">
        <label for="Nombre" class="letrapersona2">¿Qué es la cosecha?</label>
        <input type="text" name="nom">
        <br><br>
        <label for="Cultivado" class="letrapersona2">¿Cuánto se cosechó?</label>       
        <input type="number"name="cultivado">
        <br><br>
        <label for="Almacenado" class="letrapersona2">Lugar de almacenamineto</label>
        <input type="number" name="almacenado">
        <br><br>
        <label for="Granja" name="Granja" class="letrapersona2">¿A que granja pertenece?</label>
        <input type="text"name="granja">
        <br><br>
        <label for="Semillas" class="letrapersona2">Número de semillas:</label>
        <input type="number" name="semillas">
    
    </form>
    
</div>
</div>

<div id='borra' style="visibility: visible;">
   
   <form action="includes/cos/delete.php" method="POST">
    <div class="borrarpersonal">
        <label for="" class="letrapersona2">Ingresa el id de la cosecha que quieres borrar:</label>
        <input type="text" name="id">
   </form>
 
</div>
</div>
    
    <!--
    <h2>Actualizar</h2>
        <form action="includes/cos/update.php" method="POST">
            <label for="">Granja</label><br>
            <input type="text" name="granja"><br>
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
            <label for="">Granja</label><br>
            <input type="text" name="granja"><br>
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
-->
</body>
</html>