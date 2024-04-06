<?php
require_once "includes/conexion.php"; 


try{
//realiza consulta
$query = "SELECT * FROM animales";

//prepara la consulta
$stm = $pdo->prepare($query);

//ejecuta la consulta
$stm->execute();

//recoje todos los resultados en un arreglo asociado(atributo -> valor)
$resultados= $stm->fetchAll(PDO::FETCH_ASSOC);

$pdo = null;
$stm= null;
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
    <title>Document</title>
</head>
<body>

<button onclick="MEB('registro')" class="boto1">Registrar un animal </button>
    <button onclick="MEB('actualizar')" class="boto2">Actualizar el registro de un animal</button>
    <button onclick="MEB('borrar')" class="boto3">Borrar el registro de un animal</button>

<div id='agregar' style="visibility: visible;">
<div class="regispersonal">
    <form action="includes/anim/add.php" method="POST">
        <label for="Nombre" class="letrapersona2">Nombre del animal:</label>
        <input name="nom" type="text">
<br><br>
        <label for="Tipo" class="letrapersona2">¿Que animal es?</label>
        <input type="text" name="tipo">
        <br><br>
        <label for="Granja " class="letrapersona2">¿En qué granja está?</label>
        <input type="text" name="granja">
        <br><br>
        <label for="Sexo" class="letrapersona2">Sexo del animal</label>
        <input type="text" name="sex">
        <br><br>
        <label for="Edad" class="letrapersona2">¿Qué edad tiene el animal?</label>
        <input type="text" name="edad">
        <br><br>
        <label for="¿Es caso especial?" class="letrapersona2">¿Algo peculiar en el animal (enfermedades, malformaciones)?</label>
        <input type="text" name="ce">


    </form>
</div>
</div>
        
<div id='actualiza' style="visibility: visible;">
<div class="actpersonal">
    <form action="includes/anim/update.php" method="POST">

            <label for="queAnimal" class="letrapersona2">Ingresa el nombre del animal que quieres actualizar:</label>
            <input type="text">
            <br><br>
            <h6 class="letrapersona2">Aspectos que puedes actualizar/cambiar:</h6>
            <br>
            <label for="Nombre" class="letrapersona2">Nombre del animal:</label>
                    <input name="nom" type="text">
                    <br><br>
                    <label for="Tipo" class="letrapersona2">¿Que animal es?</label>
                    <input type="text" name="tipo">
                    <br><br>
                    <label for="Granja" class="letrapersona2">¿En qué granja está?</label>
                    <input type="text" name="granja">
                    <br><br>
                    <label for="Sexo" class="letrapersona2">Sexo del animal:</label>
                    <input type="text" name="sex">
                    <br><br>
                    <label for="Edad" class="letrapersona2">¿Qué edad tiene el animal?</label>
                    <input type="text" name="Edad">
                    <br><br>
                    <label for="¿Es caso especial?" class="letrapersona2">¿Algo peculiar en el animal (enfermedades, malformaciones)</label>
                    <input type="text" name="ce">

                </form>
            </div>
</div>
    
<div id='borra' style="visibility: visible;">
    <form action="includes/anim/delete.php" method="POST"></form>
    
    <div class="borrarpersonal">
    <label for="queAnimal" class="letrapersona2">Ingresa el id del animal que quieres borrar</label>
    <input type="text" name="id"><br>
</div>
</div>

<!--
            <h2>Actualizar</h2>
        <form action="includes/anim/update.php" method="POST">
            <label for="">Granja</label><br>
            <input type="text" name="granja"><br>
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
            <label for="">Granja</label><br>
            <input type="text" name="granja"><br>
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
        -->
</body>
</html>