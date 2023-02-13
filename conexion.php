<?php
$user = "root";
$password = "alumno";
$database = "peludines";
$table = "animals";
$con = new mysqli("localhost",$user,$password,$database);
if ($con->connect_error){
    die("Error de conexion". $con->connect_error);
}
?>