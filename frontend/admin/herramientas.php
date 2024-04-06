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
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} ?>
  
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Herramientas</title>
</head>
<body>

 
<button onclick="MEB()" class="boto1">Registrar una herramienta</button>
    <button onclick="MEB()" class="boto2">Actualizar una herramienta</button>
    <button onclick="MEB()" class="boto3">Borrar una herramienta</button>


<div id='agregar' style="visibility: visible;"><form action="includes/herr/add.php" method="POST">
    <div class="regispersonal">
            <label for="Nombre" class="letrapersona2">Nombre de la herramienta:</label>
            <input type="text" name="nom">
            <br><br>
            <label for="Marca" class="letrapersona2">Marca:</label>
            <input type="text" name="marca">
            <br><br>
          
            <label for="Cantidad" class="letrapersona2">Cantidad:</label>
            <input type="number" name="cantidad">
            <br><br>

            <label for="Granja a la que pertenece" class="letrapersona2">Granja en la que está:</label>
            <input type="text" name="granja">

        </form>
    </div>
    </div>
        
    
    <div id='actualiza' style="visibility: visible;" >
    <div class="actpersonal">
        <label for="" class="letrapersona2">Ingresa el nombre de la herraminta que quieres actualizar:</label>
        <input type="text">
        <br><br>
        <h6 class="letrapersona2">Aspectos que puedes actualizar/cambiar:</h6>
        <br><br>
        <form action="includes/herr/update.php" method="POST">
            <label for="">Id del vehiculo a actualizar</label><br>
            <input type="text" name="id"><br>
           
            <label for="Nombre" class="letrapersona2">Nombre de la herramienta:</label>
            <input type="text" name="nom">
            <br><br>
            <label for="Marca" class="letrapersona2">Marca:</label>
            <input type="text" name="marca">
            <br><br>
          
            <label for="Cantidad" class="letrapersona2">Cantidad:</label>
            <input type="number" name="cantidad">
            <br><br>

            <label for="Granja a la que pertenece" class="letrapersona2">Granja en la que está:</label>
            <input type="text" name="granja">

        </form>
    </div>
    </div>
 

    <div id='borra' style="visibility: visible;">
        <form action="includes/herr/delete.php" method="POST">        <div class="borrarpersonal">
            <label for="" class="letrapersona2">Ingresa el id de la herramienta que quieres borrar:</label>
             <input type="number" name="id">
            </div></form>


    </div>
   
<!--
       <h2>Actualizar</h2>
        <form action="includes/herr/update.php" method="POST">
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
        <form action="includes/herr/add.php" method="POST">
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
        <form action="includes/herr/search.php" method="POST">
            <label for="">Filtro por nombre</label>
            <input type="text" name="nom">
        </form>
-->
</body>
</html>