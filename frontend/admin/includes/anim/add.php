<?php
require_once "../conexion.php"; 

//Tomo los nombres del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $granja = $_POST["granja"];
    $tipo = $_POST["tipo"];
    $nom = $_POST["nom"];
    $edad = $_POST["edad"];
    $sex = $_POST["sex"];
    $ce = $_POST["ce"];



try {

    // Agregar la fila 
    $query = "INSERT INTO animales (tipo, nombre, edad, sexo, caso_especial, granjas_id) VALUES (:tipo, 
    :nom, :edad, :sex, :ce, :granja);";
  

    $stmt = $pdo->prepare($query);

    
    //cambia los parametros por las variaables verdaderas
    $stmt->bindParam(':granja', $granja);
    $stmt->bindParam(':tipo', $tipo);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':edad', $edad);
    $stmt->bindParam(':sex', $sex);
    $stmt->bindParam(':ce', $ce);
   
   
    $stmt->execute();


    $pdo=null;
    header("Location: ../../animales.php");


} catch (PDOException $e) {
    echo "Error al actualizar el registro: " . $e->getMessage();
}

}else{
    header("../../animales.php");
}
