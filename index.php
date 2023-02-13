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
  <a href="#">Link</a>
  <a href="#">Link</a>
  <a href="#">Link</a>
</div>

<div class="row">
  <div class="column side">
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
          <div class="rowo">
            <div class="col-25">
              <label>Password </label>
            </div>
            <div class="col-75">
              <input type="password" id="pwd" name="pwd" placeholder="tu contraseña" maxlength="64">
            </div>
          </div>
          <div class="rowo">
            <input type="submit" value="entrar" name="submit" id="submit">
            <!--<button type="submit" id="submit" value="submit" name="submit">Entrar</button>-->
          </div>     
        </form>
      <?php
       }else{
              //formulario enviado
              echo "<h1>LOGIN VALIDO</h1>";
              echo "<p>"."Usuario: {$_POST['username']}"."</p>";
              echo "<p>"."contraseña: " . $_POST['pwd'] ."</p>";
              require("conexion.php");
              if(!empty($_POST["submit"])){
                if(empty($_POST["username"])and empty($_POST["pwd"])){
                  echo "<p>";
                  echo 'HACE FALTA INGRESAR UN USUARIO Y CONTRASEÑA';
                  echo "</p>";
                } else{
                    $usuario=$_POST["username"];
                    $contra=$_POST["pwd"];
                    $sql=$con->query("select * from peludines.users where name='$usuario' and password='$contra'");
                  if ($datos=$sql->fetch_object()){
                    header("location:animales/listado.php");
                  } else{
                  echo "<p>";
                  echo 'EL USUARIO O LA CONTRASEÑA SON INCORRECTOS';
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
