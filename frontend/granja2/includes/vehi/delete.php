<?php
require_once "../conexion.php"; 

//Busca si existe la id enviada con el boton
if (isset($_GET['id'])) {
    $id = $_GET['id'];


try {

    //Borra la fila
    $query = "DELETE FROM vehiculos WHERE id=:id";
    $upd= "UPDATE granjas SET vehiculos = (SELECT COUNT(*) FROM vehiculos WHERE granjas_id=2) WHERE id=2";
    
    $stmt = $pdo->prepare($query);
    $stmt1 = $pdo->prepare($upd);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $stmt1->execute();

    $pdo=null;



    header("Location: ../../vehiculos.php");


} catch (PDOException $e) {
    echo "Error al actualizar el registro: " . $e->getMessage();
}

}else{
    header("../vehiculos.php");
}
