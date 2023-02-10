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
  <a href="#">Link</a>
  <a href="#">Link</a>
  <a href="#">Link</a>
  <a href="#">Link</a>
</div>

<div class="row">
  <div class="column side">
  </div>
  
  <div class="column middle">
    <!--<div class="parriva"></div>-->
    <table class="listabla">
      <thead>
        <tr>
            <th>
                

            </th>
        </tr>
      </thead>
      <tbody>
          <?php
          $user = "root";
          $password = "alumno";
          $database = "peludines";
          $table = "animals";
          $con = new mysqli("localhost",$user,$password,$database);
          $sql ="SELECT id,name FROM $table";
          $resultado = $con->query($sql);
          if ($con->connect_error){
            die("Error de conexion". $con->connect_error);
          }
          if ($resultado->num_rows > 0) {
            // Recorremos cada fila y la mostramos en una tabla
          foreach($resultado as $row) {
              echo "<tr>"."<td>" ."<a href='visualizacion.php?id={$row['id']}' class='banimal'>".$row['name']."</a>". "</td>" ."<td class='entre'>"."</td>"."<td>"."<a href='listado.php?id={$row['id']}' class='brojo'>Borrar"."</a>"."</td>"."</tr>";
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
       echo "Borrar la clase con id: " . $_GET['id'] . "<br>";
       $sqld = "DELETE FROM $table WHERE id=" . $_GET['id'] . ";";
       echo $sqld;
       $con->query($sqld);
       header("Location:listado.php");
       
    }
    ?>
  </div>
</div>
<div class="footer">
    <?php
      } else {
        echo "Sin resultados";
      }
      $con->close();
      echo "Henry Fabricio Plasencia De La Cuz  ". date("d/m/Y") ;
    ?>

</div>
  
</body>
</html>