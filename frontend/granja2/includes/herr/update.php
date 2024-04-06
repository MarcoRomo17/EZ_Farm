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
    $query = "UPDATE herramientas SET nombre=:nom, marca=:marca, cantidad=:cantidad WHERE id=:id";
    $upd= "UPDATE granjas SET herramientas = (SELECT COUNT(*) FROM herramientas WHERE granjas_id=2) WHERE id=2";


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
    header("Location: ../../herramientas.php");


} catch (PDOException $e) {
    echo "Error al actualizar el registro: " . $e->getMessage();
}

}else{
    header("../../herramientas.php");
}
