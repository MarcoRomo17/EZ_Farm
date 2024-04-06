<?php
require_once "includes/conexion.php"; 

try{
//realiza consulta
$query = "SELECT * FROM empleados ";

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
    <title>Registro de Personal</title>
</head>
<body>

<button onclick="MEB()" class="boto1">Registrar un Empleado</button>
    <button onclick="MEB()" class="boto2">Actualizar el registro de un empleado</button>
    <button onclick="MEB()" class="boto3">Borrar el registro de un empleado</button>


<div id='agregar' style="visibility: visible;"><form action="">
    <div class="regispersonal">
            <label for="Nombre" class="letrapersona2">Nombre(s) del empleado:</label>
            <input type="text" name="nom">
<br><br>
            <label for="AP" class="letrapersona2">Apellido paterno:</label>
            <input type="text" name="appat">
<br><br>
            <label for="AM" class="letrapersona2">Appellido materno:</label>
            <input type="text" name="apmat">
<br><br>
            <label for="Granja" class="letrapersona2">Granja en la que trabajará:</label>
            <input type="text" name="granja">
<br><br>
            <label for="Sexo" class="letrapersona2">Sexo:</label>
            <input type="text" name="sex">
<br><br>
            <label for="Edad" class="letrapersona2">Edad del empleado:</label>
            <input type="text" name="edad">
<br><br>
            <label for="Puesto" class="letrapersona2">Puesto que tendra:</label>
            <input type="text" name="puesto">
<br><br>
            <label for="Salario" class="letrapersona2">Salario del empleado por semana:</label>
            <input type="text" name="salario">
<br><br>
            <label for="E-mail" class="letrapersona2">E-mail que tenfrá el trabajador:</label>
            <input type="text" name="email">
            <label for="E-mail" class="letrapersona2">Contraseña que tenfrá el trabajador:</label>
            <input type="text" name="pass">
        </div>
        </form></div>
        
    
    <div id='actualiza' style="visibility: visible;">
        <div class="actpersonal">
        <form action="includes/emp/update.php" method="POST">
        <label for="queAnimal" class="letrapersona2">Ingresa el id de el empleado que quieres actualizar:</label>
        <input type="number" name="id">
        <br>
        <h6 class="letrapersona2">Aspectos que puedes actualizar/cambiar:</h6>
        <br>
      
            <label for="Nombre" class="letrapersona2">Nombre(s) del empleado:</label>
            <input type="text" name="nom">
            <br><br>
            <label for="AP" class="letrapersona2">Apellido paterno:</label>
            <input type="text" name="appat">
            <br><br>
            <label for="AM" class="letrapersona2">Appellido materno:</label>
            <input type="text" name="apmat">
            <br><br>
            <label for="Granja" class="letrapersona2">Granja en la que trabajará:</label>
            <input type="text" name="granja">
            <br><br>
            <label for="Sexo" class="letrapersona2">Sexo:</label>
            <input type="text" name="sex">
            <br><br>
            <label for="Edad" class="letrapersona2">Edad del empleado:</label>
            <input type="text" name="edad">
            <br><br>
            <label for="Puesto" class="letrapersona2">Puesto que tendra:</label>
            <input type="text" name="puesto">
            <br><br>
            <label for="Salario" class="letrapersona2">Salario del empleado por semana:</label>
            <input type="text" name="salario">
            <br><br>
            <label for="E-mail" class="letrapersona2">E-mail que tenfrá el trabajador:</label>
            <input type="text" name="email">
            <label for="E-mail" class="letrapersona2">Contraseña que tenfrá el trabajador:</label>
            <input type="text" name="pass">
        </form>
    </div>
    </div>
    <div id='borra' style="visibility: visible;">
    <div class="borrarpersonal">
        <form action="includes/emp/delete.php" method="POST">
            <label for="" class="letrapersona2">Ingresa el id de el empleado que quieres borrar:</label>
            <input type="number" name="id">
        </form>
   
        </div>
    </div>

<!--
        <h2>Actualizar</h2>
        <form action="includes/emp/update.php" method="POST">
        <label for="">Granja</label><br>
            <input type="text" name="granja"><br>
            <label for="">id</label><br>
            <input type="text" name="id"><br>
            <label for="">Nombre</label><br>
            <input type="text" name="nom"><br>
            <label for="">Appat</label><br>
            <input type="text" name="appat"><br>
            <label for="">Apmat</label><br>
            <input type="text" name="apmat"><br>
            <label for="">Edad</label><br>
            <input type="text" name="edad"><br>
            <label for="">Sexo</label><br>
            <input type="text" name="sex"><br>
            <label for="">Puesto</label><br>
            <input type="text" name="puesto"><br>
            <label for="">Salario</label><br>
            <input type="text" name="salario"><br>
            <label for="">Email</label><br>
            <input type="text" name="email"><br>
            <label for="">pass</label><br>
            <input type="text" name="pass"><br>
            <button>Actualizar</button>

        </form>
        <h2>Añadir</h2>
        <form action="includes/emp/add.php" method="POST">
        <label for="">Granja</label><br>
            <input type="text" name="granja"><br>
            <label for="">Nombre</label><br>
            <input type="text" name="nom"><br>
            <label for="">Appat</label><br>
            <input type="text" name="appat"><br>
            <label for="">Apmat</label><br>
            <input type="text" name="apmat"><br>
            <label for="">Edad</label><br>
            <input type="text" name="edad"><br>
            <label for="">Sexo</label><br>
            <input type="text" name="sex"><br>
            <label for="">Puesto</label><br>
            <input type="text" name="puesto"><br>
            <label for="">Salario</label><br>
            <input type="text" name="salario"><br>
            <label for="">Email</label><br>
            <input type="text" name="email"><br>
            <label for="">Password</label><br>
            <input type="text" name="pass"><br>
            <button>Agregar</button>

        </form>
       
        <form action="includes/emp/search.php" method="POST">
            <label for="">Filtro por nombre</label>
            <input type="text" name="nom">
        </form>
-->
</body>
</html>