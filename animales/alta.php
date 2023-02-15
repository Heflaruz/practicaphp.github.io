<?php
require("../compsesion.php");
?>
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
  <a href="../index.php?cierra=cerrar">LOG OUT</a>
  <a href="listado.php">listado</a>
  <a href="alta.php">alta</a>
</div>

<div class="row">
  <div class="column side">
  </div>
  
  <div class="column middle2">

  <div class="container2">
      <?php //no se ha enviado el formulario aun
      if (!isset($_POST['Crear'])&& !isset($_POST['type']) && !isset($_FILES["imagenes"])&& !isset($_POST['name'])) { ?>
        <form action="alta.php" id="formulario" method="post" enctype="multipart/form-data">
          <div class="rowo">
              <div class="col-25">
                <label>Nombre </label>
              </div>
              <div class="col-75">
                <input type="text" id="name" name="name" placeholder="nombre de animal" maxlength="255">
              </div>
          </div>
          <?php
          if(isset($_GET['no'])){
            echo "<div class='rowo'>";
              echo "<p>";
                echo "INGRESA EL NOMBRE";
              echo "</p>";
            echo "</div>";
          }
          ?>
          <div class="rowo">
            <div class="col-25">
              <label>Especie </label>
            </div>
            <div class="col-75">
              <select id="type" name="type">
                <option value="gato">gato</option>
                <option value="perro">perro</option>
                <option value="" selected>selecciona un tipo de especie</option>
               </select>
            </div>
          </div>
          <?php
          if(isset($_GET['ty'])){
            echo "<div class='rowo'>";
              echo "<p>";
                echo "SELECCIONA UN TIPO DE ESPECIE";
              echo "</p>";
            echo "</div>";
          }
          ?>
          <div class="rowo">
            <div class="col-25">
              <label>Foto </label>
            </div>
            <div class="col-75">
            <input type="file" id="imagenes" name="imagenes">
            </div>
          </div>
          <?php
          if(isset($_GET['is'])){
            echo "<div class='rowo'>";
              echo "<p>";
                echo "INGRESA UNA IMAGEN";
              echo "</p>";
            echo "</div>";
          }
          ?>
          <?php
          if(isset($_GET['tam'])){
            echo "<div class='rowo'>";
              echo "<p>";
                echo "INGRESA UNA IMAGEN más pequeña QUE 200 Kb";
              echo "</p>";
            echo "</div>";
          }
          ?>
          <div class="rowo1">
            <input type="submit" value="Crear" name="Crear" id="enviar">
          </div>     
        </form>
      <?php
          }else{
            //comprobamos la existencia de las variables,si no existen se muestra carga el formulario y se muestra que variables estan vacias o el tamaño de imagen
            if (isset($_POST['Crear'])){
              if(empty($_POST['name'])) {
                  echo "<p>El campo Nombre está vacío.</p>";
                  header("Location:alta.php?no=nombre");
              } else {
                  $name = $_POST['name'];
                  if(empty($_POST['type'])) {
                    echo "<p>El campo Especie está vacío.</p>";
                    header("Location:alta.php?ty=especie");
                  } else {
                    $type = $_POST['type'];
                    if(!isset($_FILES['imagenes'])) {
                      echo "<p>El campo Foto está vacío.</p>";
                      header("Location:alta.php?is=imagenes");
                    } else {
                        if (substr($_FILES["imagenes"]["type"], 0, 5) == "image" and $_FILES["imagenes"]["size"] > 1024 * 200){
                          echo "<p>error con el tamaño en el campo imagenes.</p>";
                          header("Location:alta.php?tam=tamaño");
                        }else{
                          //echo "<p>todo correcto.</p>";
                          if(isset($_POST['Crear'])&& isset($_POST['type']) && isset($_FILES["imagenes"])&& isset($_POST['name'])){
                            //formulario enviado
                            require("../conexion.php");
                            //la fecha se asigna aqui
                            $fcrea = date("Y-m-d H:i:s"); 
                            //comprueba si $_FILES["imagenes"] es una imagen y es menor que 200 Kb
                            if (substr($_FILES["imagenes"]["type"], 0, 5) == "image" and $_FILES["imagenes"]["size"] < 1024 * 200) {
                                // Insertamos los datos y Subimos la imagen
                                $result = $con->prepare("INSERT INTO animals (name, created, type) VALUES (?, ?, ?)");
                                $result->bind_param("sss",$name, $fcrea, $type);
                                $result->execute();
                                //verificar si se insertaron o no
                                if($result){
                                    echo "Datos insertados correctamente";
                                    echo"<br>";
                                    //busco en la base de datos la alta prebiamente hecha
                                    $sql ="SELECT id,name FROM $table";
                                    $resultado = $con->query($sql);
                                    foreach($resultado as $row) {
                                      $ima="{$row['name']}{$row['id']}";
                                    }
                                    //asigno el nombre compuesto para mover la imagen
                                     echo $imaf="{$row['name']}{$row['id']}";
                                    $directorio = "../imagenes/";
                                    $fichero = explode(".", $_FILES["imagenes"]["name"]);
                                    $extension = end($fichero);
                                    $fichero = $directorio.$imaf.'.'.$extension;
                                    // Mover desde /tmp/phpBLABLA -> ../imagenes/nombre_compuesto.ext
                                    move_uploaded_file($_FILES["imagenes"]["tmp_name"], $fichero);
                                    $con->close();
                                    header("Location:listado.php");
                                    die();
          
                                } else {
                                    echo "Error al insertar los datos";
                                    $con->close();
                                    echo"<br>";
                                }
                            } else {  // Si da un error con el tamaño de imagen
                                echo "Imagen incorrecta"."<br>";
                                $con->close();
                                echo "<a href='listado.php' class='creacion'>Volver</a>";
                            }
                          }
                        }
                    }
                  }
              }
            }
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