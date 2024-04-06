<?php
require_once "../conexion.php"; 

//Tomo los nombres del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $nom = $_POST["nom"];
    $marca = $_POST["marca"];
    $cantidad = $_POST["cantidad"];



try {

    // Agregar la fila 
    $query = "INSERT INTO vehiculos (nombre, marca, cantidad, granjas_id) VALUES (:nom, 
    :marca, :cantidad, 2);";
    $upd= "UPDATE granjas SET vehiculos = (SELECT COUNT(*) FROM vehiculos WHERE granjas_id=2) WHERE id=2";



    $stmt = $pdo->prepare($query);
    $stmt1 = $pdo->prepare($upd);
    
    //cambia los parametros por las variaables verdaderas
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':marca', $marca);
    $stmt->bindParam(':cantidad', $cantidad);
   
   
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
