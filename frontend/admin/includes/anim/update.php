<?php
require_once "../conexion.php"; 

//Tomo los nombres del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $granja = $_POST["granja"];
    $id = $_POST["id"];
    $tipo = $_POST["tipo"];
    $nom = $_POST["nom"];
    $edad = $_POST["edad"];
    $sex = $_POST["sex"];
    $ce = $_POST["ce"];



try {

    // Actualizar la fila 
    $query = "UPDATE animales SET tipo=:tipo, nombre=:nom, edad=:edad, sexo=:sex, granjas_id=:granja, caso_especial=:ce WHERE id=:id";
    $upd= "UPDATE granjas SET animales = (SELECT COUNT(*) FROM animales WHERE granjas_id=1) WHERE id=1";


    $stmt = $pdo->prepare($query);
    $stmt1 = $pdo->prepare($upd);
    
    //cambia los parametros por las variaables verdaderas
    $stmt->bindParam(':granja', $granja);
    $stmt->bindParam(':tipo', $tipo);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':edad', $edad);
    $stmt->bindParam(':sex', $sex);
    $stmt->bindParam(':ce', $ce);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
   
    $stmt->execute();
    $stmt1->execute();


    $pdo=null;
    header("Location: ../../animales.php");


} catch (PDOException $e) {
    echo "Error al actualizar el registro: " . $e->getMessage();
}

}else{
    header("../../animales.php");
}
