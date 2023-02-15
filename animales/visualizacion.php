<?php
require("../compsesion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Vizualizacion de animales</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles2.css">
</head>
<body>

<div class="header">
  <h1>Vizualizacion</h1>
</div>

<div class="topnav">
  <a href="../index.php?cierra=cerrar">LOG OUT</a>
  <a href="listado.php">listado</a>
  <a href="alta.php">alta</a>
</div>

<div class="row">
  <div class="column side">
  </div>
  
  <div class="column middle2">
    <?php
    require("../conexion.php");
    $identificate=$_GET['id'];
    //por el medio de pasar la variable $_GET['id'] para identificar el animal,conecto la web a la base de datos y verifico si esta da resultados o no
    $sql= $con->prepare("SELECT * FROM $table WHERE id=?");
    $sql->bind_param('i',$identificate);
    $sql->execute();
    $resultado = $sql->get_result();
    if ($resultado->num_rows > 0) {
    ?>
    <div class="titu">
      <?php
      //busco el nombre del animal asociado al id
       foreach($resultado as $row) {
        echo "<h1>"."Animal:{$row['name']}"."</h1>"; 
      ?>

    </div>

  <div class="fotos">
    <?php
        //busca dentro de la carpeta "imagenes", los archivos cuyo nombre coincida con el valor de la variable $_GET['name'] y $_GET['id'],para asi mostrarlos en la web.
        $imagenes = glob("../imagenes/{$row['name']}{$row['id']}.*");
        foreach ($imagenes as $imagen) {
            echo '<img src="'.$imagen.'" alt="mascota" />';
        }
    ?>
  </div>
  <div class="textos">
    <?php
    //mostrar por pantalla datos del animal y de la imagen asociada a este
      echo "<p>Nombre:"."<b>{$row['name']}</b>"."</p>";
      echo "<p>Especie:"."<b>{$row['type']}</b>"."</p>";
      echo "<p>Fecha inserción:"."<b>{$row['created']}</b>"."</p>";
        $imagenes = glob("../imagenes/{$row['name']}{$row['id']}.*");
        foreach ($imagenes as $imagen) {
            $info = getimagesize($imagen);
            $timagen=$info['mime'];
            $peso=filesize($imagen);
            $pkb=round($peso/1024);
            echo "Imagen:"."<b>".$row['name'].$row['id'].".".pathinfo($imagen, PATHINFO_EXTENSION)."</b>". " ({$pkb} Kb)";
            
        }
      
    ?>
  </div>
  <div class="contvolv">
    <a href="listado.php" class="creacion">Volver</a>
  </div>
  <?php
   }
  ?>
  </div>

  
  <div class="column side">
  </div>
</div>
<div class="footer">
    <?php
      $con->close();
     } else {
      echo "Sin resultados";
      echo "<br>";
      $con->close();
    }
    echo "Henry Fabricio Plasencia De La Cuz  ". date("d/m/Y") ;
    ?>

</div>
  
</body>
</html>