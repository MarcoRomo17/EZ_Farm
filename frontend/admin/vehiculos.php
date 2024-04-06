<?php
require_once "includes/conexion.php"; 

try{
//realiza consulta
$query = "SELECT * FROM vehiculos";

//prepara la consulta
$stm = $pdo->prepare($query);

//ejecuta la consulta
$stm->execute();

//recoje todos los resultados en un arreglo asociado
$resultados= $stm->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} ?>
  
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de un vehiculo</title>
</head>
<body>

  
<button onclick="MEB()" class="boto1">Registrar un vehiculo</button>
    <button onclick="MEB()" class="boto2">Actualizar el registro de un vehiculo</button>
    <button onclick="MEB()" class="boto3">Borrar el registro de un vehiculo</button>

<div id='agregar' style="visibility: visible;"></div>
<div class="regispersonal">
        <form action="includes/vehi/add.php" method="POST">
            <label for="Nombre" class="letrapersona2">Nombre o forma de indentificar al vehiculo:</label>
            <input type="text" name="nom">
            <br><br>
            <label for="Marca" class="letrapersona2">Marca del vehículo:</label>
            <input type="text" name="marca">
            <br><br>
            <label for="Cantidad" class="letrapersona2">Cantidad que se va a registrar:</label>
            <input type="text" name="cantidad">
            <br><br>
            <label for="Granja" class="letrapersona2">Granja a la que pertenece:</label>
            <input type="text" name="granja">
            <br><br>
           

        </form>
    </div>

    <div id='actualiza' style="visibility: visible;">
    <div class="actpersonal">
        <label for="queAnimal" class="letrapersona2">Ingresa el nombre de la herraminta que quieres actualizar:</label>
        <input type="text"><br>
        <h1>Aspectos que puedes actualizar/cambiar:</h1>
    
        <form action="includes/vehi/update.php" method="POST">
            <label for="Nombre" class="letrapersona2">Nombre o forma de indentificar al vehiculo:</label>
            <input type="text" name="nombre">
            <br><br>
            <label for="Marca" class="letrapersona2">Marca del vehículo:</label>
            <input type="text" name="marca">
            <br><br>
            <label for="Cantidad" class="letrapersona2">Cantidad que se va a registrar:</label>
            <input type="text" name="Cantidad">
            <br><br>
            <label for="Granja" class="letrapersona2">Granja a la que pertenece:</label>
            <input type="text" name="granja">
 
        </form>
    </div>
    </div>
    <div id='borra' style="visibility: hidden;">
    
     <div class="borrarpersonal">    <form action="includes/vehi/delete.php" method="POST"> 
        <label for="" class="letrapersona2">Ingresa el id de el vehiculo que quieres borrar:</label>
        <input type="text" nom="id"></form>
  
    </div>
    </div>


<!--  
       <h2>Actualizar</h2>
        <form action="includes/vehi/update.php" method="POST">
            <label for="">Granja</label><br>
            <input type="text" name="granja"><br>
            <label for="">id</label><br>
            <input type="text" name="id"><br>
            <label for="">Nombre</label><br>
            <input type="text" name="nom"><br>
            <label for="">Marca</label><br>
            <input type="text" name="marca"><br>
            <label for="">Cantidad</label><br>
            <input type="text" name="cantidad"><br>
            <button>Actualizar</button>

        </form>
        <h2>Añadir</h2>
        <form action="includes/vehi/add.php" method="POST">
            <label for="">Granja</label><br>
            <input type="text" name="granja"><br>
            <label for="">Nombre</label><br>
            <input type="text" name="nom"><br>
            <label for="">Marca</label><br>
            <input type="text" name="marca"><br>
            <label for="">Cantidad</label><br>
            <input type="text" name="cantidad"><br>
            <button>Agregar</button>

        </form>
        <form action="includes/vehi/search.php" method="POST">
            <label for="">Filtro por nombre</label>
            <input type="text" name="nom">
        </form>
-->
</body>
</html>