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
      if (!isset($_POST['Crear'])) { ?>
        <form action="" id="formulario" method="post" enctype="multipart/form-data">
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
              echo "nada";
              echo"<br>";
              echo var_dump($_POST);
              echo"<br>";
              var_dump($_FILES["imagenes"]);
              echo"<br>";
              $sqli="INSERT INTO peludines.animals (`name`, `created`, `type`) VALUES ({$_POST['name']}, now(),{$_POST['type']});";
              echo $sqli;
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