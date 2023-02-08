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
          <?php
          $user = "root";
          $password = "alumno";
          $database = "peludines";
          $table = "animals";
          try {
            $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
            foreach($db->query("SELECT name FROM $table") as $row) {
              echo "<tr>"."<td>" ."<a href='visualizacion.php' class='banimal'>".$row['name']."</a>". "</td>" ."<td class='entre'>"."</td>"."<td>"."<a href='#' class='brojo'>Borrar"."</a>"."</td>"."</tr>";
            }
          } catch (PDOException $e) {
              print "Error!: " . $e->getMessage() . "<br/>";
              die();
          }
          ?>
        <tfoot class="agpaba">
          <tr class="cranimal">
              <td class="colapsar">
              <a href="#" class="creacion">Crear nuevo animal</a>
              </td>
          </tr>
        </tfoot>
    </table>
  </div>

  
  <div class="column side">
  </div>
</div>
<div class="footer">
    <?php
    echo "Henry Fabricio Plasencia De La Cuz  ". date("d/m/Y") ;
    ?>

</div>
  
</body>
</html>