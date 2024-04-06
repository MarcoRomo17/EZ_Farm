<?php
require_once "../conexion.php"; 

//Tomo los nombres del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $granja = $_POST["granja"];
    $nom = $_POST["nom"];
    $marca = $_POST["marca"];
    $cantidad = $_POST["cantidad"];
  

try {

    // Agregar la fila 
    $query = "INSERT INTO herramientas (granjas_id, nombre, marca, cantidad) VALUES (:granja, 
    :nom, :marca, :cantidad);";
    $upd= "UPDATE granjas SET animales = (SELECT COUNT(*) FROM animales WHERE granjas_id=1) WHERE id=1";



    $stmt = $pdo->prepare($query);
    $stmt1 = $pdo->prepare($upd);
    
    //cambia los parametros por las variaables verdaderas
    $stmt->bindParam(':granja', $granja);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':marca', $marca);
    $stmt->bindParam(':cantidad', $cantidad);
  
   
   
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
