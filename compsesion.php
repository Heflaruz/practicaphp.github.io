<?php
session_start();
//si la variable de usuario no se creo en el login esto te reenvia al login
if (!isset($_SESSION['usuario'])) {
    header('location: ../index.php');
}
?>