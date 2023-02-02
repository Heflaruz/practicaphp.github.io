<!DOCTYPE html>
<html lang="en">
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
    <!--<div class="parriva"></div>-->
    <div class="container">
      <?php //no se ha enviado el formulario aun
      if (!isset($_POST['submit'])) { ?>
        <form action="" method="post">
          <div class="rowo">
              <div class="col-25">
                <label>Username:</label>
              </div>
              <div class="col-75">
                <input type="text" id="username" name="username" placeholder="nombre de usuarios">
              </div>
          </div>
          <div class="rowo">
            <div class="col-25">
              <label>Password:</label>
            </div>
            <div class="col-75">
              <input type="password" id="pwd" name="pwd" placeholder="tu contraseña">
            </div>
          </div>
          <div class="rowo">
            <input type="submit" value="submit" name="submit">
          </div>     
        </form>
      <?php
          }else{
            
              //formulario enviado
              echo "<h1>LOGIN VALIDO</h1>";
              echo "<p>"."Usuario: {$_POST['username']}"."</p>";
              echo "<p>"."contraseña: " . $_POST['pwd'] ."</p>";
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
