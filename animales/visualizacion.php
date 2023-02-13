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
  <a href="#">Link</a>
  <a href="#">Link</a>
  <a href="#">Link</a>
</div>

<div class="row">
  <div class="column side">
  </div>
  
  <div class="column middle2">
    <?php
    require("../conexion.php");
    $sql ="SELECT * FROM $table WHERE id={$_GET['id']}";
    $resultado = $con->query($sql);
      if ($resultado->num_rows > 0) {
    ?>
    <div class="titu">
      <?php
       foreach($resultado as $row) {
        echo "<h1>"."Animal:{$row['name']}"."</h1>"; 
      ?>

    </div>

  <div class="fotos">
    <?php
        $imagenes = glob("../imagenes/{$row['name']}{$row['id']}.*");
        foreach ($imagenes as $imagen) {
            echo '<img src="'.$imagen.'" alt="mascota" />';
        }
    ?>
  </div>
  <div class="textos">
    <?php
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
      $con->close();
    }
    echo "Henry Fabricio Plasencia De La Cuz  ". date("d/m/Y") ;
    ?>

</div>
  
</body>
</html>