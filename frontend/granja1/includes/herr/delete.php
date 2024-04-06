<?php
require_once "../conexion.php"; 

//Busca si existe la id enviada con el boton
if (isset($_GET['id'])) {
    $id = $_GET['id'];


try {

    //Borra la fila
    $query = "DELETE FROM herramientas WHERE id=:id";
    $upd= "UPDATE granjas SET herramientas = (SELECT COUNT(*) FROM herramientas WHERE granjas_id=1) WHERE id=1";
    
    $stmt = $pdo->prepare($query);
    $stmt1 = $pdo->prepare($upd);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $stmt1->execute();

    $pdo=null;



    header("Location: ../../herramientas.php");


} catch (PDOException $e) {
    echo "Error al actualizar el registro: " . $e->getMessage();
}

}else{
    header("../herramientas.php");
}
