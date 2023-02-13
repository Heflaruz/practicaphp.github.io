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
              
              $sqli = "INSERT INTO animals (name, created, type) VALUES ('$name', '$fcrea', '$type')";
              $result = mysqli_query($con,$sqli);
              
              if($result){
                  echo "Datos insertados correctamente";
                  echo"<br>";
              } else {
                  echo "Error al insertar los datos";
                  echo"<br>";
              }
                $sql ="SELECT id,name FROM $table";
                $resultado = $con->query($sql);
                foreach($resultado as $row) {
                  $ima="{$row['name']}{$row['id']}";
                }
                echo $imaf="{$row['name']}{$row['id']}";
                if (substr($_FILES["imagenes"]["type"], 0, 5) == "image" and $_FILES["imagenes"]["size"] < 1024 * 200) {
                    // Subimos la imagen
                    // move_uploaded_file(desde, hasta);
                    // move_uploaded_file(desde, hasta);
                    $directorio = "../imagenes/";
                    $fichero = explode(".", $_FILES["imagenes"]["name"]);
                    $extension = end($fichero);
                    $fichero = $directorio.$imaf.'.'.$extension;
                  // Mover desde /tmp/phpBLABLA -> images/nombre_fichero.ext
                    move_uploaded_file($_FILES["imagenes"]["tmp_name"], $fichero);

                    echo "<img src='$fichero' style='width: 300px;'>";
                } else {  // Sino, da un error
                    echo "Imagen incorrecta"."<br>";
                    echo "<a href='listado.php'>Volver</a>";
                }
                $con->close();
                //header("Location:listado.php");
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