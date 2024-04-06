<?php
require_once "../conexion.php"; 

//Tomo los nombres del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $id = $_POST["id"];
    $nom = $_POST["nom"];
    $cultivado = $_POST["cultivado"];
    $almacenado = $_POST["almacenado"];
    $semillas = $_POST["semillas"];



try {

    // Actualizar la fila 
    $query = "UPDATE cosecha SET nombre=:nom, cultivado=:cult, almacenado=:alm, semillas=:sem WHERE id=:id";
    $upd= "UPDATE granjas SET cosecha = (SELECT COUNT(*) FROM cosecha WHERE granjas_id=1) WHERE id=1";


    $stmt = $pdo->prepare($query);
    $stmt1 = $pdo->prepare($upd);
    
    //cambia los parametros por las variaables verdaderas
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':cult', $cultivado);
    $stmt->bindParam(':alm', $almacenado);
    $stmt->bindParam(':sem', $semillas);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
   
    $stmt->execute();
    $stmt1->execute();


    $pdo=null;
    header("Location: ../../cosecha.php");


} catch (PDOException $e) {
    echo "Error al actualizar el registro: " . $e->getMessage();
}

}else{
    header("../../cosecha.php");
}
