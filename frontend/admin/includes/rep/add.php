<?php
require_once "../conexion.php"; 

//Tomo los nombres del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $granja= $_POST["granja"];
    $nom = $_POST["nom"];
    $appat = $_POST["appat"];
    $asunto = $_POST["asunto"];
    $descripcion = $_POST["descr"];



try {

    // Agregar la fila 
    $query = "INSERT INTO reportes (nombre, appat, asunto, descripcion, id_granjas) VALUES (:nom, 
    :appat, :asunto, :descr, :granja);";


    $stmt = $pdo->prepare($query);
    
    //cambia los parametros por las variaables verdaderas
  
    $stmt->bindParam(':granja', $granja);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':appat', $appat);
    $stmt->bindParam(':asunto', $asunto);
    $stmt->bindParam(':descr', $descripcion);
   
   
    $stmt->execute();



    $pdo=null;
    header("Location: ../../reportes.php");


} catch (PDOException $e) {
    echo "Error al actualizar el registro: " . $e->getMessage();
}

}else{
    header("../../reportes.php");
}
