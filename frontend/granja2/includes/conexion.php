<?php

//parametros para la conexion a la base de datos
$host='localhost';
$dbn='ezfarms';
$dbuser='root';
$dbpass='';


try{
    //objeto que conecta la base de datos
    $pdo = new PDO ("mysql:host=$host;dbname=$dbn", $dbuser, $dbpass);


     //en caso de no haber conexion mostrar mensaje de error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die("Conexion fallida: " . $e->getMessage());
}