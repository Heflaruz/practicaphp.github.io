<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>LOGIN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="header">
  <h1>LOGIN</h1>
</div>

<div class="topnav">
  <a href="index.php?cierra=cerrar">LOG OUT</a>
  <a href="#">Link</a>
  <a href="#">Link</a>
</div>

<div class="row">
  <div class="column side">
    <?php
    if(isset($_GET["cierra"])){
      session_unset();
      session_destroy();
    } else {
      //si ocurre algo aqui verificamos que exista una sesion iniciada
      if(isset($_SESSION)){
        //Recuperamos los valores de la sesion
        $variables_sesion = $_SESSION;
        //Aqui mostrarmos
        foreach($variables_sesion as $key=>$value){
            echo '<p>'.$key.' : '.$value.'</p>';
        }
      }
    }
    ?>
  </div>
  
  <div class="column middle">
    <div class="container">
      <?php //no se ha enviado el formulario aun
      if (!isset($_POST['submit'])) { 
      ?>
        <form action="index.php" method="post" id="formulario">
          <div class="rowo">
              <div class="col-25">
                <label>Username </label>
              </div>
              <div class="col-75">
                <input type="text" id="username" name="username" placeholder="nombre de usuarios" maxlength="45">
              </div>
          </div>
          <?php
          if(isset($_GET['su'])){
            echo "<div class='rowo'>";
              echo "<p>";
                echo "INGRESA EL NOMBRE";
              echo "</p>";
            echo "</div>";
          }
          ?>
          <div class="rowo">
            <div class="col-25">
              <label>Password </label>
            </div>
            <div class="col-75">
              <input type="password" id="pwd" name="pwd" placeholder="tu contraseña" maxlength="64">
            </div>
          </div>
          <?php
          if(isset($_GET['co'])){
            echo "<div class='rowo'>";
              echo "<p>";
                echo "INGRESA LA CONTRASEÑA";
              echo "</p>";
            echo "</div>";
          }
          ?>
          <div class="rowo">
            <input type="submit" value="entrar" name="submit" id="submit">
          </div>     
        </form>
      <?php
       }else{
              //formulario enviado
              require("conexion.php");
              if(!empty($_POST["submit"])){
                if(empty($_POST["username"])and empty($_POST["pwd"])){
                  echo "<p>";
                  echo 'HACE FALTA INGRESAR UN USUARIO Y CONTRASEÑA';
                  //header("location:animales/listado.php");
                  echo "</p>";
                } else{
                    $usuario=$_POST["username"];
                    $contra=$_POST["pwd"];
                    $sql=$con->query("select * from peludines.users where name='$usuario' and password='$contra'");
                  if ($datos=$sql->fetch_object()){
                    $_SESSION['usuario']=$usuario;
                    $con->close();
                    header("location:animales/listado.php");
                  } else{
                      echo "<p>";
                      echo 'EL USUARIO O LA CONTRASEÑA SON INCORRECTOS';
                      header("location:index.php?su=incorre&co=inco");
                      echo "</p>";
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
<script src="script.js"></script>
<div class="footer">
    <?php
    echo "Henry Fabricio Plasencia De La Cuz  ". date("d/m/Y") ;
    ?>

</div>
  
</body>
</html>
