<?php
require("../compsesion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>listado de animales</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles2.css">
</head>
<body>

<div class="header">
  <h1>Listado de Peludines</h1>
</div>

<div class="topnav">
  <a href="../index.php?cierra=cerrar">LOG OUT</a>
  <a href="listado.php">listado</a>
  <a href="alta.php">alta</a>
</div>

<div class="row">
  <div class="column side">
  </div>
  
  <div class="column middle">
    <table class="listabla">
      <thead>
        <tr>
            <th>
              
            </th>
        </tr>
      </thead>
      <tbody>
          <?php
          require("../conexion.php");
          $sql ="SELECT id,name FROM $table";
          $resultado = $con->query($sql);
          if ($resultado->num_rows > 0) {
            // Recorremos cada fila y la mostramos en una tabla
          foreach($resultado as $row) {
              echo "<tr>"."<td>" ."<a href='visualizacion.php?id={$row['id']}' class='banimal'>".$row['name']."</a>". "</td>" ."<td class='entre'>"."</td>"."<td>"."<a href='listado.php?id={$row['id']}&name={$row['name']}' class='brojo'>Borrar"."</a>"."</td>"."</tr>";
          }
          ?>
        </tbody>
        <tfoot class="agpaba">
          <tr class="cranimal">
              <td class="colapsar">
              <a href="alta.php" class="creacion">Crear nuevo animal</a>
              </td>
          </tr>
        </tfoot>
    </table>
  </div> 
  <div class="column side">
    <?php
    if (isset($_GET['id'])){
       echo "<p>Historial de borrado</p>";
       $identifica = $_GET['id'];
       $sqld = $con->prepare("DELETE FROM $table WHERE id=?;");
       $sqld->bind_param('i',$identifica);
       //busca dentro de la carpeta "imagenes", los archivos cuyo nombre coincida con el valor de la variable $_GET['name'] y $_GET['id'], y luego borra los archivos encontrados.
       $imagenes = glob("../imagenes/{$_GET['name']}{$_GET['id']}.*");
       foreach ($imagenes as $imagen) {
        echo $imagen;
        if (isset($imagen) && file_exists($imagen)) {
          unlink($imagen);
      }
        }
       $sqld->execute();
       $con->close();
       header("Location:listado.php");
       
    }
    ?>
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