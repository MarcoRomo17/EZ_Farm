<?php
require_once "../conexion.php"; 

//Tomo los nombres del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $tipo = $_POST["tipo"];
    $nom = $_POST["nom"];
    $edad = $_POST["edad"];
    $sex = $_POST["sex"];
    $ce = $_POST["ce"];



try {

    // Agregar la fila 
    $query = "INSERT INTO animales (tipo, nombre, edad, sexo, caso_especial, granjas_id) VALUES (:tipo, 
    :nom, :edad, :sex, :ce, 1);";
    $upd= "UPDATE granjas SET animales = (SELECT COUNT(*) FROM animales WHERE granjas_id=1) WHERE id=1";



    $stmt = $pdo->prepare($query);
    $stmt1 = $pdo->prepare($upd);
    
    //cambia los parametros por las variaables verdaderas
    $stmt->bindParam(':tipo', $tipo);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':edad', $edad);
    $stmt->bindParam(':sex', $sex);
    $stmt->bindParam(':ce', $ce);
   
   
    $stmt->execute();
    $stmt1->execute();


    $pdo=null;
    header("Location: ../../animales.php");


} catch (PDOException $e) {
    echo "Error al actualizar el registro: " . $e->getMessage();
}

}else{
    header("../../animales.php");
}