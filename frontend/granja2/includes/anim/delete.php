<?php
require_once "../conexion.php"; 

//Busca si existe la id enviada con el boton
if (isset($_GET['id'])) {
    $id = $_GET['id'];


try {

    //Borra la fila
    $query = "DELETE FROM animales WHERE id=:id";
    $upd= "UPDATE granjas SET animales = (SELECT COUNT(*) FROM animales WHERE granjas_id=2) WHERE id=2";
    
    $stmt = $pdo->prepare($query);
    $stmt1 = $pdo->prepare($upd);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $stmt1->execute();

    $pdo=null;



    header("Location: ../../animales.php");


} catch (PDOException $e) {
    echo "Error al actualizar el registro: " . $e->getMessage();
}

}else{
    header("../animales.php");
}