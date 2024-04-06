<?php
require_once "../conexion.php"; 

//Tomo los nombres del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $granja = $_POST["granja"];
    $id = $_POST["id"];
    $nom = $_POST["nom"];
    $appat = $_POST["appat"];
    $apmat = $_POST["apmat"];
    $edad = $_POST["edad"];
    $sex = $_POST["sex"];
    $puesto = $_POST["puesto"];
    $salario = $_POST["salario"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];


try {

    // Actualizar la fila 
    $query = "UPDATE empleados SET granjas_id=:granja, nombre=:nom, appat=:ap, apmat=:am, edad=:edad, sexo=:sex, 
    puesto=:puesto, salario=:salario, email=:email, pass=:pass WHERE id=:id";
    $upd= "UPDATE granjas SET animales = (SELECT COUNT(*) FROM animales WHERE granjas_id=1) WHERE id=1";


    $stmt = $pdo->prepare($query);
    $stmt1 = $pdo->prepare($upd);
    
    //cambia los parametros por las variaables verdaderas
    $stmt->bindParam(':granja', $granja);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':ap', $appat);
    $stmt->bindParam(':am', $apmat);
    $stmt->bindParam(':edad', $edad);
    $stmt->bindParam(':sex', $sex);
    $stmt->bindParam(':puesto', $puesto);
    $stmt->bindParam(':salario', $salario);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':pass', $pass);

   
    $stmt->execute();
    $stmt1->execute();


    $pdo=null;
    header("Location: ../../empleados.php");


} catch (PDOException $e) {
    echo "Error al actualizar el registro: " . $e->getMessage();
}

}else{
    header("../../animales.php");
}
