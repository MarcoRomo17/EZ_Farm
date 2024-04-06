<?php
require_once "../conexion.php"; 

//Tomo los nombres del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id = $_POST["id"];
    $nom = $_POST["nom"];
    $marca = $_POST["marca"];
    $cantidad = $_POST["cantidad"];



try {

    // Actualizar la fila 
    $query = "UPDATE vehiculos SET nombre=:nom, marca=:marca, cantidad=:cantidad WHERE id=:id";
    $upd= "UPDATE granjas SET vehiculos = (SELECT COUNT(*) FROM vehiculos WHERE granjas_id=1) WHERE id=1";


    $stmt = $pdo->prepare($query);
    $stmt1 = $pdo->prepare($upd);
    
    //cambia los parametros por las variaables verdaderas
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':marca', $marca);
    $stmt->bindParam(':cantidad', $cantidad);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
   
   
    $stmt->execute();
    $stmt1->execute();


    $pdo=null;
    header("Location: ../../vehiculos.php");


} catch (PDOException $e) {
    echo "Error al actualizar el registro: " . $e->getMessage();
}

}else{
    header("../../vehiculos.php");
}
