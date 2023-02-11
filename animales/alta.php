<!DOCTYPE html>
<html lang="es">
<head>
  <title>Alta de animales</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles2.css">
</head>
<body>

<div class="header">
  <h1>Alta de nuevo animal</h1>
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

  <div class="container2">
      <?php //no se ha enviado el formulario aun
      if (!isset($_POST['Crear'])&& !isset($_POST['type']) && !isset($_FILES["imagenes"])) { ?>
        <form action="alta.php" id="formulario" method="post" enctype="multipart/form-data">
          <div class="rowo">
              <div class="col-25">
                <label>Nombre </label>
              </div>
              <div class="col-75">
                <input type="text" id="name" name="name" placeholder="nombre de animal">
              </div>
          </div>
          <div class="rowo">
            <div class="col-25">
              <label>Especie </label>
            </div>
            <div class="col-75">
              <select id="type" name="type">
                <option value="gato">gato</option>
                <option value="perro">perro</option>
               </select>
            </div>
          </div>
          <div class="rowo">
            <div class="col-25">
              <label>Foto </label>
            </div>
            <div class="col-75">
            <input type="file" id="imagenes" name="imagenes">
            </div>
          </div>
          <div class="rowo1">
            <input type="submit" value="Crear" name="Crear" id="enviar">
          </div>     
        </form>
      <?php
          }else{
              //formulario enviado
              //var_dump($_FILES["imagenes"]);
              //echo"<br>";
              $user = "root";
              $password = "alumno";
              $database = "peludines";
              $table = "animals";
              $fcrea = date("Y-m-d H:i:s"); 
              $con = new mysqli("localhost",$user,$password,$database);
              if ($con->connect_error){
                          die("Error de conexion". $con->connect_error);
              }
              $name = $_POST['name'];
              $type = $_POST['type'];
              
              $sql = "INSERT INTO animals (name, created, type) VALUES ('$name', '$fcrea', '$type')";
              $result = mysqli_query($con,$sql);
              
              if($result){
                  echo "Datos insertados correctamente";
              } else {
                  echo "Error al insertar los datos";
              }
                $sql ="SELECT id,name FROM $table";
                $resultado = $con->query($sql);
                foreach($resultado as $row) {
                  $ima="{$row['name']}{$row['id']}";
                }
                echo $imaf="{$row['name']}{$row['id']}";

                $con->close();
            }
       ?>
    </div>





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