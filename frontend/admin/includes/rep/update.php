<?php
require_once "../conexion.php"; 

//Tomo los nombres del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id = $_POST["id"];
    $nom = $_POST["nom"];
    $appat = $_POST["appat"];
    $asunto = $_POST["asunto"];
    $descripcion = $_POST["descr"];


try {

    // Actualizar la fila 
    $query = "UPDATE reportes SET id_granjas=:granja, nombre=:nom, asunto=:asunto, descripcion=:descr WHERE id=:id";
    $upd= "UPDATE granjas SET animales = (SELECT COUNT(*) FROM animales WHERE granjas_id=1) WHERE id=1";


    $stmt = $pdo->prepare($query);
    $stmt1 = $pdo->prepare($upd);
    
    //cambia los parametros por las variaables verdaderas
    $stmt->bindParam(':granja', $granja);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':asunto', $asunto);
    $stmt->bindParam(':descr', $descripcion);
   
    $stmt->execute();
    $stmt1->execute();


    $pdo=null;
    header("Location: ../../reportes.php");


} catch (PDOException $e) {
    echo "Error al actualizar el registro: " . $e->getMessage();
}

}else{
    header("../../reportes.php");
}
